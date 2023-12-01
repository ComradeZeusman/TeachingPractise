<?php
include "aunthenicate.php";

// Connect to the database (you already have this code)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "teachingpractise";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM admin";
$result_admin = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View All Coordinators</title>
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
            background-color: #c9302c;
            color: white;
            padding: 20px;
            margin: 0;
        }

        h3 {
            text-align: center;
        }

        table {
            margin: 20px auto;
            border-collapse: collapse;
            width: 80%;
        }

        th, td {
            border: 1px solid #ddd;
            text-align: left;
            padding: 10px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        form {
            text-align: center;
            margin-top: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="number"], textarea {
            width: 50%;
            padding: 10px;
            margin: 5px 0;
        }

        button[type="submit"] {
            background-color: #007BFF;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            color: #007BFF;
        }

        a:hover {
            text-decoration: underline;
        }

        #logout-form {
            text-align: center;
            margin-top: 20px;
        }

        #logout-button {
            background-color: #d9534f;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }

        #logout-button:hover {
            background-color: #c9302c;
        }
    </style>
</head>
<body>
<h1>Submit a complaint</h1>
<h3>View All Coordinators</h3>
<table>
    <tr>
        <th>Number</th>
        <th>Name</th>
        <th>School Email</th>
    </tr>
    <?php
    while ($row = $result_admin->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["ID"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "</tr>";
    }
    ?>
</table>
<form action="complaintprocess.php" method="POST">
    <label for="id">Insert the number of the receiver:</label>
    <input type="number" id="id" name="id" required><br><br>
    <label for="complaint">Complaint:</label>
    <textarea id="complaint" name="complaint" rows="4" cols="50"></textarea><br><br>
    <button type="submit">Submit</button>
</form>
<button><a href="dashboard.php">Back to Dashboard</a></button>
</body>
</html>
