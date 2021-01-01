<?php  
session_start();
if (!isset($_SESSION['Email'])) {
  header('location:doctorlogin.php');
}



?> 

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Doctorpage</title>
  <link rel="shortcut icon" type="image/png" href="Image/ninjaapple.png">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
<link rel="stylesheet" href="font/Rimouski.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
  <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js">
  </script>

    
<style>

*{
  padding: 0;
  margin: 0;
  text-decoration: none;
  list-style: none;
  box-sizing: border-box;
}

main{
 width: 100%;margin: 0px auto;height:100%;
 display: grid; color: white;
 grid-template-rows: 80px 550px;
 grid-template-columns: 20% 60% 20%;
 position:fixed;
}

 .div1{
     background-color: #ff4757; 
      grid-column-start:1;
      grid-column-end:4;
 }
 .div2{
     background-color: #C5C5C5; 
     overflow-x: hidden;
 }
 .div3{ 
     overflow-x: hidden;
      border:1px solid grey;
     border-bottom: none;
     
 }
 .div4{
  
     
 }
 
   
 
  .img{
     height: 200px;
     max-width: 50%;
 }
 
 .slider{
     height: 200px;
     width: 50%;
     margin-top: 20px;
     
 }
 
 .text{
     color: #3C3C3C;
     height: auto;
     max-width: 80% ;
    margin: 10px auto;
     margin-top: 20px;
     text-align: justify;
     font-size: 1.5vw;
     line-height: 32px;
 }
 
  .digital-clock{
     
     margin-top: 10px;
 }
 
 
 .datetime{
  color: #fff;
  background: #10101E;
  font-family: "Segoe UI", sans-serif;
  max-width: 100%;
  margin: auto;
  padding: 13px 8px;
  border: 3px solid #2E94E3;
  border-radius: 5px;
  -webkit-box-reflect: below 1px linear-gradient(transparent, rgba(255, 255, 255, 0.1));
  transition: 0.5s;
  transition-property: background, box-shadow;
}

.datetime:hover{
  background: #2E94E3;
  box-shadow: 0 0 30px #2E94E3;
}

.date{
  font-size: 18px;
  font-weight: 600;
  text-align: center;
  letter-spacing: 2px;
}

.time{
  font-size: 45px;
  display: flex;
  justify-content: center;
  align-items: center;
}

.time span:not(:last-child){
  position: relative;
  margin: 0 6px;
  font-weight: 600;
  text-align: center;
  letter-spacing: 1px;
}

.time span:last-child{
  background: #2E94E3;
  font-size: 30px;
  font-weight: 600;
  text-transform: uppercase;
  margin-top: 10px;
  padding: 0 5px;
  border-radius: 3px;
}


body{
  font-family: montserrat;
}
nav{
  background: #0082e6;
  height: 80px;
  width: 100%;
}
label.logo{
  color: white;
  font-size: 35px;
  line-height: 80px;
  padding: 0 50px;
  font-weight: bold;
}
nav ul{
  display: inline-block;
  float: right;
  margin-right: 20px;
}
.l{
  display: inline-block;
  line-height: 80px;
  margin: 0 5px;
}
nav ul li a{
  color: white;
  font-size: 17px;
  padding: 7px 13px;
  border-radius: 3px;
  text-transform: uppercase;
}
a.active,a:hover{
  background: #1b9bff;
  transition: .5s;
}
.checkbtn{
  font-size: 30px;
  color: white;
  float: right;
  margin-top: 22px;
  margin-right: 40px;
  cursor: pointer;
  display: none;
}
#check{
  display: none;
}

.btn {
    border-style: solid;
   border-color: #838282;
   background-color: #C4C4C4 ;
   font-size: 15px;
   padding: 5px;
   border-radius: 5px;
    color: green; 
    border-top-color: green;
    border-top-width: 3px;
    border-bottom-right-width:3px;
    cursor: pointer;
}
.btn:hover{
  color: #DEDEDD;
}

.deta{
   display:none;
   padding-top: 20px;
   position: fixed; 
}

.details1{
    display:none;
   padding-top: 20px;
   position: fixed;
   float: left;
   
}
.file1{
    display:none;
    height: 160px;width: 160px;border-radius: 160px;position: fixed;transform: translateX(30px);
}


.name1{
   
   font-size: 15px;
}

.fatchname1{
    
    font-size: 13px;
    color: #C36A00;
}


.details{
    
    width: 97%;
    height: 310px;
   padding-top: 8px;
   position: relative;
   float: left;
   transform: translateX(8px);
   border-bottom: 2px solid black;
}
.file{
    
    height: 150px;width: 150px;border-radius: 150px;position: relative;transform: translateX(35px);
}
.name{
   color: #C70039;
   font-size: 14px;
   position: relative;
   top:-203px;
}

.fatchname{
    
    font-size: 12px;
    color: #000000;
    position: relative;
    top:-203px;
}


/* SOCIAL PANEL CSS */
.social-panel-container {
	position: fixed;
	right: 0;
	bottom: 80px;
	transform: translateX(100%);
	transition: transform 0.4s ease-in-out;
}

.social-panel-container.visible {
	transform: translateX(-10px);
}

.social-panel {	
	background-color: #fff;
	border-radius: 16px;
	box-shadow: 0 16px 31px -17px rgba(0,31,97,0.6);
	border: 5px solid #001F61;
	display: flex;
	flex-direction: column;
	justify-content: center;
	align-items: center;
	font-family: 'Muli';
	position: relative;
	height: 169px;	
	width: 370px;
	max-width: calc(100% - 10px);
}

.social-panel button.close-btn {
	border: 0;
	color: #97A5CE;
	cursor: pointer;
	font-size: 20px;
	position: absolute;
	top: 5px;
	right: 5px;
}

.social-panel button.close-btn:focus {
	outline: none;
}

.social-panel p {
	background-color: #001F61;
	border-radius: 0 0 10px 10px;
	color: #fff;
	font-size: 14px;
	line-height: 18px;
	padding: 2px 17px 6px;
	position: absolute;
	top: 0;
	left: 50%;
	margin: 0;
	transform: translateX(-50%);
	text-align: center;
	width: 235px;
}

.social-panel p i {
	margin: 0 5px;
}

.social-panel p a {
	color: #FF7500;
	text-decoration: none;
}

.social-panel h4 {
	margin: 20px 0;
	color: #97A5CE;	
	font-family: 'Muli';	
	font-size: 14px;	
	line-height: 18px;
	text-transform: uppercase;
}

.social-panel ul {
	display: flex;
	list-style-type: none;
	padding: 0;
	margin: 0;
}

.social-panel ul li {
	margin: 0 10px;
}

.social-panel ul li a {
	border: 1px solid #DCE1F2;
	border-radius: 50%;
	color: #001F61;
	font-size: 20px;
	display: flex;
	justify-content: center;
	align-items: center;
	height: 50px;
	width: 50px;
	text-decoration: none;
}

.social-panel ul li a:hover {
	border-color: #FF6A00;
	box-shadow: 0 9px 12px -9px #FF6A00;
}

