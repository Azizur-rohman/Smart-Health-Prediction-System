<?php  
session_start();
if (!isset($_SESSION['Email'])) {
  header('location:patientlogin.php');
}



?> 

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
	<title>Patientfeedback</title>
	<link rel="shortcut icon" type="image/png" href="Image/ninjaapple.png">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
<style>

@import "css/patientfeedback.css";

</style>
</head>
<body>

 <nav>
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fa fa-bars" id="closedetails"></i>
      </label>
      <label class="logo">HEALTH CARE</label>
            <ul class="ul">
          <div class="deta">
              
             
            <?php 
     $host = "localhost";
    $dbUsername = "Your username";
    $dbPassword = "";
    $dbname = "Your databasename";
    //create connection
    $conn = new mysqli($host,$dbUsername, $dbPassword, $dbname);
$email = $_SESSION['Email'];
$query = "SELECT `FirstName`, `LastName`, `Email`, `phoneCode`, `phone`, `gender`, `File` FROM register WHERE Email = '$email'";
$result = $conn->query($query);
        

        $row = $result->fetch_assoc();
 $firstname = $row['FirstName'];
$lastname = $row['LastName'];
$email = $row['Email'];
$phoneCode = $row['phoneCode'];
$phone = $row['phone'];
$gender = $row['gender'];
$files = $row['File'];      
?>

 <button class="profile-btn"><img src="Patientphotos/<?php print_r($files); ?>" class="file1" ></button> <br><br>
      <p class="tap">Tap to picture show your info</p>
 <div class="details1-panel-container">
              <div class="details1-panel">
                  <div  class="details1">
  <b class="name1">Name:</b> <b class="fatchname1"><?php print_r($firstname);?></b>&nbsp<b class="fatchname1"><?php print_r($lastname); ?></b><br>
  <b class="name1">Email:</b> <b class="fatchname1"><?php print_r($email); ?></b><br>
  <b class="name1">PhoneCode:</b> <b class="fatchname1"><?php print_r($phoneCode); ?></b><br>
  <b class="name1">Phone:</b> <b class="fatchname1"><?php print_r($phone); ?></b><br>
  <b class="name1">Gender:</b> <b class="fatchname1"><?php print_r($gender); ?></b><br>
      





    </div> 
     </div>
     </div>
       </div>  
        <li class="l"><a href="patientpage.php">Dashboard</a></li>
        
         <li class="dropdown" id="dropdown1">
        <a class="dropbtn">Search Disease
        <i class="fa fa-caret-down"></i>
        </a>
        <div class="dropdown-content">
        <a href="heartdisease.php" >Heart Disease</a>
        <a href="livercancer.php">Liver Cancer</a>
        <a href="patientcovidinfo.php">Covid-19 info</a>
        </div>
        </li>
        <li class="dropdown1" id="dropdown2">
        <a class="dropbtn1">Communication
        <i class="fa fa-caret-down"></i>
        </a>
        <div class="dropdown-content1">
        <a href="patientalldoctorsinfo.php" >All Doctors Info</a>
        <a href="patientcommwithdoctors.php">Communicate with doctors</a>
        </div>
        </li>
        <li class="l"><a class="active" href="patientfeedback.php">Feedback</a></li>
        <li class="l"><a href="patientlogout.php">Logout</a></li>
      </ul>
    </nav>

    <div class="contact-form">
    <form method="Post"action="patientfeedback.php" id="usrform">
  <b style="color: darkorange;font-size: 29px">Title: </b>
  <input type="text" class="input" name="Title" placeholder="Enter Your Title"  autocomplete="off" required>
  

<br><br>
<textarea class="textarea" name="comment" form="usrform" placeholder="Enter Your Comment..." style="font-size: 20px" id="msg" autocomplete="off" required>
</textarea>
<p style="float: right"><b id="counter">0</b> <b style="color:black;">/200</b></p><br><br>
<div class="msg">
<button class="btn" name="submit">Submit</button>
</div>
</form>
</div>

<?php
$host = "localhost";
$dbUsername = "Your username";
$dbPassword = "";
$dbname = "Your databasename";
    //create connection
    $conn = new mysqli($host,$dbUsername, $dbPassword, $dbname);
$email = $_SESSION['Email'];
$query = "SELECT `id`,`FirstName`, `LastName`, `Email`, `user_password`, `phoneCode`, `phone`, `gender`, `File` FROM register WHERE Email = '$email'";
$result = $conn->query($query);
        

        $row = $result->fetch_assoc();
 $id = $row['id'];
if(isset($_POST['submit'])){
@$title = $_POST['Title'];
@$comment = $_POST['comment'];
 

   if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT title From comment Where   title != ? Limit 0";
     $INSERT = "INSERT Into comment (Title,comment,Patient_id) values(?, ?, ?)";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $title);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssi",$title, $comment,$id);
      $stmt->execute();
      echo("<script>
      alert('Successfully Submitted...')
      window.location.href='patientfeedback.php'
       </script>");
     } else {
      
      echo ("<script>
      alert('Something Wrong')
      window.location.href='patientfeedback.php'
       </script>");
     }
     $stmt->close();
     $conn->close();
    }
}
     
    
  
?>


  <!-- SOCIAL PANEL HTML -->
