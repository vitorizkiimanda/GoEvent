<?php

  require_once 'dbconnect.php';
  $user_id=$_SESSION['user_id'];
  $event_id=base64_decode($_GET['event_id']);

  $sql_user = "SELECT * FROM user WHERE user_id='$user_id'";
  $sql_user = $connect->query($sql_user);
  $sql_user = $sql_user->fetch_assoc();

  $sql_event = "SELECT * FROM events WHERE event_id='$event_id'";
  $sql_event = $connect->query($sql_event);
  $sql_event = $sql_event->fetch_assoc();

  $sql_att = "SELECT * FROM attendant WHERE user_id='$user_id' AND event_id='$event_id'";
  $sql_att = $connect->query($sql_att);
  $sql_att = $sql_att->fetch_assoc();

  $event_id_encrypt = base64_encode($sql_event['event_id']) ;
?>
