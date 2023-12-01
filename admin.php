<?php
include "aunthenicate.php";
//if not admin, echo error message
if ($result_admin->num_rows != 1) {
    echo "You are not authorized to view this page. Please login as an admin.";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
        }

        header {
            background-color: #007BFF;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
            margin: 20px;
        }

        .card {
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            padding: 20px;
            text-align: center;
            width: 300px;
        }

        .card a {
            display: block;
            background-color: #007BFF;
            color: #fff;
            padding: 10px;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            margin: 10px auto;
            transition: background-color 0.3s ease;
        }

        .card a:hover {
            background-color: #0056b3;
        }

        #logout-form {
            text-align: center;
            margin-top: 20px;
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
    <header>
        <h1>Welcome <?php echo $admin_name; ?></h1>
        <h2>Coordinator Dashboard</h2>
        <p>Here you can manage the system.</p>
    </header>

    <div class="container">
        <div class="card">
            <a href="addsupervisor.php">Add Supervisor</a>
            <a href="addstudent.php">Add Student</a>
            <a href="addschool.php">Add School</a>
            <a href="applyschool.php">AUTO</a>

        </div>

        <div class="card">
            <a href="viewstudentsbasedonprogram.php">View Students Based on Program</a>
            <a href="viewsupervisors.php">View Supervisors</a>
            <a href="viewstudents.php">View Students</a>
            <a href="admincomplaintview.php">View Complaints</a>
        </div>
    </div>

    <form id="logout-form" action="logout.php" method="post">
        <input id="logout-button" type="submit" value="Logout">
    </form>
</body>
</html>
