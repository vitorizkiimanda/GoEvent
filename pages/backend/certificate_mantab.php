<?php
    include('dbconnect.php');
    
    $gambar_sumber    = "1478946853063.jpg";
    
    $o_gambar         = imagecreatefromjpeg( $gambar_sumber );
    
    $putih           = imagecolorallocate( $o_gambar, 255, 255, 255 );
    $hitam           = imagecolorallocate( $o_gambar, 0, 0, 0 );
   
   
   
   $font_size = 40;
   $rotation = 0;
   $origin_x = 100;
   $origin_y = 100;
   $font = "Aaargh.ttf";
   
   //nanti namanya select nama from database
   $text = "Nuh Satria Putra";
   
   // $test = imagettftext($o_gambar, $font_size, $rotation, $origin_x, $origin_y, $color1, $font, $text);
   imagettftext($o_gambar, $font_size, $rotation, $origin_x, $origin_y, $color2, $font, $text);
    
    
   // header( 'Content-type: image/png' );
   $aww = "image/nuhsat.jpg";
   // $imagenya = imagepng( $o_gambar ).".png";
   imagejpeg($o_gambar, $aww);
   
   // imagedestroy( $o_gambar );
   // echo $imagenya;
   // echo base64_encode($imagenya);
   
   
   // $input = '/image';
   // $output = $imagenya;
   // file_put_contents($output, file_get_contents($input));
   
   
   $sql = mysqli_query($connect, "INSERT INTO user (id, nama, gambar) 
   VALUES ('', 'aww', '$aww')");   
   ?>
   

?>