<?php
    include('dbconnect.php');

    $id = $_SESSION['user_id'];
        
    if(!empty($_POST['user_email'])){

    }

    else if(!empty($_POST['user_password'])){

    }

    else{
        $query = mysqli_query($connect,  "SELECT user_name, user_email, user_city, user_photo, 
                                                --  organizer_name, organizer_description, organizer_photo
                                          FROM user WHERE user_id='$id'");

        $data =mysqli_fetch_assoc($query);

        

    }
        


?>