<?php
    require_once 'dbconnect.php';
 $user_id = $_SESSION['user_id'];
 $query_organizer =mysqli_query($connect, "SELECT * FROM user_organizer JOIN organizer WHERE user_id = '$user_id'");

 if (!empty($_GET['mark']))
 {
     $mark = $_GET['mark'];
 }
 else
 {
   $mark = 0 ;
 }
 $organizer_query = mysqli_query($connect, "SELECT * FROM organizer WHERE organizer_id = '$mark'");
 $organizer_query = mysqli_fetch_assoc($organizer_query);



 if ($_POST) {
     $organizer_name = $_POST['organizer_name'];
     $organizer_description = $_POST['organizer_description'];
     $organizer_phone_number = $_POST['organizer_phone_number'];
     $organizer_facebook = $_POST['organizer_facebook'];
     $organizer_website = $_POST['organizer_website'];
     $organizer_instagram = $_POST['organizer_instagram'];
     $organizer_twitter = $_POST['organizer_twitter'];

     if($mark == 0)
     {
         //dapetin id yg terakhir
         $count = mysqli_query($connect, "SELECT organizer_id FROM organizer ORDER BY organizer_id DESC");
         $count = mysqli_fetch_assoc($count);
         $count = $count['organizer_id']+1;
         //echo "$event_description" ;

         $photo_name = $_FILES['organizer_photo']['name'];
         $photo_size = $_FILES['organizer_photo']['size'];
         $photo_type = $_FILES['organizer_photo']['type'];
         $photo_file = $_FILES['organizer_photo']['tmp_name'];
         $sub_photo = substr($photo_type,6);
         $photo_name = $count.'_photo.'.$sub_photo;
         $photo_path = "../../photo_organizer/".$photo_name;
         move_uploaded_file($photo_file, $photo_path);

         $sql = "INSERT INTO organizer (organizer_id, organizer_name , organizer_description, organizer_photo,      organizer_website,       organizer_facebook,organizer_twitter, organizer_instagram, organizer_phone_number)
                                VALUES ('', '$organizer_name','$organizer_description', '$photo_name', '$organizer_website' , '$organizer_facebook','$organizer_twitter', '$organizer_instagram' , '$organizer_phone_number'  )";
        $sql2 = "INSERT INTO user_organizer  (user_id, organizer_id)
                                      VALUES ('$user_id', '$count')";
        if ($connect->query($sql) === true && $connect->query($sql) === true) {
                                //echo $sql;// boleh diganti nih, pointnya mau bertambah berapa jika add restaurant
            echo "<p> New Event Successfully Created</p>";
        }
        else {
          echo "<p> GAGAL TOLOL!!</p>";
          echo "Error " . $sql . ' ' . $connect->connect_error;
        }
     }
     else {
       $photo_name = $_FILES['organizer_photo']['name'];
       $photo_size = $_FILES['organizer_photo']['size'];
       $photo_type = $_FILES['organizer_photo']['type'];
       $photo_file = $_FILES['organizer_photo']['tmp_name'];
       $sub_photo = substr($photo_type,6);
       $photo_name = $organizer_query['organizer_photo'];
       $photo_path = "../../photo_organizer/".$photo_name;
       move_uploaded_file($photo_file, $photo_path);

        $sql = mysqli_query($connect, "UPDATE organizer SET organizer_name = '$organizer_name' , organizer_description = '$organizer_description', organizer_photo = '$photo_name', organizer_website = '$organizer_website' , organizer_facebook = '$organizer_facebook', organizer_twitter = '$organizer_twitter' , organizer_instagram = '$organizer_instagram', organizer_phone_number = '$organizer_phone_number' WHERE organizer_id = '$mark'");

     }
}
?>
