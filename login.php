<?php
session_start();

// db credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "teachingpractise";

// database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Check if the email exists in the students table
    $sql_student = "SELECT * FROM students WHERE school_email = '$email'";
    $result_student = $conn->query($sql_student);

    // Check if the email exists in the supervisors table
    $sql_supervisor = "SELECT * FROM supervisor WHERE school_email = '$email'";
    $result_supervisor = $conn->query($sql_supervisor);

    // Check if the email exists in the admin table
    $sql_admin = "SELECT * FROM admin WHERE email = '$email'";
    $result_admin = $conn->query($sql_admin);

    if ($result_student->num_rows == 1) {
        // Email exists in the students table, retrieve the hashed password
        $row = $result_student->fetch_assoc();
        $hashedPasswordFromDB = $row["password"];

        // Verify the entered password
        if (password_verify($password, $hashedPasswordFromDB)) {
            // Password is correct, store user ID in the session
            $_SESSION["user_id"] = $row["student_id"];

            // Redirect to the student dashboard
            header("Location: dashboard.php");
            exit();
        } else {
            // Password is incorrect, set an error message in the session
            $_SESSION['message'] = "Invalid password";
            header("Location: index.php");
            exit();
        }
    } elseif ($result_supervisor->num_rows == 1) {
        // Email exists in the supervisors table, retrieve the hashed password
        $row = $result_supervisor->fetch_assoc();
        $hashedPasswordFromDB = $row["password"];

        // Verify the entered password
        if (password_verify($password, $hashedPasswordFromDB)) {
            // Password is correct, store user ID in the session
            $_SESSION["user_id"] = $row["supervisor_id"];

            // Redirect to the supervisor dashboard
            header("Location: supervisordash.php");
            exit();
        } else {
            // Password is incorrect, set an error message in the session
            $_SESSION['message'] = "Invalid password";
            header("Location: index.php");
            exit();
        }
    } elseif ($result_admin->num_rows == 1) {
        // Email exists in the admin table
        $row = $result_admin->fetch_assoc();
        $plainTextPasswordFromDB = $row["password"]; // Assuming plain text password is stored
        
        // Verify the entered password (plain text)
        if ($password == $plainTextPasswordFromDB) {
            // Password is correct, store user ID in the session
            $_SESSION["user_id"] = $row["ID"];

            // Redirect to the admin dashboard
            header("Location: admin.php");
            exit();
        } else {
            // Password is incorrect, set an error message in the session
            $_SESSION['message'] = "Invalid password";
            header("Location: index.php");
            exit();
        }
    } else {
        // Email does not exist in any of the tables, set an error message in the session
        $_SESSION['message'] = "Email not found";
        header("Location: index.php");
        exit();
    }
}

// Close the database connection
$conn->close();
?>
