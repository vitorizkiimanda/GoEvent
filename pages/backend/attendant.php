<?php
    //buat di profile, liat tiket dan liat event yg pernah dibeli

    // include('dbconnect.php');


    if (empty($_SESSION['user_id'])) {
        header("Location: ../sign_in"); // jika belum login, maka dikembalikan ke file form_login.php
    }
    else{
        $id = $_SESSION['user_id'];

        $query = mysqli_query($connect,  "SELECT * FROM attendant A JOIN events E WHERE user_id='$id' AND status=0 AND A.event_id=E.event_id ");
        $query2 = mysqli_query($connect,  "SELECT * FROM attendant A JOIN events E WHERE user_id='$id' AND status=1 AND A.event_id=E.event_id ");
        
        //upcoming event
            if(mysqli_num_rows($query)>0){
                $upcoming = array();
                while($result =mysqli_fetch_assoc($query)){
                    $upcoming[]=$result;
                
                }
                //hasilnya $attendant
                //tunggu front-end
                
            }
            else{
            }
        //

        //past event
            if(mysqli_num_rows($query2)>0){
                $past = array();
                while($result =mysqli_fetch_assoc($query2)){
                    $past[]=$result;
                
                }

                //hasilnya $attendant
                //tunggu front-end
                
            }
            else{
            }
        //
    }
?>
