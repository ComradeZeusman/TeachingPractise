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

if (isset($_GET["id"])) {
    $id = $_GET["id"];
} else {
    echo "Error: Missing student ID.";
    exit();
}

if  ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $actual_score_introduction = $_POST["actual_score_introduction"];
    $actual_score_pacing = $_POST["actual_score_pacing"];
    $actual_score_teaching_materials = $_POST["actual_score_teaching_materials"];
    $actual_score_teaching_methods = $_POST["actual_score_teaching_methods"];
    $actual_score_questions = $_POST["actual_score_questions"];
    $actual_score_instruction = $_POST["actual_score_instruction"];
    $actual_score_chalkboard = $_POST["actual_score_chalkboard"];
    $actual_score_subject_mastery = $_POST["actual_score_subject_mastery"];
    $actual_score_conclusion = $_POST["actual_score_conclusion"];
    $actual_score_rapport = $_POST["actual_score_rapport"];

    $sql = "INSERT INTO lesson_presentation (student_id, actual_score_introduction, actual_score_pacing, actual_score_teaching_materials, actual_score_teaching_methods, actual_score_questions, actual_score_instruction, actual_score_chalkboard, actual_score_subject_mastery, actual_score_conclusion, actual_score_rapport)
    VALUES ('$id', '$actual_score_introduction', '$actual_score_pacing', '$actual_score_teaching_materials', '$actual_score_teaching_methods', '$actual_score_questions', '$actual_score_instruction', '$actual_score_chalkboard', '$actual_score_subject_mastery', '$actual_score_conclusion', '$actual_score_rapport')
    ";
    $result = $conn->query($sql);
    if (!$result) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }else{
        echo "Record added successfully.";
        header("Location: evaulationassessment.php?id=$id");
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
            background-color: #007BFF;
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
            background-color: #007BFF;
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
            border-color: #007BFF;
            box-shadow: 0 0 5px rgba(255, 165, 0, 0.5);
        }

        /* Hover effects */
        tr:hover {
            background-color: #ffecd9;
            transition: all 0.3s ease;
        }

        button {
            padding: 10px 20px;
            background-color: #007BFF;
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
                <th>2. Lesson Presentation</td>
                
            </tr>
            <tr>
                <td>Appropriateness of Introduction</td>
                <td>4</td>
                <td><input type="number" name="actual_score_introduction" max="4" required></td>
            </tr>
            <tr>
                <td>Logical Pacing and Sequential Presentation of the Lesson</td>
                <td>4</td>
                <td><input type="number" name="actual_score_pacing" max="4" required></td>
            </tr>
            <tr>
                <td>Appropriateness and Efficient Use of Teaching Materials</td>
                <td>4</td>
                <td><input type="number" name="actual_score_teaching_materials" max="4" required></td>
            </tr>
            <tr>
                <td>Effectiveness of Teaching Methods</td>
                <td>4</td>
                <td><input type="number" name="actual_score_teaching_methods" max="4" required></td>
            </tr>
            <tr>
                <td>Skill in Question and Appropriateness of Questions</td>
                <td>4</td>
                <td><input type="number" name="actual_score_questions" max="4" required></td>
            </tr>
            <tr>
                <td>Clarity of Instruction and Explanation</td>
                <td>4</td>
                <td><input type="number" name="actual_score_instruction" max="4" required></td>
            </tr>
            <tr>
                <td>Effective Use of Chalkboard</td>
                <td>4</td>
                <td><input type="number" name="actual_score_chalkboard" max="4" required></td>
            </tr>
            <tr>
                <td>Evidence of Subject Mastery</td>
                <td>4</td>
                <td><input type="number" name="actual_score_subject_mastery" max="4" required></td>
            </tr>
            <tr>
                <td>Appropriateness of Conclusion</td>
                <td>4</td>
                <td><input type="number" name="actual_score_conclusion" max="4" required></td>
            </tr>
            <tr>
                <td>Establishing Rapport</td>
                <td>3</td>
                <td><input type="number" name="actual_score_rapport" max="3" required></td>
            </tr>
            <!-- Add more Lesson Presentation items... -->
            <tr>
    </table>
      <!-- Next button -->
      <button type="submit" id="nextButton">Next</button>
    </form>
</div>
</body>
</html>