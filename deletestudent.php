<?php
// delete supervisor based on id in $_GET
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $conn = new mysqli("localhost", "root", "", "teachingpractise");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "DELETE FROM students WHERE student_id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Student deleted successfully.";
    } else {
        echo "Error deleting supervisor: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Error: Missing supervisor ID.";
}
?>