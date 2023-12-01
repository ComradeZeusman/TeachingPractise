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
       /* CSS for navigation bar */
       body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .navbar {
            text-align: center; /* Center the navbar */
            background-color: #007BFF; /* Orange background color */
            overflow: hidden;
        }

        .navbar a {
            display: inline-block; /* Display links in a row */
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
            transition: background-color 0.3s; /* Smooth transition */
        }

        .navbar a:hover {
            background-color: #ff6f00; /* Darker orange on hover */
        }
        

        /* Container styles */
        .container {
            padding: 20px;
        }

        /* Welcome message styles */
        .welcome {
            background-color: #f2f2f2; /* Light gray background */
            padding: 20px;
            margin-bottom: 20px;
        }

        .welcome p {
            margin: 0;
            font-size: 18px;
        }

        /* Add Students link styles */
        .students a {
            background-color: #4CAF50; /* Green */
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }

        .students a:hover {
            background-color: #45a049; /* Darker green on hover */
        }

        /* Logout button styles */
        #logout-button {
            padding: 10px 20px;
            background-color:#007FFF; /* Orange */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s; /* Smooth transition */
        }

        #logout-button:hover {
            background-color: #ff6f00; /* Darker orange on hover */
        }
        
    </style>
</head>
<body>
    <div class="navbar">
        <a href="supervisorstudents.php">continuous 1</a>
        <a href="supervisorstudents2.php">Continuous 2</a>
      
    </div>

    <div class="container">
        <!-- Welcome message -->
        <div class="item welcome">
            <p>Welcome <?php echo $first_name . " " . $last_name; ?></p>
        </div>
    </div>
    <form id="logout-form" action="logout.php" method="post">
            <input id="logout-button" type="submit" value="Logout">
        </form>
</body>
</html>