.floating-btn {
	border-radius: 26.5px;
	background-color: #001F61;
	border: 1px solid #001F61;
	box-shadow: 0 16px 22px -17px #03153B;
	color: #fff;
	cursor: pointer;
	font-size: 16px;
	line-height: 20px;
	padding: 12px 20px;
	position: fixed;
	bottom: 20px;
	right: 20px;
	z-index: 999;
}

.floating-btn:hover {
	background-color: #ffffff;
	color: #001F61;
}

.floating-btn:focus {
	outline: none;
}

.floating-text {
	background-color: #001F61;
	border-radius: 10px 10px 0 0;
	color: #fff;
	font-family: 'Muli';
	padding: 7px 15px;
	position: fixed;
	bottom: 0;
	left: 50%;
	transform: translateX(-50%);
	text-align: center;
	z-index: 998;
}

.floating-text a {
	color: #FF7500;
	text-decoration: none;
}

.tap{
    display: none;
}

.container{
    max-width: 100%;    

    display: block;
    margin: 0 auto;
    
    border-radius: 10px;
    padding-bottom : 50px;
}

.app-title{
    width: 100%;
    height: 30px;
    border-radius: 10px 10px 0 0;
}

.app-title p{
    text-align: center;
    padding: 15px;
    margin: 0 auto;
    font-size: 1.2em;
    color: #C70039;
}

.notification{
    background-color: #f8d7da;
    display: none;
}

.notification p{
    color: #721c24;
    font-size: 1.2em;
    margin: 0;
    text-align: center;
    padding: 10px 0;
}

.weather-container{
    width: 100%;
    height: 200px;
    background-color: #F4F9FF;
}

.weather-icon{
    width: 100%;
    height: 110px;
}

.weather-icon img{
    display: block;
    margin: 0 auto;
}

.temperature-value{
    width: 100%;
    height:50px;
    margin-top: 15px;
}

.temperature-value p{
    padding: 0;
    margin: 0;
    color: #293251;
    font-size: 3em;
    text-align: center;
    cursor: pointer;
    font-family: "Rimouski";
}

.temperature-value p:hover{
    
}

.temperature-value span{
    color: #293251;
    font-size: 0.5em;
}

.temperature-description{
    
}

.temperature-description p{
    padding: 8px;
    margin: 0;
    color: #293251;
    text-align: center;
    font-size: 1.2em;
}

.location{
    
}

.location p{
    margin: 0;
    padding: 0;
    color: #293251;
    text-align: center;
    font-size: 0.8em;
} 

.loader{
    height: 160px;
    width: 160px;
    display: flex;
    position: relative;
}

#loading{
    
   height: 98px;
    width: 100px;
    border-radius: 260px;
    margin-top: -128px;
    transform: translateX(60px);
    
}

#loading1{
    
   height: 50px;
    width: 70px;
    border-radius: 220px;
    position: relative;
    margin-top: 45px;
    transform: translateX(-85px);
    display: none;
    
}


.chart2{
  width: 100px;
  height: 100px;
  display: none;
  
}


.chart{
  transform: translateY(-90px);    
  width: 100px;
  height: 100px;
  display: block;
  z-index: 1;
}

.numbers{
  color: black;
  margin: 0;
  padding: 0;
  width: 50px;
  height: 100%;
  display: inline-block;
  float: left;
}

.numbers li{
  list-style: none;
  height: 60%;
  position: relative;
  bottom: 5px;
}

.numbers span{
    font-size: 12px;
  font-weight: 600;
  position: absolute;
  bottom: 0;
  right: 10px;
}

.bars{
  color: black;
  font-size: 10px;
  font-weight: 600;
  background: #555;
  margin-top: -60px;
  margin-left: 45px;
  display: inline-block;
  width: 180px;
  height: 135px;
  box-shadow: 0 0 10px 0 #555;
  border-radius: 5px;
  font-family: Arial;
}

.bars li{
  display: table-cell;
  width: 180px;
  height: 134px;
  position: relative;
}

.bars span{
  width: 100%;
  position: absolute;
  bottom: -15px;
  text-align: center;
}

.bars .bar{
  display: block;
  background: #17C0EB;
  width: 10px;
  position: absolute;
  bottom: 0;
  margin-left: 12px;
  text-align: center;
  box-shadow: 0 0 10px 0 rgba(23, 192, 235, 0.5);
  transition: 0.5s;
  transition-property: background, box-shadow;
}

.bars .bar:hover{
  background: #55EFC4;
  box-shadow: 0 0 10px 0 rgba(85, 239, 196, 0.5);
  cursor: pointer;
}

.bars .bar:before{
  color: #fff;
  margin-left: -4px;
  content: attr(data-percentage) '%';
  position: relative;
  bottom: 13px;
}


.stars-p2{
    display: none;
}

.stardiv2{
  display: none;
}

.stars2{
    display: none;
}


.stars-p{
    color: black;
    font-size: 16px;
    margin-left: 5px;
}

.stardiv{
  background-color: green; 
  display: flex;
  transform: translateY(-31px);
  z-index: 999999;
}

.stars{
    width: 100%;
    height: 100px;
    justify-content: center;
    align-items: center;
    display: flex;
}

.star{
    padding-left: 10px;
    list-style: none;
    color: white;
    font-size: 2rem;
    cursor: pointer;
}
.star:first-child{
    padding-left: 0;
}

.yellow{
    
    color: yellow;
    
}

.yellows{
    
    color: #FBFF00;
}


