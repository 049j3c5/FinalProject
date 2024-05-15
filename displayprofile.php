<?php
// Start the session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Faculty";
$tablename = "login_details";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve loginid from session
$loginid = $_SESSION['loginid'];

// Retrieve user data from the database
$query = "SELECT * FROM $tablename WHERE loginid = '$loginid'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Display the details in non-editable form
    echo "<table style='width:70%'>";
    echo "<tr><td>Name: </td><td>" . $row['title'] ." ". $row['fname'] ." ". $row['lname'] .  "</td></tr>";
    echo "<tr><td>Designation: </td><td>" . $row['designation'] . "</td></tr>";
    echo "<tr><td>Department: </td><td>" . $row['department'] . "</td></tr>";
    echo "<tr><td>Highest Academic Qualification: </td><td>" . $row['highestqualification'] . "</td></tr>";
    echo "</table>";
} else {
    echo "User data not found";
}

// Close the database connection
$conn->close();
?>
