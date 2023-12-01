<?php
//collect the reply from the reply textarea nd insert into students_complaint table

// Create a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "teachingpractise";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the necessary data is provided (e.g., user_id, admin_id, and reply)
    if (isset($_POST["user_id"]) && isset($_POST["admin_id"]) && isset($_POST["reply"])) {
        $user_id = $_POST["user_id"];
        $admin_id = $_POST["admin_id"];
        // Use mysqli_real_escape_string to properly escape the reply
        $reply = mysqli_real_escape_string($conn, $_POST["reply"]);

        // Define the SQL statement to insert the reply
        $sql = "INSERT INTO student_complaint (student_id, admin_id, complaint, time) VALUES ('$user_id', '$admin_id', '$reply', NOW())";

        // Execute the SQL query
        if ($conn->query($sql) === TRUE) {
            // Data was successfully inserted, you can provide a success message or redirect as needed
            echo "Reply added successfully!";
        } else {
            // Error occurred during the insert
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Incomplete data provided for the reply.";
    }
}



?>