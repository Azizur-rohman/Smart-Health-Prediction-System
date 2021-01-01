<?php  
session_start();
if (!isset($_SESSION['Email'])) {
  header('location:patientlogin.php');
}



?> 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <script
      src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
      integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI="
      crossorigin="anonymous"
    ></script>
    <script
      language="JavaScript"
      src="https://code.jquery.com/jquery-latest.min.js"
      type="text/javascript"
    ></script>
    <link rel="shortcut icon" type="image/png" href="Image/ninjaapple.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <title>COVID-19 STATS</title>
    <style>
        
 @import "css/patientcovidinfo.css";
        
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
        <li class="l"><a  href="patientpage.php">Dashboard</a></li>
        
         <li class="dropdown" id="dropdown1">
        <a class="active" id="dropbtn"  >Search Disease
        <i class="fa fa-caret-down"></i>
        </a>
        <div class="dropdown-content">
        <a href="heartdisease.php">Heart Disease</a>
        <a href="livercancer.php">Liver Cancer</a>
        <a href="patientcovidinfo.php" class="active">Covid-19 info</a>
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
        <li class="l"><a href="patientfeedback.php">Feedback</a></li>
        <li class="l"><a href="patientlogout.php">Logout</a></li>
      </ul>
    </nav>
    <main>
      <div class="stats">
        <div class="latest-report">
          <div class="country">
            <div class="name">Country Name</div>
            <div class="change-country">Choose</div>
            <div class="search-country hide">
              <div class="search-box">
                <input
                  type="text"
                  id="search-input"
                  placeholder="Search Country..."
                  autocomplete="off"
                />
                <img class="close" src="Image/close.svg" alt="" />
              </div>
              <div class="country-list"></div>
            </div>
          </div>
          <div class="total-cases">
            <div class="title">Total Cases</div>
            <div class="value">0</div>
            <div class="new-value">+0</div>
          </div>
          <div class="recovered">
            <div class="title">Recovered</div>
            <div class="value">0</div>
            <div class="new-value">+0</div>
          </div>
          <div class="deaths">
            <div class="title">Deaths</div>
            <div class="value">0</div>
            <div class="new-value">+0</div>
          </div>
        </div>
        <div class="chart">
          <canvas id="axes_line_chart"></canvas>
        </div>
      </div>
    </main>

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
          <i style="color:#039BF8" class="fab fa-facebook"></i>
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
<script type="text/javascript">

