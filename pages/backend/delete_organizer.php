<?php

require_once 'dbconnect.php';
$user_id=$_SESSION['user_id'];
$organizer_id=$_GET['organizer_id'];

$sql2 = "DELETE FROM user_organizer WHERE user_id ='$user_id' and organizer_id = '$organizer_id' ";
$connect->query($sql2);

$sql = "SELECT FROM user_organizer WHERE user_id ='$user_id' and organizer_id = '$organizer_id' ";
$connect->query($sql);

if($sql->num_rows < 1)
{
  $sql2 = "DELETE FROM organizer WHERE organizer_id = '$organizer_id' ";
  $connect->query($sql2);
}

if($sql2)
{
  $Message = "Organizer deleted Successfully ";
  header("Location: ../organizer_profile_choose?Message=. urlencode($Message)");
}

?>
