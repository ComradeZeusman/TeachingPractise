<?php
include "aunthenicate.php";

// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "teachingpractise";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to select students based on the program
$sql = "SELECT * FROM students WHERE program='bachelor of education in humanities'";

if (isset($_POST['search'])) {
    $search = $_POST['search'];
    $sql = "SELECT * FROM students WHERE program='bachelor of education in humanities' AND (first_name LIKE '%$search%' OR last_name LIKE '%$search' OR reg_number LIKE '%$search')";
}

$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Students Based on Program</title>
    <style>
     body {
    background-color: #f2f2f2;
    font-family: Arial, sans-serif;
    color: #333;
    margin: 0;
    padding: 0;
}

h1 {
    background-color: #007BFF;
    color: #fff;
    padding: 20px;
    text-align: center;
}

table {
    width: 100%;
    border-collapse: collapse;
    background-color: #fff;
    margin-top: 20px;
}

th {
    background-color: #007BFF;
    color: #fff;
    padding: 10px;
    text-align: left;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

td {
    padding: 10px;
}

a {
    text-decoration: none;
    background-color: #28a745;
    color: #fff;
    padding: 5px 10px;
    border-radius: 5px;
}

a:hover {
    background-color: #1e7e34;
}

/* Additional styling for payment details */
td.payment {
    background-color: #f0f0f0;
    font-weight: bold;
}

a.receipt-link {
    color: #007BFF;
    text-decoration: underline;
}

    </style>
</head>
<body>
<h1>bachelor of education in humanities</h1>
<form method="post" action="humanities.php">
    <input type="text" name="search" placeholder="Search by name or reg#">
    <input type="submit" value="Search">
</form>
<table>
<tr>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Registration Number</th>
    <th>School Email</th>
    <th>Program</th>
    <th>Year</th>
    <th>Semester</th>
    <th>Approved Status</th>
    <th>Amount Paid</th>
    <th>Payment Date</th>
    <th>Receipt</th>
    <th>Actions</th>
</tr>
<?php
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["first_name"] . "</td>";
        echo "<td>" . $row["last_name"] . "</td>";
        echo "<td>" . $row["reg_number"] . "</td>";
        echo "<td>" . $row["school_email"] . "</td>";
        echo "<td>" . $row["program"] . "</td>";
        echo "<td>" . $row["year"] . "</td>";
        echo "<td>" . $row["semester"] . "</td>";
        echo "<td>" . ($row["approved"] ? $row["approved"] : "Not assigned") . "</td>";

        // Query to retrieve payment information for the student
        $sql4 = "SELECT * FROM tppayment WHERE student_id='" . $row["student_id"] . "'";
        $result4 = $conn->query($sql4);

        if ($result4->num_rows > 0) {
            $row4 = $result4->fetch_assoc();
            $receipt = $row4["reciept"];
            echo "<td>MWK" . $row4["amount"] . "</td>";
            echo "<td>" . $row4["date"] . "</td>";
            echo "<td><a href='javascript:void(0);' onclick='openReceiptPopup(" . json_encode($receipt) . ")'>View Receipt</a></td>";
            if ($row4["amount"] < 80000) {
                echo "<td>Payment not finished</td>";
            }elseif($row4["amount"] > 80000){
                $calculate = $row4["amount"] - 80000;
                echo "<td>There is an overpayment of MKW $calculate </td>";

            }
             else {
                echo "<td><a href='approve.php?id=" . $row["student_id"] . "'>Approve</a></td>";
            }
        } else {
            echo "<td>N/A</td>";
            echo "<td>N/A</td>";
            echo "<td>N/A</td>";
            echo "<td>N/A</td>";
        }

        echo "</tr>";
    }
} else {
    echo "No results found.";
}
?>
<script>
    function openReceiptPopup(receiptURL) {
        var width = 600;
        var height = 400;
        var left = (screen.width - width) / 2;
        var top = (screen.height - height) / 2;
        
        var receiptPopup = window.open(receiptURL, 'Receipt', 'width=' + width + ',height=' + height + ',left=' + left + ',top=' + top);
        receiptPopup.focus();
    }

    // Attach the event handler to all receipt links
    var receiptLinks = document.querySelectorAll('.receipt-link');
    receiptLinks.forEach(function (link) {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            openReceiptPopup(link.href);
        });
    });
</script>

   
