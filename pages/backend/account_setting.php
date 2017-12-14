<?php
    include('dbconnect.php');

    $id = $_SESSION['user_id'];

    $query = mysqli_query($connect,  "SELECT user_name, user_email, user_city, user_photo
    FROM user WHERE user_id='$id'");

    if(mysqli_num_rows($query)>0){
        $data = mysqli_fetch_assoc($query);
        $_SESSION['user_name']  = $data['user_name'];
        $_SESSION['user_email']  = $data['user_email'];
        $_SESSION['user_city']  = $data['user_city'];
        $_SESSION['user_photo'] = $data['user_photo'];
    }
    else{

    }


    if(!empty($_POST['user_email'])){
        $user_name = $_POST['user_name'];
        $user_email = $_POST['user_email'];
        $user_city = $_POST['user_city'];

        if( is_uploaded_file($_FILES['user_photo']['tmp_name'])){
       $photo_name = $_FILES['user_photo']['name'];
       $photo_size = $_FILES['user_photo']['size'];
       $photo_type = $_FILES['user_photo']['type'];
       $photo_file = $_FILES['user_photo']['tmp_name'];
       $sub_photo = substr($photo_name,-6);
       $photo_name = $id.'_user_photo.'.$sub_photo;
       $photo_path = "../../user_photo/".$photo_name;
       move_uploaded_file($photo_file, $photo_path);

       $query_email =mysqli_query($connect, "UPDATE user   SET user_name = '$user_name',
                                                                user_email = '$user_email',
                                                               user_city = '$user_city',
                                                              user_photo = '$photo_name'
                                                               WHERE user_id = '$id'");

      }
      else {
        echo "aww";
        
        $query_email =mysqli_query($connect, "UPDATE user   SET user_name = '$user_name',
                                                                user_email = '$user_email',
                                                                user_city = '$user_city'
                                                            WHERE user_id = '$id'");
      }


      $query_aww = mysqli_query($connect,  "SELECT user_name, user_email, user_city, user_photo
      FROM user WHERE user_id='$id'");

        if(mysqli_num_rows($query_aww)){
            $data = mysqli_fetch_assoc($query_aww);
            $_SESSION['user_name']  = $data['user_name'];
            $_SESSION['user_email']  = $data['user_email'];
            $_SESSION['user_city']  = $data['user_city'];
            $_SESSION['user_photo'] = $data['user_photo'];
        }
        else{

        }
    }

    else if(!empty($_POST['user_password'])){
        $aww = $_POST['user_password'];
        $user_password = md5($aww);

        $user_password_new = $_POST['user_password_new'];
        $user_password_new_validate = $_POST['user_password_new_validate'];
        $encrypt_password = md5($user_password_new);

        $query_pass = mysqli_query($connect,  "SELECT user_name, user_email, user_city, user_photo
        FROM user WHERE user_id='$id' AND user_password='$user_password'");

        $event_id_encrypt = base64_encode($id);


        if(mysqli_num_rows($query_pass)>0){
                $query_email =mysqli_query($connect, "UPDATE user   SET user_password = '$encrypt_password'
                WHERE user_id = '$id'");


                $Message = "Password Change Success";
                header("Location: ../../pages/account_setting?Message=$Message&event_id=".$event_id_encrypt );


        }
        else{
            $Message = "Password Wrong";
            header("Location: ../../pages/account_setting?Message=$Message&event_id=".$event_id_encrypt);
        }

    }

    else{




    }



?>
