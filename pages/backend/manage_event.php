<?php
    include('dbconnect.php');
    $user_login = $_SESSION['user_id'];
    $organizer_query ="SELECT * FROM user_organizer u JOIN events e ON u.organizer_id = e.organizer_id WHERE u.user_id=$user_login";
    $event = mysqli_query($connect, $organizer_query);

?>