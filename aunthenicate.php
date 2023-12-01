<?php
session_start();

// Check if the user is logged in (authenticated)
if (!isset($_SESSION["user_id"])) {
    // User is not authenticated, redirect them to the login page
    echo "You are not authenticated. Please login first.";
    exit();
}

// If the user is authenticated, you can retrieve their information
$user_id = $_SESSION["user_id"];

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

// Check if the user is a student
$sql_student = "SELECT * FROM students WHERE student_id = $user_id";
$result_student = $conn->query($sql_student);

// Check if the user is a supervisor
$sql_supervisor = "SELECT * FROM supervisor WHERE supervisor_id = $user_id";
$result_supervisor = $conn->query($sql_supervisor);

// Check if the user is an admin
$sql_admin = "SELECT * FROM admin WHERE ID = $user_id";
$result_admin = $conn->query($sql_admin);

if ($result_student->num_rows == 1) {
    // User is a student, retrieve their information
    $row = $result_student->fetch_assoc();
    $first_name = $row["first_name"];
    $last_name = $row["last_name"];
    $reg_number = $row["reg_number"];
    $program = $row["program"];
    $year = $row["year"];
    $semester = $row["semester"];
} elseif ($result_supervisor->num_rows == 1) {
    // User is a supervisor, retrieve their information
    $row = $result_supervisor->fetch_assoc();
    $first_name = $row["first_name"];
    $last_name = $row["last_name"];
    $school_email = $row["school_email"];
    $phone_number = $row["phone_number"];
    // Add any other supervisor-specific fields here
} elseif ($result_admin->num_rows == 1) {
    // User is an admin, retrieve their information
    $row = $result_admin->fetch_assoc();
    $admin_name = $row["name"];
    $admin_email = $row["email"];
} else {
    // User not found, handle the error
    echo "User not found in the database.";
}

// Close the database connection
$conn->close();
?>
