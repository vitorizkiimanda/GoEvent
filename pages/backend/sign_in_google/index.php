<?php
//Include GP config file && User class
include_once 'gpConfig.php';
include_once 'User.php';


if(isset($_GET['code'])){
	$gClient->authenticate($_GET['code']);
	$_SESSION['token'] = $gClient->getAccessToken();
	header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
}

// if (isset($_SESSION['token'])) {
//     $gClient->setAccessToken($_SESSION['token']);    
// }

if ($gClient->getAccessToken()) {    
	//Get user profile data from google
	$gpUserProfile = $google_oauthV2->userinfo->get();
	
	//Initialize User class
	$user = new User();
	
	//Insert or update user data to the database
    $gpUserData = array(
        'user_uid'     => $gpUserProfile['id'],
        'user_name'    => $gpUserProfile['given_name']." ".$gpUserProfile['family_name'],
        'user_email'         => $gpUserProfile['email'],
        'user_photo'       => $gpUserProfile['picture'],
    );
    $userData = $user->checkUser($gpUserData);
	
	//Storing user data into session
   // $_SESSION['userData'] = $userData;

   $_SESSION['user_id']     = $userData['user_id'];
   $_SESSION['user_uid']    = $userData['user_uid'];
   $_SESSION['user_email']  = $userData['user_email'];
   $_SESSION['user_name']   = $userData['user_name'];
   $_SESSION['user_photo']  = $userData['user_photo'];    

    header('Location: ../../../index.php' );    
    
    
	
} else {
    $authUrl = $gClient->createAuthUrl();
    header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));    
}
?>