@media (max-width: 1170px){
    
 
 .name{
   color: #C70039;
   font-size: 13px;
   position: relative;
   top:-203px;
}

.fatchname{
    
    font-size: 11px;
    color: #000000;
    position: relative;
    top:-203px;
}
    
.stars-p{
    color: black;
    font-size: 13px;
    margin-left: 5px;
}

.star{

    font-size: 1.7rem;
}
    
 .chart{
  width: 100px;
  height: 100px;
  display: block;
  z-index: 1;
}

.numbers{
  color: black;
  margin: 0;
  padding: 0;
  width: 50px;
  height: 100%;
  display: inline-block;
  float: left;
}

.numbers li{
  list-style: none;
  height: 57%;
  position: relative;
  bottom: 5px;
}

.numbers span{
    font-size: 12px;
  font-weight: 600;
  position: absolute;
  bottom: 0;
  right: 10px;
}

.bars{
  color: black;
  font-size: 8px;
  font-weight: 600;
  background: #555;
  margin-top: -60px;
  margin-left: 45px;
  display: inline-block;
  width: 150px;
  height: 125px;
  box-shadow: 0 0 10px 0 #555;
  border-radius: 5px;
}

.bars li{
  display: table-cell;
  width: 150px;
  height: 124px;
  position: relative;
}

.bars span{
  width: 100%;
  position: absolute;
  bottom: -15px;
  text-align: center;
}

.bars .bar{
  display: block;
  background: #17C0EB;
  width: 10px;
  position: absolute;
  bottom: 0;
  margin-left: 12px;
  text-align: center;
  box-shadow: 0 0 10px 0 rgba(23, 192, 235, 0.5);
  transition: 0.5s;
  transition-property: background, box-shadow;
}

.bars .bar:hover{
  background: #55EFC4;
  box-shadow: 0 0 10px 0 rgba(85, 239, 196, 0.5);
  cursor: pointer;
}

.bars .bar:before{
  color: #fff;
  margin-left: -3px;
  content: attr(data-percentage) '%';
  position: relative;
  bottom: 13px;
}
    
  label.logo{
    font-size: 30px;
    padding-left: 30px;
  }
  nav ul li a{
    font-size: 14px;
  }
  
   .digital-clock{
     
     margin-top: 10px;
 }
 
 
  .datetime{
  color: #fff;
  background: #10101E;
  font-family: "Segoe UI", sans-serif;
  max-width: 100%;
  margin: auto;
  padding: 13px 8px;
  border: 3px solid #2E94E3;
  border-radius: 5px;
  -webkit-box-reflect: below 1px linear-gradient(transparent, rgba(255, 255, 255, 0.1));
  transition: 0.5s;
  transition-property: background, box-shadow;
}

.datetime:hover{
  background: #2E94E3;
  box-shadow: 0 0 30px #2E94E3;
}

.date{
  font-size: 15px;
  font-weight: 600;
  text-align: center;
  letter-spacing: 2px;
}

.time{
  font-size: 35px;
  display: flex;
  justify-content: center;
  align-items: center;
}

.time span:not(:last-child){
  position: relative;
  margin: 0 6px;
  font-weight: 600;
  text-align: center;
  letter-spacing: 1px;
}

.time span:last-child{
  background: #2E94E3;
  font-size: 24px;
  font-weight: 600;
  text-transform: uppercase;
  margin-top: 10px;
  padding: 0 5px;
  border-radius: 3px;
}

}
@media (max-width: 990px){
    
    
    
 .yellow2{
    
    color: yellow;
    
}

.yellows2{
    
    color: #FBFF00;
}

.stardiv{
  display: none;
}
    
.stars-p2{
    color: black;
    font-size: 12px;
    margin-left: 3px;
    display: block;
    transform: translateY(-10px);
}

.stardiv2{
  background-color: green; 
  display: flex;
  transform: translateY(-45px);
  z-index: 999999;
}

.stars2{
    width: 100%;
    height: 100px;
    justify-content: center;
    align-items: center;
    display: flex;
}

.star3{
    padding-left: 4px;
    border: none;
    font-size: 1.5rem;
    cursor: pointer;
}
.star3:first-child{
    padding-left: 0;
}    
    
.chart{
  width: 100px;
  height: 100px;
  display: none;
}
    
.chart2{
  width: 100px;
  height: 100px;
  display: block;
  z-index: 1;
  transform: translateY(-110px);
}

.numbers2{
  color: black;
  margin: 0;
  padding: 0;
  width: 50px;
  height: 100%;
  display: inline-block;
  float: left;
}

.numbers2 li{
  list-style: none;
  height: 57%;
  position: relative;
  bottom: 5px;
}

.numbers2 span{
    font-size: 12px;
  font-weight: 600;
  position: absolute;
  bottom: 0;
  right: 10px;
}

.bars2{
  color: black;
  font-size: 9px;
  font-weight: 600;
  background: #555;
  margin-top: -60px;
  margin-left: 45px;
  display: inline-block;
  width: 150px;
  height: 125px;
  box-shadow: 0 0 10px 0 #555;
  border-radius: 5px;
  font-family: Arial;
}

.bars2 li{
  display: table-cell;
  width: 150px;
  height: 124px;
  position: relative;
}

.bars2 span{
  width: 100%;
  position: absolute;
  bottom: -15px;
  text-align: center;
}

.bars2 .bar2{
  display: block;
  background: #17C0EB;
  width: 10px;
  position: absolute;
  bottom: 0;
  margin-left: 12px;
  text-align: center;
  box-shadow: 0 0 10px 0 rgba(23, 192, 235, 0.5);
  transition: 0.5s;
  transition-property: background, box-shadow;
}

.bars2 .bar2:hover{
  background: #55EFC4;
  box-shadow: 0 0 10px 0 rgba(85, 239, 196, 0.5);
  cursor: pointer;
}

.bars2 .bar2:before{
  color: #fff;
  margin-left: -4px;
  content: attr(data-percentage) '%';
  position: relative;
  bottom: 13px;
}    
    
    
    #loading{
    
   height: 70px;
    width: 100px;
    border-radius: 260px;
    position: relative;
    margin-top: 45px;
    transform: translateX(-85px);
    display: none;
    
}
        
    
  .checkbtn{
    display: block;
  }
  .ul{
position: fixed;
    width: 200px;
    height: 100%;
    overflow-x: hidden;
    background-image:linear-gradient(to left,#0652DD,#1289A7,#12CBC4);
    z-index: 99999;
    top: 80px;
    left: -100%;
    text-align: center;
    transition: all .5s;
    
  }
  
  .l{
    display: block;
    margin: 30px 0;
    line-height: 30px;
  }
  nav ul li a{
    font-size: 17px;
  }
  a:hover,a.active{
    background: none;
    color: #FFC312;
  }
  #check:checked ~ ul{
    left: 0;
  }
  
  .details{
      display:none;
   padding-top: 20px;
   position: relative;
   float: left;
   
}


.deta{
   display:inline-block;
   padding-top: 0px;
   position: relative; 
}
  
  .details1{
      display:inline-block;
   padding-top: 1px;
   padding-bottom: 1px;
   position: relative;
 
   text-align: left;
   
}
.file1{
    display:inline-block;
    height: 100px;width: 100px;border-radius: 100px;position: relative;transform: translateX(0px);
}

.tap{
    display: inline-block;
    font-size:10px;
    color:red;
}

.name1{
   font-size: 13px;
   color: #3C6DF9;
}

.fatchname1{
    font-size: 11px;
    color: #C36A00;
}


.loader1{
    height: 100px;
    width: 100px;
    display: flex;
    position: relative;
    margin-left: 25px;
}

#loading1{
    
   height: 60px;
    width: 70px;
    border-radius: 220px;
    position: relative;
    display: block;
    margin-top: 20px;
    margin-left: 3px;
    
}



/* details panel css */

.details1-panel-container {
  position: fixed;
  left: 0;
  top: 210px;
  transform: translateX(-200px);
  transition: transform .2s ease-in-out;
}

.details1-panel-container.visible {
  transform: translateX(10px);
}



.details1-panel { 
  background-color: #fff;
  border-radius: 16px;
  box-shadow: 0 16px 31px -17px rgba(0,31,97,0.6);
  border: 5px solid #001F61;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  font-family: 'Muli';
  position: relative;
  height: 160px;  
  width: 200px;
  max-width: calc(100% - 10px);
}



/* SOCIAL PANEL CSS */
.social-panel-container {
	position: fixed;
	right: 0;
	bottom: 80px;
	transform: translateX(100%);
	transition: transform 0.4s ease-in-out;
}

.social-panel-container.visible {
	transform: translateX(-10px);
}

.social-panel {	
	background-color: #fff;
	border-radius: 16px;
	box-shadow: 0 16px 31px -17px rgba(0,31,97,0.6);
	border: 5px solid #001F61;
	display: flex;
	flex-direction: column;
	justify-content: center;
	align-items: center;
	font-family: 'Muli';
	position: relative;
	height: 100px;	
	width: 200px;
	max-width: calc(100% - 10px);
}

