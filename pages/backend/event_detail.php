<?php require_once 'dbconnect.php';

$event_id=base64_decode($_GET['event_id']);

$sql= "SELECT * FROM events WHERE event_id='$event_id'";
$queri = $connect->query($sql);
$hasil = $queri->fetch_assoc();

?>
