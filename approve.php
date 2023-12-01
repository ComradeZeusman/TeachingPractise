<?php
include "aunthenicate.php";
if ($result_admin->num_rows != 1) {
    echo "You are not authorized to view this page. Please login as an admin.";
    exit();
}

if (isset($_GET["id"])) {
    $id = $_GET["id"];
} else {
    echo "Error: Missing student ID.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Approval Form</title>
    <style>
body, form {
    margin: 0;
    padding: 0;
}


body {
    background-color: #f2f2f2;
    font-family: Arial, sans-serif;
    color: #333;
}

form {
    background-color: #fff;
    max-width: 400px;
    margin: 20px auto;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}


label {
    display: block;
    margin-bottom: 10px;
    font-weight: bold;
}

input[type="text"],
input[type="number"],
#subjects,
#message{
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
}

/* Style the submit button */
input[type="submit"] {
    background-color: #007BFF;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

input[type="radio"] {
    margin-right: 5px;
    transform: scale(1.2); 
}


label[for="Approved"] {
    font-weight: normal;
    display: inline-block;
    margin-right: 10px;
}


input[type="submit"]:hover {
    background-color: #0056b3;
}
    
        </style>
</head>
<body>
    <form method="POST" action="approvalprocessing.php">
        <label for="Approved">Approved</label>
        <input type="radio" name="Approved" value="Yes" required>Yes<br>
        <input type="radio" name="Approved" value="No" required>No<br>
       <input type="number" name="id" id="id" value=<?php echo $id ?> readonly hidden  required><br>
        <label for="Name">School Name</label>
        <input type="text" name="Name" id="Name" placeholder="if not approved leave this field empty"><br>
        <label for="preferredSubjects">Preferred Subjects:</label>
       <textarea id="subjects" name="subjects" rows="4" required></textarea>
       <br>
       <label for="message">message:</label>
       <textarea id="message" name="message" rows="4" required></textarea>
        <input type="submit" value="Submit">
    </form>
</body>
</html>

