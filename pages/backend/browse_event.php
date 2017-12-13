<?php

    include('dbconnect.php');
    $date_now = getdate();
    if(isset($_POST['event_search']))
        $event_name = $_POST['event_search'];
    else
        $event_name = null;
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

    if(isset($_GET['category'])){
        $topic = $_GET['category'];
        $event_query = "SELECT * FROM events AS e WHERE e.event_date_starts >= CURDATE() AND e.event_topic LIKE '%{$topic}%' LIMIT 15";
        $event = mysqli_query($connect, $event_query);
    }
    else if(isset($_POST['date_categorized']))
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
            $event_query = "SELECT * FROM events AS e WHERE e.event_date_starts = ADDDATE(CURDATE(), INTERVAL 1 day)";
            $event = mysqli_query($connect, $event_query);
            //header('location: ../browse_event');
        }
        else if($_POST['date_categorized']=="4")
        {
            $event_query = "SELECT * FROM events AS e WHERE e.event_date_starts >= CURDATE() AND e.event_date_starts <= '%{$sunday}%' AND e.event_name LIKE '%{$event_name}%' LIMIT 15";
            $event = mysqli_query($connect, $event_query);
            //header('location: ../browse_event');
        }
        else if($_POST['date_categorized']=="5"){
            $event_query = "SELECT * FROM events AS e WHERE (e.event_date_starts = '%{$saturday}%' OR e.event_date_starts = '%{$sunday}%') AND e.event_name LIKE '%{$event_name}%'  LIMIT 15";
            $event = mysqli_query($connect, $event_query);
            //header('location: ../browse_event');
        }
        else if($_POST['date_categorized']=="6")
        {
            $event_query = "SELECT * FROM events AS e WHERE e.event_date_starts >= '%{$sunday}%' AND e.event_date_starts <= ADDDATE('%{$sunday}%', INTERVAL 7 day) AND e.event_name LIKE '%{$event_name}%' LIMIT 15";
            $event = mysqli_query($connect, $event_query);
            //header('location: ../browse_event');
        }
        else if($_POST['date_categorized']=="7")
        {
            $event_query = "SELECT * FROM events AS e WHERE e.event_date_starts >= $firstDayNextMonth AND e.event_date_starts <= ADDDATE($firstDayNextMonth, INTERVAL 1 MONTH) AND e.event_name LIKE '%{$event_name}%' LIMIT 15";
            $event = mysqli_query($connect, $event_query);
            //header('location: ../browse_event');
        }
    }
    else if (!isset($_POST['date_categorized']))
    {
        $event_query = "SELECT * FROM events AS e WHERE e.event_date_starts >= CURDATE() LIMIT 15";
        $event = mysqli_query($connect, $event_query);
    }

    //protoype untuk filter browse;
    if(isset($_POST['filter_browse']))
    {
        $city = $_POST['event_city'];
        $topic=$_POST['event_topic'];
        $type=$_POST['event_type'];
        $price=$_POST['price_event'];
        echo $city;
        if($topic=$_POST['event_topic']=="All Categories")
        {
            $topic="_";
        }
        if($type=="All Event Types")
        {
            $type="_";
        }
        if($city==null)
        {
            $city="_";
        }
        if($_POST['date_categorized']=="1"){
            if($price==0)
            {
                $event_query = "SELECT * FROM events AS e WHERE e.event_date_starts >= CURDATE() AND e.event_topic LIKE '%{$topic}%' AND e.event_type LIKE '%{$type}%' LIMIT 15";
                $event = mysqli_query($connect, $event_query);
                //header('location: ../browse_event');                                
            }
            if($price==1)
            {
                $event_query = "SELECT * FROM events AS e WHERE e.event_date_starts >= CURDATE() AND e.event_topic LIKE '%{$topic}%' AND e.event_type LIKE '%{$type}%' AND e.ticket_price < 1 LIMIT 15";
                $event = mysqli_query($connect, $event_query);
                //header('location: ../browse_event');                                
            }
            if($price==2)
            {
                $event_query = "SELECT * FROM events AS e WHERE e.event_date_starts >= CURDATE() AND e.event_topic LIKE '%{$topic}%' AND e.event_type LIKE '%{$type}%' AND e.ticket_price > 1 LIMIT 15";
                $event = mysqli_query($connect, $event_query);
                //header('location: ../browse_event');                                
            }
        }
        else if($_POST['date_categorized']=="2")
        {
            if($price==0)
            {
                $event_query = "SELECT * FROM events AS e WHERE e.event_date_starts = CURDATE() AND e.event_topic LIKE '%{$topic}%' AND e.event_type LIKE '%{$type}%' LIMIT 15";
                $event = mysqli_query($connect, $event_query);
                //header('location: ../browse_event');                                
            }
            if($price==1)
            {
                $event_query = "SELECT * FROM events AS e WHERE e.event_date_starts = CURDATE() AND e.event_topic LIKE '%{$topic}%' AND e.event_type LIKE '%{$type}%' AND e.ticket_price < 1 LIMIT 15";
                $event = mysqli_query($connect, $event_query);
                //header('location: ../browse_event');                                
            }
            if($price==2)
            {
                $event_query = "SELECT * FROM events AS e WHERE e.event_date_starts = CURDATE() AND e.event_topic LIKE '%{$topic}%' AND e.event_type LIKE '%{$type}%' AND e.ticket_price > 1 LIMIT 15";
                $event = mysqli_query($connect, $event_query);
                //header('location: ../browse_event');                                
            }
        }
        else if($_POST['date_categorized']=="3")
        {
            if($price==0)
            {
                $event_query = "SELECT * FROM events AS e WHERE e.event_date_starts = ADDDATE(CURDATE(), INTERVAL 1 day) AND e.event_topic LIKE '%{$topic}%' AND e.event_type LIKE '%{$type}%' LIMIT 15";
                $event = mysqli_query($connect, $event_query);
                //header('location: ../browse_event');                                
            }
            if($price==1)
            {
                $event_query = "SELECT * FROM events AS e WHERE e.event_date_starts = ADDDATE(CURDATE(), INTERVAL 1 day) AND e.event_topic LIKE '%{$topic}%' AND e.event_type LIKE '%{$type}%' AND e.ticket_price < 1 LIMIT 15";
                $event = mysqli_query($connect, $event_query);
                //header('location: ../browse_event');                                
            }
            if($price==2)
            {
                $event_query = "SELECT * FROM events AS e WHERE e.event_date_starts = ADDDATE(CURDATE(), INTERVAL 1 day) AND e.event_topic LIKE '%{$topic}%' AND e.event_type LIKE '%{$type}%' AND e.ticket_price > 1 LIMIT 15";
                $event = mysqli_query($connect, $event_query);
                //header('location: ../browse_event');                                
            }
        }
        else if($_POST['date_categorized']=="4")
        {
            if($price==0)
            {
                $event_query = "SELECT * FROM events AS e WHERE e.event_date_starts >= CURDATE() AND e.event_date_starts <= '%{$sunday}%' AND e.event_topic LIKE '%{$topic}%' AND e.event_type LIKE '%{$type}%' LIMIT 15";
                $event = mysqli_query($connect, $event_query);
                //header('location: ../browse_event');                                
            }
            if($price==1)
            {
                $event_query = "SELECT * FROM events AS e WHERE e.event_date_starts >= CURDATE() AND e.event_date_starts <= '%{$sunday}%' AND e.event_topic LIKE '%{$topic}%' AND e.event_type LIKE '%{$type}%' AND e.ticket_price < 1 LIMIT 15";
                $event = mysqli_query($connect, $event_query);
                //header('location: ../browse_event');                                
            }
            if($price==2)
            {
                $event_query = "SELECT * FROM events AS e WHERE e.event_date_starts >= CURDATE() AND e.event_date_starts <= '%{$sunday}%' AND e.event_topic LIKE '%{$topic}%' AND e.event_type LIKE '%{$type}%' AND e.ticket_price > 1 LIMIT 15";
                $event = mysqli_query($connect, $event_query);
                //header('location: ../browse_event');                                
            }
        }
        else if($_POST['date_categorized']=="5"){
            if($price==0)
            {
                $event_query = "SELECT * FROM events AS e WHERE (e.event_date_starts = '%{$saturday}%' OR e.event_date_starts = '%{$sunday}%') AND e.event_topic LIKE '%{$topic}%' AND e.event_type LIKE '%{$type}%' LIMIT 15";
                $event = mysqli_query($connect, $event_query);
                //header('location: ../browse_event');                                
            }
            if($price==1)
            {
                $event_query = "SELECT * FROM events AS e WHERE (e.event_date_starts = '%{$saturday}%' OR e.event_date_starts = '%{$sunday}%') AND e.event_topic LIKE '%{$topic}%' AND e.event_type LIKE '%{$type}%' AND e.ticket_price < 1 LIMIT 15";
                $event = mysqli_query($connect, $event_query);
                //header('location: ../browse_event');                                
            }
            if($price==2)
            {
                $event_query = "SELECT * FROM events AS e WHERE (e.event_date_starts = '%{$saturday}%' OR e.event_date_starts = '%{$sunday}%') AND e.event_topic LIKE '%{$topic}%' AND e.event_type LIKE '%{$type}%' AND e.ticket_price > 1 LIMIT 15";
                $event = mysqli_query($connect, $event_query);
                //header('location: ../browse_event');                                
            }
        }
        else if($_POST['date_categorized']=="6")
        {
            if($price==0)
            {
                $event_query = "SELECT * FROM events AS e WHERE e.event_date_starts >= '%{$sunday}%' AND e.event_date_starts <= ADDDATE('%{$sunday}%' AND e.event_topic LIKE '%{$topic}%' AND e.event_type LIKE '%{$type}%' LIMIT 15";
                $event = mysqli_query($connect, $event_query);
                //header('location: ../browse_event');                                
            }
            if($price==1)
            {
                $event_query = "SELECT * FROM events AS e WHERE e.event_date_starts >= '%{$sunday}%' AND e.event_date_starts <= ADDDATE('%{$sunday}%' AND e.event_topic LIKE '%{$topic}%' AND e.event_type LIKE '%{$type}%' AND e.ticket_price < 1 LIMIT 15";
                $event = mysqli_query($connect, $event_query);
                //header('location: ../browse_event');                                
            }
            if($price==2)
            {
                $event_query = "SELECT * FROM events AS e WHERE e.event_date_starts >= '%{$sunday}%' AND e.event_date_starts <= ADDDATE('%{$sunday}%' AND e.event_topic LIKE '%{$topic}%' AND e.event_type LIKE '%{$type}%' AND e.ticket_price > 1 LIMIT 15";
                $event = mysqli_query($connect, $event_query);
                //header('location: ../browse_event');                                
            }
        }
        else if($_POST['date_categorized']=="7")
        {
            if($price==0)
            {
                $event_query = "SELECT * FROM events AS e WHERE e.event_date_starts >= $firstDayNextMonth AND e.event_date_starts <= ADDDATE($firstDayNextMonth, INTERVAL 1 MONTH) AND e.event_topic LIKE '%{$topic}%' AND e.event_type LIKE '%{$type}%' LIMIT 15";
                $event = mysqli_query($connect, $event_query);
                //header('location: ../browse_event');                                
            }
            if($price==1)
            {
                $event_query = "SELECT * FROM events AS e WHERE e.event_date_starts >= $firstDayNextMonth AND e.event_date_starts <= ADDDATE($firstDayNextMonth, INTERVAL 1 MONTH) AND e.event_topic LIKE '%{$topic}%' AND e.event_type LIKE '%{$type}%' AND e.ticket_price < 1 LIMIT 15";
                $event = mysqli_query($connect, $event_query);
                //header('location: ../browse_event');                                
            }
            if($price==2)
            {
                $event_query = "SELECT * FROM events AS e WHERE e.event_date_starts >= $firstDayNextMonth AND e.event_date_starts <= ADDDATE($firstDayNextMonth, INTERVAL 1 MONTH) AND e.event_topic LIKE '%{$topic}%' AND e.event_type LIKE '%{$type}%' AND e.ticket_price > 1 LIMIT 15";
                $event = mysqli_query($connect, $event_query);
                //header('location: ../browse_event');                                
            }
        }
    }
?>
