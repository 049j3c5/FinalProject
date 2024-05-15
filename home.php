<!DOCTYPE html>
<html>
<head>
<title>Home Page</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css"
    integrity="sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" >
<style>
    body{
      background-color:#f0f6ff;
    }
    .sidenav {
  height: 550px;
  width: 200px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-image: #d9d9ff;
  padding-top: 100px;
  margin-left: 10px;
  margin-top: 15px;

}

.sidenav a {
 
  padding:  8px;
  padding-left: 5px;
  text-decoration: none;
  font-size: 25px;
  color: black;
  text-align: center;
  font-family: Helvetica;
}


table, th, td {
  font-size: 10px;
  border: 1px solid black;
  border-collapse: collapse;
}
.bor{
     border: none;
 }
</style>
</head>

<body>

  <!--<div class="bg-image"></div>-->

<div class="header">
 <img src="logo.jpg" alt="university logo" width="70" height="70">
  <h2>IIS(Deemed to be University)</h2>
  <h5>Faculty Self Appraisal </h5>
</div>
<div class="sidenav" style="text-align: center;">
<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loginid'])) {
    // Redirect the user back to the login page if not logged in
    header("Location: login.html");
    exit;
}

// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "faculty";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$loginid = $_SESSION['loginid'];

// Retrieve image data from the database
$sql = "SELECT img FROM login_details WHERE loginid = '$loginid'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        // Display the image
        echo '<img src="data:image/jpeg;base64,'.base64_encode($row['img']).'" />';
    }
} else {
    echo "0 results";
}

$conn->close();
?>

 <!-- <center><img src="icon.png" alt="Profile Picture" width="100" height="100"></center>-->
<br><br><br>
  <a href="Home.php">Home</a>
  <a href="profile.php">Profile</a>
  <a href="form.php">Form</a>
  <a href="report.php">Report</a>
</div>

	<div class="content">
	<div class ="box1">
	<p>
	IIS(Deemed to be University), Jaipur is a cosmopolitan and vibrant University and is among the thirty eigth deemed-to-be-a-universities in India placed in the category ‘A’ by the Ministry of 		Human Resource Development, Government of India. It is known for excellence in imparting meaningful education to students and to encourage them to think innovatively. It particularly 		focuses on empowering women to face challenges of life with confidence and also provide creative leadership. 
	<br><br><br><br>
	<br><br><br><br><br><br><br><br><br><br><br><br><br>
	</p>
	</div>
	</div>


<div class="footer">
  <p>Copyright &copy; 2023-2024 by IIS Deemed to be University. All Rights Reserved.</p>
</div>


</body>
</html>
