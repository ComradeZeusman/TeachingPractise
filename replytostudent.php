<?php
//db credentials
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $reply = $_POST["reply"];
    $reply = mysqli_real_escape_string($conn, $reply); // Escape the reply

    $time = date("Y-m-d h:i:sa");

    $sql = "INSERT INTO messages (message_id, message) VALUES ('$id', '$reply')";

    if ($conn->query($sql) === TRUE) {
        echo "Reply sent successfully.";
    } else {
        echo "Error sending reply: " . $conn->error;
    }
}

// Close db connection
$conn->close();
?>