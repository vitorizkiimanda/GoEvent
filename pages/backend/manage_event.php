<?php
    include('dbconnect.php');
    $user_login = $_SESSION['user_id'];
    $upcoming_query ="SELECT * FROM user_organizer u INNER JOIN events e ON u.organizer_id=e.organizer_id WHERE u.user_id=$user_login ";
    $upcoming = mysqli_query($connect, $upcoming_query);

    $past_query ="SELECT * FROM user_organizer u INNER JOIN events e ON u.organizer_id=e.organizer_id WHERE u.user_id=$user_login AND e.event_date_starts < CURRENT_TIME()";
    $past = mysqli_query($connect, $past_query);
?>