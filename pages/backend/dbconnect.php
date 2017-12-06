<?php
    session_start();
    // $connect = mysqli_connect('mysqlXX.000webhost.com', 'id3838889_hvsz', 'hvsz123', 'id3838889_goevent');
	
	//$connect = mysqli_connect('localhost', 'root', '', 'go-event');
	$connect = mysqli_connect('localhost', 'id3904684_hvsz', 'hvszhvsz', 'id3904684_goevent');
	

	// cek koneksi
	if(!$connect)
	{
		die("connection failed : " .  mysql_error());
	}
	else
	{
		// echo "Sucsessfully Connected";
	}
?>