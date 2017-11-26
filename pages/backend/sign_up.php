<?php
    include('dbconnect.php');

    if(isset($_SESSION['user_email'])) {
        $email = $_SESSION['user_email'];
    }
    else{
        header('Location: ../sign_in/');        
    }
      
    
    if(!empty($_POST)){
        $full_name = $_POST['full_name'];
        $password = $_POST['password'];
        $encrypt_password = md5($password);
        
        
        $query = mysqli_query($connect, "INSERT INTO user (user_id,user_uid,user_name, user_email, user_city, user_photo, user_password) 
                                                VALUES ('','','$full_name','$email', '', '', '$encrypt_password')");

        if($query){
            $query_login = mysqli_query($connect,  "SELECT user_id, user_name, user_email, user_city, user_photo
            FROM user WHERE user_email='$email' AND user_password='$encrypt_password'");

            $row=mysqli_fetch_assoc($query_login);
            $_SESSION['user_id']    = $row['user_id'];
            $_SESSION['user_name']  = $row['user_name'];
            $_SESSION['user_city']  = $row['user_city'];
            $_SESSION['user_photo'] = $row['user_photo'];             
        }
        else{
            echo "error";
        }
        header('Location: ../../');        
        
    }
    else{

    }
    
?>