
<?php
include "aunthenicate.php"; // Assuming this file contains the necessary authentication logic

// Check if the user is an admin (Replace this logic with your authentication method)
$is_admin = true; // Example: Assume user is admin for demonstration purposes

if (!$is_admin) {
    echo "You are not authorized to view this page. Please login as an admin.";
    exit();
}

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "teachingpractise";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming $user_id is defined somewhere before this point
$user_id = 1; // Replace this with the actual user ID

// Select data from the assigned table
$sql = "SELECT * FROM assigned WHERE supervisor_id = $user_id";
$result = $conn->query($sql);

if (!$result) {
    echo "Error: " . $sql . "<br>" . $conn->error;
} else {
    $row = $result->fetch_assoc();
    $student_id = $row["student_id"];
    $assigned_school = $row["assigned_school"];
    $assigned_subjects = $row["assigned_subjects"];
    $supervisor_name = $row["supervisor_name"];
}

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Processing form data
    $success_criteria = $_POST['comment_success_criteria'];
    $sequence = $_POST['comment_sequence'];
    // ... Retrieve other form field values

    // Sanitize the data before using in SQL query to prevent SQL injection
    $success_criteria = mysqli_real_escape_string($conn, $success_criteria);
    $sequence = mysqli_real_escape_string($conn, $sequence);
    // ... Sanitize other form field values

    // Inserting form data into the database
    $insert_query = "INSERT INTO evaluation_data (success_criteria, sequence, ...) VALUES ('$success_criteria', '$sequence', ...)";
    if ($conn->query($insert_query) === TRUE) {
        echo "Evaluation submitted successfully!";
    } else {
        echo "Error: " . $insert_query . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lesson Presentation Activities</title>
    <style>
        /* Styles as before */
    </style>
</head>
<body>
    <!-- Form for lesson presentation evaluation -->
    <h1>Lesson Presentation Evaluation</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <!-- Labels and textareas for evaluation criteria -->
        <label for="success_criteria">Success Criteria</label>
        <textarea name="comment_success_criteria" required></textarea>

        <label for="sequence">Sequence</label>
        <textarea name="comment_sequence" required></textarea>

        <!-- Add other evaluation criteria textareas -->

        <input type="submit" value="Submit Evaluation">
    </form>
</body>
</html>
