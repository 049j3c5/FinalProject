<?php
// Start the session
session_start();

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

// Retrieve user input from the form
$title = $_POST['title'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$designation = $_POST['designation'];
$department = $_POST['department'];
$highestqualification = $_POST['highestqualification'];

// Update the user data in the database
$sql = "UPDATE $tablename SET title='$title', fname='$fname', lname='$lname', designation='$designation', department='$department', highestqualification='$highestqualification' WHERE loginid='$loginid'";

if ($conn->query($sql) === TRUE) {
    header("Location: profile.php");
} else {
    echo "Error updating profile: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
