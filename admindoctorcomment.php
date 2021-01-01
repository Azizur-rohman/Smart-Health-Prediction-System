<?php  
session_start();
if (!isset($_SESSION['Email'])) {
  header('location:adminlogin.php');
}



?> 

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Adminpage</title>
  <link rel="shortcut icon" type="image/png" href="Image/ninjaapple.png">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
<style>
    
    @import "css/admindoctorcomment.css";
    
</style>
</head>
<body>

 <nav>
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fa fa-bars" aria-hidden="true"></i>
      </label>
      <label class="logo">HEALTH CARE</label>
      <ul>
        <li class="l"><a  href="adminpatientlistpage.php">Patients List</a></li>
        <li class="l"><a  href="admindoctorlistpage.php">Doctors List</a></li>
        
         <li class="dropdown" id="dropdown1">
        <a class="dropbtn">Patients
        <i class="fa fa-caret-down"></i>
        </a>
        <div class="dropdown-content">
        <a href="adminpatientcomment.php" >Patients Comment</a>
        <a href="adminpatientdashboard.php">Dashboard Control</a>
        <a href="#">Delete Patients</a>
        </div>
        </li>
         <li class="dropdown1" id="dropdown2">
        <a class="active" id="dropbtn1">Doctors
        <i class="fa fa-caret-down"></i>
        </a>
        <div class="dropdown-content1">
        <a class="active" href="admindoctorcomment.php" >Doctors Comment</a>
        <a href="admindoctordashboard.php">Dashboard Control</a>
        <a href="#">Delete Doctors</a>
        </div>
        </li>
        <li class="l" id="l1"><a href="adminlogout.php">Logout</a></li>
      </ul>
    </nav>




  <center><div class="list">
  <table class=" table-hover " border="1">
      <tr>
          <th style="text-align: center;background-image:linear-gradient(to left,#FEB69A,#C70039,#FEB69A);color:white" colspan="5">All Doctors Comment</th>
      </tr>
        <tr style="background-image:linear-gradient(to left,#1E5774,
        #1E5774,#1E5774);color:white">
          <th style="text-align: center">ID</th>
          <th style="text-align: center">Title</th>
          <th style="text-align: center">Comment</th>
          <th style="text-align: center">Doctor_ID</th>
          <th style="text-align: center">Date and Time</th>
        </tr>
 <?php
$servername = "localhost";
$dbUsername = "Your username";
$dbPassword = "";
$dbname = "Your databasename";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id,Title,comment,doctor_id,Date_and_Time FROM comment ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

    $id = $row['id'];
    $title = $row['Title'];
    $comment = $row['comment']; 
    $doctor_id = $row['doctor_id'];
    $datetime = $row['Date_and_Time'];      
    ?>
    
    <tr>
      <td style="text-align: center;"><?php print_r($id); ?></td>
      <td><?php print_r($title); ?></td>
      <td><?php print_r($comment); ?></td>
      <td style="text-align: center;"><?php print_r($doctor_id); ?></td>
      <td style="text-align: center;"><?php print_r($datetime); ?></td>
    </tr>
    
    
  <?php 
   } 
   ?> 
   <?php 

} else {
  echo "0 results";
}

$conn->close();
?>
</table></div></center> 

   
</div>
</body>
</html>