.social-panel button.close-btn {
	border: 0;
	color: #97A5CE;
	cursor: pointer;
	font-size: 13px;
	position: absolute;
	top: 5px;
	right: 5px;
}

.social-panel button.close-btn:focus {
	outline: none;
}

.social-panel p {
	background-color: #001F61;
	border-radius: 0 0 10px 10px;
	color: #fff;
	font-size: 10px;
	line-height: 18px;
	padding: 2px 17px 6px;
	position: absolute;
	top: 0;
	left: 50%;
	margin: 0;
	transform: translateX(-50%);
	text-align: center;
	width: 140px;
}

.social-panel p i {
	margin: 0 5px;
}

.social-panel p a {
	color: #FF7500;
	text-decoration: none;
}

.social-panel h4 {
	margin: 20px 0;
	color: #97A5CE;	
	font-family: 'Muli';	
	font-size: 14px;	
	line-height: 18px;
	text-transform: uppercase;
}

.social-panel ul {
	display: flex;
	list-style-type: none;
	padding: 0;
	margin: 0;
}

.social-panel ul li {
	margin: 0 6px;
}

.social-panel ul li a {
	border: 1px solid #DCE1F2;
	border-radius: 50%;
	color: #001F61;
	font-size: 13px;
	display: flex;
	justify-content: center;
	align-items: center;
	height: 25px;
	width: 25px;
	text-decoration: none;
}

.social-panel ul li a:hover {
	border-color: #FF6A00;
	box-shadow: 0 9px 12px -9px #FF6A00;
}

.profile-btn{
     border-radius: 46px;
  background-color: none;
  border: none;
  cursor: pointer;
  background-image:linear-gradient(to left,#0652DD,#1289A7,#12CBC4);
  outline: none;
}

.floating-btn {
  border-radius: 26.5px;
  background-color: #001F61;
  border: 1px solid #001F61;
  box-shadow: 0 16px 22px -17px #03153B;
  color: #fff;
  cursor: pointer;
  font-size: 10px;
  line-height: 20px;
  padding: 8px 16px;
  position: fixed;
  bottom: 10px;
  right: 4px;
  z-index: 999;
}

.floating-btn:hover {
	background-color: #ffffff;
	color: #001F61;
}

.floating-btn:focus {
	outline: none;
}

.floating-text {
	background-color: #001F61;
	border-radius: 10px 10px 0 0;
	color: #fff;
	font-family: 'Muli';
	padding: 4px 11px;
	position: fixed;
	bottom: 0;
	left: 50%;
	transform: translateX(-50%);
	font-size: 11px;
	text-align: center;
	z-index: 998;
}

.floating-text a {
	color: #FF7500;
	text-decoration: none;
}


main{
 width: 100%;margin: 0px auto;height:100%;
 display: grid; color: white;
 grid-template-rows: 80px 490px;
 grid-template-columns: 0% 70% 30%;
 position:fixed;
}

 .div1{
     background-color: #ff4757; 
      grid-column-start:1;
      grid-column-end:4;
 }
 
 .div2{
     
     
 }

 .div3{ 

     border:1px solid grey;
     border-bottom: none;
     
 }
 .div4{
 
 }
 
  .img{
     height: 150px;
     max-width: 50%;
 }

 .slider{
     height: 200px;
     width: 50%;
     margin-top: 20px;
     
 }
 
 .text{
     color: #3C3C3C;
     height: auto;
     max-width: 80% ;
    margin: 10px auto;
     margin-top: 15px;
     text-align: justify;
     font-size: 13px;
     line-height: 19px;
 }
 
  .datetime{
  color: #fff;
  background: #10101E;
  font-family: "Segoe UI", sans-serif;
  max-width: 100%;
  margin: auto;
  padding: 10px 5px;
  border: 3px solid #2E94E3;
  border-radius: 2px;
  -webkit-box-reflect: below 1px linear-gradient(transparent, rgba(255, 255, 255, 0.1));
  transition: 0.5s;
  transition-property: background, box-shadow;
}

.datetime:hover{
  background: #2E94E3;
  box-shadow: 0 0 30px #2E94E3;
}

.date{
  font-size: 10px;
  font-weight: 600;
  text-align: center;
  letter-spacing: 0px;
}

.time{
  font-size: 15px;
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 5px;
}

.time span:not(:last-child){
  position: relative;
  margin: 0 2px;
  font-weight: 600;
  text-align: center;
  letter-spacing: 0px;
}

.time span:last-child{
  background: #2E94E3;
  font-size: 13px;
  font-weight: 600;
  text-transform: uppercase;
  margin-top: 1px;
  padding: 0 1px;
  border-radius: 3px;
}



}

@media (max-width: 500px){
    
    .stars-p2{
    color: black;
    font-size: 10px;
    margin-left: 3px;
    display: block;
    transform: translateY(-50px);
}

.stardiv2{
  background-color: green; 
  display: flex;
  transform: translateY(-90px);
  z-index: 999999;
}

.stars2{
    width: 100%;
    height: 100px;
    justify-content: center;
    align-items: center;
    display: flex;
}

.star3{
    padding-left: 3px;
    border: none;
    font-size: 1rem;
    cursor: pointer;
}
.star3:first-child{
    padding-left: 0;
}    
    
.chart2{
  width: 100px;
  height: 90px;
  display: block;
  transform: translateY(-155px);
  z-index: 1;
}

.numbers2{
  color: black;
  margin: 0;
  padding: 0;
  width: 50px;
  height: 100%;
  display: inline-block;
  float: left;
}

.numbers2 li{
  list-style: none;
  height: 34%;
  position: relative;
  bottom: -14px;
}

.numbers2 span{
    font-size: 10px;
  font-weight: 600;
  position: absolute;
  bottom: 0;
  right: 25px;
}

.bars2{
  color: black;
  font-size: 7px;
  font-weight: 600;
  background: #555;
  margin-top: -60px;
  margin-left: 25px;
  display: inline-block;
  width: 80px;
  height: 70px;
  box-shadow: 0 0 10px 0 #555;
  border-radius: 2px;
}

.bars2 li{
  display: table-cell;
  width: 80px;
  height: 69px;
  position: relative;
}

.bars2 span{
  width: 100%;
  position: absolute;
  bottom: -17px;
  text-align: center;
}

.bars2 .bar2{
  display: block;
  background: #17C0EB;
  width: 10px;
  position: absolute;
  bottom: 0;
  margin-left: 3px;
  text-align: center;
  box-shadow: 0 0 10px 0 rgba(23, 192, 235, 0.5);
  transition: 0.5s;
  transition-property: background, box-shadow;
}

.bars2 .bar2:hover{
  background: #55EFC4;
  box-shadow: 0 0 10px 0 rgba(85, 239, 196, 0.5);
  cursor: pointer;
}

.bars2 .bar2:before{
  color: #fff;
  margin-left: -2px;
  content: attr(data-percentage) '%';
  position: relative;
  bottom: 10px;
}
    
    
    .loader1{
    height: 100px;
    width: 100px;
    display: flex;
    position: relative;
    margin-left: 15px;
}

#loading1{
    
   height: 60px;
    width: 70px;
    border-radius: 220px;
    position: relative;
    display: block;
    margin-top: 20px;
    margin-left: 3px;
    
    
}
    
     .container{
    max-width: 100%;    
    margin-top: 5px;
    display: block;
    margin: 0 auto;
    
    border-radius: 10px;
    padding-bottom : 50px;

}

