<?php
session_start();
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    
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

// Retrieve user input
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$username = $_POST['loginid'];
$password = $_POST['password'];

// Protect against SQL injection 
$username = mysqli_real_escape_string($conn, $username);

// Query to check if the user exists
$query = "SELECT * FROM $tablename WHERE loginid = '$username' AND password ='$password'";
$result = $conn->query($query);
if ($result->num_rows == 1) {
    // User exists, verify the password
    $row = $result->fetch_assoc();
    $_SESSION['loginid'] = $row['loginid'];
    echo($row['password']);
    if (strcmp($password, $row['password'])==0) {
        // Password is correct, redirect to the home page
       
        header("Location: home.php");
        exit();
    } else {
        echo "Incorrect password. <a href='login.html'>Try again</a>";
    }
} else {
    echo "User not found. <a href='login.html'>Try again</a>";
}

}

$conn->close();
?>