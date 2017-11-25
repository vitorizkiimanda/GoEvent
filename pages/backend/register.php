<?php
    //masih beluman
    include('dbconnect.php');
        
    if(!empty($_POST)) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = mysqli_query($connect, "SELECT user_email FROM user WHERE user_email = '$email'");
        if(mysqli_num_rows($query)>0){
            
          
        }
        
    }


?>