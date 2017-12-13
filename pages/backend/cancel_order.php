<?php

require_once 'dbconnect.php';
$user_id=$_SESSION['user_id'];
$event_id=base64_decode($_GET['event_id']);

$sql2 = "DELETE FROM attendant WHERE user_id ='$user_id' and event_id = '$event_id' ";
$connect->query($sql2);

if($sql2)
{
  $Message = "Cancel Order Success";
  header("Location: ../../");
}

?>
