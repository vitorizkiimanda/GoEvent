<?php
session_start();

//Include Google client library 
include_once 'src/Google_Client.php';
include_once 'src/contrib/Google_Oauth2Service.php';

/*
 * Configuration and setup Google API
 */
$clientId = '296198883093-vvr7aflfb6iie9chg5uv1qkriajpbo7i.apps.googleusercontent.com';  //Google client ID
$clientSecret = 'RvXl0bZ0pMsljCy4vpZjjjNE'; //Google client secret

// nuhsatganteng
        // $redirectURL = 'https://goevent-hvsz.000webhostapp.com/pages/backend/sign_in_google/'; //Callback URL hosting
        $redirectURL = 'https://localhost/GoEvent/pages/backend/sign_in_google/'; //Callback URL localhost
//

//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('GoEvent');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>