<?php
    include('dbconnect.php');
    if(isset($_POST['sign']))
    {
        $id_attendance=$_POST['id_attendance'];
        $event_id_back = base64_encode($_GET['event_id']);

        $attendace_query="SELECT * FROM attendant a INNER JOIN user u ON a.user_id=u.user_id";
        $attendance=mysqli_query($connect, $attendace_query);
        $attendace_update="UPDATE attendant SET status='1', a WHERE id_attendance = $id_attendance";
        $cek_avail="SELECT COUNT(id_attendance) FROM attendant WHERE id_attendance = $id_attendance";
        $avail = mysqli_query($connect, $cek_avail);
        $count = mysqli_fetch_array($avail['count']);
        if($count==0)
        {
            // $_SESSION['err_msg']=true;
            // $_SESSION['suc_msg']=false;
            header('location: ../attendance_event/index.php?status=1&event_id='.event_id_back);
        }
        else
        {
            $sign = mysqli_query($connect, $attendace_update);
            // $_SESSION['suc_msg'] = true;
            // $_SESSION['err_msg']=false;
            header('location: ../attendance_event/index.php?status=2&event_id='.event_id_back);
        }
    }


?>