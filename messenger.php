<?php 
 
  error_reporting(0);
  include('messenger_connect.php');
  
  session_start();
  
  if(!isset($_SESSION['user_id'])){
      header('location:messenger_signin.php');
  }else{
      
      $userId = $_SESSION['user_id'];
      
      $sql = "SELECT user_id,username,email,password,user_image,date FROM  user  WHERE  user_id = '$userId'";

                $result = mysqli_query($conn, $sql);
                
                while($row = mysqli_fetch_assoc($result))
                {
              
              $userimage = $row['user_image'];
              
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
	<title>Messenger Website</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<style type="text/css">
		      *{
		  padding: 0;
		  margin: 0;
		 box-sizing: border-box;
		}

		.container{
			width: 100%;
			height: 100%;
			overflow: hidden;
		}
		.main-container{
            float: left;
            
		}

		.main-container.users{
			width: 25%;
			height: 100vh;
			border-right: 1px solid #ccc;
		}

		.main-container.chat{
			width: 75%;
		}

		.profile-container{
			width: 100%;
			height: 60px;
			margin-top: 10px;
		}

		.profile-user{
			float: left;

		}

		.profile-user.photo{
            width: 20%;
		}

		.profile-user.heading{
			width: 40%;
		}

		.profile-user.setting{
			width: 20%;
		}

		.profile-user.edit{
			width: 20%;
		}

		.profile-user-image{
			width: 50px;
			height: 50px;
			margin-top: 5px;
			margin-left: 10px;
			position: relative;
			border-radius: 50%;
			overflow: hidden;
		}
		
		.profile-user-image span{
		    position: absolute;
		    top: 0;
		    left: 0;
		    margin-top: 15px;
		    opacity: 0;
		}

		.profile-user-image img{
			width: 100%;
			height: 100%;
		}

		.profile-user-setting{
            width: 35px;
			height: 35px;
			margin-left: 20px;
			margin-top: 10px;
			border-radius: 50%;
			background-color: #eee;
			overflow: hidden;
		}

		.profile-setting-image{
            width: 20px;
			height: 20px;
			margin-top: 7px;
			margin-left: 7px;
		}

		.profile-setting-image img{
			width: 100%;
			height: 100%;
		}

		.profile-user-edit{
            width: 35px;
			height: 35px;
			margin-top: 10px;
			border-radius: 50%;
			background-color: #eee;
			overflow: hidden;
		}

		.profile-edit-image{
            width: 20px;
			height: 20px;
			margin-top: 7px;
			margin-left: 7px;
		}

		.profile-edit-image img{
			width: 100%;
			height: 100%;
		}

		.profile-user p{
            font-size: 25px;
            line-height: 60px;
		}

		.user-container{
			width: 100%;
			height: 100%;
			margin-top: 10px;
			overflow: hidden;

		}

		.search-container{
			width: 100%;
			margin-top: 10px;
			height: 50px;
		}

		.search-container-inside{
			border-radius: 30px;
			margin-left: 10px;
			margin-right: 10px;
			height: 50px;
			background-color: #eee;
			overflow: hidden;
		}

		.search-user{
			float: left;
		}

		.search-user.button{
			width: 15%;
		}

		.search-user.text{
			width: 85%;
		}

		.search-user button{
			width: 100%;
			font-size: 20px;
			border: none;
			color: #ccc;
			background-color: #eee;
			margin-top: 15px;
		}

		.search-user input[type="text"]{
			width: 90%;
			font-size: 17px;
			border: none;
			color: #ccc;
			background-color: #eee;
			margin-top: 15px;
			margin-left: 5px;
		}

		.user-main-container{
			width: 100%;
			margin-top: 10px;
			overflow: auto;
		}
		
		.user-main-container:hover{
		    
		    cursor: pointer;
		    
		}   

		.user-main-container-inside{
			border-radius: 5px;
			margin-left: 10px;
			margin-right: 10px;
			height: 70px;
			background-color: #eee;
			overflow: hidden;
			 margin-top: 10px;
		}

		.user-main-inside{
			float: left;
		}

		.user-main-inside.photo{
			width: 25%;
		}

		.user-main-inside.text{
			width: 75%;
		}

		.user-main-image{
            width: 60px;
			height: 60px;
			margin-top: 5px;
			margin-left: 5px;
			border-radius: 50%;
			overflow: hidden;
		}

		.user-main-image img{
			width: 100%;
			height: 100%;
		}

		.user-main-name{
			width: 100%;
			margin-top: 10px;
		}

		.user-main-message{
			width: 100%;
			margin-top: 10px;
		}

		.user-last-message{
			float: left;
		}

		.user-last-message.message{
			max-width: 70%;
		}

		.user-last-message.date{
			width: 30%;
			margin-left: 5px;
		}

		.user-main-name p{
           font-size: 20px;
		}

		.user-main-message p{
           font-size: 16px;
           color: #aaa;
		}


		.main-navbar{
			width: 100%;
			height: 60px;
			border-bottom: 1px solid #ccc;
		}

		.main-navbar-inside{
			float: left;
		}

		.main-navbar-inside.photo{
			width: 10%;
		}

		.main-navbar-inside.name{
			width: 75%;
		}

		.main-navbar-inside.icon{
			width: 5%;
		}

		.navbar-image{
            width: 50px;
			height: 50px;
			margin-top: 5px;
			margin-left: 5px;
			border-radius: 50%;
			overflow: hidden;
		}

		.navbar-image img{
			width: 100%;
			height: 100%;
		}

		.navbar-icon{
            width: 25px;
			height: 25px;
			margin-top: 15px;
			margin-left: 10px;
		}

		.navbar-icon img{
			width: 100%;
			height: 100%;
		}

		.navbar-name p{
			margin-top: 5px;
			font-size: 20px;
		}

		.navbar-time p{
			margin-top: 5px;
			font-size: 16px;
			color: #aaa;
		}

		.users-chat-container{
			width: 100%;
			height: calc(100vh - 60px);

		}

		.users-chat-main-container{
			float: left;
		}

		.users-chat-main-container.chat{
			width: 70%;
			height: calc(100vh - 60px);
			border-right: 1px solid #ccc;
		}

		.users-chat-main-container.profile{
			width: 30%;
		}

		.chat-chat-container{
		    overflow-x: hidden;
            width: 100%;
			height: calc(100vh - 120px);
		}

		.chat-bottom{
			width: 100%;
			height: 60px;
		}

		.chat-bottom-icon{
			float: left;
		}

		.chat-bottom-icon.icon{
			width: 5%;
		}

		.chat-bottom-icon.send{
			width: 75%;
		}


		.chat-bottom-image{
            width: 25px;
			height: 25px;
			margin-top: 13px;
            margin-left: 10px;
		}
		
		.chat-bottom-image-like-send{
            width: 25px;
			height: 25px;
			margin-top: 13px;
            margin-right: 10px;
		}
		
		.chat-bottom-image-like-send img{
			width: 100%;
			height: 100%;
		}
		
		.chat-bottom-image-like-send #send{
			width: 33px;
			height: 33px;
            margin-right: 10px;
            cursor: pointer;
		}

		.chat-bottom-image img{
			width: 100%;
			height: 100%;
		}

		.chat-bottom-send{
			width: 95%;
			margin: auto;
			height: 50px;
			margin-top: 5px;
			border-radius: 30px;
			background-color: #eee;
		}

		.chat-bottom-input{
			float: left;
		}

		.chat-bottom-input.text{
			width: 90%;
		}

		.chat-bottom-input.smile{
			width: 10%;
		}

		.chat-bottom-input input[type=text]{
            width: 100%;
            font-size: 17px;
            margin-top: 10px;
            margin-left: 10px;
            border: none;
            outline: none;
            height: 30px;
            background-color: #eee;
            
		}

		.user-profile-detail{
			width: 100%;
			height: 200px;
			border-bottom: 1px solid #ccc;
		}

		.user-profile-image{
			width: 120px;
			height: 120px;
			margin: auto;
			margin-top: 10px;
			border-radius: 50%;
			overflow: hidden;
		}

		.user-profile-image img{
			width: 100%;
			height: 100%;
		}

		.user-profile-name p{
             text-align: center;
             font-size: 25px;
             margin-top: 7px;
		}

		.user-profile-time p{
             text-align: center;
             font-size: 17px;
             margin-top: 7px;
             color:  #aaa;
		}

		.chat-right{
			margin-left: 50%;
			display: inline-block;
            padding: 5px;
            float: right;
		}

		.chat-right-page{
			float: right;
		}

		.chat-right-page.name{
			max-width: 90%;
		}

		.chat-right-page.image{
		}

		.chat-display-name{
            background-color: #0084ff;
            border-radius: 30px;
            padding: 10px;
            color: white;
            display: inline-block;
		}

		.chat-display-image{
			width: 15px;
			height: 15px;
			margin-left: 5px;
			margin-right: 5px;
			margin-top: 15px;
			border-radius: 50%;
			overflow: hidden;
		}

		.chat-display-image img{
			width: 100%;
			height: 100%;
		}
        

        .chat-left{
			margin-right: 50%;
			display: inline-block;
            padding: 5px;
            float: left;

		}

		.chat-left-page{
			float: left;
		}

		.chat-left-page.name{
			max-width: 90%;
		}

		.chat-left-page.image{
		}

		.chat-left-display-name{
            background-color: #eee;
            border-radius: 30px;
            padding: 10px;
            color: black;
            display: inline-block;
		}

		.chat-left-display-image{
			width: 25px;
			height: 25px;
			margin-left: 8px;
			margin-right: 8px;
			margin-top: 10px;
			border-radius: 50%;
			overflow: hidden;
		}

		.chat-left-display-image img{
			width: 100%;
			height: 100%;
		}

		.option-container{
			width: 100%;

		}

		.option-heading{
			width: 100%;
			margin-top: 5px;
			overflow: hidden;
		}

		.option-name{
			float: left;
		}

		.option-name.name{
			width: 90%;
		}

		.option-name.icon{
			width: 10%;
		}

		.option-heading-image{
			width: 15px;
			height: 15px;
			
		}

		.option-heading-image img{
			width: 100%;
			height: 100%;
		}

		.option-name p{
            margin-left: 10px;
            color: #aaa;
		}


		.option-search{
			width: 100%;
			margin-top: 15px;
			overflow: hidden;
		}

		.option-search-name{
			float: left;
		}

		.option-search-name.name{
			width: 90%;
		}

		.option-search-name.icon{
			width: 10%;
		}

		.option-search-image{
			width: 15px;
			height: 15px;
			
		}

		.option-search-image img{
			width: 100%;
			height: 100%;
		}

		.option-search-name p{
            margin-left: 10px;
            font-size: 17px;
            color: black;
		}


        .option-edit{
			width: 100%;
			margin-top: 15px;
			overflow: hidden;
		}

		.option-edit-name{
			float: left;
		}

		.option-edit-name.name{
			width: 90%;
		}

		.option-edit-name.icon{
			width: 10%;
		}

		.option-edit-image{
			width: 15px;
			height: 15px;
			
		}

		.option-edit-image img{
			width: 100%;
			height: 100%;
		}

		.option-edit-name p{
            margin-left: 10px;
            font-size: 17px;
            color: black;
		}


		.option-color{
			width: 100%;
			margin-top: 15px;
			overflow: hidden;
		}

		.option-color-name{
			float: left;
		}

		.option-color-name.name{
			width: 90%;
		}

		.option-color-name.icon{
			width: 10%;
		}

		.option-color-image{
			width: 15px;
			height: 15px;
			
		}

		.option-color-image img{
			width: 100%;
			height: 100%;
		}

		.option-color-name p{
            margin-left: 10px;
            font-size: 17px;
            color: black;
		}


        .option-emoji{
			width: 100%;
			margin-top: 15px;
			overflow: hidden;
		}

		.option-emoji-name{
			float: left;
		}

		.option-emoji-name.name{
			width: 90%;
		}

		.option-emoji-name.icon{
			width: 10%;
		}

		.option-emoji-image{
			width: 15px;
			height: 15px;
			
		}

		.option-emoji-image img{
			width: 100%;
			height: 100%;
		}

		.option-emoji-name p{
            margin-left: 10px;
            font-size: 17px;
            color: black;
		}

		.setting-model{
			width: 150px;
			background-color: white;
			margin-top: 60px;
			position: absolute;
			margin-left: 200px;
			border: 1px solid #ccc;
			box-shadow: 0 2px 2px 2px rgba(0,0,0,0.2);
			border-radius: 2px;
			display: none;
		}


		.setting-model p:hover{
			background-color: #ccc;
			cursor: pointer;
		}


		.setting-model-setting{
			border-bottom: 1px solid #eee;
			padding: 5px;
		}


		.setting-model-setting p{
			text-align: center;
			font-size: 16px;
			margin-top: 5px;
		}


		.setting-model-active{
			border-bottom: 1px solid #eee;
			padding: 5px;
		}


		.setting-model-active p{
			text-align: center;
			font-size: 16px;
			margin-top: 5px;
		}


		.setting-model-about{
			border-bottom: 1px solid #eee;
			padding: 5px;
		}


		.setting-model-about p{
			text-align: center;
			font-size: 16px;
			margin-top: 5px;
		}


		.setting-model-help{
			border-bottom: 1px solid #eee;
			padding: 5px;
		}


		.setting-model-help p{
			text-align: center;
			font-size: 16px;
			margin-top: 5px;
		}


		.setting-model-logout{
			border-bottom: 1px solid #eee;
			padding: 5px;
		}


		.setting-model-logout p{
			text-align: center;
			font-size: 16px;
			margin-top: 5px;
			text-decoration: none;
		}
        
        .setting-model-logout a{
            text-decoration: none;
            color: black;
        }
        
    @media (max-width: 990px){
     	
     	.container{
			width: 100%;
			height: 100%;
			overflow: hidden;
			position: fixed;
		}
		.main-container{
            float: left;
		}

		.main-container.users{
		    
			width: 25%;
			height: 100vh;
			border-right: 1px solid #ccc;
		}

		.main-container.chat{
			width: 75%;
		}

		.profile-container{
			width: 100%;
			height: 60px;
			margin-top: 10px;
		}

		.profile-user{
			float: left;

		}

		.profile-user.photo{
            width: 20%;
		}

		.profile-user.heading{
			width: 40%;
		}

		.profile-user.setting{
			width: 20%;
		}

		.profile-user.edit{
			width: 20%;
		}

		.profile-user-image{
			width: 30px;
			height: 30px;
			margin-top: 0px;
			margin-left: 5px;
			position: relative;
			border-radius: 50%;
			overflow: hidden;
		}
		
		.profile-user-image span{
		    position: absolute;
		    top: 0;
		    left: 0;
		    margin-top: 10px;
		    opacity: 0;
		}

		.profile-user-image img{
			width: 100%;
			height: 100%;
		}

		.profile-user-setting{
            width: 20px;
			height: 20px;
			margin-left: -8px;
			margin-top: 5px;
			border-radius: 50%;
			background-color: #eee;
			overflow: hidden;
		}

		.profile-setting-image{
            width: 20px;
			height: 20px;
			margin-top: 1px;
			margin-left: 1px;
		}

		.profile-setting-image img{
			width: 100%;
			height: 100%;
		}

		.profile-user-edit{
            width: 24px;
			height: 24px;
			margin-top: 3px;
			border-radius: 50%;
			margin-left: -4px;
			background-color: #eee;
			overflow: hidden;
		}

		.profile-edit-image{
            width: 18px;
			height: 18px;
			margin-top: 3px;
			margin-left: 4px;
		}

		.profile-edit-image img{
			width: 100%;
			height: 100%;
		}

		.profile-user p{
            font-size: 17px;
            margin-top: 20px;
		}

		.user-container{
			width: 100%;
			height: 100%;
			margin-top: 10px;
			overflow: hidden;

		}

		.search-container{
			width: 100%;
			margin-top: 1px;
			height: 30px;
		}

		.search-container-inside{
			border-radius: 30px;
			margin-left: 3px;
			margin-right: 3px;
			height: 30px;
			background-color: #eee;
			overflow: hidden;
		}

		.search-user{
			float: left;
		}

		.search-user.button{
			width: 15%;
		}

		.search-user.text{
			width: 85%;
		}

		.search-user button{
			width: 100%;
			font-size: 10px;
			border: none;
			color: #ccc;
			background-color: #eee;
			margin-top: 5px;
		}

		.search-user input[type="text"]{
			width: 90%;
			font-size: 8px;
			border: none;
			color: black;
			background-color: #eee;
			margin-top: 5px;
			margin-left: 3px;
		}

		.user-main-container{
			width: 100%;
			margin-top: 4px;
		}
		
		.user-main-container:hover{
		    
		    cursor: pointer;
		    
		}   

		.user-main-container-inside{
			border-radius: 5px;
			margin-left: 2px;
			margin-right: 2px;
			height: 55px;
			background-color: #eee;
			overflow: hidden;
			 margin-top: 5px;
		}

		.user-main-inside{
			float: left;
		}

		.user-main-inside.photo{
			
		}

		.user-main-inside.text{
			
		}

		.user-main-image{
            width: 20px;
			height: 20px;
			margin-top: 1px;
			margin-left: 1px;
			border-radius: 50%;
			overflow: hidden;
		}

		.user-main-image img{
			width: 100%;
			height: 100%;
		}

		.user-main-name{
			width: 100%;
			margin-top: 22px;
			margin-left: -19px;
		}

		.user-main-message{
			width: 100%;
			margin-top: 1px;
			margin-left: -19px;
		}

		.user-last-message{
			float: left;
		}

		.user-last-message.message{
			max-width: 70%;
		}

		.user-last-message.date{
		    margin-right: -4px;
			width: 30%;
			margin-left: 1px;
		}

		.user-main-name p{
           font-size: 10px;
		}

		.user-main-message p{
           font-size: 8px;
           color: #aaa;
		}


		.main-navbar{
			width: 100%;
			height: 60px;
			border-bottom: 1px solid #ccc;
		}

		.main-navbar-inside{
			float: left;
		}

		.main-navbar-inside.photo{
			width: 10%;
		}

		.main-navbar-inside.name{
			width: 60%;
		}

		.main-navbar-inside.icon{
			width: 10%;
		}

		.navbar-image{
            width: 40px;
			height: 40px;
			margin-top: 8px;
			margin-left: 3px;
			border-radius: 50%;
			overflow: hidden;
		}

		.navbar-image img{
			width: 100%;
			height: 100%;
		}

		.navbar-icon{
            width: 15px;
			height: 15px;
			margin-top: 20px;
		}

		.navbar-icon img{
			width: 100%;
			height: 100%;
		}

		.navbar-name p{
		    margin-left: 23px;
			margin-top: 10px;
			font-size: 14px;
		}

		.navbar-time p{
			margin-left: 23px;
			margin-top: 4px;
			font-size: 12px;
			color: #aaa;
		}

		.users-chat-container{
			width: 100%;
			height: calc(100vh - 60px);

		}

		.users-chat-main-container{
			float: left;
		}

		.users-chat-main-container.chat{
			width: 70%;
			height: calc(100vh - 60px);
			border-right: 1px solid #ccc;
		}

		.users-chat-main-container.profile{
			width: 30%;
		}

		.chat-chat-container{
		    overflow-x: hidden;
            width: 100%;
			height: calc(100vh - 155px);
		}

		.chat-bottom{
			width: 100%;
			height: 40px;
			
             bottom: 0;
		}

		.chat-bottom-icon{
			float: left;
		}

		.chat-bottom-icon.icon{
			width: 7%;
		}

		.chat-bottom-icon.send{
		    margin-left: -10px;
			width: 70%;
		}


		.chat-bottom-image{
            width: 11px;
			height: 11px;
			margin-top: 10px;
            margin-left: 0px;
		}
		
		.chat-bottom-image-like-send{
            width: 13px;
			height: 13px;
			margin-top: 10px;
            margin-left: -8px;
		}
		
		.chat-bottom-image-like-send img{
			width: 100%;
			height: 100%;
		}
		
		.chat-bottom-image-like-send #send{
			width: 15px;
			height: 15px;
			margin-top: 3px;
            margin-left: -2px;
            cursor: pointer;
		}

		.chat-bottom-image img{
			width: 100%;
			height: 100%;
		}

		.chat-bottom-send{
			width: 80%;
			margin: auto;
			height: 30px;
			margin-top: 5px;
			border-radius: 30px;
			background-color: #eee;
		}

		.chat-bottom-input{
			float: left;
		}

		.chat-bottom-input.text{
			width: 85%;
		}

		.chat-bottom-input.smile{
		    margin-top: -4px;
			width: 15%;
		}

		.chat-bottom-input input[type=text]{
            width: 94%;
            font-size: 12px;
            margin-top: 5px;
            margin-left: 5px;
            border: none;
            outline: none;
            height: 20px;
            background-color: #eee;
            
		}

		.user-profile-detail{
			width: 100%;
			height: 100px;
			border-bottom: 1px solid #ccc;
		}

		.user-profile-image{
			width: 35px;
			height: 35px;
			margin: auto;
			margin-top: 10px;
			border-radius: 50%;
			overflow: hidden;
		}

		.user-profile-image img{
			width: 100%;
			height: 100%;
		}

		.user-profile-name p{
             text-align: center;
             font-size: 9px;
             margin-top: 5px;
		}

		.user-profile-time p{
             text-align: center;
             font-size: 8px;
             margin-top: 5px;
             color:  #aaa;
		}

		.chat-right{
			margin-left: 50%;
			display: inline-block;
            padding: 3px;
            float: right;
		}

		.chat-right-page{
			float: right;
		}

		.chat-right-page.name{
			max-width: 90%;
		}

		.chat-right-page.image{
		}

		.chat-display-name{
            background-color: #0084ff;
            border-radius: 15px;
            font-size: 9px;
            padding: 5px;
            color: white;
            display: inline-block;
		}

		.chat-display-image{
			width: 14px;
			height: 14px;
			margin-left: 0px;
			margin-right: 0px;
			margin-top: 5px;
			border-radius: 50%;
			
		}

		.chat-display-image img{
			width: 100%;
			height: 100%;
		}
        

        .chat-left{
			margin-right: 50%;
			display: inline-block;
            padding: 3px;
            float: left;

		}

		.chat-left-page{
			float: left;
		}

		.chat-left-page.name{
			max-width: 90%;
		}

		.chat-left-page.image{
		}

		.chat-left-display-name{
            background-color: #eee;
            font-size: 9px;
            border-radius: 15px;
            padding: 5px;
            color: black;
            display: inline-block;
		}

		.chat-left-display-image{
			width: 17px;
			height: 17px;
			margin-left: 0px;
			margin-right: 0px;
			margin-top: 5px;
			border-radius: 50%;
			overflow: hidden;
		}

		.chat-left-display-image img{
			width: 100%;
			height: 100%;
		}

		.option-container{
			width: 100%;

		}

		.option-heading{
			width: 100%;
			margin-top: 5px;
			overflow: hidden;
		}

		.option-name{
			float: left;
		}

		.option-name.name{
			width: 80%;
		}

		.option-name.icon{
			width: 20%;
		}

		.option-heading-image{
			width: 10px;
			height: 10px;
			
		}

		.option-heading-image img{
			width: 100%;
			height: 100%;
		}

		.option-name p{
            margin-left: 2px;
            color: #aaa;
		}


		.option-search{
			width: 100%;
			margin-top: 10px;
			overflow: hidden;
		}

		.option-search-name{
			float: left;
		}

		.option-search-name.name{
			width: 80%;
		}

		.option-search-name.icon{
			width: 20%;
		}

		.option-search-image{
			width: 10px;
			height: 10px;
			
		}

		.option-search-image img{
			width: 100%;
			height: 100%;
		}

		.option-search-name p{
            margin-left: 2px;
            font-size: 9px;
            color: black;
		}


        .option-edit{
			width: 100%;
			margin-top: 10px;
			overflow: hidden;
		}

		.option-edit-name{
			float: left;
		}

		.option-edit-name.name{
			width: 80%;
		}

		.option-edit-name.icon{
			width: 20%;
		}

		.option-edit-image{
			width: 10px;
			height: 10px;
			
		}

		.option-edit-image img{
			width: 100%;
			height: 100%;
		}

		.option-edit-name p{
            margin-left: 2px;
            font-size: 9px;
            color: black;
		}


		.option-color{
			width: 100%;
			margin-top: 10px;
			overflow: hidden;
		}

		.option-color-name{
			float: left;
		}

		.option-color-name.name{
		    margin-top: 5px;
			width: 80%;
		}

		.option-color-name.icon{
		    margin-bottom: 5px;
			width: 20%;
		}

		.option-color-image{
			width: 10px;
			height: 10px;
			
		}

		.option-color-image img{
			width: 100%;
			height: 100%;
		}

		.option-color-name p{
            margin-left: 2px;
            font-size: 9px;
            color: black;
		}


        .option-emoji{
			width: 100%;
			margin-top: 10px;
			overflow: hidden;
		}

		.option-emoji-name{
			float: left;
		}

		.option-emoji-name.name{
		    margin-top: 5px;
			width: 80%;
		}

		.option-emoji-name.icon{
		    margin-bottom: 5px;
			width: 20%;
		}

		.option-emoji-image{
			width: 10px;
			height: 10px;
			
		}

		.option-emoji-image img{
			width: 100%;
			height: 100%;
		}

		.option-emoji-name p{
            margin-left: 2px;
            font-size: 9px;
            color: black;
		}

		.setting-model{
			width: 100px;
			background-color: white;
			margin-top: 30px;
			position: absolute;
			margin-left: 5px;
			border: 1px solid #ccc;
			box-shadow: 0 2px 2px 2px rgba(0,0,0,0.2);
			border-radius: 2px;
			display: none;
		}


		.setting-model p:hover{
			background-color: #ccc;
			cursor: pointer;
		}


		.setting-model-setting{
			border-bottom: 1px solid #eee;
			padding: 2px;
		}


		.setting-model-setting p{
			text-align: center;
			font-size: 9px;
			margin-top: 3px;
		}


		.setting-model-active{
			border-bottom: 1px solid #eee;
			padding: 3px;
		}


		.setting-model-active p{
			text-align: center;
			font-size: 9px;
			margin-top: 3px;
		}


		.setting-model-about{
			border-bottom: 1px solid #eee;
			padding: 2px;
		}


		.setting-model-about p{
			text-align: center;
			font-size: 9px;
			margin-top: 3px;
		}


		.setting-model-help{
			border-bottom: 1px solid #eee;
			padding: 2px;
		}


		.setting-model-help p{
			text-align: center;
			font-size: 9px;
			margin-top: 3px;
		}


		.setting-model-logout{
			border-bottom: 1px solid #eee;
			padding: 2px;
		}


		.setting-model-logout p{
			text-align: center;
			font-size: 9px;
			margin-top: 3px;
			text-decoration: none;
		}
        
        .setting-model-logout a{
            text-decoration: none;
            color: black;
        }   
        
        
        
        
        
    }

	</style>
