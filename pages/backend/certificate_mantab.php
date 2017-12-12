<?php
    include('dbconnect.php');
    
    $rotation = 0;

    
    

    if (isset($_SESSION['temp']) && !empty($_FILES['my_file'])){
        
        //simpen design certificate
            $photo_name = $_FILES['my_file']['name'];
            $photo_size = $_FILES['my_file']['size'];
            $photo_type = $_FILES['my_file']['type'];
            $photo_file = $_FILES['my_file']['tmp_name'];
            $sub_photo = substr($photo_type,6);
            $photo_name = 'certificate_'.$sub_photo;
            $photo_path = "../../certificate_event/".$photo_name;
            move_uploaded_file($photo_file, $photo_path);
        //

        //pilih penempatan
            if($_SESSION['temp']==1){
                $origin_x = 210;
                $origin_y = 100;
            }

            else if($_SESSION['temp']==2){
                $origin_x = 210;
                $origin_y = 290;
            }

            else if($_SESSION['temp']==3){
                $origin_x = 210;
                $origin_y = 490;
            }

            else{
            }
        //

        //certificate nya
            
        //
    }    
?>
   

?>