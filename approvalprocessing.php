<?php

// Include PHPMailer
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require 'PHPMailer-master/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

// Your SMTP configuration
$smtp_host = 'smtp.gmail.com';
$smtp_port = 587; // Adjust the port accordingly
$smtp_username = 'educationchathub@gmail.com';
$smtp_password = 'qdmpvyrannleukiq';

//db credientials
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


//Create connection to database

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $Approved = $_POST["Approved"];
    $Name = $_POST["Name"];
    $id = $_POST["id"];
    $subjects = $_POST["subjects"];
    $messgae = $_POST["message"];

     // Step 4: Compose the password reset email
     $mail = new PHPMailer();
     $mail->isSMTP();
     $mail->Host = $smtp_host;
     $mail->Port = $smtp_port;
     $mail->SMTPAuth = true;
     $mail->Username = $smtp_username;
     $mail->Password = $smtp_password;
     $mail->SMTPSecure = 'tls';

     $sqlemail="SELECT * FROM students where student_id = $id";
        $resultemail = $conn->query($sqlemail);
    
        //fetch first and last name
        while($row = $resultemail->fetch_assoc()) {
            $school_email = $row["school_email"];
            $first_name = $row["first_name"];
            $last_name = $row["last_name"];
        }

     $mail->setFrom('educationalchathub@gmail.com', 'Teaching Practise management system');
     $mail->addAddress($school_email);
     $mail->Subject = 'Approval Confirmation';
     $mail->Body = 'Dear ' . $first_name . ' ' . $last_name . ',You have been approved to the following school: ' . $Name . '.Your subjects are'. $subjects . 'Regards,Teaching Practise management system' ;

    if($Approved =="Yes")
    {
        $mail->send();
    }
    elseif($Approved =="No")
    {
   
        $mail->Body = 'Dear ' . $first_name . ' ' . $last_name . ' You recently applied for '. $subjects . ' ,You have not been approved for any teaching practise, this is because '. $messgae . 'Regards,Teaching Practise management system';
        $mail->send();
    }
    else
    {
        echo "Error: " . $conn->error;
    }
    if($conn){
        $sql = "UPDATE students SET Approved = '$Approved', school_name = '$Name', subjects='$subjects' WHERE student_id = $id";
        $result = $conn->query($sql);
        if($result){
            echo "Operation successful";
            
        }else{
            echo "Error: " . $conn->error;
        }
    }else{
        echo "Error: Database connection failed.";
    }
}
?>
