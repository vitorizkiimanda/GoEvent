<?php
    include('dbconnect.php');
    
    $cek =0;
    $rotation   = 0;
    $teks       = "Nama Peserta";
    

    if(isset($_SESSION['temp'])){
        $temp = $_SESSION['temp'];
    }
    if(isset($_SESSION['font_size'])){
        $font_size = $_SESSION['font_size'];
    }


    if($_POST){
        $event_id = $_POST['event_id'];
        $cek=1;
        $color = $_POST['html5colorpicker'];
        $font = $_POST['font'];
        // $origin_x = 210;
        // $origin_y = 100;
        // $temp = $_SESSION['temp'];


    //simpen design certificate
         $photo_name = $_FILES['my_file']['name'];
         $photo_size = $_FILES['my_file']['size'];
         $photo_type = $_FILES['my_file']['type'];
         $photo_file = $_FILES['my_file']['tmp_name'];
         $sub_photo = substr($photo_type,6);
         $photo_name = $event_id.'_certificate_'.$sub_photo;
         $photo_path = "../../certificate_event/".$photo_name;
         move_uploaded_file($photo_file, $photo_path);

         $sql = mysqli_query($connect,  "UPDATE events SET event_photo = $photo_name WHERE event_id = $event_id");
         
     //

    //  pilih penempatan
         if($temp==1){
             $origin_x = 210;
             $origin_y = 100;
         }

         else if($temp==2){
             $origin_x = 210;
             $origin_y = 290;
         }

         else if($temp==3){
             $origin_x = 210;
             $origin_y = 490;
         }

         else{
             
         }
     //

     //certificate nya
         $gambar_sumber    = $photo_path;
         $o_gambar         = imagecreatefromjpeg( $gambar_sumber );
     
         imagettftext($o_gambar, $font_size, $rotation, $origin_x, $origin_y, $color, $font, $teks);
         

         $locate = "../../certificate_event/".$photo_name."(example)";
         imagejpeg($o_gambar, $locate);
         
         $gambar_jadi = $locate;
         echo $gambar_jadi;
     //


    }
    else{
        // $font_size  = 20;
        // $font       = '../../fonts/glyphicons-halflings-regular.ttf';
        // $color      = imagecolorallocate( $o_gambar, 0, 0, 0 );        
    }
    
        


?>
