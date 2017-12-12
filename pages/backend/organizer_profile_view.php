<?php
    include('dbconnect.php');
    $organizer_id = $_GET['organizer_id'];

    $organizer_query="SELECT * FROM organizer WHERE organizer_id='$organizer_id'";
    $organizer=mysqli_query($connect, $organizer_query);
    $item=mysqli_fetch_array($organizer);
?>