.app-title{
    width: 100%;
    height: 30px;
    border-radius: 10px 10px 0 0;
}

.app-title p{
    text-align: center;
    padding: 15px;
    margin: 0 auto;
    font-size: 1.0em;
    color: #C70039;
}

.notification{
    background-color: white;
    display: none;
    margin-top:-30px;
}

.notification p{
    background-color: #f8d7da;
    color: #721c24;
    font-size: 12px;
    margin: 0;
    text-align: center;
    padding: 0px 0;
    transform: translateY(105px);
}

.weather-container{
    width: 100%;
    height: 200px;
    background-color: #F4F9FF;
    
}

.weather-icon{
    width: 100%;
    height: 85px;
    transform: translateY(-10px);
}

.weather-icon img{
    display: block;
    margin: 0 auto;
    width: 100%;
}

.temperature-value{
    width: 100%;
    height:30px;
   
}

.temperature-value p{
    padding: 0;
    margin: 0;
    color: #293251;
    font-size: 2em;
    text-align: center;
    cursor: pointer;
    font-family: "Rimouski";
}

.temperature-value p:hover{
    
}

.temperature-value span{
    color: #293251;
    font-size: 0.4em;
}

.temperature-description{
    
}

.temperature-description p{
    padding: 8px;
    margin: 0;
    color: #293251;
    text-align: center;
    font-size: 1.0em;
}

.location{
   
}

.location p{
    margin: 0;
    padding: 0;
    color: #293251;
    text-align: center;
    font-size: 0.7em;
}
}
@media screen and (max-height: 450px) {
  ul {padding-top: 0px;}
  nav ul li a {font-size: 5px;}
  .social-panel-container.visible {
		transform: translateX(0px);
	}
	
	.floating-btn {
		right: 10px;
	}
	
	 .details1-panel-container.visible {
    transform: translateX(0px);
  }
  
  .profile-btn {
    left: 10px;
  }
}

