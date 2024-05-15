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
    // Display an editable form
    echo "<form action='updateprofile.php' method='POST'>";
    echo "<table style='width:70%'>";
    echo "<tr><td>Title: </td><td><input type='text' name='title' value='" . $row['title'] . "'></td></tr>";
    echo "<tr><td>First Name: </td><td><input type='text' name='fname' value='" . $row['fname'] . "'></td></tr>";
    echo "<tr><td>Last Name: </td><td><input type='text' name='lname' value='" . $row['lname'] . "'></td></tr>";
    echo "<tr><td>Designation: </td><td><input type='text' name='designation' value='" . $row['designation'] . "'></td></tr>";
    echo "<tr><td>Department: </td><td><input type='text' name='department' value='" . $row['department'] . "'></td></tr>";
    echo "<tr><td>Highest Academic Qualification: </td><td><input type='text' name='highestqualification' value='" . $row['highestqualification'] . "'></td></tr>";
    echo "</table>";
    echo "<input type='submit' value='Save'>";
    echo "</form>";
} else {
    echo "User data not found";
}

// Close the database connection
$conn->close();
?>
