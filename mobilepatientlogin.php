<?php
session_start();
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
        $_SESSION['Email']=$email;
        echo("Login successfull");
     } else {
      echo("Wrong email or password");
     }
     
    }
} else {
 echo "All field are required";
 die();
}
?>