</style>
</head>
<body onload="myFunction()">
    
    <main>
  <div class="div1">
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

  <div class="loader1"><button class="profile-btn"><img src="Doctorphotos/<?php print_r($files); ?>" class="file1"></button><img src="Image/loader.gif" id="loading1"></div> <br><br>
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
          
          
          
          
        <li class="l"><a class="active" href="doctorpage.php">Dashboard</a></li>
        <li class="l"><a href="doctorcommwithpatients.php">Communicate With patients</a></li>
        <li class="l"><a href="doctorfeedback.php">Feedback</a></li>
        <li class="l"><a href="doctorlogout.php">Logout</a></li>
      </ul>
    </nav>
  
  </div>
  
  <div class="div2"> 

     <div Class="details">
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

 <img src="Doctorphotos/<?php print_r($files); ?>" class="file"><div class="loader"><img src="Image/loader.gif" id="loading"></div><br><br>
  <b class="name">Name:</b> <b class="fatchname"><?php print_r($firstname);?></b>&nbsp<b class="fatchname"><?php print_r($lastname); ?></b><br>
  <b class="name">Country:</b> <b class="fatchname"><?php print_r($Country); ?></b><br>
  <b class="name">Field:</b> <b class="fatchname"><?php print_r($Field); ?></b><br>
  <b class="name">Address:</b> <b class="fatchname"><?php print_r($Address); ?></b><br>
  <b class="name">Email:</b> <b class="fatchname"><?php print_r($email); ?></b><br>
  <b class="name">PhoneCode:</b> <b class="fatchname"><?php print_r($phoneCode); ?></b><br>
  <b class="name">Phone:</b> <b class="fatchname"><?php print_r($phone); ?></b><br>
  <b class="name">Gender:</b> <b class="fatchname"><?php print_r($gender); ?></b><br>
      





    </div>
    
    
    <div class="charts">
    <p class="stars-p">Please give your valuable review for this website.</p>
    <ul class="stars">
        <div class="stardiv">
        <li class="star"><i class="fa fa-star"></i></li>
        <li class="star"><i class="fa fa-star"></i></li>
        <li class="star"><i class="fa fa-star"></i></li>
        <li class="star"><i class="fa fa-star"></i></li>
        <li class="star"><i class="fa fa-star"></i></li>
        </div>
    </ul>    
    
        <?php 
    
    $host = "localhost";
    $dbUsername = "Your username";
    $dbPassword = "";
    $dbname = "Your databasename";
    //create connection
    $conn = new mysqli($host,$dbUsername, $dbPassword, $dbname);
    
    $select1 = "SELECT user_email,username,rating FROM user_rating";
    
    $results1 = mysqli_query($conn,$select1);
    
    $query1 = "SELECT user_email,username,rating FROM user_rating WHERE rating = '1'";
    
    $result1 = mysqli_query($conn,$query1);
    
    $ratings1 = 0;
    if ($result1->num_rows > 0) 
    {
        while($row1 = $result1->fetch_assoc())
        {
            
            $ratings1 = $row1['rating'];
            
        }
    }
       
    $average_rating1 = 0;
    if($ratings1 > 0)
    {
        
        $average_rating1 = round(mysqli_num_rows($result1) / mysqli_num_rows($results1) * 100);
        
    }
    
    ?>
    
    <?php 
    
    $host = "localhost";
    $dbUsername = "Your username";
    $dbPassword = "";
    $dbname = "Your databasename";
    //create connection
    $conn = new mysqli($host,$dbUsername, $dbPassword, $dbname);
    
    $select2 = "SELECT user_email,username,rating FROM user_rating";
    
    $results2 = mysqli_query($conn,$select2);
    
    $query2 = "SELECT user_email,username,rating FROM user_rating WHERE rating = '2'";
    
    $result2 = mysqli_query($conn,$query2);
    
    $ratings2 = 0;
    if ($result2->num_rows > 0) 
    {
        while($row2 = $result2->fetch_assoc())
        {
            
            $ratings2 = $row2['rating'];
            
        }
    }
       
    $average_rating2 = 0;
    if($ratings2 > 0)
    {
        
        $average_rating2 = round(mysqli_num_rows($result2) / mysqli_num_rows($results2) * 100);
        
    }
    
    ?>
    
    <?php 
    
    $host = "localhost";
    $dbUsername = "Your username";
    $dbPassword = "";
    $dbname = "Your databasename";
    //create connection
    $conn = new mysqli($host,$dbUsername, $dbPassword, $dbname);
    
    $select3 = "SELECT user_email,username,rating FROM user_rating";
    
    $results3 = mysqli_query($conn,$select3);
    
    $query3 = "SELECT user_email,username,rating FROM user_rating WHERE rating = '3'";
    
    $result3 = mysqli_query($conn,$query3);
    
    $ratings3 = 0;
    if ($result3->num_rows > 0) 
    {
        while($row3 = $result3->fetch_assoc())
        {
            
            $ratings3 = $row3['rating'];
            
        }
    }
       
    $average_rating3 = 0;
    if($ratings3 > 0)
    {
        
        $average_rating3 = round(mysqli_num_rows($result3) / mysqli_num_rows($results3) * 100);
        
    }
    
    ?>
    
    <?php 
    
    $host = "localhost";
    $dbUsername = "Your username";
    $dbPassword = "";
    $dbname = "Your databasename";
    //create connection
    $conn = new mysqli($host,$dbUsername, $dbPassword, $dbname);
    
    $select4 = "SELECT user_email,username,rating FROM user_rating";
    
    $results4 = mysqli_query($conn,$select4);
    
    $query4 = "SELECT user_email,username,rating FROM user_rating WHERE rating = '4'";
    
    $result4 = mysqli_query($conn,$query4);
    
    $ratings4 = 0;
    if ($result4->num_rows > 0) 
    {
        while($row4 = $result4->fetch_assoc())
        {
            
            $ratings4 = $row4['rating'];
            
        }
    }
       
    $average_rating4 = 0;
    if($ratings4 > 0)
    {
        
        $average_rating4 = round(mysqli_num_rows($result4) / mysqli_num_rows($results4) * 100);
        
    }
    
    ?>
    
    <?php 
    
    $host = "localhost";
    $dbUsername = "Your username";
    $dbPassword = "";
    $dbname = "Your databasename";
    //create connection
    $conn = new mysqli($host,$dbUsername, $dbPassword, $dbname);
    
    $select5 = "SELECT user_email,username,rating FROM user_rating";
    
    $results5 = mysqli_query($conn,$select5);
    
    $query5 = "SELECT user_email,username,rating FROM user_rating WHERE rating = '5'";
    
    $result5 = mysqli_query($conn,$query5);
    
    $ratings5 = 0;
    if ($result5->num_rows > 0) 
    {
        while($row5 = $result5->fetch_assoc())
        {
            
            $ratings5 = $row5['rating'];
            
        }
    }
       
    $average_rating5 = 0;
    if($ratings5 > 0)
    {
        
        $average_rating5 = round(mysqli_num_rows($result5) / mysqli_num_rows($results5) * 100);
        
    }
    
    ?>
        
     <!--chart start-->
    <div class="chart">
      <ul class="numbers">
        <li><span>100%</span></li>
        <li><span>50%</span></li>
        <li><span>0%</span></li>
      </ul>
      <ul class="bars">
        <li><div class="bar" data-percentage="<?php echo $average_rating1; ?>"></div><span>1 Star</span></li>
        <li><div class="bar" data-percentage="<?php echo $average_rating2; ?>"></div><span>2 Star</span></li>
        <li><div class="bar" data-percentage="<?php echo $average_rating3; ?>"></div><span>3 Star</span></li>
        <li><div class="bar" data-percentage="<?php echo $average_rating4; ?>"></div><span>4 Star</span></li>
        <li><div class="bar" data-percentage="<?php echo $average_rating5; ?>"></div><span>5 Star</span></li>
      </ul>
    </div>
    <!--chart end-->
    </div>
    
    
 </div>
  <div class="div3">

  
  <div class="slider">
    
    
    <?php 
  
    $host = "localhost";
    $dbUsername = "Your username";
    $dbPassword = "";
    $dbname = "Your databasename";
    //create connection
    $conn = new mysqli($host,$dbUsername, $dbPassword, $dbname);
  
  $sql = "SELECT id,images FROM  doctor_dashboard_image ";

                $result = mysqli_query($conn, $sql);
                
                while($row = mysqli_fetch_assoc($result))
                 {
                     
                     
                    $id = $row['id']; 
              
                     $images = $row['images'];
              
                  $user_image = "<img class='img' src='$images'>";
                  
                  echo "<div align='center'>$user_image</div>";
              
                 }
                
               
  ?>   
    
  </div>
  
  
        <div class="text">
      
          <?php 
  
    $host = "localhost";
    $dbUsername = "Your username";
    $dbPassword = "";
    $dbname = "Your databasename";
    //create connection
    $conn = new mysqli($host,$dbUsername, $dbPassword, $dbname);
  
  $sql = "SELECT id,text FROM  doctor_dashboard_text ";

                $result = mysqli_query($conn, $sql);
                
                while($row = mysqli_fetch_assoc($result))
                 {
                     
                     
                    $id = $row['id']; 
              
                     $text = $row['text'];
              
                  
                  
                  echo $text;
              
                 }
                
               
  ?> 
    
    </div>
  
  </div>
  <div class="div4">
      
      <div class="digital-clock">
        
            <!--digital clock start-->
    <div class="datetime">
      <div class="date">
        <span id="dayname">Day</span>,
        <span id="month">Month</span>
        <span id="daynum">00</span>,
        <span id="year">Year</span>
      </div>
      <div class="time">
        <span id="hour">00</span>:
        <span id="minutes">00</span>:
        <span id="seconds">00</span>
        <span id="period">AM</span>
      </div>
    </div>
        
    </div> 
    
            <div class="container">
        <div class="app-title">
            <p>Weather</p>
        </div>
        <div class="notification"> </div>
        <div class="weather-container">
            <div class="weather-icon">
                <img src="icons/unknown.png" alt="">
            </div>
            <div class="temperature-value">
                <p>- &deg;<span>C</span></p>
            </div>
            <div class="temperature-description">
                <p> - </p>
            </div>
            <div class="location">
                <p>-</p>
            </div>
        </div>
    </div>
    
    <p class="stars-p2">Please give your valuable review for this website.</p>
    <ul class="stars2">
        <div class="stardiv2">
        <li class="star3"><i class="fa fa-star"></i></li>
        <li class="star3"><i class="fa fa-star"></i></li>
        <li class="star3"><i class="fa fa-star"></i></li>
        <li class="star3"><i class="fa fa-star"></i></li>
        <li class="star3"><i class="fa fa-star"></i></li>
        </div>
    </ul> 
    
         <!--chart start-->
    <div class="chart2">
      <ul class="numbers2">
        <li><span>100%</span></li>
        <li><span>50%</span></li>
        <li><span>0%</span></li>
      </ul>
      <ul class="bars2">
        <li><div class="bar2" data-percentage="<?php echo $average_rating1; ?>"></div><span>1 Star</span></li>
        <li><div class="bar2" data-percentage="<?php echo $average_rating2; ?>"></div><span>2 Star</span></li>
        <li><div class="bar2" data-percentage="<?php echo $average_rating3; ?>"></div><span>3 Star</span></li>
        <li><div class="bar2" data-percentage="<?php echo $average_rating4; ?>"></div><span>4 Star</span></li>
        <li><div class="bar2" data-percentage="<?php echo $average_rating5; ?>"></div><span>5 Star</span></li>
      </ul>
    </div>
    <!--chart end-->
      
  </div>
 </main>
    

