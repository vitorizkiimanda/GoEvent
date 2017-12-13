<?php
    include('dbconnect.php');
        
    if(isset($_POST['event_id'])){
        $event_id = $_POST['event_id'];
        
        //peserta
        $query = mysqli_query($connect,  "SELECT user_id FROM attendant WHERE event_id= '$event_id' AND attendant.status='1'");

        if(mysqli_num_rows($query)>0){
            $peserta = array();
            while($result =mysqli_fetch_assoc($query)){
                $user_id = $result['user_id'];           
                
                $query_peserta = mysqli_query($connect,  "SELECT user_name FROM user WHERE user_id = '$user_id'");
                
                $hasil =mysqli_fetch_assoc($query_peserta);
                $peserta[]=$hasil['user_name'];
            }
        }

        //generate
        $query_format = mysqli_query($connect,  "SELECT * FROM certificate_format WHERE event_id= '$event_id'");
        if(mysqli_num_rows($query_format)>0){
            $aww = mysqli_fetch_assoc($query_format);

            




            imagettftext($o_gambar, $font_size, $rotation, $origin_x, $origin_y, $color, $font, $teks);
            
        
        }
            

        
    
    }


?>