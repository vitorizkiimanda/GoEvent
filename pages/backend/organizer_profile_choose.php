<?php
    require_once 'dbconnect.php';

 $user_id = $_SESSION['user_id'];
 $query_organizer =mysqli_query($connect, "SELECT * FROM user_organizer INNER JOIN organizer ON user_organizer.organizer_id=organizer.organizer_id WHERE user_id = '$user_id' ");
 ?>
