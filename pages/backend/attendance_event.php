<?php
    include('dbconnect.php');
    $err_msg=false;
    $suc_msg=false;
    if(isset($_POST['sign']))
    {
        $id_attendance=$_POST['id_attendance'];
        $attendace_update="UPDATE attendant SET status='1' WHERE id_attendance = $id_attendance";
        $cek_avail="SELECT COUNT(id_attendance) FROM attendant WHERE id_attendance = $id_attendance";
        $avail = mysqli_query($connect, $cek_avail);
        $count = mysqli_fetch_array($avail['count']);
        if($count==0)
        {
            $err_msg=true;
            $suc_msg=false;
            // $_SESSION['err_msg']=true;
            // $_SESSION['suc_msg']=false;
            header('location: ../attendance_event/index.php?');
        }
        else
        {
            $sign = mysqli_query($connect, $attendace_update);
            // $_SESSION['suc_msg'] = true;
            // $_SESSION['err_msg']=false;
            header('location: ../attendance_event/index.php?');
        }
    }


?>