<?php 

  include('dbconnect.php');

  $query = mysqli_query($connect,  "SELECT * FROM album_certificate WHERE user_id='1'");
  
  $result =mysqli_fetch_assoc($query);

  $filename = '../../user_certificate/'.$result['certificate'];

  list($width, $height) = getimagesize($filename);

  echo $width."x".$height;

  
  

?>