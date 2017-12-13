<?php

require_once '../backend/dbconnect.php';
require_once '../backend/event_detail.php';
$x = $_POST['x'] == 1

if( $x == 1 )
{
  echo $user_id ;
  $sql2 = "INSERT INTO bookmark (user_id, event_id) VALUES ('$user_id', '$event_id')";
            $connect->query($sql2)
}

else if( $x == 2 )
{
  echo $user_id ;
  $sql2 = "DELETE FROM bookmark WHERE user_id ='$user_id' and event_id = '$event_id' ";
            $connect->query($sql2);
}

?>
