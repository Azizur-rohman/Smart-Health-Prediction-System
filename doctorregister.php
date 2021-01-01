<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration Form</title>
  <link rel="shortcut icon" type="image/png" href="Image/ninjaapple.png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://smtpjs.com/v3/smtp.js">
</script>
  <style type="text/css">

  @import "css/doctorregister.css";

  </style>
</head>
<body>
  
  
<div class="container">
	<div class="header">
		<h2>Create Account</h2>
	</div>
	<form onsubmit="return validation()" class="form" method="POST" action="" enctype="multipart/form-data">
		<div class="form-control">
			<label for="username">FirstName:</label>
			<input class="input" name="FirstName" type="text" placeholder="Enter Your FirstName" id="firstname" autocomplete="off"/>
			<i id="circle" class="fas fa-check-circle"></i>
			<i id="circle1" class="fas fa-exclamation-circle"></i>
			<small>Error message</small>
		</div>
		<div class="form-control">
			<label for="username">LastName:</label>
			<input class="input" name="LastName" type="text" placeholder="Enter Your LastName" id="lastname" autocomplete="off"/>
			<i id="circle" class="fas fa-check-circle"></i>
			<i id="circle1" class="fas fa-exclamation-circle"></i>
			<small>Error message</small>
		</div>
		<div class="form-control">
			<label for="username">Country:</label>
			<input class="input" name="Country" type="text" placeholder="Enter Your Country Name" id="country" autocomplete="off"/>
			<i id="circle" class="fas fa-check-circle"></i>
			<i id="circle1" class="fas fa-exclamation-circle"></i>
			<small>Error message</small>
		</div>
		<div class="form-control">
			<label for="username">Field:</label>
			<input class="input" name="Field" type="text" placeholder="Enter Your Work Filed" id="field" autocomplete="off"/>
			<i id="circle" class="fas fa-check-circle"></i>
			<i id="circle1" class="fas fa-exclamation-circle"></i>
			<small>Error message</small>
		</div>
		<div class="form-control">
			<label for="username">Address: <b style="color: red;font-size: 17px">*</b><b style="color: black;font-size: 12px">This is your work place address</b></label>
			<input class="input" name="Address" type="text" placeholder="Enter Your Work Place Address" id="address" autocomplete="off"/>
			<i id="circle" class="fas fa-check-circle"></i>
			<i id="circle1" class="fas fa-exclamation-circle"></i>
			<small>Error message</small>
		</div>
		<div class="form-control">
			<label for="username">Email:</label>
			<input class="input" name="Email" type="email" placeholder="Enter Your Email" id="email" autocomplete="off"/>
			<i id="circle" class="fas fa-check-circle"></i>
			<i id="circle1" class="fas fa-exclamation-circle"></i>
			<small>Error message</small>
		</div>
		<div class="form-control">
			<label for="username">Password:</label>
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
		<div class="form-control">
			<label for="username">Phone Number:</label>
			<select class="select" name="phoneCode" required>
            <option selected hidden value="">Select Country Code</option>
            <option value="+880">+880</option>
            <option value="978">978</option>
            <option value="979">979</option>
            <option value="973">973</option>
            <option value="972">972</option>
            <option value="974">974</option>
            </select>
			<input class="input" type="text" placeholder="Enter Your Phone Number" name="phone" id="phone" autocomplete="off"/>
			<i id="circle" class="fas fa-check-circle"></i>
			<i id="circle1" class="fas fa-exclamation-circle"></i>
			<small style="margin-top:40px;position:relative">Error message</small>
		</div>
		<div class="form-control">
			<input type="radio" name="gender" value="male" checked style="font-size: 20px" required> Male<br>
            <input type="radio" name="gender" value="female" style="font-size: 20px" required> Female<br>
            <input type="radio" name="gender" value="other" style="font-size: 20px" required> Other
		</div>
		<div class="form-control">
			<label for="username">Image:<b style="color: red;font-size: 25px">*</b><b style="color: black;font-size: 12px">Choose your Photo for profile</b></label>
			<input type="file" name="File" required>
		</div>
		<div class="form-control">
			<label for="username">Certificate: <b style="color: red;font-size: 25px">*</b><b style="color: black;font-size: 12px">Choose your original doctor Certificate</b></label>
			<input type="file" name="Certificate" required>

		</div>
		
      
      <button class="btn" name="submit">Submit</button>
      
        <div class="loader">
          
          <img src="Image/loads.gif" class="img">
          <p>Registering...</p>
          
        </div>
    
	</form>
	
		<a href="doctorlogin.php" class="button">Back</a>
	
