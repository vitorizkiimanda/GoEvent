<?php

    include('dbconnect.php');
    $date_now = getdate();
    $event_name = $_POST['event_search'];
    $start = time();
    $end = $start;
    $day = date('w', $start);
    if ($day > 0 && $day < 5)
    {
         $start = time()+ ((5 - $day) * 86400);
    }
    if ($day != 0)
    {
        $end = time() + (7 - $day) * 86400;
    }
    $weekend['StartDate'] = date('d-F-Y', $start);
    $weekend['EndDate'] = date('d-F-Y', $end);
    $saturday = $weekend['StartDate'];
    $sunday = $weekend['EndDate'];
    $firstDayNextMonth = date('Y-m-d', strtotime('first day of next month'));

    if(isset($_POST['date_categorized']))
    {
        if($_POST['date_categorized']=="1"){
            $event_query = "SELECT * FROM events AS e WHERE e.event_date_starts >= CURDATE() AND e.event_name LIKE '%{$event_name}%' LIMIT 15";
            $event = mysqli_query($connect, $event_query);
            //header('location: ../browse_event');
        }
        else if($_POST['date_categorized']=="2")
        {
            $event_query = "SELECT * FROM events AS e WHERE e.event_date_starts = CURDATE() AND e.event_name LIKE '%{$event_name}%' LIMIT 15";
            $event = mysqli_query($connect, $event_query);
            //header('location: ../browse_event');
        }
        else if($_POST['date_categorized']=="3")
        {
            $event_query = "SELECT * FROM events AS e WHERE e.event_date_starts = DATEADD(day, 1, CURDATE()) AND e.event_name LIKE '%{$event_name}%' LIMIT 15";
            $event = mysqli_query($connect, $event_query);
            //header('location: ../browse_event');
        }
        else if($_POST['date_categorized']=="4")
        {
            $event_query = "SELECT * FROM events AS e WHERE e.event_date_starts >= CURDATE() AND e.event_date_starts <= $sunday AND e.event_name LIKE '%{$event_name}%' LIMIT 15";
            $event = mysqli_query($connect, $event_query);
            //header('location: ../browse_event');
        }
        else if($_POST['date_categorized']=="5"){
            $event_query = "SELECT * FROM events AS e WHERE (e.event_date_starts = $saturday OR e.event_date_starts = $sunday) AND e.event_name LIKE '%{$event_name}%'  LIMIT 15";
            $event = mysqli_query($connect, $event_query);
            //header('location: ../browse_event');
        }
        else if($_POST['date_categorized']=="6")
        {
            $event_query = "SELECT * FROM events AS e WHERE e.event_date_starts >= $sunday AND e.event_date_starts <= DATEADD(week, 1, $sunday) AND e.event_name LIKE '%{$event_name}%' LIMIT 15";
            $event = mysqli_query($connect, $event_query);
            //header('location: ../browse_event');
        }
        else if($_POST['date_categorized']=="7")
        {
            $event_query = "SELECT * FROM events AS e WHERE e.event_date_starts >= $firstDayNextMonth AND e.event_date_starts <= DATEADD(month, 1, $firstDayNextMonth) AND e.event_name LIKE '%{$event_name}%' LIMIT 15";
            $event = mysqli_query($connect, $event_query);
            //header('location: ../browse_event');
        }
    }
    else{
        $event_query = "SELECT * FROM events AS e WHERE e.event_date_starts >= CURDATE() LIMIT 15";
        $event = mysqli_query($connect, $event_query);
    }
?>
