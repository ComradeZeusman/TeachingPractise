<?php
//db credientials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "teachingpractise";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $school_name = $_POST["school_name"];
    $school_subjects = $_POST["wanted_subjects"];
    $school_location = $_POST["school_address"];
    
    $sql = "INSERT INTO schools (school_name, wanted_subjects, school_location) VALUES ('$school_name', '$school_subjects', '$school_location')";

    if($conn->query($sql) === TRUE)
    {
        echo "School added successfully.";
    }
    else
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>