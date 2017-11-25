<?php
// session_start();
// if (empty($_SESSION['user_id'])) {
//	header("location:../.../index.php"); // jika belum login, maka dikembalikan ke file form_login.php
// }
// else {
   require_once 'dbconnect.php';
   //$user_id = $_SESSION['user_id'];
   if ($_POST) {
       $event_name = $_POST['event_name'];
       $event_city = $_POST['event_city'];
       $event_date_starts = $_POST['event_date_starts'];
       $event_time_starts = $_POST['event_time_starts'];
       $event_date_ends = $_POST['event_date_ends'];
       $event_time_ends = $_POST['event_time_ends'];
       $event_capacity = $_POST['event_capacity'];
       $event_description = $_POST['event_description'];

        //dapetin id yg terakhir
        $count = mysqli_query($connect, "SELECT event_id FROM events ORDER BY event_id DESC");
        $count = mysqli_fetch_assoc($count);
        $count = $count['event_id']+1;
        //echo "$event_description" ;

        $photo_name = $_FILES['event_photo']['name'];
        $photo_size = $_FILES['event_photo']['size'];
        $photo_type = $_FILES['event_photo']['type'];
        $photo_file = $_FILES['event_photo']['tmp_name'];
        $photo_name = $count.'_photo.jpeg';
        $photo_path = "../../photo_event/".$photo_name;
        move_uploaded_file($photo_file, $photo_path);

        $certificate_name = $_FILES['event_certificate']['name'];
        $certificate_size = $_FILES['event_certificate']['size'];
        $certificate_type = $_FILES['event_certificate']['type'];
      	$certificate_file = $_FILES['event_certificate']['tmp_name'];
        $certificate_name = $count.'_certificate.jpeg';
        $certificate_path = "../../certificate_event/".$certificate_name;
        move_uploaded_file($certificate_file, $certificate_path);

      $sql = "INSERT INTO events (event_id,   event_name,   event_city, event_date_starts,  event_time_starts,    event_date_ends,  event_time_ends,    event_capacity,   event_certificate,  event_description,   event_photo, organizer_id)
                          VALUES (''      ,'$event_name','$event_city','$event_date_starts','$event_time_starts','$event_date_ends','$event_time_ends','$event_capacity','$certificate_name','$event_description','$photo_name','$count')";
      if ($connect->query($sql) === true) {
      //echo $sql;// boleh diganti nih, pointnya mau bertambah berapa jika add restaurant
          echo "<p> New Event Successfully Created</p>";
      }
      else {
        echo "<p> GAGAL TOLOL</p>";

      }
    }
 //}
 ?>
