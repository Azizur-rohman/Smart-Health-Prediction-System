<?php 
 
  error_reporting(0);
  include('messenger_connect.php');
  
  session_start();
  
  if(!isset($_SESSION['user_id'])){
      header('location:doctorlogin.php');
  }else{
      
      $userId = $_SESSION['user_id'];
      
      $sql = "SELECT * FROM  user  WHERE  user_id = '$userId'";

                $result = mysqli_query($conn, $sql);
                
                while($row = mysqli_fetch_assoc($result))
                {
              
              $userimage = $row['File'];
              
              if($userimage == null){
                  
                  $user_image = "<img src='image/profile.png'>";
                  
              }else{
                  $user_image = "<img src='$userimage'>";
              }
                }
      
  }
  
?>  

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <title>Communicate with doctors</title>
  
  <link rel="shortcut icon" type="image/png" href="Image/ninjaapple.png">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<style type="text/css">

  @import "css/doctorcommwithpatientsmodify1.css";

	</style>
</head>
<body>
    
     <nav>
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars" id="closedetails"></i>
      </label>
      <label class="logo">HEALTH CARE</label>
      <ul class="ul">
          <div class="deta">
            <?php 
     $host = "localhost";
    $dbUsername = "Your username";
    $dbPassword = "";
    $dbname = "Your databasename";
    //create connection
    $conn = new mysqli($host,$dbUsername, $dbPassword, $dbname);
$email = $_SESSION['Email'];
$query = "SELECT `FirstName`, `LastName`, `Country`, `Field`, `Address`, `Email`, `phoneCode`, `phone`, `gender`,  `File` FROM register WHERE Email = '$email'";
$result = $conn->query($query);
        

        $row = $result->fetch_assoc();
 $firstname = $row['FirstName'];
$lastname = $row['LastName'];
$Country = $row['Country'];
$Field = $row['Field'];
$Address = $row['Address'];
$email = $row['Email'];
$phoneCode = $row['phoneCode'];
$phone = $row['phone'];
$gender = $row['gender'];
$files = $row['File'];      
?>

 <button class="profile-btn"><img src="Doctorphotos/<?php print_r($files); ?>" class="file1"></button> <br><br>
    <p class="tap">Tap to picture show your info</p>
 
 <div class="details1-panel-container">
              <div class="details1-panel">
                  <div  class="details1">
  <b class="name1">Name:</b> <b class="fatchname1"><?php print_r($firstname);?></b>&nbsp<b class="fatchname1"><?php print_r($lastname); ?></b><br>
  <b class="name1">Country:</b> <b class="fatchname1"><?php print_r($Country); ?></b><br>
  <b class="name1">Field:</b> <b class="fatchname1"><?php print_r($Field); ?></b><br>
  <b class="name1">Address:</b> <b class="fatchname1"><?php print_r($Address); ?></b><br>
  <b class="name1">Email:</b> <b class="fatchname1"><?php print_r($email); ?></b><br>
  <b class="name1">PhoneCode:</b> <b class="fatchname1"><?php print_r($phoneCode); ?></b><br>
  <b class="name1">Phone:</b> <b class="fatchname1"><?php print_r($phone); ?></b><br>
  <b class="name1">Gender:</b> <b class="fatchname1"><?php print_r($gender); ?></b><br>
      





    </div> 
     </div>
     </div>
       </div>
          
          
          
          
        <li class="l"><a href="doctorpage.php">Dashboard</a></li>
        <li class="l"><a class="active" href="doctorcommwithpatients.php">Communicate With patients</a></li>
        <li class="l"><a href="doctorfeedback.php">Feedback</a></li>
        <li class="l"><a href="doctorlogout.php">Logout</a></li>
      </ul>
    </nav>
    

