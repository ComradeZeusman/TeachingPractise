<?php
include "aunthenicate.php";
//if not admin, echo error message
if ($result_admin->num_rows != 1) {
    echo "You are not authorized to view this page. Please login as an admin.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Students Based on Program</title>
    <style>
        /* Reset some default styles */
        body, a {
            margin: 0;
            padding: 0;
        }

        /* Style the body background and text color */
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
            color: #333;
        }

        /* Style the links */
        a {
            display: block;
            background-color: #007BFF;
            color: #fff;
            padding: 10px;
            margin: 10px;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #0056b3;
        }

        /* Center the links */
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
        }

        /* Add some space between the links */
        a + a {
            margin-top: 10px;
        }
    </style>
</head>
<body>
<div class="container">
    <!-- View students in different programs -->
    <a href="humanities.php">View Students in Bachelor of Education in Humanities</a>
    <a href="science.php">View Students in Bachelor of Education in Science</a>
    <a href="ict.php">View Students in Bachelor of Education in Information and Communication Technologies</a>
</div>
</body>
</html>
