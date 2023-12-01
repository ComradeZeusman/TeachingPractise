<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approved Students</title>
    <style>
        body, table, th, td {
            margin: 0;
            padding: 0;
        }

        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            margin-top: 20px;
            border: 1px solid #ccc;
        }

        th {
            background-color: #007BFF;
            color: #fff;
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }

        .no-results {
            text-align: center;
            margin-top: 20px;
            font-weight: bold;
        }

        .container {
            padding: 20px;
        }
    </style>
</head>
<body>
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

    // Database credentials
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "teachingpractise";

    // Create a database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Select all students from the database with approved status
    $sql = "SELECT * FROM students WHERE approved = 'Yes'";
    $result = $conn->query($sql);

    // Display all approved students and school name
    if ($result->num_rows > 0) {
        echo "<div class='container'>";
        echo "<h1>Approved Students</h1>";
        echo "<table border='1'><tr><th>Student ID</th><th>First Name</th><th>Last Name</th><th>Reg Number</th><th>Program</th><th>Year</th><th>Semester</th><th>Approved</th><th>School Name</th></tr>";
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["student_id"] . "</td><td>" . $row["first_name"] . "</td><td>" . $row["last_name"] . "</td><td>" . $row["reg_number"] . "</td><td>" . $row["program"] . "</td><td>" . $row["year"] . "</td><td>" . $row["semester"] . "</td><td>" . $row["approved"] . "</td><td>" . $row["school_name"] . "</td></tr>";
        }
        echo "</table>";
        echo "</div>";
    } else {
        echo "<div class='container'>";
        echo "<p class='no-results'>0 results</p>";
        echo "</div>";
    }

    // Close the database connection
    $conn->close();
    ?>
</body>
</html>