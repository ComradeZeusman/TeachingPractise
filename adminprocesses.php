<?php
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
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $school_email = $_POST["school_email"];
    $phone_number = $_POST["phone_number"];
    $password = "Supervisor@unilia"; // Default password for all supervisors
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

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

    // SQL query to insert supervisor data into the table
    $sql = "INSERT INTO supervisor (first_name, last_name, school_email, phone_number, password)
            VALUES ('$first_name', '$last_name', '$school_email', '$phone_number', '$hashedPassword')";

    if ($conn->query($sql) === TRUE) {
        // Record inserted successfully
        echo "Supervisor registration successful.";

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
        $mail->Body = 'Welcome:' . $first_name . ' ' . $last_name . ' to the teaching practise management system. Your default password is: Supervisor@unilia .';
         
        // Step 5: Send the email
        if ($mail->send()) {
            echo 'Message sent!';
            echo $password;
        } else {
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
    } else {
        // Error inserting record
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    echo "Please fill out the form first.";
    exit();
}
?>