</div>

<?php
if(isset($_POST['submit'])){
    
$firstname = $_POST['FirstName'];
$lastname = $_POST['LastName'];
$country = $_POST['Country'];
$field = $_POST['Field'];
$address = $_POST['Address'];
$email = $_POST['Email'];
$password = $_POST['user_password'];
$phoneCode = $_POST['phoneCode'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];
$files = $_FILES['File'];
$certificate = $_FILES['Certificate'];
 $host = "localhost";
 $dbUsername = "Your username";
 $dbPassword = "";
 $dbname = "Your databasename";
    //create connection
    $conn = new mysqli($host,$dbUsername, $dbPassword, $dbname);
    
    $vkey = md5(time().$email);

    $filename = $files['name'];
    $fileerror = $files['error'];
    $filetmp = $files['tmp_name'];

    $filenamephoto = $certificate['name'];
    $fileerrorphoto = $certificate['error'];
    $filetmpphoto = $certificate['tmp_name'];

    $fileext = explode('.',$filename);
    $filecheck = strtolower(end($fileext));
    $fileextphoto = explode('.',$filenamephoto);
    $filecheck = strtolower(end($fileextphoto));

    $fileextstored = array('png','jpg','jpeg','tmp');
    if(in_array($filecheck, $fileextstored))
    {
      

    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $salted = "3456#$$%sasnfhgkqwlrnvdggbajcn" .$password. "#$2353dgdsgdf@*&";
     $hashed = hash('sha512', $salted);
     $SELECT = "SELECT email From register Where email = ? Limit 1";
     $INSERT = "INSERT Into register (FirstName,LastName,Country,Field,Address,Email,user_password, phoneCode, phone,gender,File,Certificate,vkey) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

      
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $destinationfile = 'Doctorphotos/'.$filename;
      move_uploaded_file($filetmp, $destinationfile);
      $Doctorphoto = 'Certificate/'.$filenamephoto;
      move_uploaded_file($filetmpphoto, $Doctorphoto);
      $stmt->bind_param("ssssssssissss", $firstname, $lastname,$country,$field,$address,$email, $hashed, $phoneCode,$phone,$gender,$filename,$filenamephoto,$vkey);
      $stmt->execute();
      
       
      
       $url = "https://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]). "/doctoracverify.php?vkey=$vkey";
       $url1 = "https://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]). "/doctoracdismiss.php?vkey=$vkey";
       $img = "https://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]). "/Certificate/$filenamephoto";
      $ht = "<h1>Account verification link</h1><h2>Click <a href='$url'  style='border:none;text-transform:uppercase;border-radius:6px;background-image:linear-gradient(to left,#D980FA,#9980FA,#5758BB,#1289A7);color:#fff;transition:0.6s;font-family: inherit;font-size:16px;padding:5px;width:50%;margin-left:10px;cursor:pointer;background-size:300%;text-decoration:none;text-align:center;'>&#128073;Verify&#128072;</a><a href='$url1'  style='border:none;text-transform:uppercase;border-radius:6px;background-image:linear-gradient(to left,#D980FA,#9980FA,#5758BB,#1289A7);color:#fff;transition:0.6s;font-family: inherit;font-size:16px;padding:5px;width:50%;margin-left:10px;cursor:pointer;background-size:300%;text-decoration:none;text-align:center;'>&#128073;Dismiss&#128072;</a>  this..<br><br><img src='$img' style='width:100%;height:100%;'></h2>";
      $body = "<h1>Welcome to Health Care Web Site</h1><h2>Please Wait a few minutes or an hour for your certificate verification.Your account verification will be notified via mail. Then you may login.<br><img src='https://www.ninjaapple.com/Image/emailphoto.png' style='width:100%;height:100%;'></h2>";
       ?>
      
                <script type="text/javascript"> 
            	
              Email.send({
                SecureToken : "your token number",
                To : 'your@gmail.com',
                From : "your@domain.com",
                Subject : "Doctor Account verification",
                Body : " <?php print_r($ht); ?> "
            })
           
            </script>
            
               <script type="text/javascript"> 
            	
              Email.send({
                SecureToken : "your token number",
                To : '<?php print_r($email); ?>',
                From : "your@domain.com",
                Subject : "Account verification",
                Body : " <?php print_r($body); ?> "
            })
           
            </script>
         <?php echo ("<script>
      alert('Thank you for registering.We have sent a verification email to your gmail account,please check this..')
      window.location.href='doctorlogin.php'
       </script>"); ?>
      
      <?php
          
       
      
      $host = "localhost";
    $dbUsername = "Your username";
    $dbPassword = "";
    $dbname = "Your databasename";
    //create connection
    $conn = new mysqli($host,$dbUsername, $dbPassword, $dbname);
      
    $firstname = $conn->real_escape_string($firstname);
    $lastname = $conn->real_escape_string($lastname);
    $email = $conn->real_escape_string($email);
    $password = $conn->real_escape_string($password);
    $filename = $conn->real_escape_string($filename);
    $salted = "3456#$$%sasnfhgkqwlrnvdggbajcn" .$password. "#$2353dgdsgdf@*&";
     $hashed = hash('sha512', $salted);
     $SELECT = "SELECT Email From user Where Email = ? Limit 1";
     $filenames = "https://www.ninjaapple.com/Doctorphotos/$filename";
     $sql = "INSERT Into user (FirstName,LastName,Email,user_password, File, Doctor) values('$firstname', '$lastname', '$email', '$hashed', '$filenames','Doctor')";

      $result = mysqli_query($conn, $sql);

     } else {
      
      echo ("<script>
      alert('Someone already register using this email')
      window.location.href='doctorregister.php'
       </script>");
     }

     $stmt->close();
     $conn->close();
    }
  }else {
      
      echo ("<script>
      alert('Choose only png jpg jpeg tmp format image file')
      window.location.href='doctorregister.php'
       </script>");
     }

}

?>




<script>

var _0x1c78=["\x6F\x6E\x6C\x6F\x61\x64","\x6A\x51\x75\x65\x72\x79","\x2E\x69\x6E\x70\x75\x74\x2D\x67\x72\x6F\x75\x70\x2D\x74\x65\x78\x74","\x66\x69\x6E\x64","\x70\x61\x72\x65\x6E\x74","\x69\x6E\x70\x75\x74\x2D\x70\x61\x73\x73\x77\x6F\x72\x64\x2D\x68\x69\x64\x65","\x61\x64\x64\x43\x6C\x61\x73\x73","\x63\x75\x72\x73\x6F\x72","\x70\x6F\x69\x6E\x74\x65\x72","\x63\x73\x73","\x63\x6C\x69\x63\x6B","\x68\x61\x73\x43\x6C\x61\x73\x73","\x69\x6E\x70\x75\x74\x2D\x70\x61\x73\x73\x77\x6F\x72\x64\x2D\x73\x68\x6F\x77","\x72\x65\x6D\x6F\x76\x65\x43\x6C\x61\x73\x73","\x66\x61\x2D\x65\x79\x65\x2D\x73\x6C\x61\x73\x68","\x66\x61\x2D\x65\x79\x65","\x2E\x66\x61","\x74\x79\x70\x65","\x74\x65\x78\x74","\x61\x74\x74\x72","\x70\x61\x73\x73\x77\x6F\x72\x64","\x6F\x6E","\x65\x61\x63\x68","\x5B\x64\x61\x74\x61\x2D\x74\x6F\x67\x67\x6C\x65\x3D\x22\x70\x61\x73\x73\x77\x6F\x72\x64\x22\x5D","\x66\x69\x72\x73\x74\x6E\x61\x6D\x65","\x67\x65\x74\x45\x6C\x65\x6D\x65\x6E\x74\x42\x79\x49\x64","\x6C\x61\x73\x74\x6E\x61\x6D\x65","\x63\x6F\x75\x6E\x74\x72\x79","\x66\x69\x65\x6C\x64","\x61\x64\x64\x72\x65\x73\x73","\x65\x6D\x61\x69\x6C","\x70\x61\x73\x73\x77\x6F\x72\x64\x32","\x70\x68\x6F\x6E\x65","\x74\x72\x69\x6D","\x76\x61\x6C\x75\x65","","\x46\x69\x72\x73\x74\x6E\x61\x6D\x65\x20\x63\x61\x6E\x6E\x6F\x74\x20\x62\x65\x20\x62\x6C\x61\x6E\x6B","\x4C\x61\x73\x74\x6E\x61\x6D\x65\x20\x63\x61\x6E\x6E\x6F\x74\x20\x62\x65\x20\x62\x6C\x61\x6E\x6B","\x43\x6F\x75\x6E\x74\x72\x79\x20\x63\x61\x6E\x6E\x6F\x74\x20\x62\x65\x20\x62\x6C\x61\x6E\x6B","\x46\x69\x65\x6C\x64\x20\x63\x61\x6E\x6E\x6F\x74\x20\x62\x65\x20\x62\x6C\x61\x6E\x6B","\x41\x64\x64\x72\x65\x73\x73\x20\x63\x61\x6E\x6E\x6F\x74\x20\x62\x65\x20\x62\x6C\x61\x6E\x6B","\x45\x6D\x61\x69\x6C\x20\x63\x61\x6E\x6E\x6F\x74\x20\x62\x65\x20\x62\x6C\x61\x6E\x6B","\x4E\x6F\x74\x20\x61\x20\x76\x61\x6C\x69\x64\x20\x65\x6D\x61\x69\x6C","\x50\x61\x73\x73\x77\x6F\x72\x64\x20\x63\x61\x6E\x6E\x6F\x74\x20\x62\x65\x20\x62\x6C\x61\x6E\x6B","\x6C\x65\x6E\x67\x74\x68","\x50\x61\x73\x73\x77\x6F\x72\x64\x20\x6D\x75\x73\x74\x20\x62\x65\x20\x61\x74\x20\x6C\x65\x61\x73\x74\x20\x38\x20\x63\x68\x61\x72\x61\x63\x74\x65\x72\x73","\x43\x6F\x6E\x66\x69\x72\x6D\x20\x50\x61\x73\x73\x77\x6F\x72\x64\x20\x63\x61\x6E\x6E\x6F\x74\x20\x62\x65\x20\x62\x6C\x61\x6E\x6B","\x50\x61\x73\x73\x77\x6F\x72\x64\x73\x20\x64\x6F\x65\x73\x20\x6E\x6F\x74\x20\x6D\x61\x74\x63\x68","\x50\x68\x6F\x6E\x65\x20\x4E\x75\x6D\x62\x65\x72\x20\x63\x61\x6E\x6E\x6F\x74\x20\x62\x65\x20\x62\x6C\x61\x6E\x6B","\x45\x6E\x74\x65\x72\x20\x50\x68\x6F\x6E\x65\x20\x6E\x75\x6D\x62\x65\x72\x20\x6D\x75\x73\x74\x20\x62\x65\x20\x4E\x75\x6D\x65\x72\x69\x63\x20\x6E\x75\x6D\x62\x65\x72","\x50\x68\x6F\x6E\x65\x20\x6E\x75\x6D\x62\x65\x72\x20\x6D\x75\x73\x74\x20\x62\x65\x20\x31\x30\x20\x4E\x75\x6D\x65\x72\x69\x63\x20\x6E\x75\x6D\x62\x65\x72","\x73\x68\x6F\x77","\x2E\x6C\x6F\x61\x64\x65\x72","\x68\x69\x64\x65","\x2E\x62\x74\x6E","\x2E\x62\x75\x74\x74\x6F\x6E","\x70\x61\x72\x65\x6E\x74\x45\x6C\x65\x6D\x65\x6E\x74","\x73\x6D\x61\x6C\x6C","\x71\x75\x65\x72\x79\x53\x65\x6C\x65\x63\x74\x6F\x72","\x63\x6C\x61\x73\x73\x4E\x61\x6D\x65","\x66\x6F\x72\x6D\x2D\x63\x6F\x6E\x74\x72\x6F\x6C\x20\x65\x72\x72\x6F\x72","\x69\x6E\x6E\x65\x72\x54\x65\x78\x74","\x66\x6F\x72\x6D\x2D\x63\x6F\x6E\x74\x72\x6F\x6C\x20\x73\x75\x63\x63\x65\x73\x73","\x74\x65\x73\x74"];window[_0x1c78[0]]= function(){!function(_0x3e17x1){_0x3e17x1(function(){_0x3e17x1(_0x1c78[23])[_0x1c78[22]](function(){var _0x3e17x2=_0x3e17x1(this);var _0x3e17x3=_0x3e17x1(this)[_0x1c78[4]]()[_0x1c78[3]](_0x1c78[2]);_0x3e17x3[_0x1c78[9]](_0x1c78[7],_0x1c78[8])[_0x1c78[6]](_0x1c78[5]);_0x3e17x3[_0x1c78[21]](_0x1c78[10],function(){if(_0x3e17x3[_0x1c78[11]](_0x1c78[5])){_0x3e17x3[_0x1c78[13]](_0x1c78[5])[_0x1c78[6]](_0x1c78[12]);_0x3e17x3[_0x1c78[3]](_0x1c78[16])[_0x1c78[13]](_0x1c78[15])[_0x1c78[6]](_0x1c78[14]);_0x3e17x2[_0x1c78[19]](_0x1c78[17],_0x1c78[18])}else {_0x3e17x3[_0x1c78[13]](_0x1c78[12])[_0x1c78[6]](_0x1c78[5]);_0x3e17x3[_0x1c78[3]](_0x1c78[16])[_0x1c78[13]](_0x1c78[14])[_0x1c78[6]](_0x1c78[15]);_0x3e17x2[_0x1c78[19]](_0x1c78[17],_0x1c78[20])}})})})}(window[_0x1c78[1]])};const firstname=document[_0x1c78[25]](_0x1c78[24]);const lastname=document[_0x1c78[25]](_0x1c78[26]);const country=document[_0x1c78[25]](_0x1c78[27]);const field=document[_0x1c78[25]](_0x1c78[28]);const address=document[_0x1c78[25]](_0x1c78[29]);const email=document[_0x1c78[25]](_0x1c78[30]);const password=document[_0x1c78[25]](_0x1c78[20]);const password2=document[_0x1c78[25]](_0x1c78[31]);const phone=document[_0x1c78[25]](_0x1c78[32]);function validation(){const _0x3e17xe=firstname[_0x1c78[34]][_0x1c78[33]]();const _0x3e17xf=lastname[_0x1c78[34]][_0x1c78[33]]();const _0x3e17x10=country[_0x1c78[34]][_0x1c78[33]]();const _0x3e17x11=field[_0x1c78[34]][_0x1c78[33]]();const _0x3e17x12=address[_0x1c78[34]][_0x1c78[33]]();const _0x3e17x13=email[_0x1c78[34]][_0x1c78[33]]();const _0x3e17x14=password[_0x1c78[34]][_0x1c78[33]]();const _0x3e17x15=password2[_0x1c78[34]][_0x1c78[33]]();const _0x3e17x16=phone[_0x1c78[34]][_0x1c78[33]]();if(_0x3e17xe=== _0x1c78[35]){setErrorFor(firstname,_0x1c78[36]);return false}else {setSuccessFor(firstname)};if(_0x3e17xf=== _0x1c78[35]){setErrorFor(lastname,_0x1c78[37]);return false}else {setSuccessFor(lastname)};if(_0x3e17x10=== _0x1c78[35]){setErrorFor(country,_0x1c78[38]);return false}else {setSuccessFor(country)};if(_0x3e17x11=== _0x1c78[35]){setErrorFor(field,_0x1c78[39]);return false}else {setSuccessFor(field)};if(_0x3e17x12=== _0x1c78[35]){setErrorFor(address,_0x1c78[40]);return false}else {setSuccessFor(address)};if(_0x3e17x13=== _0x1c78[35]){setErrorFor(email,_0x1c78[41]);return false}else {if(!isEmail(_0x3e17x13)){setErrorFor(email,_0x1c78[42]);return false}else {setSuccessFor(email)}};if(_0x3e17x14=== _0x1c78[35]){setErrorFor(password,_0x1c78[43]);return false}else {if(_0x3e17x14[_0x1c78[44]]< 8){setErrorFor(password,_0x1c78[45]);return false}else {setSuccessFor(password)}};if(_0x3e17x15=== _0x1c78[35]){setErrorFor(password2,_0x1c78[46]);return false}else {if(_0x3e17x14!== _0x3e17x15){setErrorFor(password2,_0x1c78[47]);return false}else {setSuccessFor(password2)}};if(_0x3e17x16=== _0x1c78[35]){setErrorFor(phone,_0x1c78[48]);return false}else {if(isNaN(_0x3e17x16)){setErrorFor(phone,_0x1c78[49]);return false}else {if(_0x3e17x16[_0x1c78[44]]< 10){setErrorFor(phone,_0x1c78[50]);return false}else {if(_0x3e17x16[_0x1c78[44]]> 10){setErrorFor(phone,_0x1c78[50]);return false}else {setSuccessFor(phone);$(_0x1c78[52])[_0x1c78[51]]();$(_0x1c78[54])[_0x1c78[53]]();$(_0x1c78[55])[_0x1c78[53]]()}}}}}function setErrorFor(_0x3e17x18,_0x3e17x19){const _0x3e17x1a=_0x3e17x18[_0x1c78[56]];const _0x3e17x1b=_0x3e17x1a[_0x1c78[58]](_0x1c78[57]);_0x3e17x1a[_0x1c78[59]]= _0x1c78[60];_0x3e17x1b[_0x1c78[61]]= _0x3e17x19}function setSuccessFor(_0x3e17x18){const _0x3e17x1a=_0x3e17x18[_0x1c78[56]];_0x3e17x1a[_0x1c78[59]]= _0x1c78[62]}function isEmail(email){return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/[_0x1c78[63]](email)}
    
</script>


</body>
</html>