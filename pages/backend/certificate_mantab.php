<?php
    include('dbconnect.php');
    
    $cek        = 0;
    $rotation   = 0;
    $teks       = "Nama Peserta";
    

    if(isset($_SESSION['temp'])){
        $temp = $_SESSION['temp'];
    }

    if($_POST){
        $font_size = $_POST['font_size'];
        // $font_size = "72";        
        $event_id = $_POST['event_id'];
        $cek=1;
        $hex = $_POST['html5colorpicker'];
        // $font = $_POST['font'];
        // $font = "https://fonts.googleapis.com/css?family=".$font;
        
        $font             = '../../font/Aaargh.ttf';
        
        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");

        // $origin_x = 210;
        // $origin_y = 100;
        // $temp = $_SESSION['temp'];


    // simpen design certificate
         $photo_name = $_FILES['my_file']['name'];
         $photo_size = $_FILES['my_file']['size'];
         $photo_type = $_FILES['my_file']['type'];
         $photo_file = $_FILES['my_file']['tmp_name'];
         $sub_photo = substr($photo_name,-6);
         $photo_name = $event_id.'_certificate.'.$sub_photo;
         $photo_path = '../../certificate_event/'.$photo_name;
         move_uploaded_file($photo_file, $photo_path);

         $sql = mysqli_query($connect,  "UPDATE certificate_format SET certificate_image = $photo_name WHERE event_id = $event_id");
         
    //  //

    //  pilih penempatan
         if($temp=="1"){
             $origin_x = 310;
             $origin_y = 100;
         }

         else if($temp=="2"){
             $origin_x = 310;
             $origin_y = 290;
         }

         else if($temp=="3"){
             $origin_x = 310;
             $origin_y = 490;
         }

         else{
         }
     //

    //certificate nya
        //  $gambar_sumber    = "../../certificate_event/1_certificate.jpeg";
         $gambar_sumber    = $photo_path;
         $o_gambar         = imagecreatefromjpeg( $gambar_sumber );
         $color            = imagecolorallocate( $o_gambar, $r, $g, $b );
         

         //ke database
         $query = mysqli_query($connect, "INSERT INTO certificate_format (event_id,certificate_image,font_size, font, origin_x, origin_y, color_r, color_g, color_b, temp, rotation) 
                                                    VALUES ('$event_id','','$font_size','$font', '$origin_x', '$origin_y', '$r', '$g', '$b', '$temp', '$rotation')");

     
         imagettftext($o_gambar, $font_size, $rotation, $origin_x, $origin_y, $color, $font, $teks);
         
         $locate = "../../certificate_event/example".$photo_name;
        // $locate = "../../certificate_event/example_$photo_name";
         imagejpeg($o_gambar, $locate);
         
        //  $gambar_jadi = $locate;

    //
    $event_id_encrypt = base64_encode($event_id);
    header('Location: ../certificate_event?event_id='.$event_id_encrypt);        
    

    }
    else{
        // $font_size  = 20;
        // $font       = '../../fonts/glyphicons-halflings-regular.ttf';
        // $color      = imagecolorallocate( $o_gambar, 0, 0, 0 );        
    }

    
?>
