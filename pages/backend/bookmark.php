<?php
    //buat profile, liat yg di bookmark oleh user

    // include('dbconnect.php');

    if (empty($_SESSION['user_id'])) {
        header("Location: ../sign_in"); // jika belum login, maka dikembalikan ke file form_login.php
    }
    else{
        $id = $_SESSION['user_id'];

        $query = mysqli_query($connect,  "SELECT * FROM bookmark B JOIN events E WHERE user_id='$id' AND B.event_id=E.event_id ");

        if(mysqli_num_rows($query)>0){
            $bookmark = array();
            while($result =mysqli_fetch_assoc($query)){
                $bookmark[]=$result;
            
            }

            //hasilnya $bookmark
            //tunggu front-end
            
        }
        else{
            $bookmark=0;
        }
    }
?>