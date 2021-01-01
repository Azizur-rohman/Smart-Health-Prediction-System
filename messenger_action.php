<?php 
 
  error_reporting(0);
  include('messenger_connect.php');
  
  session_start();
  
  if($_FILES['file']['name'] != ''){
      
      $userId = $_SESSION['user_id'];
      
      $target_dir = "profileimage/";
      
      $name = $_FILES['file']['name'];
      
      $target_file_name = $target_dir . basename($name);
      
      $image_url = "https://www.ninjaapple.com/profileimage/".$name;
      
      move_uploaded_file($_FILES['file']['tmp_name'], $target_file_name);
      
      $sql = "UPDATE user SET File='$image_url' WHERE user_id='$userId'";
      
      $result = mysqli_query($conn, $sql);
      
      if($result){
          $sql = "SELECT user_id,FirstName,LastName,Email,user_password,File,date FROM  user  WHERE  user_id = '$userId'";

                $result = mysqli_query($conn, $sql);
                
                while($row = mysqli_fetch_assoc($result))
                {
              
              $userimage = $row['File'];
              
              if($userimage == null){
                  
                  $File = "<img src='image/profile.png'>";
                  
              }else{
                  $File = "<img src='$userimage'>";
              }
              
              echo $File;
          }
          
      }
      
  }
      
  
  
  //fetch users
  
    if(isset($_POST['action_users']))
  {
      
      $userId = $_SESSION['user_id'];
      
      $sql = "SELECT user_id,FirstName,LastName,Email,user_password,File,date FROM  user  WHERE  user_id != '$userId' AND Doctor = 'Doctor'";

                $result = mysqli_query($conn, $sql);
                
                while($row = mysqli_fetch_assoc($result))
                {
              
              $userimage = $row['File'];
              
              $FirstName = $row['FirstName'];
              
              $LastName = $row['LastName'];
              
              $userid = $row['user_id'];
              
              if($userimage == null){
                  
                  $File = "<img src='image/profile.png'>";
                  
              }else{
                  $File = "<img src='$userimage'>";
              }
              
              echo "<div class='user-main-details' data-user_id='".$userid."'>
              
              <div class='user-main-container-inside'>
        	
                     <div class='user-main-inside photo'>
        	
                         <div class='user-main-image'>
        	
                              $File

                         </div>

                     </div>

                     <div class='user-main-inside text'>
        	
                         <div class='user-main-name'>
        	
                             <p>$FirstName $LastName</p>

                         </div>

                         <div class='user-main-message'>
                         
                         ".make_user_last_seen_message($conn, $userid)."
                           
                         </div>

                     </div>
                     
                </div>
                
            </div>";
          }
      
  }
  
  function make_user_last_seen_message($conn, $userid){
      
       $senderId = $_SESSION['user_id'];
      
      $receiverId = $userid;
      
      $sql = "SELECT * FROM  user_chat  WHERE  (sender_id = '$senderId' AND receiver_id = '$receiverId') OR (sender_id = '$receiverId' AND receiver_id = '$senderId') ORDER BY user_id DESC LIMIT 1";

      $result = mysqli_query($conn, $sql);
      
         while($row = mysqli_fetch_assoc($result))
                {
                    $userMessage = $row['message'];
                    
                    if(strlen($userMessage) > 8){
                    
                    $string = substr($userMessage,0,8).'...' ;
                    
                    }else{
                        $string = substr($userMessage,0,8);
                    }
                    $sendId = $row['sender_id'];
                    
                    $date = $row['date'];
                    
                    $lastSeen = $row['chat_status'];
                    
                    $time = date('D d', STRTOTIME($date));
                    
                    if($lastSeen == 0){
                    
                    if($senderId == $sendId){
                        
                        $output = ' <div class="user-last-message message">
        	
                                  <p>You:'.$string.'</p>

                             </div>

                             <div class="user-last-message date">
        	
                                  <p>'.$time.'</p>

                             </div>';
                        
                    }else{
                    
                    $output = ' <div class="user-last-message message">
        	
                                  <p>'.$string.'</p>

                             </div>

                             <div class="user-last-message date">
        	
                                  <p>'.$time.'</p>

                             </div>';
                             
                    }
                             
                    }else{
                        
                       if($senderId == $sendId){
                        
                        $output = ' <div class="user-last-message message">
        	
                                  <p>You:'.$string.'</p>

                             </div>

                             <div class="user-last-message date">
        	
                                  <p>'.$time.'</p>

                             </div>';
                        
                    }else{
                    
                    $output = ' <div class="user-last-message message">
        	
                                  <p style="color:black;"><b>'.$string.'</b></p>

                             </div>

                             <div class="user-last-message date">
        	
                                  <p>'.$time.'</p>

                             </div>';
                             
                    }
                        
                    }
                    
                }
                return $output;
      
  }
  
  if(isset($_POST['action_users_nav']))
  {
      
      $userId = $_POST['user_id'];
      
      $sql = "SELECT user_id,FirstName,LastName,Email,user_password,File,date FROM  user  WHERE  user_id = '$userId'";

                $result = mysqli_query($conn, $sql);
                
                while($row = mysqli_fetch_assoc($result))
                {
              
              $userimage = $row['File'];
              
              $FirstName = $row['FirstName'];
              
              $LastName = $row['LastName'];
              
              $date = $row['date'];
              
              if($userimage == null){
                  
                  $File = "<img src='image/profile.png'>";
                  
              }else{
                  $File = "<img src='$userimage'>";
              }
              
              echo "<div class='main-navbar-inside photo'>
		
                <div class='navbar-image'>
		
                   $File
		
	            </div>
		
	        </div>

	        <div class='main-navbar-inside name'>
		
                <div class='navbar-name'>
		
                    <p><b>$FirstName $LastName</b></p>
		
	           </div>

	           <div class='navbar-time'>
		
                    ".make_status($conn, $date)."
		
	           </div>
		
	        </div>

	        <div class='main-navbar-inside icon'>
		
                 <div class='navbar-icon'>
		
                   <img src='image/call.png'/>
		
	            </div>
		
	        </div>

	        <div class='main-navbar-inside icon'>
		
                 <div class='navbar-icon'>
		
                   <img src='image/video.png'/>
		
	            </div>
		
	        </div>

	        <div class='main-navbar-inside icon'>
		
                 <div class='navbar-icon'>
		
                   <img src='image/info.png'/>
		
	            </div>
		
	        </div>";
              
                }
                
                
  }
  
  
  
  if(isset($_POST['action_users_profile']))
  {
      
      $userId = $_POST['user_id'];
      
      $sql = "SELECT user_id,FirstName,LastName,Email,user_password,File,date FROM  user  WHERE  user_id = '$userId'";

                $result = mysqli_query($conn, $sql);
                
                while($row = mysqli_fetch_assoc($result))
                {
              
              $userimage = $row['File'];
              
              $FirstName = $row['FirstName'];
              
              $LastName = $row['LastName'];
              
              $date = $row['date'];
              
              if($userimage == null){
                  
                  $File = "<img src='image/profile.png'>";
                  
              }else{
                  $File = "<img src='$userimage'>";
              }
              
              echo "<div class='user-profile-image'>
               	
                       $File

                   </div>

                   <div class='user-profile-name'>
               	
                       <p><b>$FirstName $LastName</b></p>

                   </div>

                   <div class='user-profile-time'>
               	
                       ".make_status($conn, $date)."

                   </div>";
              
                }
                
  }


  function make_status($conn, $status){
      
      date_default_timezone_set('Asia/Dhaka');
      
      $current_timeStamp = STRTOTIME(date("Y-m-d H:i:s"). '-10 second');
      
      $current_time = date("Y-m-d H:i:s", $current_timeStamp);
      
      if($status > $current_time){
                  
                  $output = '<p>online <i class="fa fa-circle" style="color:#5EF104"></i></p>';
                  
              }else{
                  $output = '<p>'.make_status_time($status).'</p>';
              }
                
                
                return $output;
                
      
  }

  function make_status_time($time_ago){
      
      $time_ago = STRTOTIME($time_ago);
      
      $current_time = time();
      
      $time_diff = $current_time - $time_ago;
      
      $seconds = $time_diff;
      
      $mins = round($time_diff/60);
      
      $hours = round($time_diff/3600);
      
      $days = round($time_diff/86400);
      
      $weeks = round($time_diff/604800);
      
      $months = round($time_diff/2600640);
      
      $years = round($time_diff/31207680);
      
      if($seconds <= 60){
          
          return "1s ago";
          
      }else if($mins <= 60){
          
          if($mins == 1){
              
              return "1m ago";
              
          }else{
              
              return "$mins m ago";
              
          }
          
      }
      
      else if($hours <= 24){
          
          if($hours == 1){
              
              return "1h ago";
              
          }else{
              
              return "$hours h ago";
              
          }
          
      }
      
       else if($days <= 7){
          
          if($days == 1){
              
              return "1d ago";
              
          }else{
              
              return "$days d ago";
              
          }
          
      }
      
      
      else if($weeks <= 4.3){
          
          if($weeks == 1){
              
              return "1w ago";
              
          }else{
              
              return "$weeks w ago";
              
          }
          
      }
      
      
      else if($months <= 12){
          
          if($months == 1){
              
              return "1m ago";
              
          }else{
              
              return "months m ago";
              
          }
          
      }
      
      
      else{
          
          if($years == 1){
              
              return "1y ago";
              
          }else{
              
              return "$years y ago";
              
          }
          
      }
      
  }	
		
  
   if(isset($_POST['action_send_message']))
  {
      
      $senderId = $_SESSION['user_id'];
      
      $receiverId = $_POST['user_id'];
      
      $senderMessage = $_POST['send_message'];
      
      $sql = "INSERT INTO `user_chat`(`sender_id`, `receiver_id`, `message`, `chat_status`) VALUES ('$senderId','$receiverId','$senderMessage','1')";

      $result = mysqli_query($conn, $sql);
      
      if($result){
          
          echo "Insert success.";
          
      }
      
      
      
  }
  
  
  if(isset($_POST['action_fetch_message']))
  {
      
      $senderId = $_SESSION['user_id'];
      
      $receiverId = $_POST['user_id'];
      
      $sql = "SELECT * FROM  user_chat  WHERE  (sender_id = '$senderId' AND receiver_id = '$receiverId') OR (sender_id = '$receiverId' AND receiver_id = '$senderId')";

      $result = mysqli_query($conn, $sql);
      
         while($row = mysqli_fetch_assoc($result))
                {
                    $userMessage = $row['message'];
                 
                    
                    
                    $sendId = $row['sender_id'];
                    
                    $userImage = $row['File'];
                    
                    $chatStatus = $row['chat_status'];
                    
                    
                    
                    if($chatStatus == 1)
                    {
                    
                    if($senderId == $sendId)
                    {
                    
                    echo "<div class='chat-right'>

                  	  <div class='chat-right-page image'>
                  	
                           <div class='chat-display-image'>
                  	
                                <img src='image/check.png'>

                           </div>

                      </div>
                  	
                      <div class='chat-right-page name'>
                  	
                          <div class='chat-display-name'>
                  	
                               <p>$userMessage</p>     

                         </div>

                      </div>

                  </div>";
                  
                  
                    }else{
                        
                        echo "<div class='chat-left'>

                  	  <div class='chat-left-page image'>
                  	
                           <div class='chat-left-display-image'>
                                
                                ".make_chat_File($conn, $receiverId)."

                           </div>

                      </div>
                  	
                      <div class='chat-left-page name'>
                  	
                          <div class='chat-left-display-name'>
                  	
                               <p>$userMessage</p>     

                         </div>

                      </div>


                  </div>";
                        
                    }
                    
                }else{
                    
                    if($senderId == $sendId)
                    {
                    
                    echo "<div class='chat-right'>

                  	  <div class='chat-right-page image'>
                  	
                           <div class='chat-display-image'>
                                
                                ".make_chat_last_seen_message($conn, $receiverId)."

                           </div>

                      </div>
                  	
                      <div class='chat-right-page name'>
                  	
                          <div class='chat-display-name'>
                  	
                               <p>$userMessage</p>     

                         </div>

                      </div>

                  </div>";
                  
                  
                    }else{
                        
                        echo "<div class='chat-left'>

                  	  <div class='chat-left-page image'>
                  	
                           <div class='chat-left-display-image'>
                                
                                ".make_chat_File($conn, $receiverId)."

                           </div>

                      </div>
                  	
                      <div class='chat-left-page name'>
                  	
                          <div class='chat-left-display-name'>
                  	
                               <p>$userMessage</p>     

                         </div>

                      </div>


                  </div>";
                        
                    } 
                    
                }
                
            }
      
  }
  
  function make_chat_File($conn, $receiverId){
      
       $sql = "SELECT user_id,FirstName,LastName,Email,user_password,File,date FROM  user  WHERE  user_id = '$receiverId'";

                $result = mysqli_query($conn, $sql);
                
                while($row = mysqli_fetch_assoc($result))
                {
              
              $userimage = $row['File'];
              
              if($userimage == null){
                  
                  $output = '<img src="image/profile.png">';
                  
              }else{
                  $output = '<img src="'.$userimage.'">';
              }
                }
                
                return $output;
  }
  
  
  function make_chat_last_seen_message($conn, $receiverId){
      
       $sql = "SELECT * FROM  user_chat INNER JOIN user ON user_chat.user_id = user.user_id WHERE  user_chat.user_id = '$receiverId'";

                $result = mysqli_query($conn, $sql);
                
                while($row = mysqli_fetch_assoc($result))
                {
              
              $userimage = $row['File'];
              
              if($userimage == null){
                  
                  $output = '<img src="image/profile.png">';
                  
              }else{
                  $output = '<img src="'.$userimage.'">';
              }
                }
                
                return $output;
  }
  
  
  if(isset($_POST['action_users_last_seen_message']))
  {
      
      $senderId = $_SESSION['user_id'];
      
      $receiverId = $_POST['user_id'];
      
      $sql = "UPDATE `user_chat` SET `chat_status`='0' WHERE (sender_id = '$receiverId' AND receiver_id = '$senderId' AND chat_status = '1')";

      $result = mysqli_query($conn, $sql);
      
      if($result){
          
          echo "update last seen";
          
      }
      
  }
  
  
    if(isset($_POST['action_status']))
  {
      
      $userId = $_SESSION['user_id'];
      
      $sql = "UPDATE `user` SET `date` = now() WHERE  user_id = '$userId'";

      $result = mysqli_query($conn, $sql);
      
      if($result){
          
          echo "update";
          
      }
      
  }
  
  
  
  
 ?> 