<?php
    include('dbconect.php');
    $error=false;
    $success=false;

    if(isset($_POST['sign']))
    {
        $id_attendance=$_POST['id_attendance'];
        $attendace_update="UPDATE attendant SET status='1' WHERE id_attendance = $id_attendance";
        $cek_valid="SELECT COUNT(id_attendance) FROM attendant WHERE id_attendance = $id_attendance";

        if($cek_valid==0)
        {
            $error=true;
            $success=false;
        }
        else
        {
            $sign = mysqli_query($connect, $attendace_update);
            $success = true;
            $error=false;
        }
    }


?>