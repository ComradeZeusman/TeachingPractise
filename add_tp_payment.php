<?php
include "aunthenicate.php";

?>
<!-- interface for adding payment details of students -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add payment details</title>
    <link rel="stylesheet" href="./css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            background-color: #333;
            color: white;
            padding: 10px;
        }

        h3 {
            text-align: center;
        }

        form {
            width: 80%;
            margin: 0 auto;
            margin-top: 20px;
        }

        input[type=text], input[type=number] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
        }

        input[type=submit] {
            background-color: #333;
            color: white;
            padding: 12px 20px;
            border: none;
            cursor: pointer;
            width: 50%;
        }

        input[type=submit]:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>
<h1>Add payment details</h1>
<!-- echo student name-->
<h3>Student: <?php echo $first_name;?></h3>
<h3>Upload a clear reciept</h3>
<h3>We will scan the reciept and store your information</h3>
<form action="paymentprocessing.php" method="post" enctype="multipart/form-data">
    <label for="receipt">Upload Receipt</label>
    <input type="file" name="receipt" id="receipt" required>
    <input type="submit" value="Submit">
</form>
<button><a href="dashboard.php">Back to Dashboard</a></button>
</body>
</html>

