<?php
    include('dbconnect.php');

    if(isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
    }
    else{
        header('Location: ../sign_in/');        
    }
      
    
    if(!empty($_POST['password'])){
        $password = $_POST['password'];
        $encrypt_password = md5($password);
        
        $query_login = mysqli_query($connect,  "SELECT user_id, user_name, user_email, user_city, user_photo
                                                FROM user WHERE user_email='$email' AND user_password='$encrypt_password'");
        
        if(mysqli_num_rows($query_login)>0){
            $row=mysqli_fetch_assoc($query_login);
            $_SESSION['id']         = $row['user_id'];
            $_SESSION['user_name']  = $row['user_name'];
            $_SESSION['user_city']  = $row['user_city'];
            $_SESSION['user_photo']  = $row['user_photo'];             
        }
        header('Location: ../../');        
        
    }
    else{

    }
    
?>