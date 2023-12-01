<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include PHPMailer
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require 'PHPMailer-master/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

// Your SMTP configuration
$smtp_host = 'smtp.gmail.com';
$smtp_port = 587; 
$smtp_username = 'teachingpractice45@gmail.com';
$smtp_password = 'mjtdqrzwuljldpaz';

//db credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "teachingpractise";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST["firstName"];
    $last_name = $_POST["lastName"];
    $reg_number = $_POST["regNumber"];
    $school_email = $_POST["email"];
    $program = $_POST["program"];
    $year = $_POST["year"];
    $semester = $_POST["semester"];
    $preferred_subjects = $_POST["preferredSubjects"];
    $preferred_district = $_POST["district"];
    $select = substr($reg_number, 0, 3);
    $appproved ="No";

    if ($select == "ICT") {
        $random_password = bin2hex(random_bytes(5));
        $password = $random_password;
    } elseif ($select == "BEH") {
        $random_password = bin2hex(random_bytes(5));
        $password = $random_password;
    } elseif ($select == "BES") {
        $random_password = bin2hex(random_bytes(5));
        $password = $random_password;
    } else {
        echo "Invalid Registration Number";
        exit();
    }

    $hashedpassword = password_hash($password, PASSWORD_DEFAULT);

    // Check if the email already exists
    $email_check_sql = "SELECT * FROM students WHERE school_email = '$school_email'";
    $email_check_result = $conn->query($email_check_sql);

    if ($email_check_result->num_rows > 0) {
        echo "Email already exists. Please use a different email.";
        exit();
    }

    // Check if the registration number already exists
    $reg_number_check_sql = "SELECT * FROM students WHERE reg_number = '$reg_number'";
    $reg_number_check_result = $conn->query($reg_number_check_sql);

    if ($reg_number_check_result->num_rows > 0) {
        echo "Registration number already exists. Please use a different registration number.";
        exit();
    }

    $sql = "INSERT INTO students (first_name, last_name, reg_number, school_email, program, year, semester, preferred_subjects, preferred_district, password,approved)
        VALUES ('$first_name', '$last_name', '$reg_number', '$school_email', '$program', $year, $semester, '$preferred_subjects', '$preferred_district','$hashedpassword','$appproved')";


    // Execute the SQL INSERT statement
    if ($conn->query($sql) === TRUE) {
        // Step 4: Compose the password reset email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = $smtp_host;
        $mail->Port = $smtp_port;
        $mail->SMTPAuth = true;
        $mail->Username = $smtp_username;
        $mail->Password = $smtp_password;
        $mail->SMTPSecure = 'tls';

        $mail->setFrom('teachingpractice45@gmail.com', 'Teaching practise management system');
        $mail->addAddress($school_email);
        $mail->Subject = 'Teaching practise management system default password';
        $mail->Body = 'Use your student email address and this password to login:' . $password;

        // Step 5: Send the email
        if ($mail->send()) {
            echo 'Message sent!';
        } else {
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }

        header("Location: viewstudents.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
