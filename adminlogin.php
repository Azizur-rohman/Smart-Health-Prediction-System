<?php
session_start();

if(isset($_POST['submit'])){

$email = $_POST['Email'];
$password = $_POST['user_password'];

if (!empty($email) || !empty($password)) {
 $host = "localhost";
$dbUsername = "Your username";
$dbPassword = "";
$dbname = "Your databasename";
    //create connection
    $conn = new mysqli($host,$dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT * From register Where Email = '$email' AND user_password= '$password' ";
     $stmt = $conn->prepare($SELECT);
     
     $stmt->execute();
     
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==1) {
        $_SESSION['Email']=$email;
        header('location:adminpatientlistpage.php');     
         
         
     } else {
         
       echo ("<script>
      alert('The email or password you entered is incorrect')
      window.location.href='adminlogin.php'
       </script>");
      
     }
     
    }
} else {
 echo "All field are required";
 die();
}
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login Form</title>
  <link rel="shortcut icon" type="image/png" href="Image/ninjaapple.png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="" />
   <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <style type="text/css">
  
@import "css/adminlogin.css";
 
  </style>
</head>
<body>
  
  
<div class="container">
	<div class="header">
		<h2><b>LOGIN FORM</b></h2>
	</div>
	<form class="form" method="POST" 
	action="adminlogin.php" enctype="multipart/form-data">
		
		<div class="form-control">
			<label for="username">Email</label>
			<input class="input" name="Email" type="email" placeholder="Enter Your Email" id="email" autocomplete="off" required/>
		</div>
		<div class="form-control">
			<label for="username">Password</label>
			<input class="input" name="user_password" type="password" placeholder="Enter Password" id="password" data-toggle="password" required/>
			<div class="input-group-append">
      <span class="input-group-text"><i  class="fa fa-eye"></i></span>
    </div>
		</div>
      
      <button class="btn" name="submit">Login</button>
      
    
	</form>
	<a href="index.html" class="button">Back</a>
</div>

  <script type="text/javascript">

var _0x362b=["\x6F\x6E\x6C\x6F\x61\x64","\x6A\x51\x75\x65\x72\x79","\x2E\x69\x6E\x70\x75\x74\x2D\x67\x72\x6F\x75\x70\x2D\x74\x65\x78\x74","\x66\x69\x6E\x64","\x70\x61\x72\x65\x6E\x74","\x69\x6E\x70\x75\x74\x2D\x70\x61\x73\x73\x77\x6F\x72\x64\x2D\x68\x69\x64\x65","\x61\x64\x64\x43\x6C\x61\x73\x73","\x63\x75\x72\x73\x6F\x72","\x70\x6F\x69\x6E\x74\x65\x72","\x63\x73\x73","\x63\x6C\x69\x63\x6B","\x68\x61\x73\x43\x6C\x61\x73\x73","\x69\x6E\x70\x75\x74\x2D\x70\x61\x73\x73\x77\x6F\x72\x64\x2D\x73\x68\x6F\x77","\x72\x65\x6D\x6F\x76\x65\x43\x6C\x61\x73\x73","\x66\x61\x2D\x65\x79\x65\x2D\x73\x6C\x61\x73\x68","\x66\x61\x2D\x65\x79\x65","\x2E\x66\x61","\x74\x79\x70\x65","\x74\x65\x78\x74","\x61\x74\x74\x72","\x70\x61\x73\x73\x77\x6F\x72\x64","\x6F\x6E","\x65\x61\x63\x68","\x5B\x64\x61\x74\x61\x2D\x74\x6F\x67\x67\x6C\x65\x3D\x22\x70\x61\x73\x73\x77\x6F\x72\x64\x22\x5D"];window[_0x362b[0]]= function(){!function(_0xfa2bx1){_0xfa2bx1(function(){_0xfa2bx1(_0x362b[23])[_0x362b[22]](function(){var _0xfa2bx2=_0xfa2bx1(this);var _0xfa2bx3=_0xfa2bx1(this)[_0x362b[4]]()[_0x362b[3]](_0x362b[2]);_0xfa2bx3[_0x362b[9]](_0x362b[7],_0x362b[8])[_0x362b[6]](_0x362b[5]);_0xfa2bx3[_0x362b[21]](_0x362b[10],function(){if(_0xfa2bx3[_0x362b[11]](_0x362b[5])){_0xfa2bx3[_0x362b[13]](_0x362b[5])[_0x362b[6]](_0x362b[12]);_0xfa2bx3[_0x362b[3]](_0x362b[16])[_0x362b[13]](_0x362b[15])[_0x362b[6]](_0x362b[14]);_0xfa2bx2[_0x362b[19]](_0x362b[17],_0x362b[18])}else {_0xfa2bx3[_0x362b[13]](_0x362b[12])[_0x362b[6]](_0x362b[5]);_0xfa2bx3[_0x362b[3]](_0x362b[16])[_0x362b[13]](_0x362b[14])[_0x362b[6]](_0x362b[15]);_0xfa2bx2[_0x362b[19]](_0x362b[17],_0x362b[20])}})})})}(window[_0x362b[1]])}

 </script>

</body>
</html>