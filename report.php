<!DOCTYPE html>
<html>
<head>
<title>Report</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css"
    integrity="sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" >
<style>
.button {
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  background-color:
}
.button1 {background-color: #0D47A1;} /* Blue */
.button2 {background-color: #4CAF50;} /* Green */

.sidenav {
  height: 550px;
  width: 200px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-image: #cde9fa;
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
<center>
<hr color="black" size="3px">
<h3 style="align:center;">Report</h3>
<hr color="black" size="3px">
<br><br>
<table style="width:70%">
<tr>
<td>2022 </td>
<td style="width:30%"><center><a href="generatepdf.php?year=2022" target="_blank"> <button class="button button1">Generate PDF</button></a></center></td>
<td style="width:30%"><center><a href="generatepdf.php?year=2022" download> <button class="button button2">Download PDF</button></a></center></td>
</tr>
<tr>
<td>2023 </td>
<td style="width:30%"><center><a href="generatepdf.php?year=2023" target="_blank"> <button class="button button1">Generate PDF</button></a></center></td>
<td style="width:30%"><center><a href="generatepdf.php?year=2023" download> <button class="button button2">Download PDF</button></a></center></td>
</tr>
<tr>
<td>2024 </td>
<td style="width:30%"><center><a href="generatepdf.php?year=2024" target="_blank"> <button class="button button1">Generate PDF</button></a></center></td>
<td style="width:30%"><center><a href="generatepdf.php?year=2024" download> <button class="button button2">Download PDF</button></a></center></td>
</tr>
</table>
</center>
</div>
<br><br>
<div class="footer">
  <p>Copyright &copy; 2023-2024 by IIS Deemed to be University. All Rights Reserved.</p>
</div>
</body>
</html>

