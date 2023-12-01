<?php
session_start();

// Check if the user is logged in (authenticated)
if (!isset($_SESSION["user_id"])) {
    // User is not authenticated, redirect them to the login page
    echo "You are not authenticated. Please login first.";
    exit();
}

// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "teachingpractise";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the user is authenticated and retrieve their information
$user_id = $_SESSION["user_id"];

// Query to get students assigned to the supervisor
$sql_assigned = "SELECT student_id FROM assigned WHERE supervisor_id = $user_id";
$result_assigned = $conn->query($sql_assigned);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Continuous 1</title>
    <style>
    body, h1, table {
    margin: 0;
    padding: 0;
}

body {
    background-color: #f2f2f2;
    font-family: Arial, sans-serif;
    color: #333;
}

h1 {
   background-color: #007BFF;
    color: #fff;
    padding: 20px;
    text-align: center;
}

table {
    width: 100%;
    border-collapse: collapse;
    background-color: #fff;
    margin-top: 20px;
}

th {
    background-color: #007BFF;
    color: #fff;
    padding: 10px;
    text-align: left;
}


tr:nth-child(even) {
    background-color: #f2f2f2;
}

td {
    padding: 10px;
}

a {
    text-decoration: none;
    background-color: #007BFF;
    color: #fff;
    padding: 5px 10px;
    border-radius: 5px;
}

a:hover {
    background-color: #1e7e34;
}
input[type="text"],
input[type="submit"] {
    padding: 10px;
    margin: 5px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

input[type="submit"] {
    background-color: #007BFF;
    color: #fff;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}


</style>
</head>
<body>
    <h1>CONTINUOUS 1</h1>
    <form method="post" action="supervisorstudents.php">
        <input type="text" name="search" placeholder="Search by name or program">
        <input type="submit" value="Search">
    </form>
    <table>
        <tr>
            <th>Student ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Program</th>
            <th>Progress</th>
            <th>Grade student</th>
        </tr>
        <?php
        // Loop through the assigned students
        while ($row_assigned = $result_assigned->fetch_assoc()) {
            $student_id = $row_assigned['student_id'];
            
            // Fetch student details for each assigned student
            $sql_student = "SELECT * FROM students WHERE student_id = $student_id";
            $result_student = $conn->query($sql_student);
            $row_student = $result_student->fetch_assoc();
            
            // Check for data across multiple tables for the student
            $tables = array(
                "continuous1" => "formcontinous1.php",
                "evaluation_assessment" => "evaulationassessment.php",
                "lesson_presentation" => "lessonpresent.php",
                "personalandprofessional" => "personalandprofessional.php",
                "classcontrol" => "classcontrolmanagement.php",
                "recordkeeping" => "recordkeeping.php"
            );

            $completedForms = array();

            foreach ($tables as $table => $form) {
                $checkQuery = "SELECT * FROM $table WHERE student_id = $student_id";
                $result_check = $conn->query($checkQuery);

                if ($result_check->num_rows > 0) {
                    $completedForms[] = $form;
                }
            }

            // Display student information in the table
            echo "<tr>";
            echo "<td>" . $row_student['student_id'] . "</td>";
            echo "<td>" . $row_student['first_name'] . "</td>";
            echo "<td>" . $row_student['last_name'] . "</td>";
            echo "<td>" . $row_student['program'] . "</td>";
            
            if (count($completedForms) == count($tables)) {
                echo "<td>100% Completed</td>";
                echo "<td>GRADED</td>";
            } else {
                $incompleteForms = array_diff_assoc($tables, array_intersect($tables, $completedForms));
                $nextForm = reset($incompleteForms);
                echo "<td>Student not completely marked (" . count($completedForms) . " out of " . count($tables) . " forms completed)</td>";
                echo "<td><a href='$nextForm?id=" . $row_student['student_id'] . "'>Grade student</a></td>";
            }
            echo "</tr>";
        }
        ?>
    </table>
    <br>
    <a href="supervisordash.php" class="back-link">Back to Home</a>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