</head>
<body>

<div class="container">

	<div class="main-container users">
		
        <div class="profile-container">
        	
            <div class="profile-user photo">
            	
                <div class="profile-user-image">
                	
                     <?php 
                     
                     echo $user_image;
                     
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
            	
                    <a href="messenger_logout.php"><p>Logout</p></a>

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
        	
                     <input type="text" name="user" placeholder="search messenger.." /> 

                 </div>

                </div> 

             </div>

             <div class="user-main-container">
        	
                 
                 

             </div>


        </div>

	</div>

	<div class="main-container chat">
		
        <div class="main-navbar">
		
            

		
	    </div>

       <div class="users-chat-container">
       	
           <div class="users-chat-main-container chat">

           	  <div class="chat-chat-container">

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
         	
                               <img src="image/arrowdown.png">
         	
                          </div>
         	
                      </div>
         	
                 </div>

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
<script>
    
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
    
    $(document).on('change','#profile_image', function(){
        
        var formData = new FormData();
        
        var inputFile = document.getElementById('profile_image').files[0];
        
        formData.append("file", inputFile);
        
        $.ajax({
            
            url:"messenger_action.php",
            
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
    
    
    
     fetch_users();
    
    function fetch_users()
    {
        
        var action = "fetch_users";
        
         $.ajax({
            
            url:"messenger_action.php",
            
            method:"post",
            
            data:{action_users:action},
            
            success:function(data){
                
                $('.user-main-container').html(data);
                
            }
            
        });
        
    }
    
    
    $(document).on('click','.user-main-details', function(){
        
         var userId = $(this).data('user_id');
         
         fetch_users_top_nav(userId);
         
         fetch_users_profile(userId);
         
         type_message(userId);
         
         fetch_message(userId);
         
         users_last_seen_message(userId);
         
    });
    
    function type_message(userId){
    
     $('#send').unbind('click').bind('click', function(){
         
         var sendMessage = $('#type_message').val();
         
          send_message(userId, sendMessage);
          
    });
    
    }
    
    
         fetch_users_top_nav(userId);
    
    function fetch_users_top_nav(userId)
    {
        
        var action = "fetch_users_top_nav";
        
         $.ajax({
            
            url:"messenger_action.php",
            
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
            
            url:"messenger_action.php",
            
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
            
            url:"messenger_action.php",
            
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
            
            url:"messenger_action.php",
            
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
            
            url:"messenger_action.php",
            
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
            
            url:"messenger_action.php",
            
            method:"post",
            
            data:{action_status:action},
            
            success:function(data){
                
               
               //alert(data); 
               
                
            }
            
        });
        
    }
    
    
});
</script>
</body>
</html>