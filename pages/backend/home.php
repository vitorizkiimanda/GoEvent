<?php
    
    include('dbconnect.php');

    $user_id = NULL; //$_GET['user_id'];
    if ($user_id != NULL){
        $category = "SELECT c.category_id FROM user_category AS uc WHERE uc.user_id = '$user_id'";
        $event_query = "SELECT * FROM events as e INNER JOIN event_category as ec ON e.event_id = ec.event_id WHERE ec.category.id = '$category' AND e.event_date_starts >= CURDATE() LIMIT 15";
    }
    else
        $event_query = "SELECT * FROM events e WHERE e.event_date_starts >= CURDATE() LIMIT 15";
    $event = mysqli_query($connect, $event_query);

    if (isset($_POST['see_more'])){
        header('location: index.html');
    }

    
?>