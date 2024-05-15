<?php
// Start the session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    if(isset($_POST['year'])) {
      // Set the year in session
      $_SESSION['year'] = $_POST['year'];
  }
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
$year = $_SESSION['year'];
$casual=$_POST['i316'];
    $medical=$_POST['i317'];
    $academic=$_POST['i318'];
    $duty=$_POST['i319'];
    $other=$_POST['i320'];
    $permission=$_POST['i321'];
    $timeperiod=$_POST['i322'];
    $early=$_POST['i323'];
    $privatetution=$_POST['i324'];
    $student=$_POST['i325'];
    $colleague=$_POST['i326'];
    $hod=$_POST['i327'];
    $dean=$_POST['i328'];
    $actiontaken=$_POST['i329'];
    $pointofview=$_POST['i330'];
    $success=$_POST['i331'];
    $achievement=$_POST['i332'];
    $increment=$_POST['i333'];

    $sql = "UPDATE details 
    SET casual = '$casual',
        medical = '$medical',
        academic = '$academic',
        duty = '$duty',
        other = '$other',
        permission = '$permission',
        timeperiod = '$timeperiod',
        early = '$early',
        privatetution = '$privatetution',
        student = '$student',
        colleague = '$colleague',
        hod = '$hod',
        dean = '$dean',
        actiontaken = '$actiontaken',
        pointofview = '$pointofview',
        success = '$success',
        achievement = '$achievement',
        increment = '$increment'
    WHERE year = '$year'";

if ($conn->query($sql) === TRUE)
 {
  header("Location: form.php");}
       else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $conn->close();
?>