<?php
include "aunthenicate.php";

//create a database connection
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

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $ID = $_POST["id"];
    $complaint = $_POST["complaint"];
//generate time of complaint
    $time = date("Y-m-d h:i:sa");
    $sql = "INSERT INTO student_complaint (student_id, admin_id, complaint,time) VALUES ('$user_id','$ID', '$complaint','$time')";
    $result = $conn->query($sql);

    if ($conn->query($sql) === TRUE)
    {
        echo "Complaint sent successfully";
        exit();
    }
    else
    {
        echo "Error sending complaint: " . $conn->error;
    }


}
?>