<div class="social-panel-container">
  <div class="social-panel">
    <p>Created with <i class="fa fa-heart"></i> by
      <a target="_blank" href="https://www.youtube.com/channel/UCHm0A4jHtX2z_QoVegVV2Cw">Md Azizur Rohman</a></p>
    <button class="close-btn"><i class="fas fa-times"></i></button>
    <h4>Get in touch on</h4>
    <ul>
      <li>
        <a href="https://www.youtube.com/channel/UCHm0A4jHtX2z_QoVegVV2Cw" target="_blank">
          <i style="color:red" class="fab fa-youtube"></i>
        </a>
      </li>
      <li>
        <a href="https://twitter.com/" target="_blank">
          <i style="color:#03CBF8" class="fab fa-twitter"></i>
        </a>
      </li>
      <li>
        <a href="https://www.linkedin.com/in/azizur-rohman-9040" target="_blank">
          <i style="color:#037AF8" class="fab fa-linkedin"></i>
        </a>
      </li>
      <li>
        <a href="https://facebook.com/rajkumar.aziz.98" target="_blank">
          <i style="color:#039BF8;" class="fab fa-facebook"></i>
        </a>
      </li>
      <li>
        <a href="https://www.instagram.com/azizur__rahman_" target="_blank">
          <i style="background-image:linear-gradient(to left,#FF5733,
          #C70039,#900C3F);-webkit-text-fill-color:transparent;-webkit-background-clip: text;" class="fab fa-instagram"></i>
        </a>
      </li>
    </ul>
  </div>
</div>
<button class="floating-btn">
  Get in Touch
</button>

<div class="floating-text">
  All Rights <a href="https://ninjaapple.com" target="_blank"> healthcare@ninjaapple.com</a>
</div>
 
 
 <script>
 
 var _0x9f14=["\x2E\x70\x72\x6F\x66\x69\x6C\x65\x2D\x62\x74\x6E","\x71\x75\x65\x72\x79\x53\x65\x6C\x65\x63\x74\x6F\x72","\x23\x63\x6C\x6F\x73\x65\x64\x65\x74\x61\x69\x6C\x73","\x2E\x64\x65\x74\x61\x69\x6C\x73\x31\x2D\x70\x61\x6E\x65\x6C\x2D\x63\x6F\x6E\x74\x61\x69\x6E\x65\x72","\x63\x6C\x69\x63\x6B","\x76\x69\x73\x69\x62\x6C\x65","\x74\x6F\x67\x67\x6C\x65","\x63\x6C\x61\x73\x73\x4C\x69\x73\x74","\x61\x64\x64\x45\x76\x65\x6E\x74\x4C\x69\x73\x74\x65\x6E\x65\x72","\x72\x65\x6D\x6F\x76\x65","\x2E\x66\x6C\x6F\x61\x74\x69\x6E\x67\x2D\x62\x74\x6E","\x2E\x63\x6C\x6F\x73\x65\x2D\x62\x74\x6E","\x2E\x73\x6F\x63\x69\x61\x6C\x2D\x70\x61\x6E\x65\x6C\x2D\x63\x6F\x6E\x74\x61\x69\x6E\x65\x72","\x6D\x73\x67","\x67\x65\x74\x45\x6C\x65\x6D\x65\x6E\x74\x42\x79\x49\x64","\x76\x61\x6C\x75\x65","\x69\x6E\x6E\x65\x72\x48\x54\x4D\x4C","\x63\x6F\x75\x6E\x74\x65\x72","\x6C\x65\x6E\x67\x74\x68","\x63\x6F\x6C\x6F\x72","\x73\x74\x79\x6C\x65","\x62\x6C\x61\x63\x6B","\x72\x65\x64","\x73\x6C\x69\x63\x65"];const profile_btn=document[_0x9f14[1]](_0x9f14[0]);const closedetails_btn=document[_0x9f14[1]](_0x9f14[2]);const details1_panel_container=document[_0x9f14[1]](_0x9f14[3]);profile_btn[_0x9f14[8]](_0x9f14[4],()=>{details1_panel_container[_0x9f14[7]][_0x9f14[6]](_0x9f14[5])});closedetails_btn[_0x9f14[8]](_0x9f14[4],()=>{details1_panel_container[_0x9f14[7]][_0x9f14[9]](_0x9f14[5])});const floating_btn=document[_0x9f14[1]](_0x9f14[10]);const close_btn=document[_0x9f14[1]](_0x9f14[11]);const social_panel_container=document[_0x9f14[1]](_0x9f14[12]);floating_btn[_0x9f14[8]](_0x9f14[4],()=>{social_panel_container[_0x9f14[7]][_0x9f14[6]](_0x9f14[5])});close_btn[_0x9f14[8]](_0x9f14[4],()=>{social_panel_container[_0x9f14[7]][_0x9f14[9]](_0x9f14[5])});setInterval(function(){message= document[_0x9f14[14]](_0x9f14[13]);text= message[_0x9f14[15]];document[_0x9f14[14]](_0x9f14[17])[_0x9f14[16]]= text[_0x9f14[18]];if(text[_0x9f14[18]]<= 190){document[_0x9f14[14]](_0x9f14[17])[_0x9f14[20]][_0x9f14[19]]= _0x9f14[21]};if(text[_0x9f14[18]]> 190){document[_0x9f14[14]](_0x9f14[17])[_0x9f14[20]][_0x9f14[19]]= _0x9f14[22]};if(text[_0x9f14[18]]> 200){newtext= text[_0x9f14[23]](0,200);message[_0x9f14[15]]= newtext}},100)

</script> 

</body>
</html>
