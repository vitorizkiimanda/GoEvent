<?php

require_once '../backend/dbconnect.php';
$x = $_POST['x'] ;
$user_id = $_SESSION['user_id'] ;
$event_id = $_POST['ev'];

if( $x == 1 )
{
  $sql2 = "INSERT INTO bookmark (user_id, event_id) VALUES ('$user_id', '$event_id')";
            $connect->query($sql2) ;
}

else if( $x == 2 )
{
  $sql2 = "DELETE FROM bookmark WHERE user_id ='$user_id' and event_id = '$event_id' ";
            $connect->query($sql2);
}

?>
