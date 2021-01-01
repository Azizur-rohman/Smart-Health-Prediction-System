<?php

//database_connection.php
$host = "localhost";
$dbUsername = "Your username";
$dbPassword = "";
$dbname = "Your databasename";
    //create connection
    $connect = new mysqli($host,$dbUsername, $dbPassword, $dbname);
  
date_default_timezone_set('Asia/Bangladesh');

function fetch_user_last_activity($user_id, $connect)
{
 $query = "SELECT user_id,username,password FROM login_details WHERE user_id = '$user_id' ORDER BY last_activity DESC LIMIT 1";
 $statement = $connect->prepare($query);
 $statement->execute();
$result = $connect->query($query);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc())
  {
  return $row['last_activity'];
  }
 }
}

function fetch_user_chat_history($from_user_id, $to_user_id, $connect)
{
 $query = "SELECT * FROM chat_message WHERE (from_user_id = '".$from_user_id."' 
 AND to_user_id = '".$to_user_id."') OR (from_user_id = '".$to_user_id."' AND to_user_id = '".$from_user_id."') ORDER BY timestamp DESC";
 $statement = $connect->prepare($query);
 $statement->execute();
 $output = '<ul class="list-unstyled">';
 $result = $connect->query($query);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc())
  {
  $user_name = '';
  if($row["from_user_id"] == $from_user_id)
  {
   $user_name = '<b class="text-success">You</b>';
  }
  else
  {
   $user_name = '<b class="text-danger">'.get_user_name($row['from_user_id'], $connect).'</b>';
  }
  $output .= '
  <li style="border-bottom:1px dotted #ccc">
   <p>'.$user_name.' - '.$row["chat_message"].'
    <div align="right">
     - <small><em>'.$row['timestamp'].'</em></small>
    </div>
   </p>
  </li>
  ';
  }
 }
 $output .= '</ul>';
 $query = "UPDATE chat_message SET status = '0' WHERE from_user_id = '".$to_user_id."' AND to_user_id = '".$from_user_id."' AND status = '1'";
 $statement = $connect->prepare($query);
 $statement->execute();
 return $output;
}

function get_user_name($user_id, $connect)
{
 $query = "SELECT user_id,username,password FROM login WHERE user_id = '$user_id'";
 $result = $connect->query($query);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc())
  {
  return $row['username'];
 }
}
}

function count_unseen_message($from_user_id, $to_user_id, $connect)
{
 $query = "SELECT * FROM chat_message WHERE from_user_id = '$from_user_id' AND to_user_id = '$to_user_id' AND status = '1'";
 $statement = $connect->prepare($query);
 $statement->execute();
 $count = $statement->rowCount();
 $output = '';
 if($count > 0)
 {
  $output = '<span class="label label-success">'.$count.'</span>';
 }
 return $output;
}

function fetch_is_type_status($user_id, $connect)
{
 $query = "SELECT is_type FROM login_details WHERE user_id = '".$user_id."'ORDER BY last_activity DESC LIMIT 1"; 
 $statement = $connect->prepare($query);
 $statement->execute();
 $output = '';
 $result = $connect->query($query);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc())
  {
  if($row["is_type"] == 'yes')
  {
   $output = ' - <small><em><span class="text-muted">Typing...</span></em></small>';
  }
 }
}
 return $output;
}

function fetch_group_chat_history($connect)
{
 $query = "SELECT * FROM chat_message WHERE to_user_id = '0' ORDER BY timestamp DESC";

 $statement = $connect->prepare($query);

 $statement->execute();

 $output = '<ul class="list-unstyled">';
 $result = $connect->query($query);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc())
  {
  $user_name = '';
  if($row["from_user_id"] == $_SESSION["user_id"])
  {
   $user_name = '<b class="text-success">You</b>';
  }
  else
  {
   $user_name = '<b class="text-danger">'.get_user_name($row['from_user_id'], $connect).'</b>';
  }

  $output .= '

  <li style="border-bottom:1px dotted #ccc">
   <p>'.$user_name.' - '.$row['chat_message'].' 
    <div align="right">
     - <small><em>'.$row['timestamp'].'</em></small>
    </div>
   </p>
  </li>
  ';
 }
}
 $output .= '</ul>';
 return $output;
}

?>
