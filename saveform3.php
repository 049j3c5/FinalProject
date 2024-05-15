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
$q21 =$_POST['i283'];
$q22=$_POST['i284'];
$q23=$_POST['i285'];
$q24=$_POST['i286'];
$q25=$_POST['i287'];
$q26=$_POST['i288'];
$q27=$_POST['i289'];
$q28=$_POST['i290'];
$q29=$_POST['i291'];
$q30 =$_POST['i292'];
$q31=$_POST['i293'];
$q32=$_POST['i294'];
$q33=$_POST['i295'];
$q34=$_POST['i296'];
$q35=$_POST['i297'];
$q36=$_POST['i298'];
$q37=$_POST['i299'];
$q38=$_POST['i300'];
$q39=$_POST['i301'];
$q40=$_POST['i302'];
$q41=$_POST['i303'];
$q42=$_POST['i304'];
$q43=$_POST['i305'];
$q44=$_POST['i306'];
$q45 =$_POST['i307'];
$q46=$_POST['i308'];
$q47=$_POST['i309'];
$q48=$_POST['i310'];
$q49=$_POST['i311'];
$q50_a=$_POST['i312'];
$q50_b=$_POST['i313'];
$q51=$_POST['i314'];
$q52=$_POST['i315'];

$sql = "UPDATE details 
        SET q21 = '$q21',
            q22 = '$q22',
            q23 = '$q23',
            q24 = '$q24',
            q25 = '$q25',
            q26 = '$q26',
            q27 = '$q27',
            q28 = '$q28',
            q29 = '$q29',
            q30 = '$q30',
            q31 = '$q31',
            q32 = '$q32',
            q33 = '$q33',
            q34 = '$q34',
            q35 = '$q35',
            q36 = '$q36',
            q37 = '$q37',
            q38 = '$q38',
            q39 = '$q39',
            q40 = '$q40',
            q41 = '$q41',
            q42 = '$q42',
            q43 = '$q43',
            q44 = '$q44',
            q45 = '$q45',
            q46 = '$q46',
            q47 = '$q47',
            q48 = '$q48',
            q49 = '$q49',
            q50_a = '$q50_a',
            q50_b = '$q50_b',
            q51 = '$q51',
            q52 = '$q52'
        WHERE year = '$year'";

    if ($conn->query($sql) === TRUE)
    {
     header("Location: form.php");}
          else {
       echo "Error: " . $sql . "<br>" . $conn->error;
     }
     
     $conn->close();
   ?>