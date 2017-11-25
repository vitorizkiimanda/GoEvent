<?php
    include('dbconnect.php');
    
    if(!empty($_POST['email'])){
        $email = $_POST['email'];
        $_SESSION['email'] = $email;

        $query = mysqli_query($connect, "SELECT user_email,user_uid FROM user WHERE user_email = '$email'");
        if(mysqli_num_rows($query)>0){
            $user = mysqli_fetch_assoc($query);
            if($user['user_uid']){
                header('Location: ../backend/sign_in_google');
            }
            else{
                header('Location: ../sign_in_password/' );                                
            }
        }
        else{
            header('Location: ../sign_up/' );                            
        }
    }
    else{
        
    }
    
?>