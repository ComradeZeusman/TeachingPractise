<?php
// view students based on program
include "aunthenicate.php";
//if not admin, echo error message
if ($result_admin->num_rows != 1) {
    echo "You are not authorized to view this page. Please login as an admin.";
    exit();
}
// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
// SQL query to select all students from a program bachelor of education in Information and Communication Technology
$sql = "SELECT * FROM students WHERE program='bachelor of education in Information and Communication Technology'";
$result = $conn->query($sql);

?>
<!-- view students based on program-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Students Based on Program</title>
 <style>
    body, h1, table {
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
    background-color: #28a745;
    color: #fff;
    padding: 5px 10px;
    border-radius: 5px;
}

a:hover {
    background-color: #1e7e34;
}
</style>
</head>
<body>
<!-- view students in bachelor of education in Information and Communication Technology -->
<h1>bachelor of education in Information and Communication Technology</h1>
<table>
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Registration Number</th>
        <th>School Email</th>
        <th>Program</th>
        <th>Year</th>
        <th>Semester</th>
        <th>Approved status</th>
        <th>Approve for TPs</th>
        <th>Delete</th>
    </tr>
    <?php
    // Check if the query returns any results
    if ($result->num_rows > 0) {
    // Loop through the results and output each student
    while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row["first_name"] . "</td>";
    echo "<td>" . $row["last_name"] . "</td>";
    echo "<td>" . $row["reg_number"] . "</td>";
    echo "<td>" . $row["school_email"] . "</td>";
    echo "<td>" . $row["program"] . "</td>";
    echo "<td>" . $row["year"] . "</td>";
    echo "<td>" . $row["semester"] . "</td>";
    if($row["approved"]=="")
    {
        echo  "<td>" . $row["approved"]="Not assigned"; "</td>";
    }
    else{
        echo  "<td>" . $row["approved"] . "</td>";
              
    }
    echo "<td><a href='approve.php?id=" . $row["student_id"] . "'>Approve</a></td>";
    echo "<td><a href='deletestudent.php?id=" . $row["student_id"] . "'>Delete</a></td>";
    echo "</tr>";
    }
    } else {
    echo "0 results";
    }
    // Close the database connection
    $conn->close();
    ?>


</body>
</html>
