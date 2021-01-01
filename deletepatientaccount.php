<?php 
      
        
      $servername = "localhost";
$dbUsername = "Your username";
$dbPassword = "";
$dbname = "Your databasename";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$idd = $_GET['id'];
$q = "DELETE FROM `register` WHERE id='$idd'" ;
if($conn->query($q))
{
	header('location:adminpatientlistpage.php');
}

?>
     