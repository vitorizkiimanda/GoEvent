<?php
include_once 'dbconnect.php';

//Destroy entire session
session_destroy();

//Redirect to homepage
header('Location: ../../index.php' );    
?>