<?php require_once 'dbconnect.php';

if(isset($_SESSION['user_id'])){
  $user_id=$_SESSION['user_id'];
  $sqlmark = "SELECT * FROM bookmark WHERE event_id='$event_id' and user_id = '$user_id'";
  $mark = $connect->query($sqlmark);
  function _add()
  {
    $sql2 = "INSERT INTO bookmark (user_id, event_id) VALUES ('$user_id', '$event_id')";
    if($connect->query($sql2)) echo "brehasil " ;
    else echo "gagal" ;
  }
  
  function _del()
  {
    $sql2 = "DELETE FROM bookmark WHERE user_id ='$user_id' and event_id = '$event_id' ";
    if($connect->query($sql2)) echo "brehasil " ;
    else echo "gagal" ;
  }
}
else
{
  
}
$event_id=base64_decode($_GET['event_id']);

$sql= "SELECT * FROM events e INNER JOIN organizer o ON e.organizer_id = o.organizer_id WHERE event_id='$event_id'";
$queri = $connect->query($sql);
$hasil = $queri->fetch_assoc();



?>
