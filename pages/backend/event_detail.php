<?php require_once 'dbconnect.php';

$user_id=$_SESSION['user_id'];
$event_id=base64_decode($_GET['event_id']);

$sql= "SELECT * FROM events WHERE event_id='$event_id'";
$queri = $connect->query($sql);
$hasil = $queri->fetch_assoc();

$sqlmark = "SELECT * FROM bookmark WHERE event_id='$event_id' and user_id = '$user_id'";
$mark = $connect->query($sqlmark);

?>
