<?php
// delete supervisor based on id in $_GET
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Create connection to database
    $conn = new mysqli("localhost", "root", "", "teachingpractise");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "DELETE FROM supervisor WHERE supervisor_id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Supervisor deleted successfully.";
    } else {
        echo "Error deleting supervisor: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Error: Missing supervisor ID.";
}
?>