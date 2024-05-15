<?php
session_start();

if(isset($_POST['year'])) {
    $_SESSION['year'] = $_POST['year'];}
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

    // Retrieve form data
    $year = $_SESSION['year'];
    $sql = "INSERT INTO details (year) VALUES ('$year')";
    // Redirect to the main form after setting the year
    if ($conn->query($sql) === TRUE)
    {
     header("Location: form.php");}
          else {
       echo "Error: " . $sql . "<br>" . $conn->error;
     }
     $conn->close();
?>
