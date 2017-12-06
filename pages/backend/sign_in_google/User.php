<?php
class User {
	private $dbHost     = "localhost";
    private $userTbl    = 'user';
    
    // nuhsatganteng
            // private $dbUsername = "id3904684_hvsz";         //hosting
            // private $dbPassword = "hvszhvsz";               //hosting
            // private $dbName     = "id3904684_goevent";      //hosting

            private $dbUsername = "root";         //localhost
            private $dbPassword = "";               //localhost
            private $dbName     = "go-event";      //localhost
    //

    
	function __construct(){
        if(!isset($this->db)){
            // Connect to the database
            $conn = new mysqli($this->dbHost, $this->dbUsername, $this->dbPassword, $this->dbName);
            if($conn->connect_error){
                die("Failed to connect with MySQL: " . $conn->connect_error);
            }else{
                $this->db = $conn;
            }
        }
    }
	
	function checkUser($userData = array()){
        if(!empty($userData)){
            //Check whether user data already exists in database
            $prevQuery = "SELECT * FROM ".$this->userTbl." WHERE user_uid = '".$userData['user_uid']."'";
            $prevResult = $this->db->query($prevQuery);
            if($prevResult->num_rows > 0){
                //Update user data if already exists
                $query = "UPDATE ".$this->userTbl." SET user_name = '".$userData['user_name']."', user_email = '".$userData['user_email']."', user_photo = '".$userData['user_photo']."' WHERE user_uid = '".$userData['user_uid']."'";
                $update = $this->db->query($query);
            }else{
                //Insert user data
                $query = "INSERT INTO ".$this->userTbl." SET user_uid = '".$userData['user_uid']."', user_name = '".$userData['user_name']."', user_email = '".$userData['user_email']."', user_photo = '".$userData['user_photo']."'";
                $insert = $this->db->query($query);
            }
            
            //Get user data from the database
            $result = $this->db->query($prevQuery);
            $userData = $result->fetch_assoc();
        }
        
        //Return user data
        return $userData;
    }
}
?>