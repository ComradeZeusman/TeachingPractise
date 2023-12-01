
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        body{
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height:100%;
            background-image: url('./img/unilia.jpg');
            background-size: cover;
            filter: blur(5px);
            z-index: -1;
           
        }

        .form-container {
            text-align: center;
            border: 2px solid white;
            background-color: white;
            width: 336px;
            height: 370px;
            border-radius: 10px;
            padding: 60px;
            color: #5D8AA8;
        }

        img {
            width: 300px;
            display: block;
            margin: 0 auto 20px; /* Adjust margin for positioning the image */
        }

        h1 {
            font-size: 20px;
            color: #5D8AA8;
            margin-bottom: 25px;
        }

        input[type="email"],
        input[type="password"] {
            width: 280px;
            border: none;
            border-bottom: 1px solid black;
            padding: 9px;
            margin-bottom: 20px;
            font-size: 16px;
        }

        button {
            border: 2px solid white;
            width: 300px;
            height: 40px;
            background-color: #007FFF;
            border-radius: 30px;
            cursor: pointer;
            font-size: 18px;
            color: white;
        }

        a {
            text-decoration: none;
            color: black;
            font-size: 16px;
        }

        a:hover {
            text-decoration: underline;
        }

        .forgot-password {
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="form-container">
        <img src="/img/cropped-unilia_logo-624x91.png" alt="University Logo">
        <h1>Teaching Practise Management System</h1>

        <?php
        session_start();
        if (isset($_SESSION['message'])) {
            echo '<p style="color: red;">' . $_SESSION['message'] . '</p>';
            unset($_SESSION['message']); // Clear the message after displaying
        }
        ?>

        <form method="post" action="login.php">
            <input type="email" name="email" id="email" placeholder="School email" required><br>
            <input type="password" name="password" id="password" placeholder="Password" required><br>
            <button type="submit">Log in</button>
            <div class="forgot-password">
                <a href="forgot.php">Forgot password</a>
            </div>
        </form>
    </div>
</body>
</html>
