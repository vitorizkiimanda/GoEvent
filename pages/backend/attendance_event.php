<?php
    include('dbconnect.php');
    if(isset($_GET['event_id']))
    {
        $dec=$_GET['event_id'];
    }
    else
    {
        $undec = $_POST['id_event'];
        $dec = base64_encode($undec);
    }
    $event_id=base64_decode($dec);  

    $attendace_query_table="SELECT * FROM attendant a INNER JOIN user u ON a.user_id=u.user_id";
    $attendance_table=mysqli_query($connect, $attendace_query_table);
    if(isset($_POST['sign']))
    {
        if(isset($_POST['id_attendance']))
        {        
            $id_attendance=$_POST['id_attendance'];
            $attendace_query_avail="SELECT ticket_id FROM attendant WHERE ticket_id = '$id_attendance'";
            $attendance_avail=mysqli_query($connect, $attendace_query_avail);
            $num = mysqli_num_rows($attendance_avail);
            // $cek_avail="SELECT COUNT(id_attendance) FROM attendant WHERE id_attendance = $id_attendance";
            // $avail = mysqli_query($connect, $cek_avail);
            // $count = mysqli_fetch_array($avail['count']);
            if($num==0)
            {
                header('location: ../attendance_event/index.php?status=1&event_id='.$dec);
            }
            else
            {
                $attendace_update="UPDATE attendant a SET a.status='1', a.arrival_time=CURRENT_TIME() WHERE ticket_id = '$id_attendance'";
                $sign = mysqli_query($connect, $attendace_update);                
                header('location: ../attendance_event/index.php?status=2&event_id='.$dec);
            }
        }
        else
        {
            header('location: ../attendance_event/index.php?status=0&event_id='.$dec);
        }

    }


?>