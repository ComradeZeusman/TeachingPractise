<?php
include "aunthenicate.php"; 

// Check if the user is an admin
if ($result_admin->num_rows != 1) {
    echo "You are not authorized to view this page. Please log in as an admin.";
    exit();
}

// Create a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "teachingpractise";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch and show results from student_complaint
$sql = "SELECT * FROM student_complaint WHERE admin_id = $user_id";
$result = $conn->query($sql);

if ($result === false) {
    echo "Error executing the query: " . $conn->error;
} else {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // ...
            $student_id = $row["student_id"];
            $complaint = $row["complaint"];
            $time = $row["time"];
            
            // Check for duplicate complaints in admin_complaint table
            $check_duplicate_sql = "SELECT * FROM admin_complaint WHERE student_id = '$student_id' AND complaint = '" . $conn->real_escape_string($complaint) . "'";
            $check_duplicate_result = $conn->query($check_duplicate_sql);

            if ($check_duplicate_result === false) {
                echo "Error checking for duplicate complaints: " . $conn->error;
            } else {
                if ($check_duplicate_result->num_rows == 0) {
                    // No duplicate complaint found, insert the new complaint
                    $insert = "INSERT INTO admin_complaint (student_id, admin_id, complaint, time) VALUES ('$student_id', '$user_id', '" . $conn->real_escape_string($complaint) . "', '$time')";
                    $result_insert = $conn->query($insert);

                    if ($result_insert === true) {
                        echo "Here are your records";
                    } else {
                        echo "Error storing complaints: " . $conn->error;
                    }
                } else {
                    // Duplicate complaint found, handle it as per your requirements
                    echo "Enjoy your day";
                }
            }
            // ...
        }
    } else {
        echo "No complaints found";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View all complaints</title>
    <link rel="stylesheet" href="./css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            background-color: #333;
            color: white;
            padding: 10px;
        }

        h3 {
            text-align: center;
        }

        table {
            margin: 0 auto;
            border-collapse: collapse;
            width: 80%;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
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
<h1>View all complaints</h1>
<h3>Admin: <?php echo $admin_name; ?></h3>
<table>
    <tr>
        <th>Student ID</th>
        <th>Fist name</th>
        <th>Last name</th>
        <th>Reg_number</th>
        <th>Complaint</th>
        <th>Your reply</th>
        <th>Reply</th>
    </tr>
    <?php
    // Fetch and show results from admin_complaint
    $sql = "SELECT * FROM admin_complaint WHERE admin_id = $user_id";
    $result = $conn->query($sql);

   

    // fetch the student details and complain details
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $student_id = $row["student_id"];
            $complaint = $row["complaint"];
            $id=$row["ID"];

            $sql2 = "SELECT * FROM students WHERE student_id = $student_id";
            $result2 = $conn->query($sql2);

            $sql3 ="SELECT * FROM messages WHERE message_id= $id";
            $result3 = $conn->query($sql3);

            if($result3->num_rows > 0){
                $row3 = $result3->fetch_assoc();
                $reply = $row3["message"];
            }else{
                $reply = "No reply yet";
            }

            if ($result2->num_rows > 0) {
                while ($row2 = $result2->fetch_assoc()) {
                    $first_name = $row2["first_name"];
                    $last_name = $row2["last_name"];
                    $reg_number = $row2["reg_number"];
                }
            }

            echo "<tr>";
            echo "<td>" . $student_id . "</td>";
            echo "<td>" . $first_name . "</td>";
            echo "<td>" . $last_name . "</td>";
            echo "<td>" . $reg_number . "</td>";
            echo "<td>" . $complaint . "</td>";
            echo "<td>" . $reply . "</td>";
            echo "<td><a href='replystudent.php?id=" . $id . "'>Reply</a></td>";
            echo "</tr>";
        }
    }
    else {
        echo "<tr><td colspan='7'>No complaints found</td></tr>";
    }
    $conn->close();
    ?>

</table>
</body>
</html>

