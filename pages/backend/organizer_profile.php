<?php
    require_once 'dbconnect.php';
 $user_id = $_SESSION['user_id'];

 if ($_POST) {
     $organizer_name = $_POST['organizer_name'];
     $organizer_description = $_POST['ckeditor'];
     $organizer_phone_number = $_POST['organizer_phone_number'];
     $organizer_address = $_POST['organizer_address'];
     $organizer_facebook = $_POST['organizer_facebook'];
     $organizer_website = $_POST['organizer_website'];
     $organizer_instagram = $_POST['organizer_instagram'];
     $organizer_twitter = $_POST['organizer_twitter'];
     $organizer_id = $_POST['organizer_id'];

     if($organizer_id == 0)
     {
       $count = mysqli_query($connect, "SELECT organizer_id FROM organizer ORDER BY organizer_id DESC");
       $count = mysqli_fetch_assoc($count);
       $count = $count['organizer_id']+1;

       $photo_name = $_FILES['organizer_photo']['name'];
       $photo_size = $_FILES['organizer_photo']['size'];
       $photo_type = $_FILES['organizer_photo']['type'];
       $photo_file = $_FILES['organizer_photo']['tmp_name'];
       $sub_photo = substr($photo_type,6);
       $photo_name = $count.'_photo.'.$sub_photo;
       $photo_path = "../../photo_organizer/".$photo_name;
       move_uploaded_file($photo_file, $photo_path);

         $sql = "INSERT INTO organizer (organizer_id, organizer_name , organizer_description , organizer_phone_number, organizer_address  ,   organizer_website,       organizer_facebook,organizer_twitter, organizer_instagram, organizer_photo)
                                VALUES ('', '$organizer_name','$organizer_description', '$organizer_phone_number', '$organizer_address' ,'$organizer_website' , '$organizer_facebook','$organizer_twitter', '$organizer_instagram'  , '$photo_name'  )";
        if ($connect->query($sql) === true) {
            //echo $sql;// boleh diganti nih, pointnya mau bertambah berapa jika add restaurant
            $sql2 = "INSERT INTO user_organizer  (user_id, organizer_id)
                                          VALUES ('$user_id', '$count')";
            $connect->query($sql2);
            echo "<p> New Event Successfully Created</p>";
            header('Location: ../organizer_profile_choose_create');
        }
        else {
          echo "<p> GAGAL TOLOL!!</p>";
          echo "Error " . $sql . ' ' . $connect->connect_error;
        }
     }
     else {
       if( file_exists($_FILES['organizer_photo']['tmp_name']) && is_uploaded_file($_FILES['organizer_photo']['tmp_name'])) {
       $photo_name = $_FILES['organizer_photo']['name'];
       $photo_size = $_FILES['organizer_photo']['size'];
       $photo_type = $_FILES['organizer_photo']['type'];
       $photo_file = $_FILES['organizer_photo']['tmp_name'];
       $sub_photo = substr($photo_type,6);
       $photo_name = $organizer_id.'_photo.'.$sub_photo;
       $photo_path = "../../photo_organizer/".$photo_name;
       move_uploaded_file($photo_file, $photo_path);
        $sql12 = "UPDATE organizer SET organizer_name = '$organizer_name' , organizer_description = '$organizer_description', organizer_phone_number = '$organizer_phone_number', organizer_address = '$organizer_address' ,organizer_website = '$organizer_website' , organizer_facebook = '$organizer_facebook', organizer_twitter = '$organizer_twitter' , organizer_instagram = '$organizer_instagram' , organizer_photo = '$photo_name' WHERE organizer_id = '$organizer_id'";
      }
      else {
        $sql12 = "UPDATE organizer SET organizer_name = '$organizer_name' , organizer_description = '$organizer_description', organizer_phone_number = '$organizer_phone_number', organizer_address = '$organizer_address' ,organizer_website = '$organizer_website' , organizer_facebook = '$organizer_facebook', organizer_twitter = '$organizer_twitter' , organizer_instagram = '$organizer_instagram' WHERE organizer_id = '$organizer_id'";
      }
        if ($connect->query($sql12)) {
          echo "<p> New Event Successfully Created !</p>";
          header('Location: ../organizer_profile_choose');
        }
        else {
          echo "<p> GAGAL TOLOL!!</p>";
          echo "Error " . $sql12 . ' ' . $connect->connect_error;
        }
     }
}
?>
