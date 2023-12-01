<?php

$Servername = "localhost";
$Username = "root";
$Password = "";
$Database = "teachingpractise";

// Create a database connection
$conn = new mysqli($Servername, $Username, $Password, $Database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if  ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $date = $_POST["date"];
    $reg_number = $_POST["reg_number"];
    $school_name = $_POST["sname"];
    $subject = $_POST["subject"];
    $time_from = $_POST["time_from"];
    $num_pupils = $_POST["num_pupils"];
    $class = $_POST["class"];
    $care_element = $_POST["care_element"];
    $topic = $_POST["topic"];
    $student_id = $_POST["student_id"];


    // // if (isset($_POST['subject'])) {
    // //     $subject = $_POST['subject'];
    // //     // Rest of your code
    // // } else {
    // //     echo "Subject not received from the form.";
    // //     exit();
    // // }
    
    // //check if student  has alreay be inserted
    $sql = "SELECT * FROM continuous1 WHERE student_id = '$student_id' AND date = '$date'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "Error: Student already has a record for this date.";
        exit();
    }else{
        $sql = "INSERT INTO continuous1 (student_id, date, reg_number, school_name, Subjects, time, number_of_pupils, class, care_element, topic)
        VALUES ('$student_id', '$date', '$reg_number', '$school_name', '$subject', '$time_from', '$num_pupils', '$class', '$care_element', '$topic')
        ";
        $result = $conn->query($sql);
        if (!$result) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }else{
            echo "Record added successfully.";
            header("Location: lessonpresent.php?id=$student_id");
        }
    }
     
}

?>