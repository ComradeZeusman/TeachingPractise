<?php
include "aunthenicate.php";

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
//get id from url
if (isset($_GET["id"])) {
    $id = $_GET["id"];
} else {
    echo "Error: Missing student ID.";
    exit(); 
}
 if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $actual_score_introduction = $_POST["actual_score_introduction"];
    $actual_score_pacing = $_POST["actual_score_pacing"];
    $actual_score_teaching_materials = $_POST["actual_score_teaching_materials"];
    $actual_score_teaching_methods = $_POST["actual_score_teaching_methods"];
    
    $sql = "INSERT INTO classcontrol2 (student_id, actual_score_introduction, actual_score_pacing, actual_score_teaching_materials, actual_score_teaching_methods)
    VALUES ('$id', '$actual_score_introduction', '$actual_score_pacing', '$actual_score_teaching_materials', '$actual_score_teaching_methods')
    ";
    $result = $conn->query($sql);
    if (!$result) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }else{
        echo "Record added successfully.";
        header("Location: personalandprofessional2.php?id=$id");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* CSS for navigation bar */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: orange;
            /* Background color */
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
            /* Smooth transition */
        }

        .navbar a:hover {
            background-color: #FF9209;
            /* Darker color on hover */
        }

        /* Container styles */
        .container {
            padding: 20px;
        }

        /* Welcome message styles */
        .welcome {
            background-color: #f2f2f2;
            /* Light gray background */
            padding: 20px;
            margin-bottom: 20px;
        }

        .welcome p {
            margin: 0;
            font-size: 18px;
        }

        /* Add Students link styles */
        .students a {
            background-color: #4CAF50;
            /* Green */
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }

        .students a:hover {
            background-color: #45a049;
            /* Darker green on hover */
        }
        /* CSS Styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f3f3f3;
        }

        .container {
            width: 90%;
            margin: 20px auto;
        }

        .item {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }

        /* Orange color scheme */
        th,
        td {
            color: #333;
        }

        th {
            background-color: orange;
            color: white;
            padding: 12px;
            border-radius: 10px 10px 0 0;
        }

        td {
            padding: 12px;
        }

        input[type="number"] {
            width: 50px;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
            transition: all 0.3s ease;
        }

        input[type="number"]:focus {
            outline: none;
            border-color: orange;
            box-shadow: 0 0 5px rgba(255, 165, 0, 0.5);
        }

        /* Hover effects */
        tr:hover {
            background-color: #ffecd9;
            transition: all 0.3s ease;
        }

        button {
            padding: 10px 20px;
            background-color: orange;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #ff8c00;
        }
    </style>
    <title>Document</title>
</head>
<body>
<div class="container">
<div class="item form">
    <form action="" method="post">
        <!-- Existing form fields... -->

        <!-- Table for Evaluation Items -->
        <h3>Evaluation Items</h3>
        <table>
            <tr>
                <th>Evaluation Item</th>
                <th>Maximum Score</th>
                <th>Actual Score</th>
            </tr>
            <!-- Lesson Preparation -->
            <tr>
                <th>4. Class control and management(13 marks)</td>
                
            </tr>
            <tr>
                <td>Voice variation and use of language</td>
                <td>5</td>
                <td><input type="number" name="actual_score_introduction" max="5" required></td>
            </tr>
            <tr>
                <td>Class control and sensitivity to learners needs</td>
                <td>5</td>
                <td><input type="number" name="actual_score_pacing" max="5" required></td>
            </tr>
            <tr>
                <td>Appropriateness and Efficient Use of Teaching Materials</td>
                <td>3</td>
                <td><input type="number" name="actual_score_teaching_materials" max="3" required></td>
            </tr>
            <tr>
                <td>Conductive classroom envirronment</td>
                <td>3</td>
                <td><input type="number" name="actual_score_teaching_methods" max="3" required></td>
            </tr><!-- Add more Lesson Presentation items... -->
            </table>
      <!-- Next button -->
      <button type="submit" id="nextButton">Next</button>
    </form>
</div>

</div>
</body>
</html>