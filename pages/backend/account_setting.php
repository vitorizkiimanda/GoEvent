<?php
    include('dbconnect.php');

    $id = $_SESSION['user_id'];
        
    if(!empty($_POST['user_email'])){
        $user_name = $_POST['user_name'];
        $user_email = $_POST['user_email'];

        $query_email =mysqli_query($connect, "UPDATE user   SET user_name = '$user_name', 
                                                                user_email = '$user_email', 
                                                                user_city = '$user_city' 
                                                            WHERE user_id = '$id'"); 
        
    }

    else if(!empty($_POST['user_password'])){
        $query_pass = mysqli_query($connect,  "SELECT user_name, user_email, user_city, user_photo 
        FROM user WHERE user_id='$id' AND user_password='$user_password'");

        if(mysqli_num_rows($query)>0){
            $query_email =mysqli_query($connect, "UPDATE user   SET user_password = '$user_password_new'
                                                                WHERE user_id = '$id'");
            
        }
        else{
            echo "false";
        }

    }

    else{
        $query = mysqli_query($connect,  "SELECT user_name, user_email, user_city, user_photo 
                                          FROM user WHERE user_id='$id'");

        $data =mysqli_fetch_assoc($query);
        if(mysqli_num_rows($query)>0){
            $data = mysqli_fetch_assoc($query);
            $_SESSION['user_name']  = $data['user_name'];
            $_SESSION['user_email']  = $data['user_name'];            
            $_SESSION['user_city']  = $data['user_city'];
            $_SESSION['user_photo'] = $data['user_photo']; 
        }
        else{

        }

        

    }
        


?>