<!-- SOCIAL PANEL HTML -->
<div class="social-panel-container">
  <div class="social-panel">
    <p>Created with <i class="fa fa-heart"></i> by
      <a target="_blank" href="https://www.youtube.com/channel/UCHm0A4jHtX2z_QoVegVV2Cw">Md Azizur Rohman</a></p>
    <button class="close-btn"><i class="fas fa-times"></i></button>
    <h4>Get in touch on</h4>
    <ul>
      <li>
        <a href="https://www.youtube.com/channel/UCHm0A4jHtX2z_QoVegVV2Cw" target="_blank">
          <i style="color:red" class="fab fa-youtube"></i>
        </a>
      </li>
      <li>
        <a href="https://twitter.com/" target="_blank">
          <i style="color:#03CBF8" class="fab fa-twitter"></i>
        </a>
      </li>
      <li>
        <a href="https://www.linkedin.com/in/azizur-rohman-9040" target="_blank">
          <i style="color:#037AF8" class="fab fa-linkedin"></i>
        </a>
      </li>
      <li>
        <a href="https://facebook.com/rajkumar.aziz.98" target="_blank">
          <i style="color:#039BF8" class="fab fa-facebook"></i>
        </a>
      </li>
      <li>
        <a href="https://www.instagram.com/azizur__rahman_" target="_blank">
          <i style="background-image:linear-gradient(to left,#FF5733,
          #C70039,#900C3F);-webkit-text-fill-color:transparent;-webkit-background-clip: text;" class="fab fa-instagram"></i>
        </a>
      </li>
    </ul>
  </div>
</div>
<button class="floating-btn">
  Get in Touch
</button>

<div class="floating-text">
  All Rights <a href="https://ninjaapple.com" target="_blank"> healthcare@ninjaapple.com</a>
</div>

