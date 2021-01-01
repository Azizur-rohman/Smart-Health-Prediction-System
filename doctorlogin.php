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
     $salted = "3456#$$%sasnfhgkqwlrnvdggbajcn" .$password. "#$2353dgdsgdf@*&";
     $hashed = hash('sha512', $salted);
     $SELECT = "SELECT * From register Where Email = '$email' AND user_password= '$hashed' ";
     $stmt = $conn->prepare($SELECT);
     
     $stmt->execute();
     
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==1) {
         
    $host = "localhost";
    $dbUsername = "Your username";
    $dbPassword = "";
    $dbname = "Your databasename";
    //create connection
    $conn = new mysqli($host,$dbUsername, $dbPassword, $dbname);
    
    $sql = "SELECT * From register Where Email = '$email' AND user_password= '$hashed' ";
    
    $result = mysqli_query($conn, $sql);
        
        $row = mysqli_fetch_assoc($result);
        
        $verify = $row['verify'];
        
        $email = $row['Email'];
        
        $date = $row['Date_and_Time'];
        
        $date = STRTOTIME($date);
        
        $time = date('d M Y H:i:s',$date);
         
        if($verify == 1){ 
         
        $_SESSION['Email']=$email;
        
                $host = "localhost";
    $dbUsername = "Your username";
    $dbPassword = "";
    $dbname = "Your databasename";
    //create connection
    $conn = new mysqli($host,$dbUsername, $dbPassword, $dbname);

         	  $sql = "SELECT user_id,FirstName,LastName,Email,user_password,File,date FROM  user  WHERE  Email = '$email'";

                $result = mysqli_query($conn, $sql);
                
                while($row = mysqli_fetch_assoc($result))
                {
                    $_SESSION['user_id'] = $row['user_id'];
                    
                    $_SESSION['FirstName'] = $row['FirstName']; 
        
                    $_SESSION['LastName'] = $row['LastName'];
        
                     header('location:doctorpage.php');
                }
                
        }else if($verify == 2){
            
            echo ("<script>
      alert('This account has been dismissed.Please registration again and provide actual certificate.')
      window.location.href='doctorlogin.php'
       </script>");
            
        }else{
            
            echo ("<script>
      alert('This account has not yet been verified.Please check your gmail account.  An email was sent to $email on $time')
      window.location.href='doctorlogin.php'
       </script>");
            
        }
        
     } else {
       echo ("<script>
      alert('The email or password you entered is incorrect')
      window.location.href='doctorlogin.php'
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
  
@import "css/doctorlogin.css";
 
  </style>
</head>
<body>
  
  
<div class="container">
	<div class="header">
		<h2><b>LOGIN FORM</b></h2>
	</div>
	<form  class="form" method="POST" 
	action="" enctype="multipart/form-data">
		
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
	  <div class="R">
      <p >Not registered yet?<a href="doctorregister.php"><b class="btag1"> Register Here</b></p></a>
      <p style="text-align: center;"><a href="doctorforgotpass.php"><b class="btag2">Forgot Password</b></p></a>
      </div>
	<a href="index.html" class="button">Back</a>
</div>

  <script type="text/javascript">

var _0x115f=["\x6F\x6E\x6C\x6F\x61\x64","\x6A\x51\x75\x65\x72\x79","\x2E\x69\x6E\x70\x75\x74\x2D\x67\x72\x6F\x75\x70\x2D\x74\x65\x78\x74","\x66\x69\x6E\x64","\x70\x61\x72\x65\x6E\x74","\x69\x6E\x70\x75\x74\x2D\x70\x61\x73\x73\x77\x6F\x72\x64\x2D\x68\x69\x64\x65","\x61\x64\x64\x43\x6C\x61\x73\x73","\x63\x75\x72\x73\x6F\x72","\x70\x6F\x69\x6E\x74\x65\x72","\x63\x73\x73","\x63\x6C\x69\x63\x6B","\x68\x61\x73\x43\x6C\x61\x73\x73","\x69\x6E\x70\x75\x74\x2D\x70\x61\x73\x73\x77\x6F\x72\x64\x2D\x73\x68\x6F\x77","\x72\x65\x6D\x6F\x76\x65\x43\x6C\x61\x73\x73","\x66\x61\x2D\x65\x79\x65\x2D\x73\x6C\x61\x73\x68","\x66\x61\x2D\x65\x79\x65","\x2E\x66\x61","\x74\x79\x70\x65","\x74\x65\x78\x74","\x61\x74\x74\x72","\x70\x61\x73\x73\x77\x6F\x72\x64","\x6F\x6E","\x65\x61\x63\x68","\x5B\x64\x61\x74\x61\x2D\x74\x6F\x67\x67\x6C\x65\x3D\x22\x70\x61\x73\x73\x77\x6F\x72\x64\x22\x5D"];window[_0x115f[0]]= function(){!function(_0x63d3x1){_0x63d3x1(function(){_0x63d3x1(_0x115f[23])[_0x115f[22]](function(){var _0x63d3x2=_0x63d3x1(this);var _0x63d3x3=_0x63d3x1(this)[_0x115f[4]]()[_0x115f[3]](_0x115f[2]);_0x63d3x3[_0x115f[9]](_0x115f[7],_0x115f[8])[_0x115f[6]](_0x115f[5]);_0x63d3x3[_0x115f[21]](_0x115f[10],function(){if(_0x63d3x3[_0x115f[11]](_0x115f[5])){_0x63d3x3[_0x115f[13]](_0x115f[5])[_0x115f[6]](_0x115f[12]);_0x63d3x3[_0x115f[3]](_0x115f[16])[_0x115f[13]](_0x115f[15])[_0x115f[6]](_0x115f[14]);_0x63d3x2[_0x115f[19]](_0x115f[17],_0x115f[18])}else {_0x63d3x3[_0x115f[13]](_0x115f[12])[_0x115f[6]](_0x115f[5]);_0x63d3x3[_0x115f[3]](_0x115f[16])[_0x115f[13]](_0x115f[14])[_0x115f[6]](_0x115f[15]);_0x63d3x2[_0x115f[19]](_0x115f[17],_0x115f[20])}})})})}(window[_0x115f[1]])}

 </script>

</body>
</html>

