<?php
    require_once 'dbconnect.php';
 $user_id = $_SESSION['user_id'];

 if ($_POST) {
   $event_city = $_POST['event_city'];
   $event_name = $_POST['event_name'];
   $event_date_starts = $_POST['event_date_starts'];
   $event_time_starts = $_POST['event_time_starts'];
   $event_date_ends = $_POST['event_date_ends'];
   $event_time_ends = $_POST['event_time_ends'];
   $event_capacity = $_POST['event_capacity'];
   $ckeditor = $_POST['ckeditor'];
   $event_id = $_POST['event_id'];
   $event_video = $_POST['event_video'];

   $ticket_name = $_POST['ticket_name'];
   $ticket_quantity = $_POST['ticket_quantity'];
   $ticket_price = $_POST['ticket_price'];
   $ticket_description = $_POST['ticket_description'];
   $ticket_date_starts = $_POST['ticket_date_starts'];
   $ticket_time_starts = $_POST['ticket_time_starts'];
   $ticket_date_ends = $_POST['ticket_date_ends'];
   $ticket_time_ends = $_POST['ticket_time_ends'];
   $event_type = $_POST['event_type'];
   $event_topic = $_POST['event_topic'];
   $latitude = $_POST['latitude'];
   $longitude = $_POST['longitude'];

       if( file_exists($_FILES['event_photo']['tmp_name']) && is_uploaded_file($_FILES['event_photo']['tmp_name'])){

      $photo_name = $_FILES['event_photo']['name'];
      $photo_size = $_FILES['event_photo']['size'];
      $photo_type = $_FILES['event_photo']['type'];
      $photo_file = $_FILES['event_photo']['tmp_name'];
      $sub_photo = substr($photo_name,-6);
      $photo_name = $event_id.'_photo.'.$sub_photo;
      $photo_path = "../../photo_event/".$photo_name;
      move_uploaded_file($photo_file, $photo_path);

        $sql = "UPDATE events SET event_name = '$event_name' ,
                          event_city = '$event_city' ,
                          event_date_starts = '$event_date_starts',
                          event_time_starts = '$event_time_starts',
                          event_date_ends = '$event_date_ends',
                          event_time_ends = '$event_time_ends',
                          event_capacity = '$event_capacity',
                          event_description = '$ckeditor' ,
                          event_video = '$event_video' ,
                          event_photo = '$photo_name' ,
                          ticket_name = '$ticket_name' ,
                          ticket_quantity = '$ticket_quantity',
                          ticket_price  = '$ticket_price' ,
                          ticket_description = '$ticket_description' ,
                          ticket_date_starts = '$ticket_date_starts' ,
                          ticket_time_starts = '$ticket_time_starts' ,
                          ticket_date_ends = '$ticket_date_ends' ,
                          ticket_time_ends = '$ticket_time_ends' ,
                          event_type = '$event_type' ,
                          event_topic = '$event_topic' ,
                          latitude = '$latitude' ,
                          longitude = '$longitude'
                          WHERE event_id = '$event_id'";
        }
        else {
          $sql = "UPDATE events SET event_name = '$event_name' ,
                            event_city = '$event_city' ,
                            event_date_starts = '$event_date_starts',
                            event_time_starts = '$event_time_starts',
                            event_date_ends = '$event_date_ends',
                            event_time_ends = '$event_time_ends',
                            event_capacity = '$event_capacity',
                            event_description = '$ckeditor' ,
                            event_video = '$event_video' ,
                            ticket_name = '$ticket_name' ,
                            ticket_quantity = '$ticket_quantity',
                            ticket_price  = '$ticket_price' ,
                            ticket_description = '$ticket_description' ,
                            ticket_date_starts = '$ticket_date_starts' ,
                            ticket_time_starts = '$ticket_time_starts' ,
                            ticket_date_ends = '$ticket_date_ends' ,
                            ticket_time_ends = '$ticket_time_ends' ,
                            event_type = '$event_type' ,
                            event_topic = '$event_topic' ,
                            latitude = '$latitude' ,
                            longitude = '$longitude'
                            WHERE event_id = '$event_id'";
        }
        if ($connect->query($sql) === true) {
            echo "<p> New Event Successfully Created</p>";
            header('Location: ../manage_event');
        }
        else {
          echo "<p> GAGAL TOLOL!!</p>";
          echo "Error " . $sql . ' ' . $connect->connect_error;
        }
}
?>
