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

$Servername = "localhost";
$Username = "root";
$Password = "";
$Database = "teachingpractise";

// Create connection
$conn = new mysqli($Servername, $Username, $Password, $Database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the applied_for table
$sql1 = "SELECT * FROM applied_for";
$result = $conn->query($sql1);

if ($result->num_rows > 0) {
    $countInserted = 0;

    while ($row = $result->fetch_assoc()) {
        // Check payment condition from tppayment table
        $student_id = $row['student_id'];
        $payment_sql = "SELECT amount FROM tppayment WHERE student_id = $student_id"; // Assuming 'amount' is in tppayment table
        $payment_result = $conn->query($payment_sql);

        if ($payment_result) {
            $payment_row = $payment_result->fetch_assoc();
            $payment_amount = $payment_row['amount'];

            // Check if payment is 80000 or more
            if ($payment_amount >= 80000) {
                // Check if 'school_id' exists in $row with variations in case
                if (isset($row['school_id']) || isset($row['School_id']) || isset($row['School_ID'])) {
                    $school_id = isset($row['school_id']) ? $row['school_id'] : (isset($row['School_id']) ? $row['School_id'] : $row['School_ID']);

                    $check_sql = "SELECT COUNT(*) AS count FROM assigned WHERE student_id = $student_id";
                    $check_result = $conn->query($check_sql);

                    if ($check_result) {
                        $check_row = $check_result->fetch_assoc();
                        $count = $check_row['count'];

                        if ($count == 0) {
                            $count_sql = "SELECT COUNT(*) AS total_count FROM applied_for WHERE student_id = $student_id";
                            $count_result = $conn->query($count_sql);

                            if ($count_result) {
                                $count_row = $count_result->fetch_assoc();
                                $total_count = $count_row['total_count'];

                                if ($total_count == 2) {
                                    $supervisor_sql = "SELECT supervisor_id FROM supervisor ORDER BY RAND() LIMIT 1";
                                    $supervisor_result = $conn->query($supervisor_sql);

                                    if ($supervisor_result) {
                                        $supervisor_row = $supervisor_result->fetch_assoc();
                                        $supervisor_id = $supervisor_row['supervisor_id'];

                                        // Initialize $insert_sql here
                                        $insert_sql = "INSERT INTO assigned (student_id, assigned_school, supervisor_id) VALUES ($student_id, $school_id, $supervisor_id)";
                                        
                                        if ($conn->query($insert_sql) !== TRUE) {
                                            echo "Error inserting record: " . $conn->error;
                                        } else {
                                            $countInserted++;
                                        }
                                    } else {
                                        echo "Error selecting supervisor: " . $conn->error;
                                    }
                                }
                            } else {
                                echo "Error counting occurrences: " . $conn->error;
                            }
                        }
                    } else {
                        echo "Error checking assignment: " . $conn->error;
                    }
                } else {
                    echo "Error: 'school_id' is not present in the database for student_id = $student_id";
                }
            }
        } else {
            echo "Error fetching payment amount: " . $conn->error;
        }

        // Send email to the student
        $sendemail_sql = "SELECT school_email FROM students WHERE student_id = $student_id";
        $sendemail_result = $conn->query($sendemail_sql);

        if ($sendemail_result->num_rows > 0) {
            $sendemail_row = $sendemail_result->fetch_assoc();
            $recipient_email = $sendemail_row['school_email'];

            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Host = $smtp_host;
            $mail->Port = $smtp_port;
            $mail->SMTPAuth = true;
            $mail->Username = $smtp_username;
            $mail->Password = $smtp_password;
            $mail->SMTPSecure = 'tls';

            $mail->setFrom('teachingpractice45@gmail.com', 'Teaching Practise payment');
            $mail->addAddress(trim($recipient_email));
            $mail->Subject = 'APPLICATION APPROVED';
            $mail->Body = 'Your application has been approved. Check your account for more details regards Teaching practise management system';

            if ($mail->send()) {
                echo 'Message sent!';
            } else {
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            }
        } else {
            echo "No email found for the student in the database";
        }
    }

    echo "Script executed successfully. students inserted into the assigned table.";
    //update the approved column for assigned students table to Yes
    $update_sql = "UPDATE students SET approved = 'Yes'";
    $update_result = $conn->query($update_sql);
   
} else {
    echo "No students found in the applied_for table";
}

// Closing the database connection after operations
$conn->close();
?>
