<?php
include "aunthenicate.php";

// Create a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "teachingpractise";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to retrieve admin_id and time for conversations with the user
$sql = "SELECT admin_id, MAX(time) AS last_time FROM admin_complaint WHERE student_id = $user_id GROUP BY admin_id";
$result = $conn->query($sql);
?>

<!-- Chat Interface -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chat</title>
    <style>
        #chat-box {
            width: 80%;
            margin: 20px auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
<div id="chat-box">
    <table>
        <tr>
            <th>Time</th>
            <th>Admin</th>
        </tr>
        <?php
        while ($row = $result->fetch_assoc()) {
            $admin_id = $row["admin_id"];
            $last_time = $row["last_time"];
            $sql3 = "SELECT * FROM admin WHERE ID = $admin_id";
            $result3 = $conn->query($sql3);

            if ($result3->num_rows > 0) {
                $row3 = $result3->fetch_assoc();
                $admin_name = $row3["name"];
                // Create a link that redirects to the chat box for this admin
                $chat_url = "chat_box.php?admin_id=$admin_id";
                ?>
                <tr>
                    <td><?php echo $last_time; ?></td>
                    <td><a href="<?php echo $chat_url; ?>"><?php echo $admin_name; ?></a></td>
                </tr>
            <?php
            }
        }
        ?>
    </table>
</div>
<button><a href="dashboard.php">Back to Dashboard</a></button>
</body>
</html>
