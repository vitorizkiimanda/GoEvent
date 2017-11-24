<?php
    session_start();
    $connect = mysqli_connect('localhost', 'root', '', 'go-event');

    $user_id = $_GET['user_id'];
    $category = "SELECT c.category_id FROM user_category AS uc WHERE uc.user_id = '$user_id'";
    $event = "SELECT * FROM events as e INNER JOIN event_category as ec ON e.event_id = ec.event_id WHERE ec.category.id = '$category' LIMIT 15";

    

?>