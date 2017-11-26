<?php
    session_start();
    $connect = mysqli_connect('localhost', 'root', '', 'go-event');
	
	// cek koneksi
	if($connect->connect_error)
	{
		die("connection failed : " . $connect->connect_error);
	}
	else
	{
		// echo "Sucsessfully Connected";
	}
?>