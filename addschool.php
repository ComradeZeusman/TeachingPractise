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
    <title>Add schools</title>
	<style>
        body {
            background-image: url('./imgs/1d730c6d-df41-4118-a63c-1328d235adbf.jpeg');
            background-size: cover;
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f0f0f0;
            padding: 20px;
            margin: 0;
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
        textarea {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        textarea {
            resize: vertical;
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
    <div class="for">
    <form action="addschoolprocesses.php" method="POST">
        <label for="school_name">School Name</label>
        <input type="text" name="school_name" id="school_name" required>
        <br>
        <label for="wanted_subjects">Subjects</label><br>
        <textarea name="wanted_subjects" id="wanted_subjects" cols="30" rows="10" required></textarea>
        <br>
        <label for="school_address">School Address</label>
        <input type="text" name="school_address" id="school_address" required>
        <br>
        <button type="submit">Add School</button>
    </div>
</body>
</html>