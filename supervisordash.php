<?php
include "aunthenicate.php";
//if not supervisor, echo error message
if ($result_supervisor->num_rows != 1) {
    echo "You are not authorized to view this page. Please login as a supervisor.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supervisor Dashboard</title>
    <style>
        /* CSS for container and elements */
        body {
            background-image: url('./imgs/25.jpeg');
            background-size: cover;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f2f2f2; /* Light gray background */
        }

        .container {
            text-align: center;
            padding: 50px;
        }

        /* Welcome message styles */
        .welcome {
            background-color: #fff; /* White background */
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); /* Box shadow for card effect */
        }

        .welcome p {
            margin: 0;
            font-size: 18px;
        }

        /* Add Students link styles */
        .add-students {
            margin-top: 20px;
        }

        .add-students a {
            background-color: #007BFF; /* Blue */
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s; /* Smooth transition */
        }

        .add-students a:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }

        /* Logout button styles */
        #logout-button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007BFF; /* Blue */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s; /* Smooth transition */
        }

        #logout-button:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Welcome message -->
        <div class="welcome">
            <p>Welcome <?php echo $first_name . " " . $last_name; ?></p>
        </div>

        <!-- Add students link -->
        <div class="add-students">
        <a href="supervisorstudents.php">continuous 1</a>
        <a href="supervisorstudents2.php">Continuous 2</a>
      
        </div>

        <!-- Logout button -->
        <form id="logout-form" action="logout.php" method="post">
            <input id="logout-button" type="submit" value="Logout">
        </form>
    </div>
</body>
</html>
