<?php
    require_once 'dbconnect.php';
 $user_id = $_SESSION['user_id'];
 $query_organizer =mysqli_query($connect, "SELECT * FROM user_organizer JOIN organizer WHERE user_id = '$user_id' ");
 ?>
