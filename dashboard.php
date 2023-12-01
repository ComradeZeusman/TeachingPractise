<?php
include "aunthenicate.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Dashboard</title>
    <style>
         <style>
        /* Global Styles */
        html, body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            font-size: 20px;
        }

        body {
            background-size: cover;
            background-repeat: no-repeat;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 250px;
            background-color: #3498db;
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            overflow-y: auto;
            padding-top: 20px;
        }

        .sidebar a {
            display: block;
            padding: 10px 20px;
            color: #fff;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .sidebar a:hover {
            background-color: #555;
        }

        /* Container Styles */
        .container {
            max-width: 900px;
            margin-left: 250px; /* Adjusted to accommodate sidebar */
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .image-slider {
            position: relative;
            height: 300px;
            overflow: hidden;
            margin-bottom: 20px;
        }

        .slider-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        .slider-image.active {
            opacity: 1;
        }

        .slider-caption {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            text-align: center;
            color: #fff;
            background-color: rgba(0, 0, 0, 0.5);
            padding: 10px;
            font-size: 14px;
        }

        p {
            color: #555;
            line-height: 1.5;
            margin-bottom: 20px;
        }

        .content {
            /* Additional styles for the content area */
            padding-top: 20px; /* Adjusted to avoid content overlapping with the sidebar */
        }

        .btn-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 5px;
            background-color: #007FFF;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #005f9a;
        }

        #logout-form {
            text-align: center;
        }

        #logout-button {
            padding: 10px 20px;
            margin-top: 20px;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        #logout-button:hover {
            background-color: #555;
        }

        /* Media Query for responsive design */
        @media screen and (max-width: 600px) {
            .container {
                padding: 10px;
            }

            .image-slider {
                height: 200px;
            }
        }
        .logout-btn {
        padding: 10px 20px;
        margin-top: 20px;
        background-color: #3498db;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .logout-btn:hover {
        background-color: #555;
    }

    .logout-btn i {
        margin-right: 5px;
    }
    </style>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
     
</head>
<body>
<div class="sidebar">
        <a href="viewschools.php" onclick="loadAvailableSchools()">View Available Schools</a>
        <a href="viewyoursupervisor.php">View TP Status</a>
        <a href="Complaint.php" onclick="loadcomplaints()">Send Message</a>
        <a href="add_tp_payment.php" onclick="loadtppayment()">Add Payment Details</a>
        <a href="">View Your Grades</a>
        <a href="studentviewreply.php">View Replies</a>
        <form action="logout.php" method="post">
        <button type="submit" class="logout-btn">
            <i class="fas fa-sign-out-alt"></i> <!-- Font Awesome logout icon -->
            Logout
        </button>
    </form>
    </div>
   
    <div class="container">
        <h1>Welcome <?php echo $first_name . " " . $last_name; ?></h1>
        <div class="image-slider">
            <div class="slider-image active">
                <img src="img/11.jpg" height="500px" width="1000px" alt="Image 1">
                <p class="slider-caption">Through the Teaching practise users can explore a diverse range of topics, stay informed about important educational updates.</p>
            </div>
            <div class="slider-image">
                <img src="img/55.jpg" height="500px" width="1000px" alt="Image 2">
                <p class="slider-caption">With a strong emphasis on collaboration and knowledge-sharing, the Educational ChatHub aims to empower individuals.</p>
            </div>
            <div class="slider-image">
                <img src="img/66.jpg" height="500px" width="1000px" alt="Image 3">
                <p class="slider-caption">By leveraging the power of web technologies, the Teaching practise system strives to bridge the gap in access to education.</p>
            </div>
        </div>
        <p>Welcome to your student dashboard! Manage your teaching practise exercise with ease. Register and manage your teaching practise here.</p>
    
        <div id="content-container"></div>
    
    </div>

    <script>
        // Add an array to store slider images
        const sliderImages = document.querySelectorAll('.slider-image');
        let currentImageIndex = 0;

        function showNextImage() {
            // Hide the current active image
            sliderImages[currentImageIndex].classList.remove('active');

            // Move to the next image (circular loop)
            currentImageIndex = (currentImageIndex + 1) % sliderImages.length;

            // Display the next image
            sliderImages[currentImageIndex].classList.add('active');
        }

        // Function to start the automatic slide
        function startSlider() {
            setInterval(showNextImage, 10000); // Change image every 3 seconds (adjust as needed)
        }

        // Function to load available schools
        function loadAvailableSchools() {
            fetch('viewschools.php')
                .then(response => response.text())
                .then(data => {
                    document.getElementById('content-container').innerHTML = data;
                })
                .catch(error => console.error('Error:', error));
        }
         
        function loadcomplaints()
        {
          fetch('Complaint.php')
                .then(response => response.text())
                .then(data => {
                    document.getElementById('content-container').innerHTML = data;
                })
                .catch(error => console.error('Error:', error));

        }
         
        function loadtppayment()
        {
          fetch('add_tp_payment.php')
                .then(response => response.text())
                .then(data => {
                    document.getElementById('content-container').innerHTML = data;
                })
                .catch(error => console.error('Error:', error));

        }
        // Start the slider
        startSlider();
        function loadAvailableSchools() {
            fetch('viewschools.php')
                .then(response => response.text())
                .then(data => {
                    document.querySelector('.content').innerHTML = data;
                })
                .catch(error => console.error('Error:', error));
        }

        function loadcomplaints() {
            fetch('Complaint.php')
                .then(response => response.text())
                .then(data => {
                    document.querySelector('.content').innerHTML = data;
                })
                .catch(error => console.error('Error:', error));
        }

        function loadtppayment() {
            fetch('add_tp_payment.php')
                .then(response => response.text())
                .then(data => {
                    document.querySelector('.content').innerHTML = data;
                })
                .catch(error => console.error('Error:', error));
        }
    </script>
</body>
</html>
`