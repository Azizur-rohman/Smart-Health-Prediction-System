<?php 

 if(isset($_GET['vkey'])){
     
    $vkey = $_GET['vkey'];
    
     $host = "localhost";
    $dbUsername = "Your username";
    $dbPassword = "";
    $dbname = "Your databasename";
    //create connection
    $conn = new mysqli($host,$dbUsername, $dbPassword, $dbname);
    
    $resultSet = $conn->query("SELECT verify,vkey FROM register WHERE verify = 0 AND vkey = '$vkey' LIMIT 1");
    
    if($resultSet->num_rows == 1)
    {
        
        $update = $conn->query("UPDATE register SET verify = 1 WHERE vkey = '$vkey' LIMIT 1");
        
        if($update){
            
            echo ("<script>
      alert('Your Account has been verified. You may now login..')
      window.location.href='patientlogin.php'
       </script>");
            
        }
        
    }else{
        
        echo ("<script>
      alert('This account invalid or already varified..!')
      window.location.href='patientlogin.php'
       </script>");
        
    }
     
 }else{
     
     die("Something went wrong");
     
 }

?>