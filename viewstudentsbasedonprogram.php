<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        /* Styles for the dashboard */
        body {
            background-image: url('./imgs/21.jpeg');
            background-size: cover;
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .navbar {
            overflow: hidden;
            background-color: #333;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            color: #fff;
        }

        .navbar a {
            color: #f2f2f2;
            text-decoration: none;
            padding: 10px;
        }

        .dashboard {
            display: flex;
            justify-content: space-around;
            align-items: flex-start;
            padding-top: 20px;
        }

        .card {
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            padding: 20px;
            text-align: center;
            width: 30%;
            margin: 20px;
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

        .dashboard-header {
            width: 100%;
            text-align: center;
            margin-bottom: 20px;
        }

        #logout-form {
            margin: 0;
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
    <div class="navbar">
        <div>
            <a href="admin.php">Home</a>
        </div>
        <div>
            <form id="logout-form" action="logout.php" method="post">
                <input id="logout-button" type="submit" value="Logout">
            </form>
        </div>
    </div>

    <div class="dashboard">
        <div class="card">
            <h2>Actions</h2>
            <a href="humanities.php">View Students in Bachelor of Education in Humanities</a>
    <a href="science.php">View Students in Bachelor of Education in Science</a>
    <a href="ict.php">View Students in Bachelor of Education in Information and Communication Technologies</a>
        </div>
    </div>
</body>
</html>