<div class="container">

	<div class="main-container users">
		
        <div class="profile-container">
        	
            <div class="profile-user photo">
            	
                <div class="profile-user-image">
                	
                     <?php 
                     
                     print_r($user_image);
                     
                     ?>
                     
                     <span>
                         
                         <input type="file" name="file" id="profile_image"/>
                         
                     </span>

                </div>

            </div>

            <div class="profile-user heading">
            	
                 <p><b>Chats</b></p>

            </div>

            <div class="profile-user setting">
            	
                <div class="profile-user-setting">

		                <div class="profile-setting-image">
		                	
		                     <img src="image/setting.png" id="setting">

		                </div> 

                </div>

            </div>

            <div class="profile-user edit">
            	
                <div class="profile-user-edit">

		                <div class="profile-edit-image">
		                	
		                     <img src="image/edit.png">

		                </div> 

                </div>

            </div>

            <div class="setting-model">
            	
                <div class="setting-model-setting">
            	
                    <a><p>Settings</p></a>

                </div>


                <div class="setting-model-active">
            	
                    <a><p>Active Contacts</p></a>

                    <a><p>Message Requests</p></a>

                    <a><p>Archived Chats</p></a>

                    <a><p>Unread Chats</p></a>

                </div>

                <div class="setting-model-about">
            	
                    <a><p>About</p></a>

                    <a><p>Terms</p></a>

                    <a><p>Privacy Policy</p></a>

                    <a><p>Cookie Policy</p></a>

                </div>

                <div class="setting-model-help">
            	
                    <a><p>Help</p></a>

                    <a><p>Report a problem</p></a>

                </div>

                <div class="setting-model-logout">
            	
                    <a href="doctorlogout.php"><p>Logout</p></a>

                </div>

            </div>

        </div>

        <div class="user-container">
        	
             <div class="search-container">

             	<div class="search-container-inside">
        	
                 <div class="search-user button">
        	
                      <button><i class="fas fa-search"></i></button>

                 </div>

                 <div class="search-user text">
        	
                     <input type="text" name="user" id="search" placeholder="search messenger.." autocomplete="off"/> 

                 </div>

                </div> 

             </div>
             
             <div class="col-md-5">
             
             <div class="list-group" id="show-list">
             
                 
             
             
             </div>

          </div>
          
          <div class="user-main-container" id="user-main-container">
                 
            </div>


        </div>

	</div>

	<div class="main-container chat">
		
        <div class="main-navbar">
		
            

		
	    </div>

       <div class="users-chat-container">
       	
           <div class="users-chat-main-container chat">

           	  <div class="chat-chat-container" id="chat-chat-container">

           	  </div>
       	
                <div class="chat-bottom">
       	
                     <div class="chat-bottom-icon icon">
       	
                          <div class="chat-bottom-image">
       	
                              <img src="image/add.png">

                          </div>

                     </div>

                     <div class="chat-bottom-icon icon">
       	
                          <div class="chat-bottom-image">
       	
                              <img src="image/gif.png">

                          </div>

                     </div>

                     <div class="chat-bottom-icon icon">
       	
                          <div class="chat-bottom-image">
       	
                              <img src="image/smile.png">

                          </div>

                     </div>

                     <div class="chat-bottom-icon icon">
       	
                          <div class="chat-bottom-image">
       	
                              <img src="image/file.png">

                          </div>

                     </div>

                     <div class="chat-bottom-icon send">

                     	<div class="chat-bottom-send">
       	
                          <div class="chat-bottom-input text">
       	
                             <input type="text" name="send" placeholder="Type a message.." id="type_message"> 

                          </div>

                          <div class="chat-bottom-input smile">
       	
                              <div class="chat-bottom-image">
       	
                              <img src="image/smile.png">

                              </div>

                          </div>

                        </div>  

                     </div>

                     <div class="chat-bottom-icon icon">
       	
                          <div class="chat-bottom-image-like-send">
       	
                              <img src="image/like2.png" id="like">
                              
                              <img src="image/send.png" id="send" style="display: none;">

                          </div>

                     </div>

                </div>

           </div>

           <div class="users-chat-main-container profile">
       	
               <div class="user-profile-detail">
               	
                   

               </div>

             <div class="option-container">
         	
                 <div class="option-heading">
         	
                      <div class="option-name name">
         	
                          <p>Option</p>
         	
                      </div>

                      <div class="option-name icon">
         	
                          <div class="option-heading-image">
         	
                               <img src="image/arrowdown.png" id="option">
         	
                          </div>
         	
                      </div>
         	
                 </div>
                 
                 <div class="option-container1">

                 <div class="option-search">
         	
                      <div class="option-search-name name">
         	
                          <p>Search in conversation</p>
         	
                      </div>

                      <div class="option-search-name icon">
         	
                          <div class="option-search-image">
         	
                              <img src="image/search.png">
         	
                          </div>
         	
                      </div>
         	
                 </div>


                 <div class="option-edit">
         	
                      <div class="option-edit-name name">
         	
                          <p>Edit Nicknames</p>
         	
                      </div>

                      <div class="option-edit-name icon">
         	
                          <div class="option-edit-image">
         	
                              <img src="image/edit2.png">
         	
                          </div>
         	
                      </div>
         	
                 </div>


                 <div class="option-color">
         	
                      <div class="option-color-name name">
         	
                          <p>Change Color</p>
         	
                      </div>

                      <div class="option-color-name icon">
         	
                          <div class="option-color-image">
         	
                              <img src="image/color.png">
         	
                          </div>
         	
                      </div>
         	
                 </div>

                 <div class="option-emoji">
         	
                      <div class="option-emoji-name name">
         	
                          <p>Change Emoji</p>
         	
                      </div>

                      <div class="option-emoji-name icon">
         	
                          <div class="option-emoji-image">
         	
                              <img src="image/like.png">
         	
                          </div>
         	
                      </div>
         	
                 </div>
                 
                </div> 
         	
             </div> 

           </div> 

       </div>

	</div>



