<?php
  require_once 'dbconnect.php';

  $user_id = $_SESSION['user_id'];
  $event_id = $_POST['event_id'];

  $nosql = mysqli_query($connect, "SELECT event_name , ticket_name FROM events");
  $count = mysqli_fetch_assoc($nosql);
  $event_name = $count['event_name'];
  $ticket_name = $count['ticket_name'];
  $event_name = strtoupper(substr($event_name,0,2)) ;
  $ticket_name = strtoupper(substr($ticket_name,0,2)) ;
  $random = rand(10,99);
  $ticket_id = $event_name.$ticket_name.$random.$user_id.$event_id.'000000';
  $ticket_id = substr($ticket_id,0,10) ;

  $sql = "INSERT INTO attendant (user_id, event_id, ticket_id) VALUES ('$user_id', '$event_id', '$ticket_id')";
  $q2 = $connect->query($sql);

  if ( $q2 === true) {
  // echo $sql;// boleh diganti nih, pointnya mau bertambah berapa jika add restaurant
  $Message = "Create Event Success";
  // header('Location: ../../pages/certificate_event/' );
  header("Location: ../profile?Message=" . urlencode($Message));

  }
  else {
    echo "<p> GAGAL TOLOL!!</p>";
  }

 ?>