var _0x7843=["\x55\x53\x41","\x55\x53","\x53\x70\x61\x69\x6E","\x45\x53","\x49\x74\x61\x6C\x79","\x49\x54","\x46\x72\x61\x6E\x63\x65","\x46\x52","\x47\x65\x72\x6D\x61\x6E\x79","\x44\x45","\x55\x4B","\x47\x42","\x54\x75\x72\x6B\x65\x79","\x54\x52","\x49\x72\x61\x6E","\x49\x52","\x52\x75\x73\x73\x69\x61","\x52\x55","\x42\x65\x6C\x67\x69\x75\x6D","\x42\x45","\x42\x72\x61\x7A\x69\x6C","\x42\x52","\x43\x61\x6E\x61\x64\x61","\x43\x41","\x4E\x65\x74\x68\x65\x72\x6C\x61\x6E\x64\x73","\x4E\x4C","\x53\x77\x69\x74\x7A\x65\x72\x6C\x61\x6E\x64","\x43\x48","\x50\x6F\x72\x74\x75\x67\x61\x6C","\x50\x54","\x49\x6E\x64\x69\x61","\x49\x4E","\x49\x72\x65\x6C\x61\x6E\x64","\x49\x45","\x41\x75\x73\x74\x72\x69\x61","\x41\x54","\x50\x65\x72\x75","\x50\x45","\x53\x77\x65\x64\x65\x6E","\x53\x45","\x4A\x61\x70\x61\x6E","\x4A\x50","\x53\x2E\x20\x4B\x6F\x72\x65\x61","\x4B\x52","\x43\x68\x69\x6C\x65","\x43\x4C","\x53\x61\x75\x64\x69\x20\x41\x72\x61\x62\x69\x61","\x53\x41","\x50\x6F\x6C\x61\x6E\x64","\x50\x4C","\x45\x63\x75\x61\x64\x6F\x72","\x45\x43","\x52\x6F\x6D\x61\x6E\x69\x61","\x52\x4F","\x50\x61\x6B\x69\x73\x74\x61\x6E","\x50\x4B","\x4D\x65\x78\x69\x63\x6F","\x4D\x58","\x44\x65\x6E\x6D\x61\x72\x6B","\x44\x4B","\x4E\x6F\x72\x77\x61\x79","\x4E\x4F","\x55\x41\x45","\x41\x45","\x43\x7A\x65\x63\x68\x69\x61","\x43\x5A","\x41\x75\x73\x74\x72\x61\x6C\x69\x61","\x41\x55","\x53\x69\x6E\x67\x61\x70\x6F\x72\x65","\x53\x47","\x49\x6E\x64\x6F\x6E\x65\x73\x69\x61","\x49\x44","\x53\x65\x72\x62\x69\x61","\x52\x53","\x50\x68\x69\x6C\x69\x70\x70\x69\x6E\x65\x73","\x50\x48","\x55\x6B\x72\x61\x69\x6E\x65","\x55\x41","\x51\x61\x74\x61\x72","\x51\x41","\x4D\x61\x6C\x61\x79\x73\x69\x61","\x4D\x59","\x42\x65\x6C\x61\x72\x75\x73","\x42\x59","\x44\x6F\x6D\x69\x6E\x69\x63\x61\x6E\x20\x52\x65\x70\x75\x62\x6C\x69\x63","\x44\x4F","\x50\x61\x6E\x61\x6D\x61","\x50\x41","\x46\x69\x6E\x6C\x61\x6E\x64","\x46\x49","\x43\x6F\x6C\x6F\x6D\x62\x69\x61","\x43\x4F","\x4C\x75\x78\x65\x6D\x62\x6F\x75\x72\x67","\x4C\x55","\x53\x6F\x75\x74\x68\x20\x41\x66\x72\x69\x63\x61","\x5A\x41","\x45\x67\x79\x70\x74","\x45\x47","\x41\x72\x67\x65\x6E\x74\x69\x6E\x61","\x41\x52","\x4D\x6F\x72\x6F\x63\x63\x6F","\x4D\x41","\x54\x68\x61\x69\x6C\x61\x6E\x64","\x54\x48","\x41\x6C\x67\x65\x72\x69\x61","\x44\x5A","\x4D\x6F\x6C\x64\x6F\x76\x61","\x4D\x44","\x42\x61\x6E\x67\x6C\x61\x64\x65\x73\x68","\x42\x44","\x47\x72\x65\x65\x63\x65","\x47\x52","\x48\x75\x6E\x67\x61\x72\x79","\x48\x55","\x4B\x75\x77\x61\x69\x74","\x4B\x57","\x42\x61\x68\x72\x61\x69\x6E","\x42\x48","\x43\x72\x6F\x61\x74\x69\x61","\x48\x52","\x49\x63\x65\x6C\x61\x6E\x64","\x49\x53","\x4B\x61\x7A\x61\x6B\x68\x73\x74\x61\x6E","\x4B\x5A","\x55\x7A\x62\x65\x6B\x69\x73\x74\x61\x6E","\x55\x5A","\x45\x73\x74\x6F\x6E\x69\x61","\x45\x45","\x49\x72\x61\x71","\x49\x51","\x4E\x65\x77\x20\x5A\x65\x61\x6C\x61\x6E\x64","\x4E\x5A","\x41\x7A\x65\x72\x62\x61\x69\x6A\x61\x6E","\x41\x5A","\x53\x6C\x6F\x76\x65\x6E\x69\x61","\x53\x49","\x4C\x69\x74\x68\x75\x61\x6E\x69\x61","\x4C\x54","\x41\x72\x6D\x65\x6E\x69\x61","\x41\x4D","\x42\x6F\x73\x6E\x69\x61\x20\x61\x6E\x64\x20\x48\x65\x72\x7A\x65\x67\x6F\x76\x69\x6E\x61","\x42\x41","\x4F\x6D\x61\x6E","\x4F\x4D","\x4E\x6F\x72\x74\x68\x20\x4D\x61\x63\x65\x64\x6F\x6E\x69\x61","\x4D\x4B","\x53\x6C\x6F\x76\x61\x6B\x69\x61","\x53\x4B","\x43\x75\x62\x61","\x43\x55","\x48\x6F\x6E\x67\x20\x4B\x6F\x6E\x67","\x48\x4B","\x43\x61\x6D\x65\x72\x6F\x6F\x6E","\x43\x4D","\x41\x66\x67\x68\x61\x6E\x69\x73\x74\x61\x6E","\x41\x46","\x42\x75\x6C\x67\x61\x72\x69\x61","\x42\x47","\x54\x75\x6E\x69\x73\x69\x61","\x54\x4E","\x47\x68\x61\x6E\x61","\x47\x48","\x49\x76\x6F\x72\x79\x20\x43\x6F\x61\x73\x74","\x43\x49","\x43\x79\x70\x72\x75\x73","\x43\x59","\x44\x6A\x69\x62\x6F\x75\x74\x69","\x44\x4A","\x4C\x61\x74\x76\x69\x61","\x4C\x56","\x41\x6E\x64\x6F\x72\x72\x61","\x41\x44","\x4C\x65\x62\x61\x6E\x6F\x6E","\x4C\x42","\x43\x6F\x73\x74\x61\x20\x52\x69\x63\x61","\x43\x52","\x4E\x69\x67\x65\x72","\x4E\x45","\x42\x75\x72\x6B\x69\x6E\x61\x20\x46\x61\x73\x6F","\x42\x46","\x41\x6C\x62\x61\x6E\x69\x61","\x41\x4C","\x4B\x79\x72\x67\x79\x7A\x73\x74\x61\x6E","\x4B\x47","\x4E\x69\x67\x65\x72\x69\x61","\x4E\x47","\x42\x6F\x6C\x69\x76\x69\x61","\x42\x4F","\x47\x75\x69\x6E\x65\x61","\x47\x4E","\x55\x72\x75\x67\x75\x61\x79","\x55\x59","\x48\x6F\x6E\x64\x75\x72\x61\x73","\x48\x4E","\x53\x61\x6E\x20\x4D\x61\x72\x69\x6E\x6F","\x53\x4D","\x50\x61\x6C\x65\x73\x74\x69\x6E\x65","\x50\x53","\x4D\x61\x6C\x74\x61","\x4D\x54","\x54\x61\x69\x77\x61\x6E","\x54\x57","\x4A\x6F\x72\x64\x61\x6E","\x4A\x4F","\x52\xE9\x75\x6E\x69\x6F\x6E","\x52\x45","\x47\x65\x6F\x72\x67\x69\x61","\x47\x45","\x53\x65\x6E\x65\x67\x61\x6C","\x53\x4E","\x4D\x61\x75\x72\x69\x74\x69\x75\x73","\x4D\x55","\x44\x52\x43","\x43\x44","\x4D\x6F\x6E\x74\x65\x6E\x65\x67\x72\x6F","\x4D\x45","\x49\x73\x6C\x65\x20\x6F\x66\x20\x4D\x61\x6E","\x49\x4D","\x53\x72\x69\x20\x4C\x61\x6E\x6B\x61","\x4C\x4B","\x4D\x61\x79\x6F\x74\x74\x65","\x59\x54","\x4B\x65\x6E\x79\x61","\x4B\x45","\x56\x69\x65\x74\x6E\x61\x6D","\x56\x4E","\x47\x75\x61\x74\x65\x6D\x61\x6C\x61","\x47\x54","\x56\x65\x6E\x65\x7A\x75\x65\x6C\x61","\x56\x45","\x4D\x61\x6C\x69","\x4D\x4C","\x50\x61\x72\x61\x67\x75\x61\x79","\x50\x59","\x45\x6C\x20\x53\x61\x6C\x76\x61\x64\x6F\x72","\x53\x56","\x4A\x61\x6D\x61\x69\x63\x61","\x4A\x4D","\x54\x61\x6E\x7A\x61\x6E\x69\x61","\x54\x5A","\x4D\x61\x72\x74\x69\x6E\x69\x71\x75\x65","\x4D\x51","\x47\x75\x61\x64\x65\x6C\x6F\x75\x70\x65","\x47\x50","\x52\x77\x61\x6E\x64\x61","\x52\x57","\x43\x6F\x6E\x67\x6F","\x43\x47","\x42\x72\x75\x6E\x65\x69","\x42\x4E","\x53\x6F\x6D\x61\x6C\x69\x61","\x53\x4F","\x47\x69\x62\x72\x61\x6C\x74\x61\x72","\x47\x49","\x43\x61\x6D\x62\x6F\x64\x69\x61","\x4B\x48","\x4D\x61\x64\x61\x67\x61\x73\x63\x61\x72","\x4D\x47","\x54\x72\x69\x6E\x69\x64\x61\x64\x20\x61\x6E\x64\x20\x54\x6F\x62\x61\x67\x6F","\x54\x54","\x47\x61\x62\x6F\x6E","\x47\x41","\x4D\x79\x61\x6E\x6D\x61\x72","\x4D\x4D","\x45\x74\x68\x69\x6F\x70\x69\x61","\x45\x54","\x41\x72\x75\x62\x61","\x41\x57","\x46\x72\x65\x6E\x63\x68\x20\x47\x75\x69\x61\x6E\x61","\x47\x46","\x4D\x6F\x6E\x61\x63\x6F","\x4D\x43","\x42\x65\x72\x6D\x75\x64\x61","\x42\x4D","\x54\x6F\x67\x6F","\x54\x47","\x4C\x69\x65\x63\x68\x74\x65\x6E\x73\x74\x65\x69\x6E","\x4C\x49","\x45\x71\x75\x61\x74\x6F\x72\x69\x61\x6C\x20\x47\x75\x69\x6E\x65\x61","\x47\x51","\x4C\x69\x62\x65\x72\x69\x61","\x4C\x52","\x42\x61\x72\x62\x61\x64\x6F\x73","\x42\x42","\x53\x75\x64\x61\x6E","\x53\x44","\x47\x75\x79\x61\x6E\x61","\x47\x59","\x5A\x61\x6D\x62\x69\x61","\x5A\x4D","\x43\x61\x62\x6F\x20\x56\x65\x72\x64\x65","\x43\x56","\x43\x61\x79\x6D\x61\x6E\x20\x49\x73\x6C\x61\x6E\x64\x73","\x4B\x59","\x42\x61\x68\x61\x6D\x61\x73","\x42\x53","\x46\x72\x65\x6E\x63\x68\x20\x50\x6F\x6C\x79\x6E\x65\x73\x69\x61","\x50\x46","\x55\x67\x61\x6E\x64\x61","\x55\x47","\x4D\x61\x6C\x64\x69\x76\x65\x73","\x4D\x56","\x4C\x69\x62\x79\x61","\x4C\x59","\x47\x75\x69\x6E\x65\x61\x2D\x42\x69\x73\x73\x61\x75","\x47\x57","\x4D\x61\x63\x61\x6F","\x4D\x4F","\x48\x61\x69\x74\x69","\x48\x54","\x53\x79\x72\x69\x61","\x53\x59","\x45\x72\x69\x74\x72\x65\x61","\x45\x52","\x4D\x6F\x7A\x61\x6D\x62\x69\x71\x75\x65","\x4D\x5A","\x53\x61\x69\x6E\x74\x20\x4D\x61\x72\x74\x69\x6E","\x4D\x46","\x42\x65\x6E\x69\x6E","\x42\x4A","\x43\x68\x61\x64","\x54\x44","\x4D\x6F\x6E\x67\x6F\x6C\x69\x61","\x4D\x4E","\x4E\x65\x70\x61\x6C","\x4E\x50","\x53\x69\x65\x72\x72\x61\x20\x4C\x65\x6F\x6E\x65","\x53\x4C","\x5A\x69\x6D\x62\x61\x62\x77\x65","\x5A\x57","\x41\x6E\x67\x6F\x6C\x61","\x41\x4F","\x41\x6E\x74\x69\x67\x75\x61\x20\x61\x6E\x64\x20\x42\x61\x72\x62\x75\x64\x61","\x41\x47","\x45\x73\x77\x61\x74\x69\x6E\x69","\x53\x5A","\x42\x6F\x74\x73\x77\x61\x6E\x61","\x42\x57","\x54\x69\x6D\x6F\x72\x2D\x4C\x65\x73\x74\x65","\x54\x4C","\x42\x65\x6C\x69\x7A\x65","\x42\x5A","\x4E\x65\x77\x20\x43\x61\x6C\x65\x64\x6F\x6E\x69\x61","\x4E\x43","\x4D\x61\x6C\x61\x77\x69","\x4D\x57","\x46\x69\x6A\x69","\x46\x4A","\x44\x6F\x6D\x69\x6E\x69\x63\x61","\x44\x4D","\x4E\x61\x6D\x69\x62\x69\x61","\x4E\x41","\x53\x61\x69\x6E\x74\x20\x4C\x75\x63\x69\x61","\x4C\x43","\x47\x72\x65\x6E\x61\x64\x61","\x47\x44","\x53\x61\x69\x6E\x74\x20\x4B\x69\x74\x74\x73\x20\x61\x6E\x64\x20\x4E\x65\x76\x69\x73","\x4B\x4E","\x43\x41\x52","\x43\x46","\x53\x74\x2E\x20\x56\x69\x6E\x63\x65\x6E\x74\x20\x47\x72\x65\x6E\x61\x64\x69\x6E\x65\x73","\x56\x43","\x54\x75\x72\x6B\x73\x20\x61\x6E\x64\x20\x43\x61\x69\x63\x6F\x73","\x54\x43","\x46\x61\x6C\x6B\x6C\x61\x6E\x64\x20\x49\x73\x6C\x61\x6E\x64\x73","\x46\x4B","\x47\x72\x65\x65\x6E\x6C\x61\x6E\x64","\x47\x4C","\x4D\x6F\x6E\x74\x73\x65\x72\x72\x61\x74","\x4D\x53","\x53\x65\x79\x63\x68\x65\x6C\x6C\x65\x73","\x53\x43","\x53\x75\x72\x69\x6E\x61\x6D\x65","\x53\x52","\x4E\x69\x63\x61\x72\x61\x67\x75\x61","\x4E\x49","\x47\x61\x6D\x62\x69\x61","\x47\x4D","\x56\x61\x74\x69\x63\x61\x6E\x20\x43\x69\x74\x79","\x56\x41","\x4D\x61\x75\x72\x69\x74\x61\x6E\x69\x61","\x4D\x52","\x50\x61\x70\x75\x61\x20\x4E\x65\x77\x20\x47\x75\x69\x6E\x65\x61","\x50\x47","\x53\x74\x2E\x20\x42\x61\x72\x74\x68","\x42\x4C","\x42\x75\x72\x75\x6E\x64\x69","\x42\x49","\x42\x68\x75\x74\x61\x6E","\x42\x54","\x43\x61\x72\x69\x62\x62\x65\x61\x6E\x20\x4E\x65\x74\x68\x65\x72\x6C\x61\x6E\x64\x73","\x42\x51","\x42\x72\x69\x74\x69\x73\x68\x20\x56\x69\x72\x67\x69\x6E\x20\x49\x73\x6C\x61\x6E\x64\x73","\x56\x47","\x53\x61\x6F\x20\x54\x6F\x6D\x65\x20\x61\x6E\x64\x20\x50\x72\x69\x6E\x63\x69\x70\x65","\x53\x54","\x53\x6F\x75\x74\x68\x20\x53\x75\x64\x61\x6E","\x41\x6E\x67\x75\x69\x6C\x6C\x61","\x41\x49","\x53\x61\x69\x6E\x74\x20\x50\x69\x65\x72\x72\x65\x20\x4D\x69\x71\x75\x65\x6C\x6F\x6E","\x50\x4D","\x59\x65\x6D\x65\x6E","\x59\x45","\x43\x68\x69\x6E\x61","\x43\x4E","\x2E\x73\x65\x61\x72\x63\x68\x2D\x63\x6F\x75\x6E\x74\x72\x79","\x71\x75\x65\x72\x79\x53\x65\x6C\x65\x63\x74\x6F\x72","\x2E\x63\x6F\x75\x6E\x74\x72\x79\x2D\x6C\x69\x73\x74","\x2E\x63\x68\x61\x6E\x67\x65\x2D\x63\x6F\x75\x6E\x74\x72\x79","\x2E\x63\x6C\x6F\x73\x65","\x73\x65\x61\x72\x63\x68\x2D\x69\x6E\x70\x75\x74","\x67\x65\x74\x45\x6C\x65\x6D\x65\x6E\x74\x42\x79\x49\x64","\x6C\x65\x6E\x67\x74\x68","\x63\x65\x69\x6C","\x6C\x69\x73\x74\x2D","","\x69\x6E\x6E\x65\x72\x48\x54\x4D\x4C","\x3C\x75\x6C\x20\x69\x64\x3D\x27","\x27\x3E\x3C\x2F\x75\x6C\x3E","\x0D\x0A\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x3C\x6C\x69\x20\x6F\x6E\x63\x6C\x69\x63\x6B\x3D\x22\x66\x65\x74\x63\x68\x44\x61\x74\x61\x28\x27","\x6E\x61\x6D\x65","\x27\x29\x22\x20\x69\x64\x3D\x22","\x22\x3E\x0D\x0A\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20","\x0D\x0A\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x20\x3C\x2F\x6C\x69\x3E\x0D\x0A\x20\x20\x20\x20\x20\x20\x20\x20","\x66\x6F\x72\x45\x61\x63\x68","\x63\x6C\x69\x63\x6B","\x76\x61\x6C\x75\x65","\x68\x69\x64\x65","\x74\x6F\x67\x67\x6C\x65","\x63\x6C\x61\x73\x73\x4C\x69\x73\x74","\x66\x61\x64\x65\x49\x6E","\x61\x64\x64","\x61\x64\x64\x45\x76\x65\x6E\x74\x4C\x69\x73\x74\x65\x6E\x65\x72","\x69\x6E\x70\x75\x74","\x74\x6F\x55\x70\x70\x65\x72\x43\x61\x73\x65","\x73\x74\x61\x72\x74\x73\x57\x69\x74\x68","\x72\x65\x6D\x6F\x76\x65","\x2E\x63\x6F\x75\x6E\x74\x72\x79\x20\x2E\x6E\x61\x6D\x65","\x2E\x74\x6F\x74\x61\x6C\x2D\x63\x61\x73\x65\x73\x20\x2E\x76\x61\x6C\x75\x65","\x2E\x74\x6F\x74\x61\x6C\x2D\x63\x61\x73\x65\x73\x20\x2E\x6E\x65\x77\x2D\x76\x61\x6C\x75\x65","\x2E\x72\x65\x63\x6F\x76\x65\x72\x65\x64\x20\x2E\x76\x61\x6C\x75\x65","\x2E\x72\x65\x63\x6F\x76\x65\x72\x65\x64\x20\x2E\x6E\x65\x77\x2D\x76\x61\x6C\x75\x65","\x2E\x64\x65\x61\x74\x68\x73\x20\x2E\x76\x61\x6C\x75\x65","\x2E\x64\x65\x61\x74\x68\x73\x20\x2E\x6E\x65\x77\x2D\x76\x61\x6C\x75\x65","\x32\x64","\x67\x65\x74\x43\x6F\x6E\x74\x65\x78\x74","\x61\x78\x65\x73\x5F\x6C\x69\x6E\x65\x5F\x63\x68\x61\x72\x74","\x43\x6F\x75\x6E\x74\x72\x79\x20\x4E\x61\x6D\x65","\x47\x45\x54","\x66\x6F\x6C\x6C\x6F\x77","\x70\x75\x73\x68","\x74\x68\x65\x6E","\x6A\x73\x6F\x6E","\x68\x74\x74\x70\x73\x3A\x2F\x2F\x61\x70\x69\x2E\x63\x6F\x76\x69\x64\x31\x39\x61\x70\x69\x2E\x63\x6F\x6D\x2F\x74\x6F\x74\x61\x6C\x2F\x63\x6F\x75\x6E\x74\x72\x79\x2F","\x2F\x73\x74\x61\x74\x75\x73\x2F\x63\x6F\x6E\x66\x69\x72\x6D\x65\x64","\x2F\x73\x74\x61\x74\x75\x73\x2F\x72\x65\x63\x6F\x76\x65\x72\x65\x64","\x2F\x73\x74\x61\x74\x75\x73\x2F\x64\x65\x61\x74\x68\x73","\x2B","\x64\x65\x73\x74\x72\x6F\x79","\x6C\x69\x6E\x65","\x43\x61\x73\x65\x73","\x23\x46\x46\x46","\x52\x65\x63\x6F\x76\x65\x72\x65\x64","\x23\x30\x30\x39\x36\x38\x38","\x44\x65\x61\x74\x68\x73","\x23\x66\x34\x34\x33\x33\x36","\x4A\x61\x6E","\x46\x65\x62","\x4D\x61\x72","\x41\x70\x72","\x4D\x61\x79","\x4A\x75\x6E","\x41\x75\x67","\x53\x65\x70","\x4F\x63\x74","\x4E\x6F\x76","\x44\x65\x63","\x67\x65\x74\x44\x61\x74\x65","\x20","\x67\x65\x74\x4D\x6F\x6E\x74\x68","\x2E\x70\x72\x6F\x66\x69\x6C\x65\x2D\x62\x74\x6E","\x23\x63\x6C\x6F\x73\x65\x64\x65\x74\x61\x69\x6C\x73","\x2E\x64\x65\x74\x61\x69\x6C\x73\x31\x2D\x70\x61\x6E\x65\x6C\x2D\x63\x6F\x6E\x74\x61\x69\x6E\x65\x72","\x76\x69\x73\x69\x62\x6C\x65","\x2E\x66\x6C\x6F\x61\x74\x69\x6E\x67\x2D\x62\x74\x6E","\x2E\x63\x6C\x6F\x73\x65\x2D\x62\x74\x6E","\x2E\x73\x6F\x63\x69\x61\x6C\x2D\x70\x61\x6E\x65\x6C\x2D\x63\x6F\x6E\x74\x61\x69\x6E\x65\x72"];let country_list=[{name:_0x7843[0],code:_0x7843[1]},{name:_0x7843[2],code:_0x7843[3]},{name:_0x7843[4],code:_0x7843[5]},{name:_0x7843[6],code:_0x7843[7]},{name:_0x7843[8],code:_0x7843[9]},{name:_0x7843[10],code:_0x7843[11]},{name:_0x7843[12],code:_0x7843[13]},{name:_0x7843[14],code:_0x7843[15]},{name:_0x7843[16],code:_0x7843[17]},{name:_0x7843[18],code:_0x7843[19]},{name:_0x7843[20],code:_0x7843[21]},{name:_0x7843[22],code:_0x7843[23]},{name:_0x7843[24],code:_0x7843[25]},{name:_0x7843[26],code:_0x7843[27]},{name:_0x7843[28],code:_0x7843[29]},{name:_0x7843[30],code:_0x7843[31]},{name:_0x7843[32],code:_0x7843[33]},{name:_0x7843[34],code:_0x7843[35]},{name:_0x7843[36],code:_0x7843[37]},{name:_0x7843[38],code:_0x7843[39]},{name:_0x7843[40],code:_0x7843[41]},{name:_0x7843[42],code:_0x7843[43]},{name:_0x7843[44],code:_0x7843[45]},{name:_0x7843[46],code:_0x7843[47]},{name:_0x7843[48],code:_0x7843[49]},{name:_0x7843[50],code:_0x7843[51]},{name:_0x7843[52],code:_0x7843[53]},{name:_0x7843[54],code:_0x7843[55]},{name:_0x7843[56],code:_0x7843[57]},{name:_0x7843[58],code:_0x7843[59]},{name:_0x7843[60],code:_0x7843[61]},{name:_0x7843[62],code:_0x7843[63]},{name:_0x7843[64],code:_0x7843[65]},{name:_0x7843[66],code:_0x7843[67]},{name:_0x7843[68],code:_0x7843[69]},{name:_0x7843[70],code:_0x7843[71]},{name:_0x7843[72],code:_0x7843[73]},{name:_0x7843[74],code:_0x7843[75]},{name:_0x7843[76],code:_0x7843[77]},{name:_0x7843[78],code:_0x7843[79]},{name:_0x7843[80],code:_0x7843[81]},{name:_0x7843[82],code:_0x7843[83]},{name:_0x7843[84],code:_0x7843[85]},{name:_0x7843[86],code:_0x7843[87]},{name:_0x7843[88],code:_0x7843[89]},{name:_0x7843[90],code:_0x7843[91]},{name:_0x7843[92],code:_0x7843[93]},{name:_0x7843[94],code:_0x7843[95]},{name:_0x7843[96],code:_0x7843[97]},{name:_0x7843[98],code:_0x7843[99]},{name:_0x7843[100],code:_0x7843[101]},{name:_0x7843[102],code:_0x7843[103]},{name:_0x7843[104],code:_0x7843[105]},{name:_0x7843[106],code:_0x7843[107]},{name:_0x7843[108],code:_0x7843[109]},{name:_0x7843[110],code:_0x7843[111]},{name:_0x7843[112],code:_0x7843[113]},{name:_0x7843[114],code:_0x7843[115]},{name:_0x7843[116],code:_0x7843[117]},{name:_0x7843[118],code:_0x7843[119]},{name:_0x7843[120],code:_0x7843[121]},{name:_0x7843[122],code:_0x7843[123]},{name:_0x7843[124],code:_0x7843[125]},{name:_0x7843[126],code:_0x7843[127]},{name:_0x7843[128],code:_0x7843[129]},{name:_0x7843[130],code:_0x7843[131]},{name:_0x7843[132],code:_0x7843[133]},{name:_0x7843[134],code:_0x7843[135]},{name:_0x7843[136],code:_0x7843[137]},{name:_0x7843[138],code:_0x7843[139]},{name:_0x7843[140],code:_0x7843[141]},{name:_0x7843[142],code:_0x7843[143]},{name:_0x7843[144],code:_0x7843[145]},{name:_0x7843[146],code:_0x7843[147]},{name:_0x7843[148],code:_0x7843[149]},{name:_0x7843[150],code:_0x7843[151]},{name:_0x7843[152],code:_0x7843[153]},{name:_0x7843[154],code:_0x7843[155]},{name:_0x7843[156],code:_0x7843[157]},{name:_0x7843[158],code:_0x7843[159]},{name:_0x7843[160],code:_0x7843[161]},{name:_0x7843[162],code:_0x7843[163]},{name:_0x7843[164],code:_0x7843[165]},{name:_0x7843[166],code:_0x7843[167]},{name:_0x7843[168],code:_0x7843[169]},{name:_0x7843[170],code:_0x7843[171]},{name:_0x7843[172],code:_0x7843[173]},{name:_0x7843[174],code:_0x7843[175]},{name:_0x7843[176],code:_0x7843[177]},{name:_0x7843[178],code:_0x7843[179]},{name:_0x7843[180],code:_0x7843[181]},{name:_0x7843[182],code:_0x7843[183]},{name:_0x7843[184],code:_0x7843[185]},{name:_0x7843[186],code:_0x7843[187]},{name:_0x7843[188],code:_0x7843[189]},{name:_0x7843[190],code:_0x7843[191]},{name:_0x7843[192],code:_0x7843[193]},{name:_0x7843[194],code:_0x7843[195]},{name:_0x7843[196],code:_0x7843[197]},{name:_0x7843[198],code:_0x7843[199]},{name:_0x7843[200],code:_0x7843[201]},{name:_0x7843[202],code:_0x7843[203]},{name:_0x7843[204],code:_0x7843[205]},{name:_0x7843[206],code:_0x7843[207]},{name:_0x7843[208],code:_0x7843[209]},{name:_0x7843[210],code:_0x7843[211]},{name:_0x7843[212],code:_0x7843[213]},{name:_0x7843[214],code:_0x7843[215]},{name:_0x7843[216],code:_0x7843[217]},{name:_0x7843[218],code:_0x7843[219]},{name:_0x7843[220],code:_0x7843[221]},{name:_0x7843[222],code:_0x7843[223]},{name:_0x7843[224],code:_0x7843[225]},{name:_0x7843[226],code:_0x7843[227]},{name:_0x7843[228],code:_0x7843[229]},{name:_0x7843[230],code:_0x7843[231]},{name:_0x7843[232],code:_0x7843[233]},{name:_0x7843[234],code:_0x7843[235]},{name:_0x7843[236],code:_0x7843[237]},{name:_0x7843[238],code:_0x7843[239]},{name:_0x7843[240],code:_0x7843[241]},{name:_0x7843[242],code:_0x7843[243]},{name:_0x7843[244],code:_0x7843[245]},{name:_0x7843[246],code:_0x7843[247]},{name:_0x7843[248],code:_0x7843[249]},{name:_0x7843[250],code:_0x7843[251]},{name:_0x7843[252],code:_0x7843[253]},{name:_0x7843[254],code:_0x7843[255]},{name:_0x7843[256],code:_0x7843[257]},{name:_0x7843[258],code:_0x7843[259]},{name:_0x7843[260],code:_0x7843[261]},{name:_0x7843[262],code:_0x7843[263]},{name:_0x7843[264],code:_0x7843[265]},{name:_0x7843[266],code:_0x7843[267]},{name:_0x7843[268],code:_0x7843[269]},{name:_0x7843[270],code:_0x7843[271]},{name:_0x7843[272],code:_0x7843[273]},{name:_0x7843[274],code:_0x7843[275]},{name:_0x7843[276],code:_0x7843[277]},{name:_0x7843[278],code:_0x7843[279]},{name:_0x7843[280],code:_0x7843[281]},{name:_0x7843[282],code:_0x7843[283]},{name:_0x7843[284],code:_0x7843[285]},{name:_0x7843[286],code:_0x7843[287]},{name:_0x7843[288],code:_0x7843[289]},{name:_0x7843[290],code:_0x7843[291]},{name:_0x7843[292],code:_0x7843[293]},{name:_0x7843[294],code:_0x7843[295]},{name:_0x7843[296],code:_0x7843[297]},{name:_0x7843[298],code:_0x7843[299]},{name:_0x7843[300],code:_0x7843[301]},{name:_0x7843[302],code:_0x7843[303]},{name:_0x7843[304],code:_0x7843[305]},{name:_0x7843[306],code:_0x7843[307]},{name:_0x7843[308],code:_0x7843[309]},{name:_0x7843[310],code:_0x7843[311]},{name:_0x7843[312],code:_0x7843[313]},{name:_0x7843[314],code:_0x7843[315]},{name:_0x7843[316],code:_0x7843[317]},{name:_0x7843[318],code:_0x7843[319]},{name:_0x7843[320],code:_0x7843[321]},{name:_0x7843[322],code:_0x7843[323]},{name:_0x7843[324],code:_0x7843[325]},{name:_0x7843[326],code:_0x7843[327]},{name:_0x7843[328],code:_0x7843[329]},{name:_0x7843[330],code:_0x7843[331]},{name:_0x7843[332],code:_0x7843[333]},{name:_0x7843[334],code:_0x7843[335]},{name:_0x7843[336],code:_0x7843[337]},{name:_0x7843[338],code:_0x7843[339]},{name:_0x7843[340],code:_0x7843[341]},{name:_0x7843[342],code:_0x7843[343]},{name:_0x7843[344],code:_0x7843[345]},{name:_0x7843[346],code:_0x7843[347]},{name:_0x7843[348],code:_0x7843[349]},{name:_0x7843[350],code:_0x7843[351]},{name:_0x7843[352],code:_0x7843[353]},{name:_0x7843[354],code:_0x7843[355]},{name:_0x7843[356],code:_0x7843[357]},{name:_0x7843[358],code:_0x7843[359]},{name:_0x7843[360],code:_0x7843[361]},{name:_0x7843[362],code:_0x7843[363]},{name:_0x7843[364],code:_0x7843[365]},{name:_0x7843[366],code:_0x7843[367]},{name:_0x7843[368],code:_0x7843[369]},{name:_0x7843[370],code:_0x7843[371]},{name:_0x7843[372],code:_0x7843[373]},{name:_0x7843[374],code:_0x7843[375]},{name:_0x7843[376],code:_0x7843[377]},{name:_0x7843[378],code:_0x7843[379]},{name:_0x7843[380],code:_0x7843[381]},{name:_0x7843[382],code:_0x7843[383]},{name:_0x7843[384],code:_0x7843[385]},{name:_0x7843[386],code:_0x7843[387]},{name:_0x7843[388],code:_0x7843[389]},{name:_0x7843[390],code:_0x7843[391]},{name:_0x7843[392],code:_0x7843[393]},{name:_0x7843[394],code:_0x7843[395]},{name:_0x7843[396],code:_0x7843[285]},{name:_0x7843[397],code:_0x7843[398]},{name:_0x7843[399],code:_0x7843[400]},{name:_0x7843[401],code:_0x7843[402]},{name:_0x7843[403],code:_0x7843[404]}];const search_country_element=document[_0x7843[406]](_0x7843[405]);const country_list_element=document[_0x7843[406]](_0x7843[407]);const chang_country_btn=document[_0x7843[406]](_0x7843[408]);const close_list_btn=document[_0x7843[406]](_0x7843[409]);const input=document[_0x7843[411]](_0x7843[410]);function createCountryList(){const _0x31c6x8=country_list[_0x7843[412]];let _0x31c6x9=0,_0x31c6xa;country_list[_0x7843[424]]((_0x31c6xb,_0x31c6xc)=>{if(_0x31c6xc% Math[_0x7843[413]](_0x31c6x8/ num_of_ul_lists)== 0){_0x31c6xa= `${_0x7843[414]}${_0x31c6x9}${_0x7843[415]}`;country_list_element[_0x7843[416]]+= `${_0x7843[417]}${_0x31c6xa}${_0x7843[418]}`;_0x31c6x9++};document[_0x7843[411]](`${_0x7843[415]}${_0x31c6xa}${_0x7843[415]}`)[_0x7843[416]]+= `${_0x7843[419]}${_0x31c6xb[_0x7843[420]]}${_0x7843[421]}${_0x31c6xb[_0x7843[420]]}${_0x7843[422]}${_0x31c6xb[_0x7843[420]]}${_0x7843[423]}`})}let num_of_ul_lists=3;createCountryList();chang_country_btn[_0x7843[432]](_0x7843[425],function(){input[_0x7843[426]]= _0x7843[415];resetCountryList();search_country_element[_0x7843[429]][_0x7843[428]](_0x7843[427]);search_country_element[_0x7843[429]][_0x7843[431]](_0x7843[430])});close_list_btn[_0x7843[432]](_0x7843[425],function(){search_country_element[_0x7843[429]][_0x7843[428]](_0x7843[427])});country_list_element[_0x7843[432]](_0x7843[425],function(){search_country_element[_0x7843[429]][_0x7843[428]](_0x7843[427])});input[_0x7843[432]](_0x7843[433],function(){let _0x31c6xe=input[_0x7843[426]][_0x7843[434]]();country_list[_0x7843[424]]((_0x31c6xb)=>{if(_0x31c6xb[_0x7843[420]][_0x7843[434]]()[_0x7843[435]](_0x31c6xe)){document[_0x7843[411]](_0x31c6xb[_0x7843[420]])[_0x7843[429]][_0x7843[436]](_0x7843[427])}else {document[_0x7843[411]](_0x31c6xb[_0x7843[420]])[_0x7843[429]][_0x7843[431]](_0x7843[427])}})});function resetCountryList(){country_list[_0x7843[424]]((_0x31c6xb)=>{document[_0x7843[411]](_0x31c6xb[_0x7843[420]])[_0x7843[429]][_0x7843[436]](_0x7843[427])})}const country_name_element=document[_0x7843[406]](_0x7843[437]);const total_cases_element=document[_0x7843[406]](_0x7843[438]);const new_cases_element=document[_0x7843[406]](_0x7843[439]);const recovered_element=document[_0x7843[406]](_0x7843[440]);const new_recovered_element=document[_0x7843[406]](_0x7843[441]);const deaths_element=document[_0x7843[406]](_0x7843[442]);const new_deaths_element=document[_0x7843[406]](_0x7843[443]);const ctx=document[_0x7843[411]](_0x7843[446])[_0x7843[445]](_0x7843[444]);let app_data=[],cases_list=[],recovered_list=[],deaths_list=[],deaths=[],formatedDates=[];let user_country;function fetchData(_0x31c6xb){user_country= _0x31c6xb;country_name_element[_0x7843[416]]= _0x7843[447];(cases_list= []),(recovered_list= []),(deaths_list= []),(dates= []),(formatedDates= []);var _0x31c6x20={method:_0x7843[448],redirect:_0x7843[449]};const _0x31c6x21=async (_0x31c6xb)=>{ await fetch(_0x7843[453]+ _0x31c6xb+ _0x7843[454],_0x31c6x20)[_0x7843[451]]((_0x31c6x24)=>{return _0x31c6x24[_0x7843[452]]()})[_0x7843[451]]((_0x31c6x22)=>{_0x31c6x22[_0x7843[424]]((_0x31c6x23)=>{dates[_0x7843[450]](_0x31c6x23.Date);cases_list[_0x7843[450]](_0x31c6x23.Cases)})}); await fetch(_0x7843[453]+ _0x31c6xb+ _0x7843[455],_0x31c6x20)[_0x7843[451]]((_0x31c6x24)=>{return _0x31c6x24[_0x7843[452]]()})[_0x7843[451]]((_0x31c6x22)=>{_0x31c6x22[_0x7843[424]]((_0x31c6x23)=>{recovered_list[_0x7843[450]](_0x31c6x23.Cases)})}); await fetch(_0x7843[453]+ _0x31c6xb+ _0x7843[456],_0x31c6x20)[_0x7843[451]]((_0x31c6x24)=>{return _0x31c6x24[_0x7843[452]]()})[_0x7843[451]]((_0x31c6x22)=>{_0x31c6x22[_0x7843[424]]((_0x31c6x23)=>{deaths_list[_0x7843[450]](_0x31c6x23.Cases)})});updateUI()};_0x31c6x21(_0x31c6xb)}fetchData(user_country);function updateUI(){updateStats();axesLinearChart()}function updateStats(){const _0x31c6x27=cases_list[cases_list[_0x7843[412]]- 1];const _0x31c6x28=_0x31c6x27- cases_list[cases_list[_0x7843[412]]- 2];const _0x31c6x29=recovered_list[recovered_list[_0x7843[412]]- 1];const _0x31c6x2a=_0x31c6x29- recovered_list[recovered_list[_0x7843[412]]- 2];const _0x31c6x2b=deaths_list[deaths_list[_0x7843[412]]- 1];const _0x31c6x2c=_0x31c6x2b- deaths_list[deaths_list[_0x7843[412]]- 2];country_name_element[_0x7843[416]]= user_country;total_cases_element[_0x7843[416]]= _0x31c6x27;new_cases_element[_0x7843[416]]= `${_0x7843[457]}${_0x31c6x28}${_0x7843[415]}`;recovered_element[_0x7843[416]]= _0x31c6x29;new_recovered_element[_0x7843[416]]= `${_0x7843[457]}${_0x31c6x2a}${_0x7843[415]}`;deaths_element[_0x7843[416]]= _0x31c6x2b;new_deaths_element[_0x7843[416]]= `${_0x7843[457]}${_0x31c6x2c}${_0x7843[415]}`;dates[_0x7843[424]]((_0x31c6x2d)=>{formatedDates[_0x7843[450]](formatDate(_0x31c6x2d))})}let my_chart;function axesLinearChart(){if(my_chart){my_chart[_0x7843[458]]()};my_chart=  new Chart(ctx,{type:_0x7843[459],data:{datasets:[{label:_0x7843[460],data:cases_list,fill:false,borderColor:_0x7843[461],backgroundColor:_0x7843[461],borderWidth:1},{label:_0x7843[462],data:recovered_list,fill:false,borderColor:_0x7843[463],backgroundColor:_0x7843[463],borderWidth:1},{label:_0x7843[464],data:deaths_list,fill:false,borderColor:_0x7843[465],backgroundColor:_0x7843[465],borderWidth:1}],labels:formatedDates},options:{responsive:true,maintainAspectRatio:false}})}const monthsNames=[_0x7843[466],_0x7843[467],_0x7843[468],_0x7843[469],_0x7843[470],_0x7843[471],_0x7843[472],_0x7843[473],_0x7843[474],_0x7843[475],_0x7843[476]];function formatDate(_0x31c6x32){let _0x31c6x2d= new Date(_0x31c6x32);return `${_0x7843[415]}${_0x31c6x2d[_0x7843[477]]()}${_0x7843[478]}${monthsNames[_0x31c6x2d[_0x7843[479]]()- 1]}${_0x7843[415]}`}const profile_btn=document[_0x7843[406]](_0x7843[480]);const closedetails_btn=document[_0x7843[406]](_0x7843[481]);const details1_panel_container=document[_0x7843[406]](_0x7843[482]);profile_btn[_0x7843[432]](_0x7843[425],()=>{details1_panel_container[_0x7843[429]][_0x7843[428]](_0x7843[483])});closedetails_btn[_0x7843[432]](_0x7843[425],()=>{details1_panel_container[_0x7843[429]][_0x7843[436]](_0x7843[483])});const floating_btn=document[_0x7843[406]](_0x7843[484]);const close_btn=document[_0x7843[406]](_0x7843[485]);const social_panel_container=document[_0x7843[406]](_0x7843[486]);floating_btn[_0x7843[432]](_0x7843[425],()=>{social_panel_container[_0x7843[429]][_0x7843[428]](_0x7843[483])});close_btn[_0x7843[432]](_0x7843[425],()=>{social_panel_container[_0x7843[429]][_0x7843[436]](_0x7843[483])})
    
</script>
  </body>
</html>
