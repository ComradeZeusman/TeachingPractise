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
    $sql = "SELECT * FROM schools";
    $result = $conn->query($sql);

    // Display all approved students and school name
    if ($result->num_rows > 0) {
        echo "<div class='container'>";
        echo "<h1>ALL AVAILABLE SCHOOLS</h1>";
        echo "<table border='1'><tr><th>School Name</th><th>Subjects</th><th>Location</th><th>Apply for this School</tr>";
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["school_name"] . "</td><td>" . $row["wanted_subjects"] . "</td><td>" . $row["school_location"] . "<td><a href='applyfor.php?id=" . $row["school_id"] . "'>Apply</a></td>" ;
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
    <button><a href="dashboard.php">Back to Dashboard</a></button>
</body>
</html>