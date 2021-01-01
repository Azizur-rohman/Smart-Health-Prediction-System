<?php
  require_once 'config.php';
  session_start();
  if (isset($_POST['query'])) {
    $inpText = $_POST['query'];
    $sql = 'SELECT FirstName FROM user WHERE FirstName LIKE :firstname';
    $stmt = $conn->prepare($sql);
    $stmt->execute(['firstname' => '%' . $inpText . '%']);
    $result = $stmt->fetchAll();

    if ($result) {
        
                  $host = "localhost";
    $dbUsername = "Your username";
    $dbPassword = "";
    $dbname = "Your databasename";
    //create connection
    $conn = new mysqli($host,$dbUsername, $dbPassword, $dbname);
          
        $userId = $_SESSION['user_id'];
      
      $sql = "SELECT user_id,FirstName,LastName,Email,user_password,File,date FROM  user  WHERE  user_id != '$userId' AND Doctor = 'Doctor' ORDER BY user_id DESC LIMIT 1";

                $result1 = mysqli_query($conn, $sql);
                
                while($row1 = mysqli_fetch_assoc($result1))
                {
      foreach ($result1 as $row1) {
          

                 echo '<div class="user-main-container"></div>';
               
      }
        
     }
    }   else{
           echo '<p class="list-group-item border-1">No Record</p>';
       }
  }
?>