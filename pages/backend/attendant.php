<?php
    //buat di profile, liat tiket dan liat event yg pernah dibeli

    include('dbconnect.php');

    if (empty($_SESSION['user_id'])) {
        header("Location: ../sign_in"); // jika belum login, maka dikembalikan ke file form_login.php
    }
    else{
        $id = $_SESSION['user_id'];

        $query = mysqli_query($connect,  "SELECT * FROM attendant A JOIN events E WHERE user_id='$id' AND A.event_id=E.event_id ");

        if(mysqli_num_rows($query)>0){
            $result_set = array();
            while($result =mysqli_fetch_assoc($query)){
                $result_set[]=$result;
            
            }

            //hasilnya $result_set
            //tunggu front-end
            
        }
        else{
        }
    }
?>