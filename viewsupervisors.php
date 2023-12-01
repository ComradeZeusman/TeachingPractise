<?php
include "aunthenicate.php";
//if not admin, echo error message
if ($result_admin->num_rows != 1) {
    echo "You are not authorized to view this page. Please login as an admin.";
    exit();
}
?>
<!-- view supervisors and delete supervisors-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Supervisors</title>
    <style>
body, h1, table, th, td, a, form {
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
    background-color: #d9534f;
    color: #fff;
    padding: 5px 10px;
    border-radius: 5px;
}

a:hover {
    background-color: #c9302c;
}

a.back-link {
    background-color: #007BFF;
}

a.back-link:hover {
    background-color: #0056b3;
}

.navbar {
            overflow: hidden;
            background-color: #333;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
        }

        .navbar a {
            color: #f2f2f2;
            text-decoration: none;
            padding: 10px;
        }

        #logout-form {
            margin: 0;
        }

        #logout-button {
            background-color: #d9534f;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        #logout-button:hover {
            background-color: #c9302c;
        }

    </style>
</head>
<body>
<div class="navbar">
        <div>
            <a href="admin.php">Home</a>
        </div>
       
        <div class="cl">
            <form id="logout-form" action="logout.php" method="post">
                <input id="logout-button" type="submit" value="Logout">
            </form>
        </div>
    </div>

    <table>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>School Email</th>
            <th>Phone Number</th>
            <th>Delete</th>
        </tr>
        <?php
        // Create a database connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
        // SQL query to select all supervisors
        $sql = "SELECT * FROM supervisor";
        $result = $conn->query($sql);
        // Check if the query returns any results
        if ($result->num_rows > 0) {
        // Loop through the results and output each supervisor
        while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["first_name"] . "</td>";
        echo "<td>" . $row["last_name"] . "</td>";
        echo "<td>" . $row["school_email"] . "</td>";
        echo "<td>" . $row["phone_number"] . "</td>";
        echo "<td><a href='deletesupervisor.php?id=" . $row["supervisor_id"] . "'>Delete</a></td>";
        echo "</tr>";
        }
        } else {
        echo "0 results";
        }
        // Close the database connection
        $conn->close();
        ?>
    </table>
    <a href="admin.php">Back to Admin Dashboard</a>
</body>
</html>