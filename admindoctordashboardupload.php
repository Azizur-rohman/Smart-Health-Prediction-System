<?php

 $host = "localhost";
    $dbUsername = "Your username";
    $dbPassword = "";
    $dbname = "Your databasename";
    //create connection
    $conn = new mysqli($host,$dbUsername, $dbPassword, $dbname);

header("Content-Type: application/json");
$uploaded = array();
if(!empty($_FILES['file']['name'][0])){
    
    foreach($_FILES['file']['name'] as $position => $name){
        
        $image_url = "https://www.ninjaapple.com/uploads/".$name;
        
        $sql = "INSERT Into doctor_dashboard_image (images) values('$image_url')";
      
      $result = mysqli_query($conn, $sql);
        
        if(move_uploaded_file($_FILES['file']['tmp_name'][$position], 'uploads/'.$name)){
               $uploaded[] = array(
                   'name' => $name,
                   'file' => 'uploads/'.$name
               );                                                                                                                           
        }       
    }   
}


  echo json_encode($uploaded); 
                                                                                                                        
  
  ?>