<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://smtpjs.com/v3/smtp.js">
</script>
</head>
<body>

<?php 

 if(isset($_GET['vkey'])){
     
    $vkey = $_GET['vkey'];
    
     $host = "localhost";
    $dbUsername = "Your username";
    $dbPassword = "";
    $dbname = "Your databasename";
    //create connection
    $conn = new mysqli($host,$dbUsername, $dbPassword, $dbname);
    
    $resultSet = $conn->query("SELECT Email,verify,vkey FROM register WHERE verify = 0 AND vkey = '$vkey' LIMIT 1");
        
        $row = mysqli_fetch_assoc($resultSet);
        
        $email = $row['Email'];
    
    if($resultSet->num_rows == 1)
    {
        
        $update = $conn->query("UPDATE register SET verify = 1 WHERE vkey = '$vkey' LIMIT 1");
        
        if($update){
            
            $url = "https://www.ninjaapple.com/doctorlogin.php";
            
            $body = "<h1>Your Account has been verified. You may now login..</h1><h2><a href='$url'  style='border:none;text-transform:uppercase;border-radius:6px;background-image:linear-gradient(to left,#D980FA,#9980FA,#5758BB,#1289A7);color:#fff;transition:0.6s;font-family: inherit;font-size:16px;padding:5px;width:50%;margin-left:10px;cursor:pointer;background-size:300%;text-decoration:none;text-align:center;'>&#128073;Login&#128072;</a><br><img src='https://www.ninjaapple.com/Image/emailphoto.png'style='width:100%;height:100%;'></h2>";
            ?>
                            <script type="text/javascript"> 
            	
              Email.send({
                SecureToken : "Your Token Number",
                To : '<?php print_r($email); ?>',
                From : "your@domain.com",
                Subject : "Account verified",
                Body : " <?php print_r($body); ?> "
            })
           
            </script>
        
        <?php    
            
            echo ("<script>
      alert('This Account $email has been verified. Now login..')
      window.location.href='index.html'
       </script>");
            
        }
        
    }else{
        
        echo ("<script>
      alert('This account invalid or already varified..!')
      window.location.href='index.html'
       </script>");
        
    }
     
 }else{
     
     die("Something went wrong");
     
 }

?>
</body>
</html>