<!DOCTYPE html>
<html>
<head>
  <title>Forgot password Form</title>
  <link rel="shortcut icon" type="image/png" href="Image/ninjaapple.png">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="" />
   <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://smtpjs.com/v3/smtp.js">
</script>
  <style type="text/css">
  
@import "css/patientforgotpass.css";
 
  </style>
</head>
<body>
  
  
<div class="container">
	<div class="header">
		<h2><b>Recover Password</b></h2>
	</div>
	<form class="form" method="POST" >
		<div class="form-control">
				<div style="text-align: center;">
						<p>Please enter your email account so we can assist you in recovering your account</p>
					</div>
		</div>
		
		<div class="form-control">
			<label for="username">Email</label>
			<input class="input" name="Email" type="email" placeholder="Enter Your Email" id="email" autocomplete="off" required/>
		</div>
		
      
      <button class="btn" name="submit">Recover My Password</button>
      
    
	</form>
	<a href="patientlogin.php" class="button">Back</a>
</div>

<?php
if(isset($_POST['submit'])){
    $email = $_POST["Email"];
$host = "localhost";
$dbUsername = "Your username";
$dbPassword = "";
$dbname = "Your databasename";
    //create connection
    $conn = new mysqli($host,$dbUsername, $dbPassword, $dbname);
    $SELECT = "SELECT Email From register Where Email ='$email'";
    $result = $conn->query($SELECT);
       $row = $result->fetch_assoc();
       if($row){
    
    $code = uniqid(true);
  $SELECT = "SELECT email From resetPassword Where email = ? Limit 1";  
$query="INSERT Into resetPassword (code, Email) values (?, ?)";

     if(!$query){
         echo("<script>
      alert('Something went wrong..!!')
        window.location.href='patientforgotpass.php'
       </script>");
     }else{
      $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($query);
      $stmt->bind_param("ss", $code, $email);
      $stmt->execute();
      $url = "https://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]). "/patientresetpass.php?code=$code";
      $ht = "<h1>You Requested a Password Reset</h1><h3> 📣Click <a href='$url'>👉This Link👈</a> to do so</h3>";
      ?>
      
                <script type="text/javascript"> 
            	
              Email.send({
                SecureToken : "Your Token Number",
                To : '<?php print_r($email); ?>',
                From : "your@domain.com",
                Subject : "RESET FORGOT PASSWORD",
                Body : " <?php print_r($ht); ?> "
            })
           
            </script>
         <?php echo ("<script>
      alert('Password reset link has been sent,Please check your gmail account to reset your password')
      window.location.href='patientlogin.php'
       </script>"); ?>
      
      <?php
      
     } else {
          $host = "localhost";
    $dbUsername = "Your username";
    $dbPassword = "";
    $dbname = "Your databasename";
    //create connection
    $conn = new mysqli($host,$dbUsername, $dbPassword, $dbname);
    $SELECT = "SELECT Email,code From resetPassword Where Email ='$email'";
    $result = $conn->query($SELECT);
       $row = $result->fetch_assoc();
        $code = $row["code"];
        $url = "https://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]). "/patientresetpass.php?code=$code";
        $ht = "<h1>You Requested a Password Reset</h1><h3> 📣Click <a href='$url'>👉This Link👈</a> to do so</h3>";
           ?>
      
                <script type="text/javascript"> 
            	
              Email.send({
                SecureToken : "Your Token Number",
                To : '<?php print_r($email); ?>',
                From : "your@domain.com",
                Subject : "RESET FORGOT PASSWORD",
                Body : "<?php print_r($ht); ?> "
            })
           
            </script>
         <?php echo ("<script>
      alert('Password reset link has been sent,Please check your gmail account to reset your password')
      window.location.href='patientlogin.php'
       </script>"); ?>
      
      <?php
         
      
     }
     
     }
     
       }else{
       
       
       echo("<script>
      alert('Your entered email is not registered..!!')
        window.location.href='patientforgotpass.php'
       </script>");
       }
}

?>

</body>
</html>