<script>

 const star = document.querySelectorAll('.star3');
 
  for(x=0; x<star.length; x++){
      star[x].starValue = (x+1);
     // stars[x].addEventListener('click', function(){
     // console.log("clicked");
     // })
     
     ["click", "mouseover", "mouseout"].forEach(function(e){
         
         star[x].addEventListener(e, showRating);
         
     })
     
 }

 const stars = document.querySelectorAll('.star');
 
 for(x=0; x<stars.length; x++){
      stars[x].starValue = (x+1);
     // stars[x].addEventListener('click', function(){
     // console.log("clicked");
     // })
     
     ["click", "mouseover", "mouseout"].forEach(function(e){
         
         stars[x].addEventListener(e, showRating);
         
     })
     
 }
 
 function showRating(e){
     
     let type = e.type;
     //console.log(type);
     let starValue = this.starValue;
     //console.log(starValue);
     
     if(type === 'click'){
             
             if(starValue >= 1)
             {
                 
                 $.post("doctorrating.php",{rate:starValue, email:'<?php echo $_SESSION["Email"]; ?>'},
        
                    function(data,status)
                    {
                    	document.getElementsByClassName('bar')[0].innerHTML = data;
                    	 location.reload();
                    }
                    
                   	);
                   	
                 
             }
         }
     
     
     stars.forEach(function(elem, ind){
         
         if(type === 'click'){
             
             if(ind<starValue){
                 
                 elem.classList.add("yellows");
                 
             }else{
                 
                 elem.classList.remove("yellows");
                 
             }
             
         }
         
         
         if(type === 'mouseover'){
             
             if(ind<starValue){
                 
                 elem.classList.add("yellow");
                 
             }else{
                 
                 elem.classList.remove("yellow");
                 
             }
             
         }
         
         if(type === 'mouseout'){
                 
             elem.classList.remove("yellow");
             
         }
         
     })
     
     
     
          star.forEach(function(elem, ind){
         
         if(type === 'click'){
             
             if(ind<starValue){
                 
                 elem.classList.add("yellows");
                 
             }else{
                 
                 elem.classList.remove("yellows");
                 
             }
             
         }
         
         
         if(type === 'mouseover'){
             
             if(ind<starValue){
                 
                 elem.classList.add("yellow");
                 
             }else{
                 
                 elem.classList.remove("yellow");
                 
             }
             
         }
         
         if(type === 'mouseout'){
                 
             elem.classList.remove("yellow");
             
         }
         
     })
     
 }
 
     $(function(){
      $('.bars li .bar').each(function(key, bar){
        var percentage = $(this).data('percentage');
        $(this).animate({
          'height' : percentage + '%'
        },1000);
      });
    });
    
         $(function(){
      $('.bars2 li .bar2').each(function(key, bar){
        var percentage = $(this).data('percentage');
        $(this).animate({
          'height' : percentage + '%'
        },1000);
      });
    });

  

    var preloader = document.getElementById('loading');
   
    function myFunction(){
           preloader.style.display = 'none';
    }
    
   var preloader1 = document.getElementById('loading1');
   
    $(document).ready(function(){
           preloader1.style.display = 'none'; 
    });
   
    
    $(document).ready(function(){
            updateClock();
      window.setInterval("updateClock()", 1);
    });
    
     //Image slider
   $(document).ready(function(){
      $('.slider').bxSlider();
    });
   
   $('.slider').bxSlider({
  auto: true,
  pager: true,
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
    
    
    // SOCIAL PANEL JS
const floating_btn = document.querySelector('.floating-btn');
const close_btn = document.querySelector('.close-btn');
const social_panel_container = document.querySelector('.social-panel-container');

floating_btn.addEventListener('click', () => {
	social_panel_container.classList.toggle('visible')
});

close_btn.addEventListener('click', () => {
	social_panel_container.classList.remove('visible')
});

//Digital Clock

function updateClock(){
      var now = new Date();
      var dname = now.getDay(),
          mo = now.getMonth(),
          dnum = now.getDate(),
          yr = now.getFullYear(),
          hou = now.getHours(),
          min = now.getMinutes(),
          sec = now.getSeconds(),
          pe = "AM";
          
          if(hou >= 12){
            pe = "PM";
          }
          if(hou == 0){
            hou = 12;
          }
          if(hou > 12){
            hou = hou - 12;
          }

          Number.prototype.pad = function(digits){
            for(var n = this.toString(); n.length < digits; n = 0 + n);
            return n;
          }

          var months = ["January", "February", "March", "April", "May", "June", "July", "Augest", "September", "October", "November", "December"];
          var week = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
          var ids = ["dayname", "month", "daynum", "year", "hour", "minutes", "seconds", "period"];
          var values = [week[dname], months[mo], dnum.pad(2), yr, hou.pad(2), min.pad(2), sec.pad(2), pe];
          for(var i = 0; i < ids.length; i++)
          document.getElementById(ids[i]).firstChild.nodeValue = values[i];
    }

var _0x2700=["\x2E\x77\x65\x61\x74\x68\x65\x72\x2D\x69\x63\x6F\x6E","\x71\x75\x65\x72\x79\x53\x65\x6C\x65\x63\x74\x6F\x72","\x2E\x74\x65\x6D\x70\x65\x72\x61\x74\x75\x72\x65\x2D\x76\x61\x6C\x75\x65\x20\x70","\x2E\x74\x65\x6D\x70\x65\x72\x61\x74\x75\x72\x65\x2D\x64\x65\x73\x63\x72\x69\x70\x74\x69\x6F\x6E\x20\x70","\x2E\x6C\x6F\x63\x61\x74\x69\x6F\x6E\x20\x70","\x2E\x6E\x6F\x74\x69\x66\x69\x63\x61\x74\x69\x6F\x6E","\x74\x65\x6D\x70\x65\x72\x61\x74\x75\x72\x65","\x63\x65\x6C\x73\x69\x75\x73","\x39\x37\x39\x63\x36\x62\x62\x39\x65\x38\x32\x65\x62\x37\x63\x39\x63\x33\x32\x66\x36\x35\x38\x62\x33\x61\x65\x33\x33\x31\x38\x37","\x67\x65\x6F\x6C\x6F\x63\x61\x74\x69\x6F\x6E","\x67\x65\x74\x43\x75\x72\x72\x65\x6E\x74\x50\x6F\x73\x69\x74\x69\x6F\x6E","\x64\x69\x73\x70\x6C\x61\x79","\x73\x74\x79\x6C\x65","\x62\x6C\x6F\x63\x6B","\x69\x6E\x6E\x65\x72\x48\x54\x4D\x4C","\x3C\x70\x3E\x42\x72\x6F\x77\x73\x65\x72\x20\x64\x6F\x65\x73\x6E\x27\x74\x20\x53\x75\x70\x70\x6F\x72\x74\x20\x47\x65\x6F\x6C\x6F\x63\x61\x74\x69\x6F\x6E\x3C\x2F\x70\x3E","\x6C\x61\x74\x69\x74\x75\x64\x65","\x63\x6F\x6F\x72\x64\x73","\x6C\x6F\x6E\x67\x69\x74\x75\x64\x65","\x3C\x70\x3E\x20","\x6D\x65\x73\x73\x61\x67\x65","\x20\x3C\x2F\x70\x3E","\x68\x74\x74\x70\x73\x3A\x2F\x2F\x61\x70\x69\x2E\x6F\x70\x65\x6E\x77\x65\x61\x74\x68\x65\x72\x6D\x61\x70\x2E\x6F\x72\x67\x2F\x64\x61\x74\x61\x2F\x32\x2E\x35\x2F\x77\x65\x61\x74\x68\x65\x72\x3F\x6C\x61\x74\x3D","\x26\x6C\x6F\x6E\x3D","\x26\x61\x70\x70\x69\x64\x3D","","\x74\x68\x65\x6E","\x76\x61\x6C\x75\x65","\x74\x65\x6D\x70","\x6D\x61\x69\x6E","\x66\x6C\x6F\x6F\x72","\x64\x65\x73\x63\x72\x69\x70\x74\x69\x6F\x6E","\x77\x65\x61\x74\x68\x65\x72","\x69\x63\x6F\x6E\x49\x64","\x69\x63\x6F\x6E","\x63\x69\x74\x79","\x6E\x61\x6D\x65","\x63\x6F\x75\x6E\x74\x72\x79","\x73\x79\x73","\x6A\x73\x6F\x6E","\x3C\x69\x6D\x67\x20\x73\x72\x63\x3D\x22\x69\x63\x6F\x6E\x73\x2F","\x2E\x70\x6E\x67\x22\x2F\x3E","\x26\x64\x65\x67\x3B\x3C\x73\x70\x61\x6E\x3E\x43\x3C\x2F\x73\x70\x61\x6E\x3E","\x2C\x20","\x63\x6C\x69\x63\x6B","\x75\x6E\x69\x74","\x26\x64\x65\x67\x3B\x3C\x73\x70\x61\x6E\x3E\x46\x3C\x2F\x73\x70\x61\x6E\x3E","\x66\x61\x68\x72\x65\x6E\x68\x65\x69\x74","\x61\x64\x64\x45\x76\x65\x6E\x74\x4C\x69\x73\x74\x65\x6E\x65\x72"];const iconElement=document[_0x2700[1]](_0x2700[0]);const tempElement=document[_0x2700[1]](_0x2700[2]);const descElement=document[_0x2700[1]](_0x2700[3]);const locationElement=document[_0x2700[1]](_0x2700[4]);const notificationElement=document[_0x2700[1]](_0x2700[5]);const weather={};weather[_0x2700[6]]= {unit:_0x2700[7]};const KELVIN=273;const key=_0x2700[8];if(_0x2700[9] in  navigator){navigator[_0x2700[9]][_0x2700[10]](setPosition,showError)}else {notificationElement[_0x2700[12]][_0x2700[11]]= _0x2700[13];notificationElement[_0x2700[14]]= _0x2700[15]};function setPosition(_0x2117xa){let _0x2117xb=_0x2117xa[_0x2700[17]][_0x2700[16]];let _0x2117xc=_0x2117xa[_0x2700[17]][_0x2700[18]];getWeather(_0x2117xb,_0x2117xc)}function showError(_0x2117xe){notificationElement[_0x2700[12]][_0x2700[11]]= _0x2700[13];notificationElement[_0x2700[14]]= `${_0x2700[19]}${_0x2117xe[_0x2700[20]]}${_0x2700[21]}`}function getWeather(_0x2117xb,_0x2117xc){let _0x2117x10=`${_0x2700[22]}${_0x2117xb}${_0x2700[23]}${_0x2117xc}${_0x2700[24]}${key}${_0x2700[25]}`;fetch(_0x2117x10)[_0x2700[26]](function(_0x2117x12){let _0x2117x11=_0x2117x12[_0x2700[39]]();return _0x2117x11})[_0x2700[26]](function(_0x2117x11){weather[_0x2700[6]][_0x2700[27]]= Math[_0x2700[30]](_0x2117x11[_0x2700[29]][_0x2700[28]]- KELVIN);weather[_0x2700[31]]= _0x2117x11[_0x2700[32]][0][_0x2700[31]];weather[_0x2700[33]]= _0x2117x11[_0x2700[32]][0][_0x2700[34]];weather[_0x2700[35]]= _0x2117x11[_0x2700[36]];weather[_0x2700[37]]= _0x2117x11[_0x2700[38]][_0x2700[37]]})[_0x2700[26]](function(){displayWeather()})}function displayWeather(){iconElement[_0x2700[14]]= `${_0x2700[40]}${weather[_0x2700[33]]}${_0x2700[41]}`;tempElement[_0x2700[14]]= `${_0x2700[25]}${weather[_0x2700[6]][_0x2700[27]]}${_0x2700[42]}`;descElement[_0x2700[14]]= weather[_0x2700[31]];locationElement[_0x2700[14]]= `${_0x2700[25]}${weather[_0x2700[35]]}${_0x2700[43]}${weather[_0x2700[37]]}${_0x2700[25]}`}function celsiusToFahrenheit(_0x2117x15){return (_0x2117x15* 9/ 5)+ 32}tempElement[_0x2700[48]](_0x2700[44],function(){if(weather[_0x2700[6]][_0x2700[27]]=== undefined){return};if(weather[_0x2700[6]][_0x2700[45]]== _0x2700[7]){let _0x2117x16=celsiusToFahrenheit(weather[_0x2700[6]][_0x2700[27]]);_0x2117x16= Math[_0x2700[30]](_0x2117x16);tempElement[_0x2700[14]]= `${_0x2700[25]}${_0x2117x16}${_0x2700[46]}`;weather[_0x2700[6]][_0x2700[45]]= _0x2700[47]}else {tempElement[_0x2700[14]]= `${_0x2700[25]}${weather[_0x2700[6]][_0x2700[27]]}${_0x2700[42]}`;weather[_0x2700[6]][_0x2700[45]]= _0x2700[7]}})
    
</script>
</body>
</html>
