<?php

include "aunthenicate.php";
//if not admin, echo error message
if ($result_admin->num_rows != 1) {
    echo "You are not authorized to view this page. Please login as an admin.";
    exit();
}
?>
<!-- view students and delete students-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Students</title>
    <style>
body, h1, table, th, td, a, form {
    margin: 0;
    padding: 0;
}

body {
    background-color: #f2f2f2;
    font-family: Arial, sans-serif;
    color: #333;
}

h1 {
    background-color: #007BFF;
    color: #fff;
    padding: 20px;
    text-align: center;
}

table {
    width: 100%;
    border-collapse: collapse;
    background-color: #fff;
    margin-top: 20px;
}

th {
    background-color: #007BFF;
    color: #fff;
    padding: 10px;
    text-align: left;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

td {
    padding: 10px;
}

a {
    text-decoration: none;
    background-color: #d9534f;
    color: #fff;
    padding: 5px 10px;
    border-radius: 5px;
}

a:hover {
    background-color: #c9302c;
}

a.back-link {
    background-color: #007BFF;
}

a.back-link:hover {
    background-color: #0056b3;
}

form#logout-form {
    text-align: center;
    margin-top: 20px;
}

input#logout-button {
    background-color: #d9534f;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

input#logout-button:hover {
    background-color: #c9302c;
}
    </style>
</head>
<body>
    <h1>View Students</h1>
    <form method="post" action="viewstudents.php">
        <input type="text" name="search" placeholder="Search by name or program or reg_number">
        <input type="submit" value="Search">
</from>
    <table>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Registration Number</th>
            <th>School Email</th>
            <th>Program</th>
            <th>Year</th>
            <th>Semester</th>
            <th>TP status</th>
            <th>Amount paid</th>
            <th>Delete</th>
            
        </tr>
        <?php
        // Create a database connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
        // SQL query to select all students
        $sql = "SELECT * FROM students";
        $result = $conn->query($sql);
        
        if (isset($_POST['search'])) {
            $search = $_POST['search'];
            $sql = "SELECT * FROM students WHERE first_name LIKE '%$search%' OR last_name LIKE '%$search%' OR program LIKE '%$search%'OR reg_number LIKE '%$search'";
            $result = $conn->query($sql);
        }
        
       
        // Check if the query returns any results
        if ($result->num_rows > 0) {
        // Loop through the results and output each student
        while($row = $result->fetch_assoc()) {

            $sql4 = "SELECT * FROM tppayment WHERE student_id=" . $row["student_id"];
            $result4 = $conn->query($sql4);
            $row4 = $result4->fetch_assoc();
        echo "<tr>";
        echo "<td>" . $row["first_name"] . "</td>";
        echo "<td>" . $row["last_name"] . "</td>";
        echo "<td>" . $row["reg_number"] . "</td>";
        echo "<td>" . $row["school_email"] . "</td>";
        echo "<td>" . $row["program"] . "</td>";
        echo "<td>" . $row["year"] . "</td>";
        echo "<td>" . $row["semester"] . "</td>";
        echo "<td>" . $row["approved"] . "</td>";
        echo "<td>" . $row4["amount"] . "</td>";
        echo "<td><a href='deletestudent.php?id=" . $row["student_id"] . "'>Delete</a></td>";
        echo "</tr>";
        }
        } else {
        echo "0 results";
        }
        // Close the database connection
        $conn->close();
        ?>
    </table>
    <a href="admin.php">Back to Admin Dashboard</a>

</body>
</html>
