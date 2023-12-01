<?php
include "aunthenicate.php";

// Assuming $user_id is properly defined

// Sanitize user input (consider using prepared statements for security)
$user_id = (int)$user_id;

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "teachingpractise";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM assigned WHERE student_id=$user_id";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Assigned Details</title>
    <style>
        /* Reset some default styles */
        body, table, th, td {
            margin: 0;
            padding: 0;
        }

        /* Style the body background and text color */
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
        }

        /* Style the table */
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
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
    </style>
</head>
<body>
<table>
    <tr>
        <th>Assigned School</th>
        <th>Assigned Subjects</th>
        <th>School location</th>
        <th>Supervisor Name</th>

    </tr>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Fetch school details based on assigned_school ID
            $school_id = $row['assigned_school'];
            $sql2 = "SELECT * FROM schools WHERE school_id=$school_id";
            $result2 = $conn->query($sql2);
            $school = $result2->fetch_assoc();

            // Fetch supervisor details based on supervisor_id
            $supervisor_id = $row['supervisor_id'];
            $sql3 = "SELECT * FROM supervisor WHERE supervisor_id=$supervisor_id";
            $result3 = $conn->query($sql3);
            $supervisor = $result3->fetch_assoc();

            $sql4 = "SELECT * FROM students WHERE student_id=$user_id";
            $result4 = $conn->query($sql4);
            $student = $result4->fetch_assoc();

            if($student['approved'] == "No"){
                echo "<script>alert('You have assigned but not been approved yet.');</script>";
                echo "<script>alert('This is either because you  not paid your tp fee or there is a discrepancy. Message your coordinatoor.');</script>";
                echo "<script>window.location.href='dashboard.php';</script>";
            }
            else{
             // Display table rows with assigned details
             echo "<tr>";
             echo "<td>" . $school["school_name"] . "</td>";
             echo "<td>" . $school["wanted_subjects"] . "</td>";
             echo "<td>" . $school["school_location"] . "</td>";
             echo "<td>" . $supervisor["first_name"] . "</td>";
             echo "</tr>";
            }
           
        }
    } else {
        $sql4 = "SELECT * FROM students WHERE student_id=$user_id";
        $result4 = $conn->query($sql4);
        $student = $result4->fetch_assoc();

        if($student['approved'] == "No"){
            echo "<script>alert('You have not be assinged.');</script>";
            echo "<script>alert('This is either because you  not paid your tp fee or there is a discrepancy. Message your coordinatoor.');</script>";
            echo "<script>window.location.href='dashboard.php';</script>";
        }
    }
    ?>
</table>
<button><a href="dashboard.php">Back to Dashboard</a></button>
</body>
</html>
