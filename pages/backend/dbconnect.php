<?php

    session_start();
	
	// nuhsatganteng
			$connect = mysqli_connect('localhost', 'root', '', 'go-event');			//localhost

			// $connect = mysqli_connect('localhost', 'id3904684_hvsz', 'hvszhvsz', 'id3904684_goevent');	//hosting
	//	
	



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