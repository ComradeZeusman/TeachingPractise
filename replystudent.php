<?php
include "aunthenicate.php";

// Check if admin_id is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

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

    // Fetch the chat messages for this specific student and admin
    $sql = "SELECT * FROM admin_complaint WHERE admin_id = $user_id AND ID = $id";
    $result = $conn->query($sql);
    //fetch the admin id
    $sql2 = "SELECT * FROM admin_complaint WHERE admin_id = $user_id AND ID = $id";
    $result2 = $conn->query($sql2);
    $row2 = $result2->fetch_assoc();
    $admin_id = $row2["admin_id"];
    $student_id = $row2["student_id"];

    // Fetch the student's name
    $sql3 = "SELECT * FROM students WHERE student_id = $student_id";
    $result3 = $conn->query($sql3);

    if ($result3->num_rows > 0) {
        $row3 = $result3->fetch_assoc();
        $student_fname = $row3["first_name"];
        $student_lname = $row3["last_name"];

    } else {
        $student_name = "No student found";
    }

    
    
    // Fetch the admin's name
    $sql3 = "SELECT * FROM admin WHERE ID = $admin_id";
    $result3 = $conn->query($sql3);

    if ($result3->num_rows > 0) {
        $row3 = $result3->fetch_assoc();
        $admin_name = $row3["name"];
    } else {
        $admin_name = "No admin found";
    }
    ?>

    <!-- Chat Interface -->
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Chat with <?php echo $admin_name; ?></title>
        <style>
    #chat-box {
        width: 80%;
        margin: 20px auto;
        background-color: #f5f5f5;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .message {
        background-color: #007BFF;
        color: #fff;
        border-radius: 5px;
        padding: 10px;
        margin: 10px 0;
        max-width: 80%;
    }

    .message-time {
        font-size: 12px;
    }

    .message-sender {
        font-weight: bold;
    }

    .message-text {
        margin-top: 5px;
    }

    .reply {
        background-color: #28a745;
    }

    #reply-textarea {
        width: 100%;
        padding: 10px;
        margin-top: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    #send-button {
        background-color: #007BFF;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        margin-top: 10px;
        cursor: pointer;
    }

    #send-button:hover {
        background-color: #0056b3;
    }
</style>
    </head>
    <body>
        <h1>Chat with <?php echo $student_fname; ?></h1>
        <div id="chat-messages">
            <?php
            while ($row = $result->fetch_assoc()) {
                $time = $row["time"];
                $complaint = $row["complaint"];
                $sql2 = "SELECT * FROM messages WHERE message_id = " . $row["ID"];
                $result2 = $conn->query($sql2);

                if ($result2->num_rows > 0) {
                    $row2 = $result2->fetch_assoc();
                    $reply = $row2["message"];
                } else {
                    $reply = "No reply found";
                }

                // Output the chat messages as chat bubbles
                echo "<div class='message'>
                        <div class='message-time'>$time</div>
                        <div class='message-sender'>$student_fname $student_lname</div>
                        <div class='message-text'>$complaint</div>
                      </div>";

                // Display the reply if available
                if ($reply !== "No reply found") {
                    echo "<div class='message reply'>
                            <div class='message-sender'>$admin_name</div>
                            <div class='message-text'>$reply</div>
                          </div>";
                }
            }
            ?>
        </div>
        <textarea id="reply-textarea" rows="3" placeholder="Type your reply..."></textarea>
        <button type="submit" id="send-button">Send</button>
        <script>
  // JavaScript code for handling user replies and sending them to the server
var sendButton = document.getElementById("send-button");
var replyTextarea = document.getElementById("reply-textarea");

// Collect the user_id, admin_id
var id = <?php echo $id; ?>;

// Send the user_id, admin_id, and reply to the server
sendButton.addEventListener("click", function () {
    var reply = replyTextarea.value;
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "replytostudent.php", true);
    
    // Set the request header to specify the data type
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    
    // Create a data string to send in the request
    var data = "id=" + id + "&reply=" + reply;
    
    xhttp.send(data);
    
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            // Reload the page to show the new message
            // Show alert
            alert(this.responseText);
            // Show the sent message
            location.reload();
        }
    };
});

</script>
    </body>
    </html>
    <?php
} else {
    echo "Admin ID not provided in the URL.";
}
?>
