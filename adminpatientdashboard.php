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

@import "css/adminpatientdashboard.css";

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
        <a class="active" id="dropbtn">Patients
        <i class="fa fa-caret-down"></i>
        </a>
        <div class="dropdown-content">
        <a href="adminpatientcomment.php" >Patients Comment</a>
        <a class="active" href="adminpatientdashboard.php">Dashboard Control</a>
        <a href="#">Delete Patients</a>
        </div>
        </li>
         <li class="dropdown1" id="dropdown2">
        <a class="dropbtn1" >Doctors
        <i class="fa fa-caret-down"></i>
        </a>
        <div class="dropdown-content1">
        <a href="admindoctorcomment.php" >Doctors Comment</a>
        <a href="admindoctordashboard.php">Dashboard Control</a>
        <a href="#">Delete Doctors</a>
        </div>
        </li>
        <li class="l" id="l1"><a href="adminlogout.php">Logout</a></li>
      </ul>
    </nav>

      
      

        <div class="body-container">
            <h2>Drag and Drop your image here to upload</h2>
            <div id="uploads"></div>
            <div class="dropzone" id="dropzone">
                Drop files here to upload
            </div>
        </div>
        
          <div class="form">
           
           	<?php 
	
	if(isset($_POST['submit'])){
	    
	    $text = $_POST['text'];
	    
	    $servername = "localhost";
$dbUsername = "Your username";
$dbPassword = "";
$dbname = "Your databasename";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$text1 = $conn->real_escape_string($text);
	    
$sql = "INSERT Into patient_dashboard_text (text) values('$text1')";
      
      $result = mysqli_query($conn, $sql);	    
	   if($result){
	       
	       echo ("<script>
      alert('Successfully submitted..')
      window.location.href='adminpatientdashboard.php'
       </script>");
	   }else{
	       
	       echo ("<script>
      alert('Something went wrong..!')
      window.location.href='adminpatientdashboard.php'
       </script>");
	       
	   }
	    
	}
	
	?>
           
         <div class="container">
	<div class="header">
		<h2>Write Text..</h2>
	</div>
	<form class="form" method="POST" action="" enctype="multipart/form-data">
	    
		<div class="form-control">
			<label for="username">About All Disease Info:</label>
			<textarea class="input" name="text" required type="text" placeholder="Write text here..." id="msg" autocomplete="off"></textarea>
			<p style="float: right"><b id="counter">0</b> <b style="color:black;">/1500</b></p>
		</div>
	
	    
	
		
		
      
      <button class="btn" name="submit">Send</button>
      
    
	</form>
	

</div>
  </div>       

<script>

var _0x46d1=["\x64\x72\x6F\x70\x7A\x6F\x6E\x65","\x67\x65\x74\x45\x6C\x65\x6D\x65\x6E\x74\x42\x79\x49\x64","\x75\x70\x6C\x6F\x61\x64\x73","\x6C\x65\x6E\x67\x74\x68","\x61","\x63\x72\x65\x61\x74\x65\x45\x6C\x65\x6D\x65\x6E\x74","\x68\x72\x65\x66","\x66\x69\x6C\x65","\x69\x6E\x6E\x65\x72\x54\x65\x78\x74","\x6E\x61\x6D\x65","\x61\x70\x70\x65\x6E\x64\x43\x68\x69\x6C\x64","\x66\x69\x6C\x65\x5B\x5D","\x61\x70\x70\x65\x6E\x64","\x6F\x6E\x6C\x6F\x61\x64","\x72\x65\x73\x70\x6F\x6E\x73\x65\x54\x65\x78\x74","\x70\x61\x72\x73\x65","\x70\x6F\x73\x74","\x75\x70\x6C\x6F\x61\x64\x2E\x70\x68\x70","\x6F\x70\x65\x6E","\x73\x65\x6E\x64","\x6F\x6E\x64\x72\x6F\x70","\x70\x72\x65\x76\x65\x6E\x74\x44\x65\x66\x61\x75\x6C\x74","\x63\x6C\x61\x73\x73\x4E\x61\x6D\x65","\x66\x69\x6C\x65\x73","\x64\x61\x74\x61\x54\x72\x61\x6E\x73\x66\x65\x72","\x6F\x6E\x64\x72\x61\x67\x6F\x76\x65\x72","\x64\x72\x6F\x70\x7A\x6F\x6E\x65\x20\x64\x72\x61\x67\x6F\x76\x65\x72","\x6F\x6E\x64\x72\x61\x67\x6C\x65\x61\x76\x65","\x6D\x73\x67","\x76\x61\x6C\x75\x65","\x69\x6E\x6E\x65\x72\x48\x54\x4D\x4C","\x63\x6F\x75\x6E\x74\x65\x72","\x63\x6F\x6C\x6F\x72","\x73\x74\x79\x6C\x65","\x62\x6C\x61\x63\x6B","\x72\x65\x64","\x73\x6C\x69\x63\x65"];(function(){var _0x259ax1=document[_0x46d1[1]](_0x46d1[0]);var _0x259ax2=function(_0x259ax3){var _0x259ax4=document[_0x46d1[1]](_0x46d1[2]),_0x259ax5,_0x259ax6;for(_0x259ax6= 0;_0x259ax6< _0x259ax3[_0x46d1[3]];_0x259ax6= _0x259ax6+ 1){_0x259ax5= document[_0x46d1[5]](_0x46d1[4]);_0x259ax5[_0x46d1[6]]= _0x259ax3[_0x259ax6][_0x46d1[7]];_0x259ax5[_0x46d1[8]]= _0x259ax3[_0x259ax6][_0x46d1[9]];_0x259ax4[_0x46d1[10]](_0x259ax5)}};var _0x259ax7=function(_0x259ax8){var _0x259ax9= new FormData(),_0x259axa= new XMLHttpRequest(),_0x259ax6;for(_0x259ax6= 0;_0x259ax6< _0x259ax8[_0x46d1[3]];_0x259ax6= _0x259ax6+ 1){_0x259ax9[_0x46d1[12]](_0x46d1[11],_0x259ax8[_0x259ax6])};_0x259axa[_0x46d1[13]]= function(){var _0x259ax3=JSON[_0x46d1[15]](this[_0x46d1[14]]);_0x259ax2(_0x259ax3)};_0x259axa[_0x46d1[18]](_0x46d1[16],_0x46d1[17]);_0x259axa[_0x46d1[19]](_0x259ax9)};_0x259ax1[_0x46d1[20]]= function(_0x259axb){_0x259axb[_0x46d1[21]]();this[_0x46d1[22]]= _0x46d1[0];_0x259ax7(_0x259axb[_0x46d1[24]][_0x46d1[23]])};_0x259ax1[_0x46d1[25]]= function(){this[_0x46d1[22]]= _0x46d1[26];return false};_0x259ax1[_0x46d1[27]]= function(){this[_0x46d1[22]]= _0x46d1[0];return false}}());setInterval(function(){message= document[_0x46d1[1]](_0x46d1[28]);text= message[_0x46d1[29]];document[_0x46d1[1]](_0x46d1[31])[_0x46d1[30]]= text[_0x46d1[3]];if(text[_0x46d1[3]]<= 1480){document[_0x46d1[1]](_0x46d1[31])[_0x46d1[33]][_0x46d1[32]]= _0x46d1[34]};if(text[_0x46d1[3]]> 1480){document[_0x46d1[1]](_0x46d1[31])[_0x46d1[33]][_0x46d1[32]]= _0x46d1[35]};if(text[_0x46d1[3]]> 1500){newtext= text[_0x46d1[36]](0,1500);message[_0x46d1[29]]= newtext}},100)    

</script>        

</body>
</html>