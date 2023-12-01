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
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: white;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
            width: 80%;
            margin: 300px auto;
        }

        .container h2 {
            color: #007FFF;
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            color: #007FFF; /* Added color for labels */
        }

        select, input[type="text"], input[type="email"], input[type="number"], textarea {
            width: 97%;
            padding: 10px;
            border: 1px solid #007FFF;
            border-radius: 5px;
        }

        .submit-btn {
            background-color: #007FFF;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }
    </style>
    <script>
        function validateForm() {
            // Validate Registration Number
            var regNumber = document.getElementById("regNumber").value;
            var regNumberPattern = /^[A-Z]{3}\/\d{2}\/\d{2}\/\d{2}$/;
            if (!regNumberPattern.test(regNumber)) {
                alert("Invalid Registration Number.CAPITALIZE XXX. Please use the format: XXX/00/00/00");
                return false;
            }

            // Validate School Email
            var email = document.getElementById("email").value;
            var emailPattern = /^[A-Za-z0-9._%+-]+@unilia\.ac\.mw$/;
            if (!emailPattern.test(email)) {
                alert("Invalid School Email. Please use the format: yourname@unilia.ac.mw");
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
    <div class="container">
   
        <h2>Register Now</h2>
       
        <form method="POST" action="Registerconn.php" enctype="multipart/form-data" onsubmit="return validateForm();">
            <div class="form-group">
                <label for="firstName">First Name:</label>
                <input type="text" id="firstName" name="firstName" required>
            </div>
            <div class="form-group">
                <label for="lastName">Last Name:</label>
                <input type="text" id="lastName" name="lastName" required>
            </div>
            <div class="form-group">
                <label for="regNumber">Registration Number:</label>
                <input type="text" id="regNumber" name="regNumber" placeholder="BEH/01/01/01" required>
            </div>
            <div class="form-group">
                <label for="email">School Email:</label>
                <input type="email" id="email" name="email" placeholder="beh-01-01-01@unilia.ac.mw" required>
            </div>
            <div class="form-group">
                <label for="program">Program:</label>
                <select id="program" name="program" required>
                    <option value="Bachelor of Education in Humanities">Bachelor of Education in Humanities</option>
                    <option value="Bachelor of Education in Sciences">Bachelor of Education in Sciences</option>
                    <option value="Bachelor of Education in Information and Communication Technology">Bachelor of Education in Information and Communication Technology</option>
                </select>
            </div>
            <div class="form-group">
                <label for="year">Year:</label>
                <select id="year" name="year" required>
                    <option value="4">Year 4</option>
                </select>
            </div>
            <div class="form-group">
                <label for="semester">Semester (Number):</label>
                <input type="number" id="semester" name="semester" min="5" value="7" required>
            </div>
            <div class="form-group">
                <label for="preferredSubjects">Preferred Subjects:</label>
                <textarea id="preferredSubjects" name="preferredSubjects" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="district">Preferred District:</label>
                <select id="district" name="district" required>
                    <option value="">Select District</option>
                    <option value="Balaka">Balaka</option>
                    <option value="Blantyre">Blantyre</option>
                    <option value="Chikwawa">Chikwawa</option>
                    <option value="Chiradzulu">Chiradzulu</option>
                    <option value="Chitipa">Chitipa</option>
                    <option value="Dedza">Dedza</option>
                    <option value="Dowa">Dowa</option>
                    <option value="Karonga">Karonga</option>
                    <option value="Kasungu">Kasungu</option>
                    <option value="Likoma">Likoma</option>
                    <option value="Lilongwe">Lilongwe</option>
                    <option value="Machinga">Machinga</option>
                    <option value="Mangochi">Mangochi</option>
                    <option value="Mchinji">Mchinji</option>
                    <option value="Mulanje">Mulanje</option>
                    <option value="Mwanza">Mwanza</option>
                    <option value="Mzimba">Mzimba</option>
                    <option value="Nkhata Bay">Nkhata Bay</option>
                    <option value="Nkhotakota">Nkhotakota</option>
                    <option value="Nsanje">Nsanje</option>
                    <option value="Ntcheu">Ntcheu</option>
                    <option value="Ntchisi">Ntchisi</option>
                    <option value="Phalombe">Phalombe</option>
                    <option value="Rumphi">Rumphi</option>
                    <option value="Salima">Salima</option>
                    <option value="Thyolo">Thyolo</option>
                    <option value="Zomba">Zomba</option>
                </select>
            </div>
            <button type="submit" class="submit-btn">Register</button>
        </form>
    </div>
</body>
</html>
