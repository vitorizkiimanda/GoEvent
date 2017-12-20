<?php
    include('dbconnect.php');
    
    
    $rotation   = 0;
    $teks       = "Nama Peserta";
    

    if(isset($_SESSION['temp'])){
        $temp = $_SESSION['temp'];
    }

    if($_POST){
        $font_size = $_POST['font_size'];
        // $font_size = "72";        
        $event_id = $_POST['event_id'];
        
        
        
        $hex = $_POST['html5colorpicker'];
        // $font = $_POST['font'];
        // $font = "https://fonts.googleapis.com/css?family=".$font;
        
        $font             = '../../font/Aaargh.ttf';
        
        list($r, $g, $b) = sscanf($hex, "#%02x%02x%02x");

        // $origin_x = 210;
        // $origin_y = 100;
        // $temp = $_SESSION['temp'];

        // simpen design certificate
        $query_format = mysqli_query($connect,  "SELECT * FROM certificate_format WHERE event_id= '$event_id'");
        if(mysqli_num_rows($query_format)>0){
            $result = mysqli_fetch_assoc($query_format);
            $photo_name = $result['certificate_image'];
            $photo_path = '../../certificate_event/'.$result['certificate_image'];
        }
        else{
            $photo_name = $_FILES['my_file']['name'];
            $photo_size = $_FILES['my_file']['size'];
            $photo_type = $_FILES['my_file']['type'];
            $photo_file = $_FILES['my_file']['tmp_name'];
            $sub_photo = substr($photo_name,-6);
            $photo_name = $event_id.'_certificate.'.$sub_photo;
            $photo_path = '../../certificate_event/'.$photo_name;
            move_uploaded_file($photo_file, $photo_path);
        }


         

        //  $sql = mysqli_query($connect,  "UPDATE certificate_format SET certificate_image = '$photo_name' WHERE event_id = '$event_id'");
         
    //  //
        list($width, $height) = getimagesize($photo_path);
    

    //  pilih penempatan
         if($temp=="1"){
             $origin_x = (2*$width)/5;
             $origin_y = $height/3;
         }

         else if($temp=="2"){
            $origin_x = (2*$width)/5;
            $origin_y = $height/2;
         }

         else if($temp=="3"){
            $origin_x = (2*$width)/5;
            $origin_y = (2*$height)/3;
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
         $query = "INSERT INTO certificate_format (event_id,certificate_image,font_size, font, origin_x, origin_y, color_r, color_g, color_b, temp, rotation) 
                    VALUES ('$event_id','$photo_name','$font_size','$font', '$origin_x', '$origin_y', '$r', '$g', '$b', '$temp', '$rotation')";

        $q = $connect->query($query);
        if($q === true){

        }
        else{
            $sql = mysqli_connect($connect, "UPDATE certificate_format SET certificate_image ='$photo_name' , font_size = '$font_size' , font = '$font', origin_x = '$origin_x', origin_y = '$origin_y' ,color_r = '$r' , color_g = '$g', color_b = '$b' , temp = '$temp' , rotation = '$rotation' WHERE event_id = '$event_id'");
            
        }

     
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
