<?php
include "aunthenicate.php";
//connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "teachingpractise";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}



if (isset($_GET["id"]))
{
    $id = $_GET["id"];

    $sql ="SELECT * FROM students WHERE student_id=$id";
    $result = $conn->query($sql);

    $sql1= "SELECT * FROM supervisor WHERE supervisor_id=$user_id";
    $result1 = $conn->query($sql1);

    //fetch and show results from students and supevisors
    if ($result->num_rows > 0 && $result1->num_rows > 0)
    {
        $row = $result->fetch_assoc();
        $row1 = $result1->fetch_assoc();
        $student_id = $row["student_id"];
        $assigned_school = $row["school_name"];
        $assigned_subjects = $row["subjects"];
        $supervisor_name = $row1["first_name"] . " " . $row1["last_name"];
    }
    else
    {
        echo "No results found.";
    }

    // insert into assigned table
    $sql2 = "INSERT INTO assigned (student_id, assigned_school, assigned_subjects, supervisor_name) VALUES ('$student_id', '$assigned_school', '$assigned_subjects', '$supervisor_name')";

    //execute query
    if ($conn->query($sql2) === TRUE)
    {
        echo "Record updated successfully";
    }
    else
    {
        echo "Error updating record: " . $conn->error;
    }

}


?>