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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Supervisor</title>
    <style>
        /* General styling */
        body {
            background-image: url('./imgs/1d730c6d-df41-4118-a63c-1328d235adbf.jpeg');
            background-size: cover;
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f0f0f0;
            padding: 20px;
            margin: 0;
        }

        h1 {
            color: white;
        }

        .for {
            background-color: #fff;
            border: 2px solid #3498db;
            border-radius: 10px;
            padding: 20px;
            margin: 0 auto;
            width: 80%;
            max-width: 400px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            text-align: left;
            margin-top: 10px;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button[type="submit"] {
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #2472b4;
        }

        a {
            display: block;
            margin-top: 20px;
            color: #3498db;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .navbar {
            overflow: hidden;
            background-color: #333;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
        }

        .navbar a {
            color: #f2f2f2;
            text-decoration: none;
            padding: 10px;
        }

        #logout-form {
            margin: 0;
        }

        #logout-button {
            background-color: #d9534f;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        #logout-button:hover {
            background-color: #c9302c;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div>
            <a href="admin.php">Home</a>
        </div>
        <div>
            <form id="logout-form" action="logout.php" method="post">
                <input id="logout-button" type="submit" value="Logout">
            </form>
        </div>
    </div>
    <h1>Add Supervisor</h1>
    <div class="for">
    <form action="adminprocesses.php" method="POST">
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" required><br><br>

        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" required><br><br>

        <label for="school_email">School Email:</label>
        <input type="email" id="school_email" name="school_email" required><br><br>

        <label for="phone_number">Phone Number:</label>
        <input type="tel" id="phone_number" name="phone_number" required><br><br>
        
        <button type="submit">Submit</button>
    </form>
    </div>

    <a href="admin.php">Back to Admin Dashboard</a>
</body>
</html>
