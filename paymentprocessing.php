<?php
include "aunthenicate.php";

// Include PHPMailer
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require 'PHPMailer-master/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

// Your SMTP configuration
$smtp_host = 'smtp.gmail.com';
$smtp_port = 587; 
$smtp_username = 'educationchathub@gmail.com';
$smtp_password = 'qdmpvyrannleukiq';

$Servername = "localhost";
$Username = "root";
$Password = "";
$Database = "teachingpractise";

// Create connection
$conn = new mysqli($Servername, $Username, $Password, $Database);

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle the uploaded receipt
    $uploadDirectory = "uploads/"; // Change this to your desired directory
    $receiptName = $_FILES["receipt"]["name"];
    $receiptPath = $uploadDirectory . $receiptName;
    move_uploaded_file($_FILES["receipt"]["tmp_name"], $receiptPath);

    $filename = realpath($receiptPath);
    $cfile    = new CurlFile($filename, 'image/jpeg', $filename);
    $data     = array('file' => $cfile);

    $taggun_endpoint = 'https://api.taggun.io/api/receipt/v1/simple/file';

    $ch = curl_init();
    $options = array(
        CURLOPT_URL            => $taggun_endpoint,
        CURLOPT_RETURNTRANSFER => true,
        CURLINFO_HEADER_OUT    => true,
        CURLOPT_HEADER         => true,
        CURLOPT_POST           => true,
        CURLOPT_HTTPHEADER     => array(
            'apikey: 573309e0848a11eeaa0ceb15424ed39a',
            'Accept: application/json',
            'Content-Type: multipart/form-data',
        ),
        CURLOPT_POSTFIELDS     => $data,
    );

    curl_setopt_array($ch, $options);
    $result      = curl_exec($ch);
    $header_info = curl_getinfo($ch, CURLINFO_HEADER_OUT);
    $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    $header      = substr($result, 0, $header_size);
    $body        = substr($result, $header_size);

    // Extracting specific fields from the response
    $response = json_decode($body, true);
    $totalAmount = isset($response['totalAmount']['data']) ? $response['totalAmount']['data'] : null;
    $date = isset($response['date']['data']) ? $response['date']['data'] : null;
    $merchantName = isset($response['merchantName']['data']) ? $response['merchantName']['data'] : null;

	if ($totalAmount == null || $date == null || $merchantName == null) {
		echo "Error processing receipt. upload a clear receipt given to you by FDH BANK, and make sure the merchant name university of livingstonia is visible, the date and the amount is visible";
	    exit();
	}



    $sqlemail = "SELECT school_email FROM students WHERE student_id=$user_id";
    $resultemail = $conn->query($sqlemail);
    
    if(!$resultemail){
        die("Error getting email: " . $conn->error);
    }
    $rowemail = $resultemail->fetch_assoc();
    $school_email = $rowemail["school_email"];

		
        //check if user has already uplaoed a receipt
		$sql = "SELECT * FROM tppayment WHERE student_id=$user_id";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			echo "You have already uploaded a receipt";
		}
		else {
			// Insert the payment details into the database
			$sql = "INSERT INTO tppayment (student_id, amount, date, merchant, reciept) VALUES ($user_id, '$totalAmount', '$date', '$merchantName', '$receiptPath')";
		$result = $conn->query($sql);

		if (!$result) {
			die("Error inserting payment details: " . $conn->error);
		}
 
        //send email to the student
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = $smtp_host;
        $mail->Port = $smtp_port;
        $mail->SMTPAuth = true;
        $mail->Username = $smtp_username;
        $mail->Password = $smtp_password;
        $mail->SMTPSecure = 'tls';

        $mail->setFrom('educationalchathub@gmail.com', 'Teaching Practise payment');
        $mail->addAddress($school_email);
        $mail->Subject = 'Thank you for your payment';
        $mail->Body = 'You have paid MWK' . $totalAmount . ' for your teaching practise. Thank you for your payment. if there is any problem contact your coordinator';

        // Step 5: Send the email
        if ($mail->send()) {
            echo 'Message sent!';
        } else {
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
         
		}


    curl_close($ch);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Your receipt has been processed</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .receipt-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 400px;
            margin: 0 auto;
        }
        h1 {
            text-align: center;
        }
        .receipt-info {
            margin-bottom: 15px;
        }
        .receipt-info p {
            margin: 5px 0;
        }
        .receipt-info p strong {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="receipt-container">
        <h1>Your receipt has been processed</h1>
        <div class="receipt-info">
            <p><strong>Total Amount:</strong> <?php echo $totalAmount; ?></p>
            <p><strong>Date:</strong> <?php echo $date; ?></p>
            <p><strong>Merchant Name:</strong> <?php echo $merchantName; ?></p>
        </div>
    </div>
</body>
</html>

