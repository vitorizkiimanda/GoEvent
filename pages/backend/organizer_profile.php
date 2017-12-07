<?php
    require_once '../backend/dbconnect.php';
?>

<?php $user_id = $_SESSION['user_id']; ?>
<?php $query_organizer =mysqli_query($connect, "SELECT * FROM user_organizer JOIN organizer WHERE user_id = '$user_id'"); ?>