</div>
<script>

 // Get the input field
		var input = document.getElementById("type_message");

		// Execute a function when the user releases a key on the keyboard
		input.addEventListener("keyup", function(event) {
		  // Number 13 is the "Enter" key on the keyboard
		  if (event.keyCode === 13) {
		    // Cancel the default action, if needed
		    event.preventDefault();
		    // Trigger the button element with a click
		    document.getElementById("send").click();
		  }
		});
		
		$("#user-main-container").click(function()
      {
		
			    $('#chat-chat-container').animate({scrollTop:1000000},1000);
			
      });
      
 
 
  //details panel js
  const profile_btn = document.querySelector('.profile-btn');
  const closedetails_btn = document.querySelector('#closedetails');
  const details1_panel_container = document.querySelector('.details1-panel-container');
  
  
  
  
  profile_btn.addEventListener('click', () => {
  details1_panel_container.classList.toggle('visible')
});
 
closedetails_btn.addEventListener('click', () => {
  details1_panel_container.classList.remove('visible')
});



//messenger    
$(document).ready(function(){
    
        setInterval(function(){
            
           fetch_users(); 
           
           users_online_offline_status();
           
           users_last_seen_message(userId);
            
        },1000);
    
        $(document).on('keyup','#type_message', function(){
        
         var typeMessage = $('#type_message').val();
         
        if(typeMessage.length > 0)
        {
            
            $('#like').hide();
            
            $('#send').show();
            
        }else{
            
            $('#like').show();
            
            $('#send').hide();
            
        }
         
         
    });
    
    $(document).on('click','#setting', function(){
        
        $('.setting-model').show();
        
    });
    
    $('body').on('click', function(){
        
        $('.setting-model').hide();
        
    });
    
     $(document).on('click','#option', function(){
        
        $('.option-container1').show();
        
    });
    
    $('body').on('click', function(){
        
        $('.option-container1').hide();
        
    });
    
    $(document).on('change','#profile_image', function(){
        
        var formData = new FormData();
        
        var inputFile = document.getElementById('profile_image').files[0];
        
        formData.append("file", inputFile);
        
        $.ajax({
            
            url:"doctor_messenger_action.php",
            
            method:"post",
            
            data:formData,
            
            contentType:false,
            
            cache:false,
            
            processData:false,
            
            success:function(data){
                
                $('.profile-user-image').html(data);
                
            }
            
            
            
            
            
            
            
            
        });
        
    });
    
    
    
    
    
    $(document).on('click','.user-main-details', function(){
        
         var userId = $(this).data('user_id');
         
         fetch_users_top_nav(userId);
         
         fetch_users_profile(userId);
         
         type_message(userId);
         
         fetch_message(userId);
         
         users_last_seen_message(userId);
         
    });
    
    
         fetch_users();
    
    function fetch_users()
    {
        
        var action = "fetch_users";
        
         $.ajax({
            
            url:"doctor_messenger_action.php",
            
            method:"post",
            
            data:{action_users:action},
            
            success:function(data){
                
                $('.user-main-container').html(data);
                
            }
            
        });
        
    }
    
    
    function type_message(userId){
    
     $('#send').unbind('click').bind('click', function(){
         
         var sendMessage = $('#type_message').val();
         
          send_message(userId, sendMessage);
          
          $('#chat-chat-container').animate({scrollTop:1000000},1000);
          
    });
    
    }
    
    
         fetch_users_top_nav(userId);
    
    function fetch_users_top_nav(userId)
    {
        
        var action = "fetch_users_top_nav";
        
         $.ajax({
            
            url:"doctor_messenger_action.php",
            
            method:"post",
            
            data:{action_users_nav:action, user_id:userId},
            
            success:function(data){
                
                $('.main-navbar').html(data);
                
               
                
            }
            
        });
        
    }
    
    
    fetch_users_profile(userId);
    
    function fetch_users_profile(userId)
    {
        
        var action = "fetch_users_profile";
        
         $.ajax({
            
            url:"doctor_messenger_action.php",
            
            method:"post",
            
            data:{action_users_profile:action, user_id:userId},
            
            success:function(data){
                
                $('.user-profile-detail').html(data);
                
               
                
            }
            
        });
        
    }
    
    
     
    
    
     send_message(userId, sendMessage);
    
    function send_message(userId, sendMessage)
    {
        
        var action = "send_message";
        
         $.ajax({
            
            url:"doctor_messenger_action.php",
            
            method:"post",
            
            data:{action_send_message:action, user_id:userId, send_message:sendMessage},
            
            success:function(data){
                
                $('#type_message').val('');
                
                fetch_message(userId);
                
               
                
            }
            
        });
        
    }
    
    
    
     fetch_message(userId);
    
    function fetch_message(userId)
    {
        
        var action = "fetch_message";
        
         $.ajax({
            
            url:"doctor_messenger_action.php",
            
            method:"post",
            
            data:{action_fetch_message:action, user_id:userId},
            
            success:function(data){
                
                $('.chat-chat-container').html(data);
                
               
                
            }
            
        });
        
    }
    
    
    users_last_seen_message(userId);
    
    function users_last_seen_message(userId)
    {
        
        var action = "users_last_seen_message";
        
         $.ajax({
            
            url:"doctor_messenger_action.php",
            
            method:"post",
            
            data:{action_users_last_seen_message:action, user_id:userId},
            
            success:function(data){
                
               
               //alert(data); 
               
                
            }
            
        });
        
    }
    
    
     users_online_offline_status();
    
    function users_online_offline_status()
    {
        
        var action = "users_online_offline_status";
        
         $.ajax({
            
            url:"doctor_messenger_action.php",
            
            method:"post",
            
            data:{action_status:action},
            
            success:function(data){
                
               
               //alert(data); 
               
                
            }
            
        });
        
    }
    
    
});

//search

$(document).ready(function () {
  // Send Search Text to the server
  $("#search").keyup(function () {
    let searchText = $(this).val();
    if (searchText != "") {
      $.ajax({
        url: "action.php",
        method: "post",
        data: {
          query: searchText,
        },
        success: function (response) {
          $("#show-list").html(response);
        },
      });
    } else {
      $("#show-list").html("");
    }
  });
  // Set searched text in input field on click of search button
  $(document).on("click", "a", function () {
    $("#search").val($(this).text());
    $("#show-list").html("");
  });
});
</script>
</body>
</html>