<?php
include "aunthenicate.php";

$Servername= "localhost";
$Username= "root";
$Password= "";
$Database= "teachingpractise";

$conn = mysqli_connect($Servername, $Username, $Password, $Database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql1 = "SELECT * FROM classcontrol2 WHERE student_id='$user_id'";
$result1 = mysqli_query($conn, $sql1);

if(!$result1){
    echo "Error: " . $sql1 . "<br>" . mysqli_error($conn);

}else{
    if (mysqli_num_rows($result1) > 0) {
    $row1 = mysqli_fetch_assoc($result1);
     $actual_score_introduction1 = $row1['actual_score_introduction'];
     $actual_score_pacing1 = $row1['actual_score_pacing'];
     $actual_score_teaching_materials1 = $row1['actual_score_teaching_materials'];
     $actual_score_teaching_methods1	 = $row1['actual_score_teaching_methods'];
    }else{
        $actual_score_introduction1 = 'Not graded yet';
        $actual_score_pacing1 = 'Not graded yet';
        $actual_score_teaching_materials1 = 'Not graded yet';
        $actual_score_teaching_methods1	 = 'Not graded yet';
    
    }
}

$sql2 = "SELECT * FROM lesson_presentation2 WHERE student_id='$user_id'";
$result2 = mysqli_query($conn, $sql2);

if(!$result2){
    echo "Error: " . $sql2 . "<br>" . mysqli_error($conn);

}else{
    if (mysqli_num_rows($result2) > 0) {
    $row2 = mysqli_fetch_assoc($result2);
    $actual_score_introduction2 = $row2['actual_score_introduction'];
    $actual_score_pacing2 = $row2['actual_score_pacing'];
    $actual_score_teaching_materials2 = $row2['actual_score_teaching_materials'];
    $actual_score_teaching_methods2	= $row2['actual_score_teaching_methods'];
    $actual_score_questions2 = $row2['actual_score_questions'];
    $actual_score_instruction2 = $row2['actual_score_instruction'];
    $actual_score_chalkboard2 = $row2['actual_score_chalkboard'];
    $actual_score_subject_mastery2 = $row2['actual_score_subject_mastery'];
    $actual_score_conclusion2 = $row2['actual_score_conclusion'];
    $actual_score_rapport2 = $row2['actual_score_rapport'];
    }else{
        $actual_score_introduction2 = 'Not graded yet';
        $actual_score_pacing2 = 'Not graded yet';
        $actual_score_teaching_materials2 = 'Not graded yet';
        $actual_score_teaching_methods2	 = 'Not graded yet';
        $actual_score_questions2 = 'Not graded yet';
        $actual_score_instruction2 = 'Not graded yet';
        $actual_score_chalkboard2 = 'Not graded yet';
        $actual_score_subject_mastery2 = 'Not graded yet';
        $actual_score_conclusion2 = 'Not graded yet';
        $actual_score_rapport2 = 'Not graded yet';
    
    }
}

$sql3 = "SELECT * FROM evaluation_assessment2 WHERE student_id='$user_id'";
$result3 = mysqli_query($conn, $sql3);

if(!$result3){
    echo "Error: " . $sql3 . "<br>" . mysqli_error($conn);

}else{
    if (mysqli_num_rows($result3) > 0) {
    $row3 = mysqli_fetch_assoc($result3);
    $actual_score_introduction3 = $row3['actual_score_introduction'];
    $actual_score_pacing3 = $row3['actual_score_pacing'];
    $actual_score_teaching_materials3 = $row3['actual_score_teaching_materials'];
    $actual_score_teaching_methods3 = $row3['actual_score_teaching_methods'];
    $actual_score_questions3 = $row3['actual_score_questions'];
    }else{
        $actual_score_introduction3 = 'Not graded yet';
        $actual_score_pacing3 = 'Not graded yet';
        $actual_score_teaching_materials3 = 'Not graded yet';
        $actual_score_teaching_methods3	 = 'Not graded yet';
        $actual_score_questions3 = 'Not graded yet';
    
    }
}
$sql4 = "SELECT * FROM personalandprofessional2 WHERE student_id='$user_id'";
$result4 = mysqli_query($conn, $sql4);

if(!$result4){
    echo "Error: " . $sql4 . "<br>" . mysqli_error($conn);

}else{
    if (mysqli_num_rows($result4) > 0) {
    $row4 = mysqli_fetch_assoc($result4);
    $actual_score_introduction4 = $row4['actual_score_introduction'];
    $actual_score_pacing4 = $row4['actual_score_pacing'];
    $actual_score_teaching_materials4 = $row4['actual_score_teaching_materials'];
    }else{
        $actual_score_introduction4 = 'Not graded yet';
        $actual_score_pacing4 = 'Not graded yet';
        $actual_score_teaching_materials4 = 'Not graded yet';
    }
}

$sql5 = "SELECT * FROM recordkeeping2 WHERE student_id='$user_id'";
$result5 = mysqli_query($conn, $sql5);

if(!$result5){
    echo "Error: " . $sql5 . "<br>" . mysqli_error($conn);

}else{
    if (mysqli_num_rows($result5) > 0) {
    $row5 = mysqli_fetch_assoc($result5);
    $actual_score_success_criteria5 = $row5['actual_score_success_criteria'];
    $actual_score_sequence5 = $row5['actual_score_sequence'];
    $actual_score_content5 = $row5['actual_score_content'];
    $actual_score_intro_conclusion5 = $row5['actual_score_intro_conclusion'];
    $actual_score_teaching_material5 = $row5['actual_score_teaching_material'];
    $actual_score_strategies5 = $row5['actual_score_strategies'];
    }else{
        $actual_score_success_criteria5 = 'Not graded yet';
        $actual_score_sequence5 = 'Not graded yet';
        $actual_score_content5 = 'Not graded yet';
        $actual_score_intro_conclusion5 = 'Not graded yet';
        $actual_score_teaching_material5 = 'Not graded yet';
        $actual_score_strategies5 = 'Not graded yet';
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supervisor Dashboard</title>
    <style>
        /* CSS for navigation bar */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
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
</head>

<body>
  
    <div class="container">
        <h1>CONTINOUS 2 GRADES</h1>
        <div class="item form">
                <table>
                    <tr>
                        <th>Evaluation Item</th>
                        <th>Maximum Score</th>
                        <th>Actual Score</th>
                    </tr>
                    <!-- Lesson Preparation -->
                   
                    <!-- Add more evaluation items as needed -->
       

          
                <th> Lesson Presentation</td>
                
            </tr>
            <tr>
                <td>Appropriateness of Introduction</td>
                <td>4</td>
                <td><input type="text" name="actual_score_introduction" value="<?php echo $actual_score_instruction2 ?>" readonly required></td>
            </tr>
            <tr>
                <td>Logical Pacing and Sequential Presentation of the Lesson</td>
                <td>4</td>
                <td><input type="text" name="actual_score_pacing" value="<?php echo $actual_score_pacing2  ?>" readonly required></td>
            </tr>
            <tr>
                <td>Appropriateness and Efficient Use of Teaching Materials</td>
                <td>4</td>
                <td><input type="text" name="actual_score_teaching_materials" value="<?php echo $actual_score_teaching_materials2  ?>" readonly required></td>
            </tr>
            <tr>
                <td>Effectiveness of Teaching Methods</td>
                <td>4</td>
                <td><input type="text" name="actual_score_teaching_methods" value="<?php echo $actual_score_teaching_methods2 ?>" readonlyrequired></td>
            </tr>
            <tr>
                <td>Skill in Question and Appropriateness of Questions</td>
                <td>4</td>
                <td><input type="text" name="actual_score_questions" value="<?php echo $actual_score_questions2 ?>" readonly required></td>
            </tr>
            <tr>
                <td>Clarity of Instruction and Explanation</td>
                <td>4</td>
                <td><input type="text" name="actual_score_instruction" value="<?php echo $actual_score_instruction2 ?>" readonly required></td>
            </tr>
            <tr>
                <td>Effective Use of Chalkboard</td>
                <td>4</td>
                <td><input type="text" name="actual_score_chalkboard" value="<?php echo $actual_score_chalkboard2 ?>" readonly required></td>
            </tr>
            <tr>
                <td>Evidence of Subject Mastery</td>
                <td>4</td>
                <td><input type="text" name="actual_score_subject_mastery" value="<?php echo $actual_score_subject_mastery2  ?>" readonly required></td>
            </tr>
            <tr>
                <td>Appropriateness of Conclusion</td>
                <td>4</td>
                <td><input type="text" name="actual_score_conclusion" value="<?php echo $actual_score_conclusion2 ?>" readonly required></td>
            </tr>
            <tr>
                <td>Establishing Rapport</td>
                <td>3</td>
                <td><input type="text" name="actual_score_rapport" value="<?php echo $actual_score_rapport2 ?>" readonly required></td>
            </tr>
            <!-- Add more Lesson Presentation items... -->
            <tr>
            <h3>Evaluation Items</h3>
    
           
            <tr>
                <th>3. Evaluationl/ Assessment(12 marks)</td>
                
            </tr>
            <tr>
                <td>Achievement of learning outcomes</td>
                <td>3</td>
                <td><input type="text" name="actual_score_introduction"value="<?php echo $actual_score_introduction3  ?>" readonly required></td>
            </tr>
            <tr>
                <td>Assignment and evaluation of given tasks</td>
                <td>3</td>
                <td><input type="text" name="actual_score_pacing" value="<?php echo $actual_score_pacing3 ?>" readonly required></td>
            </tr>
            <tr>
                <td>Appropriateness and Efficient Use of Teaching Materials</td>
                <td>3</td>
                <td><input type="text" name="actual_score_teaching_materials" value="<?php echo $actual_score_teaching_materials3 ?>" readonly required></td>
            </tr>
            <tr>
                <td>Ability to use appropriate evaluation techniques</td>
                <td>3</td>
                <td><input type="text" name="actual_score_teaching_methods" value="<?php echo $actual_score_teaching_methods3 ?>" readonly required></td>
            </tr>
            <tr>
                <td>Efficient use of feedback</td>
                <td>3</td>
                <td><input type="text" name="actual_score_questions" value="<?php echo $actual_score_questions3 ?>" readonly required></td>
            </tr>
            <!-- Add more Lesson Presentation items... -->
            <tr>
         
            <tr>
                <th>4. Class control and management(16 marks)</td>
                
            </tr>
            <tr>
                <td>Voice variation and use of language</td>
                <td>5</td>
                <td><input type="text" name="actual_score_introduction" readonly value="<?php echo $actual_score_introduction1 ?>"required></td>
            </tr>
            <tr>
                <td>Class control and sensitivity to learners needs</td>
                <td>5</td>
                <td><input type="text" name="actual_score_pacing" value="<?php echo $actual_score_pacing1  ?>" readonly required></td>
            </tr>
            <tr>
                <td>Appropriateness and Efficient Use of Teaching Materials</td>
                <td>3</td>
                <td><input type="text" name="actual_score_teaching_materials" value="<?php echo $actual_score_teaching_materials1 ?>" readonly required></td>
            </tr>
            <tr>
                <td>Conductive classroom envirronment</td>
                <td>3</td>
                <td><input type="text" name="actual_score_teaching_methods" value="<?php echo $actual_score_teaching_methods1 ?>" readonly required></td>
            </tr><!-- Add more Lesson Presentation items... -->
            <tr>
                <th>5. Personal and professional attributes (6 marks)</td>
                
            </tr>
            <tr>
                <td>Appropriateness of dress</td>
                <td>2</td>
                <td><input type="text" name="actual_score_introduction"value="<?php echo $actual_score_introduction4 ?>" readonly required></td>
            </tr>
            <tr>
                <td>Poise department and confidence</td>
                <td>3</td>
                <td><input type="text" name="actual_score_pacing" value="<?php echo $actual_score_pacing4 ?>" readonly required></td>
            </tr>
            <tr>
                <td>Punctuality</td>
                <td>1</td>
                <td><input type="text" name="actual_score_teaching_materials" value="<?php echo $actual_score_teaching_materials4  ?>" readonly required></td>
            </tr>
            <tr>
                <th>6. Record Keeping</td>
                
            </tr>
            <tr>
                <td>Upkeep of TP files</td>
                <td>2</td>
                <td><input type="text" name="actual_score_success_criteria" value="<?php echo $actual_score_success_criteria5  ?>" readonlyrequired></td>
            </tr>
            <tr>
                <td> Availability and maintanance of schemes and records of work</td>
                <td>2</td>
                <td><input type="text" name="actual_score_sequence" value="<?php echo $actual_score_sequence5  ?>" readonly required></td>
            </tr>
            <tr>
                <td>Availability of lesson plan</td>
                <td>2</td>
                <td><input type="text" name="actual_score_content" value="<?php echo $actual_score_content5 ?>" readonly required></td>
            </tr>
            <tr>
                <td>Attendance register</td>
                <td>2</td>
                <td><input type="text" name="actual_score_intro_conclusion" value="<?php echo $actual_score_intro_conclusion5 ?>" readonly required></td>
            </tr>
            <tr>
                <td>learners progress report</td>
                <td>2</td>
                <td><input type="text" name="actual_score_teaching_material" value="<?php echo $actual_score_teaching_material5 ?>" readonly required></td>
            </tr>
            <tr>
                <td>Records of extracarricular activities</td>
                <td>2</td>
                <td><input type="text" name="actual_score_strategies" value="<?php echo $actual_score_strategies5  ?>" readonly required></td>
            </tr>
          
    </table>
        </div>
    </div>
    <a href="dashboard.php">Back to dashboard</a>
</body>

</html>