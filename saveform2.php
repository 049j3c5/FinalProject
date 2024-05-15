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
$q19_sno=$_POST['i226'];
    $q19_committee=$_POST['i227'];
    $q19_formedby=$_POST['i228'];
    $q19_position=$_POST['i229'];
    $q19_noofmeet=$_POST['i230'];
    $q19_contribution=$_POST['i231'];

    $q19_sno2 =$_POST['i232'];
    $q19_committee2=$_POST['i233'];
    $q19_formedby2=$_POST['i234'];
    $q19_position2=$_POST['i235'];
    $q19_noofmeet2=$_POST['i236'];
    $q19_contribution2=$_POST['i237'];

    $q19_sno3 =$_POST['i238'];
    $q19_committee3=$_POST['i239'];
    $q19_formedby3=$_POST['i240'];
    $q19_position3=$_POST['i241'];
    $q19_noofmeet3=$_POST['i242'];
    $q19_contribution3=$_POST['i243'];

    $q19_sno4 =$_POST['i244'];
    $q19_committee4=$_POST['i245'];
    $q19_formedby4=$_POST['i246'];
    $q19_position4=$_POST['i247'];
    $q19_noofmeet4=$_POST['i248'];
    $q19_contribution4=$_POST['i249'];

    $q19_sno5 =$_POST['i250'];
    $q19_committee5=$_POST['i251'];
    $q19_formedby5=$_POST['i252'];
    $q19_position5=$_POST['i253'];
    $q19_noofmeet5=$_POST['i254'];
    $q19_contribution5=$_POST['i255'];

    $q19_sno6 =$_POST['i256'];
    $q19_committee6=$_POST['i257'];
    $q19_formedby6=$_POST['i258'];
    $q19_position6=$_POST['i259'];
    $q19_noofmeet6=$_POST['i260'];
    $q19_contribution6=$_POST['i261']; 

    $q20_a=$_POST['i280'];
    $q20_a2=$_POST['i281'];
    $q20_b=$_POST['i282'];

    $sql = "UPDATE details 
    SET q19_sno = '$q19_sno',
        q19_committee = '$q19_committee',
        q19_formedby = '$q19_formedby',
        q19_position = '$q19_position',
        q19_noofmeet = '$q19_noofmeet',
        q19_contribution = '$q19_contribution',
        q19_sno2 = '$q19_sno2',
        q19_committee2 = '$q19_committee2',
        q19_formedby2 = '$q19_formedby2',
        q19_position2 = '$q19_position2',
        q19_noofmeet2 = '$q19_noofmeet2',
        q19_contribution2 = '$q19_contribution2',
        q19_sno3 = '$q19_sno3',
        q19_committee3 = '$q19_committee3',
        q19_formedby3 = '$q19_formedby3',
        q19_position3 = '$q19_position3',
        q19_noofmeet3 = '$q19_noofmeet3',
        q19_contribution3 = '$q19_contribution3',
        q19_sno4 = '$q19_sno4',
        q19_committee4 = '$q19_committee4',
        q19_formedby4 = '$q19_formedby4',
        q19_position4 = '$q19_position4',
        q19_noofmeet4 = '$q19_noofmeet4',
        q19_contribution4 = '$q19_contribution4',
        q19_sno5 = '$q19_sno5',
        q19_committee5 = '$q19_committee5',
        q19_formedby5 = '$q19_formedby5',
        q19_position5 = '$q19_position5',
        q19_noofmeet5 = '$q19_noofmeet5',
        q19_contribution5 = '$q19_contribution5',
        q19_sno6 = '$q19_sno6',
        q19_committee6 = '$q19_committee6',
        q19_formedby6 = '$q19_formedby6',
        q19_position6 = '$q19_position6',
        q19_noofmeet6 = '$q19_noofmeet6',
        q19_contribution6 = '$q19_contribution6',
        q20_a = '$q20_a',
        q20_a2 = '$q20_a2',
        q20_b = '$q20_b'
    WHERE year = '$year'";

             if ($conn->query($sql) === TRUE)
 {
  header("Location: form.php");}
       else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $conn->close();
?>