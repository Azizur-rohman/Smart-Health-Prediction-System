<?php
$host = "localhost";
    $dbUsername = "Your username";
    $dbPassword = "";
    $dbname = "Your databasename";
    //create connection
    $conn = new mysqli($host,$dbUsername, $dbPassword, $dbname);
    if(!isset($_GET["code"])){
           echo("<script>
      alert('Can,t find page..!!')
        window.location.href='patientforgotpass.php'
       </script>");
    }else
    {
    $code = $_GET["code"];
    
    $SELECT = "SELECT Email,code From resetPassword Where code ='$code'";
    $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
        echo("<script>
      alert('Can,t find page..!!')
        window.location.href='patientforgotpass.php'
       </script>");
    }
    
    if(isset($_POST['submit'])){
        $password = $_POST["user_password"];
         $host = "localhost";
    $dbUsername = "Your username";
    $dbPassword = "";
    $dbname = "Your databasename";
    //create connection
    $conn = new mysqli($host,$dbUsername, $dbPassword, $dbname);
    $SELECT = "SELECT Email,code From resetPassword Where code ='$code'";
    $result = $conn->query($SELECT);
       $row = $result->fetch_assoc();
        $email = $row["Email"];
        $salted = "3456#$$%sasnfhgkqwlrnvdggbajcn" .$password. "#$2353dgdsgdf@*&";
        $hashed = hash('sha512', $salted);
        $update = "UPDATE register SET user_password='$hashed' WHERE
        Email='$email'";
        $stmt = $conn->prepare($update);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     if ($stmt) {
         $q = "DELETE FROM `resetPassword` WHERE code='$code'" ;
            if($conn->query($q))
            {
            	echo("<script>
                  alert('Password Updated')
                    window.location.href='patientlogin.php'
                   </script>");
            }
        
    }else{
        echo("<script>
      alert('Something went wrong..!!')
        window.location.href='patientforgotpass.php'
       </script>");
    }
       
    }
    
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Registration Form</title>
  <link rel="shortcut icon" type="image/png" href="Image/ninjaapple.png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="" />
   <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <style type="text/css">
  
@import "css/patientresetpass.css";
 
  </style>
</head>
<body>
  
  
<div class="container">
	<div class="header">
		<h2><b>Reset Password</b></h2>
	</div>
	<form onsubmit="return validation()" class="form" method="POST" >
		<div class="form-control">
			<label for="username">Password</label>
			<input class="input" name="user_password" type="password" placeholder="Enter Password" id="password" data-toggle="password"/>
			<div class="input-group-append">
      <span class="input-group-text"><i  class="fa fa-eye"></i></span>
    </div>
        <i id="circle" class="fas fa-check-circle"></i>
			<i id="circle1" class="fas fa-exclamation-circle"></i>
			<small style="margin-top: -73px">Error message</small>
		</div>
				<div class="form-control">
			<label for="username">Confirm Password:</label>
			<input class="input" type="password" data-toggle="password" placeholder="Enter Re-Password" id="password2"/>
			<div class="input-group-append">
      <span class="input-group-text"><i  class="fa fa-eye"></i></span>
    </div>
         <i id="circle" class="fas fa-check-circle"></i>
			<i id="circle1" class="fas fa-exclamation-circle"></i>
			<small>Error message</small>
		</div>
      
      <button class="btn" name="submit">Submit</button>
      
    
	</form>
</div>

  <script type="text/javascript">

  var _0x8e2a=["\x6F\x6E\x6C\x6F\x61\x64","\x6A\x51\x75\x65\x72\x79","\x2E\x69\x6E\x70\x75\x74\x2D\x67\x72\x6F\x75\x70\x2D\x74\x65\x78\x74","\x66\x69\x6E\x64","\x70\x61\x72\x65\x6E\x74","\x69\x6E\x70\x75\x74\x2D\x70\x61\x73\x73\x77\x6F\x72\x64\x2D\x68\x69\x64\x65","\x61\x64\x64\x43\x6C\x61\x73\x73","\x63\x75\x72\x73\x6F\x72","\x70\x6F\x69\x6E\x74\x65\x72","\x63\x73\x73","\x63\x6C\x69\x63\x6B","\x68\x61\x73\x43\x6C\x61\x73\x73","\x69\x6E\x70\x75\x74\x2D\x70\x61\x73\x73\x77\x6F\x72\x64\x2D\x73\x68\x6F\x77","\x72\x65\x6D\x6F\x76\x65\x43\x6C\x61\x73\x73","\x66\x61\x2D\x65\x79\x65\x2D\x73\x6C\x61\x73\x68","\x66\x61\x2D\x65\x79\x65","\x2E\x66\x61","\x74\x79\x70\x65","\x74\x65\x78\x74","\x61\x74\x74\x72","\x70\x61\x73\x73\x77\x6F\x72\x64","\x6F\x6E","\x65\x61\x63\x68","\x5B\x64\x61\x74\x61\x2D\x74\x6F\x67\x67\x6C\x65\x3D\x22\x70\x61\x73\x73\x77\x6F\x72\x64\x22\x5D","\x67\x65\x74\x45\x6C\x65\x6D\x65\x6E\x74\x42\x79\x49\x64","\x70\x61\x73\x73\x77\x6F\x72\x64\x32","\x74\x72\x69\x6D","\x76\x61\x6C\x75\x65","","\x50\x61\x73\x73\x77\x6F\x72\x64\x20\x63\x61\x6E\x6E\x6F\x74\x20\x62\x65\x20\x62\x6C\x61\x6E\x6B","\x6C\x65\x6E\x67\x74\x68","\x50\x61\x73\x73\x77\x6F\x72\x64\x20\x6D\x75\x73\x74\x20\x62\x65\x20\x61\x74\x20\x6C\x65\x61\x73\x74\x20\x38\x20\x63\x68\x61\x72\x61\x63\x74\x65\x72\x73","\x50\x61\x73\x73\x77\x6F\x72\x64\x32\x20\x63\x61\x6E\x6E\x6F\x74\x20\x62\x65\x20\x62\x6C\x61\x6E\x6B","\x50\x61\x73\x73\x77\x6F\x72\x64\x73\x20\x64\x6F\x65\x73\x20\x6E\x6F\x74\x20\x6D\x61\x74\x63\x68","\x70\x61\x72\x65\x6E\x74\x45\x6C\x65\x6D\x65\x6E\x74","\x73\x6D\x61\x6C\x6C","\x71\x75\x65\x72\x79\x53\x65\x6C\x65\x63\x74\x6F\x72","\x63\x6C\x61\x73\x73\x4E\x61\x6D\x65","\x66\x6F\x72\x6D\x2D\x63\x6F\x6E\x74\x72\x6F\x6C\x20\x65\x72\x72\x6F\x72","\x69\x6E\x6E\x65\x72\x54\x65\x78\x74","\x66\x6F\x72\x6D\x2D\x63\x6F\x6E\x74\x72\x6F\x6C\x20\x73\x75\x63\x63\x65\x73\x73"];window[_0x8e2a[0]]= function(){!function(_0xb155x1){_0xb155x1(function(){_0xb155x1(_0x8e2a[23])[_0x8e2a[22]](function(){var _0xb155x2=_0xb155x1(this);var _0xb155x3=_0xb155x1(this)[_0x8e2a[4]]()[_0x8e2a[3]](_0x8e2a[2]);_0xb155x3[_0x8e2a[9]](_0x8e2a[7],_0x8e2a[8])[_0x8e2a[6]](_0x8e2a[5]);_0xb155x3[_0x8e2a[21]](_0x8e2a[10],function(){if(_0xb155x3[_0x8e2a[11]](_0x8e2a[5])){_0xb155x3[_0x8e2a[13]](_0x8e2a[5])[_0x8e2a[6]](_0x8e2a[12]);_0xb155x3[_0x8e2a[3]](_0x8e2a[16])[_0x8e2a[13]](_0x8e2a[15])[_0x8e2a[6]](_0x8e2a[14]);_0xb155x2[_0x8e2a[19]](_0x8e2a[17],_0x8e2a[18])}else {_0xb155x3[_0x8e2a[13]](_0x8e2a[12])[_0x8e2a[6]](_0x8e2a[5]);_0xb155x3[_0x8e2a[3]](_0x8e2a[16])[_0x8e2a[13]](_0x8e2a[14])[_0x8e2a[6]](_0x8e2a[15]);_0xb155x2[_0x8e2a[19]](_0x8e2a[17],_0x8e2a[20])}})})})}(window[_0x8e2a[1]])};const password=document[_0x8e2a[24]](_0x8e2a[20]);const password2=document[_0x8e2a[24]](_0x8e2a[25]);function validation(){const _0xb155x7=password[_0x8e2a[27]][_0x8e2a[26]]();const _0xb155x8=password2[_0x8e2a[27]][_0x8e2a[26]]();if(_0xb155x7=== _0x8e2a[28]){setErrorFor(password,_0x8e2a[29]);return false}else {if(_0xb155x7[_0x8e2a[30]]< 8){setErrorFor(password,_0x8e2a[31]);return false}else {setSuccessFor(password)}};if(_0xb155x8=== _0x8e2a[28]){setErrorFor(password2,_0x8e2a[32]);return false}else {if(_0xb155x7!== _0xb155x8){setErrorFor(password2,_0x8e2a[33]);return false}else {setSuccessFor(password2)}}}function setErrorFor(_0xb155xa,_0xb155xb){const _0xb155xc=_0xb155xa[_0x8e2a[34]];const _0xb155xd=_0xb155xc[_0x8e2a[36]](_0x8e2a[35]);_0xb155xc[_0x8e2a[37]]= _0x8e2a[38];_0xb155xd[_0x8e2a[39]]= _0xb155xb}function setSuccessFor(_0xb155xa){const _0xb155xc=_0xb155xa[_0x8e2a[34]];_0xb155xc[_0x8e2a[37]]= _0x8e2a[40]}

 </script>

</body>
</html>

