<?php
include "aunthenicate.php";


$Servername = "localhost";
$Username = "root";
$Password = "";
$Database = "teachingpractise";

// Create connection
$conn = new mysqli($Servername, $Username, $Password, $Database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//get id from url
$id = $_GET['id'];

$sql1 = "SELECT * FROM applied_for WHERE student_id = $user_id";
$result = $conn->query($sql1);

if(!$result){
    echo "Error: " . $sql1 . "<br>" . $conn->error;
}

//check if user has already applied for 3 schools
if($result->num_rows > 1){
    echo "You have already applied for 2 schools";
    exit();
}else{
    //check if user has already applied for this school
    $sql3 = "SELECT * FROM applied_for WHERE student_id = $user_id AND school_id = $id";
    $result3 = $conn->query($sql3);

    if(!$result3){
        echo "Error: " . $sql3 . "<br>" . $conn->error;
    }

    if($result3->num_rows > 0){
        echo "You have already applied for this school";
        exit();
    }else{
        $sql2 = "INSERT INTO applied_for (student_id, school_id) VALUES ($user_id, $id)";
    $result2 = $conn->query($sql2);

    if(!$result2){
        echo "Error: " . $sql2 . "<br>" . $conn->error;
    }else{
        echo "You have successfully applied for this school";
    }
    }
    
}

//check to if 

?>