<?php

$Servername = "localhost";
$Username = "root";
$Password = "";
$Database = "teachingpractise";

// Create a database connection 
$conn = new mysqli($Servername, $Username, $Password, $Database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_GET["id"])) {
    $id = $_GET["id"];
} else {
    echo "Error: Missing student ID.";
    exit();
}

$sql = "SELECT * FROM students WHERE student_id = '$id'"; 
$result = $conn->query($sql);


if (!$result) {
   //display the error message
    echo "Error: " . $sql . "<br>" . $conn->error;
}
else{
    $row = $result->fetch_assoc();
    $reg_number = $row['reg_number'];
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
}


$sql2 = "SELECT * FROM assigned WHERE student_id = '$id'";
$result2 = $conn->query($sql2);

if(!$result2){
    echo "Error: " . $sql2 . "<br>" . $conn->error;
}else{
    $row2 = $result2->fetch_assoc();
    $schoolid = $row2['assigned_school'];

    $sql3 = "SELECT * FROM schools WHERE school_id = '$schoolid'";
    $result3 = $conn->query($sql3);

    if(!$result3){
        echo "Error: " . $sql3 . "<br>" . $conn->error; 
    }
    $row3 = $result3->fetch_assoc();
    $school_name = $row3['school_name'];
    $subject = $row3['wanted_subjects'];
}
date_default_timezone_set('Africa/Blantyre');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .navbar {
            background-color:#007BFF;
            overflow: hidden;
        }

        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .navbar a:hover {
            background-color: FF9209;
        }

        .item {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 60px; /* Adjusted margin to avoid overlap with navbar */
        }

        h2 {
            margin-bottom: 20px;
            text-align: center;
        }

        form {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }

        label,
        input {
            display: block;
        }

        input {
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ccc;
            transition: border-color 0.3s ease-in-out;
        }

        input:focus {
            outline: none;
            border-color: #007BFF;
        }

        input:hover {
            border-color: #007BFF;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px 20px;            
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        input[type="submit"]:hover {
            background-color: #ff8c00;
        }
    </style>
</head>
<body>
    
<div class="item form">
    <h2>Continuous grade: <?php echo $first_name ?></h2>
    <form action="process_continous1.php" method="post">
        <label for="date">Date:</label>
        <input type="date" name="date" id="date" value="<?php echo date('Y-m-d'); ?>" required>

        <label for="reg_number">Registration Number:</label>
        <input type="text" name="reg_number" id="reg_number" value="<?php echo $reg_number ?>" readonly required>

       <!-- Update the textarea names in the HTML form -->
<label for="school_name">Name of School:</label>
<textarea name="sname" id="sname" cols="30" rows="1" readonly required><?php echo $school_name ?></textarea>

<label for="subject">Subject:</label>
<textarea name="subject" id="subject" cols="30" rows="3" readonly required><?php echo $subject ?></textarea>


        <label for="time_from">Time From:</label>
        <input type="time" name="time_from" id="time_from" value="<?php echo date('H:i'); ?>" required>

        <label for="num_pupils">Number of Pupils:</label>
        <input type="number" name="num_pupils" id="num_pupils" required>

        <label for="class">Class:</label>
        <input type="text" name="class" id="class" required>

        <label for="care_element">Care Element:</label>
        <input type="text" name="care_element" id="care_element" required>

        <label for="topic">Topic:</label>
        <input type="text" name="topic" id="topic" required>

      <input type="hidden" name="student_id" value="<?php echo $id ?>">

        <input type="submit" value="Submit">
    </form>
</div>

</body>
</html>
