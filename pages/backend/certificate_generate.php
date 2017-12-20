<?php
    include('dbconnect.php');
        
    if($_GET['event_id']){
        $event_id=base64_decode($_GET['event_id']);

        //peserta
        $query = mysqli_query($connect,  "SELECT user_id FROM attendant WHERE event_id= '$event_id' AND attendant.status='1'");

        if(mysqli_num_rows($query)>0){
            $peserta = array();
            while($result =mysqli_fetch_assoc($query)){
                $user_id = $result['user_id'];           
                
                $query_peserta = mysqli_query($connect,  "SELECT user_name,user_id FROM user WHERE user_id = '$user_id'");
                
                $hasil =mysqli_fetch_assoc($query_peserta);
                $peserta[]=$hasil;
            }

            //generate
            $query_format = mysqli_query($connect,  "SELECT * FROM certificate_format WHERE event_id= '$event_id'");
            if(mysqli_num_rows($query_format)>0){
                $aww = mysqli_fetch_assoc($query_format);

                //format
                $gambar_sumber    = '../../certificate_event/'.$aww['certificate_image'];
                $o_gambar         = imagecreatefromjpeg( $gambar_sumber );
                $color            = imagecolorallocate( $o_gambar, $aww['color_r'], $aww['color_g'], $aww['color_b'] );
                $origin_x         = $aww['origin_x'];
                $origin_y         = $aww['origin_y'];
                $font_size        = $aww['font_size']; 
                $font             = $aww['font'];
                $rotation         = $aww['rotation'];

                for($i=0; $i<count($peserta); $i++){
                    $teks    = $peserta[$i]['user_name'];
                    $user_id = $peserta[$i]['user_id']; 

                    imagettftext($o_gambar, $font_size, $rotation, $origin_x, $origin_y, $color, $font, $teks);
                    
                    $imagenya = $event_id."-".$user_id."-".$teks.".jpg";
                    $locate   = "../../user_certificate/".$imagenya;

                    imagejpeg($o_gambar, $locate);

                    //simpen di database(album)
                    $upload = "INSERT INTO album_certificate (user_id,event_id,certificate)
                        VALUES ('$user_id','$event_id','$imagenya')";
                    $connect->query($upload);

                }
            }
            header('Location: ../manage_event/' );
        }
        else{
            //kondisi gaada peserta
        }

        
            
        
    
    }


?>