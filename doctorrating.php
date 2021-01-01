<?php 

    $host = "localhost";
    $dbUsername = "Your username";
    $dbPassword = "";
    $dbname = "Your databasename";
    //create connection
    $conn1 = new mysqli($host,$dbUsername, $dbPassword, $dbname);
    
    $rating = $_POST['rate'];
    $email = $_POST['email'];
    
    $SELECT1 = "SELECT user_email From user_rating Where user_email = '$email' Limit 1";
    $result1 = mysqli_query($conn1,$SELECT1);
    $rnum = $result1->num_rows;
    if ($rnum==1) {
        $update = "UPDATE user_rating SET `rating`= '$rating' WHERE user_email = '$email'";
        mysqli_query($conn1,$update);
        mysqli_close($conn1);
    }else{
  
        
    $host = "localhost";
    $dbUsername = "Your username";
    $dbPassword = "";
    $dbname = "Your databasename";
    //create connection
    $conn2 = new mysqli($host,$dbUsername, $dbPassword, $dbname);
    
    $rating = $_POST['rate'];
    $email = $_POST['email'];
    
    $select = "SELECT FirstName,LastName,Email FROM register WHERE Email = '$email'";
    
    $result = mysqli_query($conn2,$select);
    if(mysqli_num_rows($result)>0)
    
    {
        while($row = mysqli_fetch_assoc($result))
        {
           $firstname = $row['FirstName']; 
           $lastname = $row['LastName']; 
    
        }
    }
    
    
    $host = "localhost";
    $dbUsername = "Your username";
    $dbPassword = "";
    $dbname = "Your databasename";
    //create connection
    $conn3 = new mysqli($host,$dbUsername, $dbPassword, $dbname);
        
    $sql = "INSERT INTO user_rating (user_email,username,rating) VALUES ('$email','$firstname $lastname','$rating')";
    
    mysqli_query($conn3,$sql);
    mysqli_close($conn3);
    }
     
?> 

