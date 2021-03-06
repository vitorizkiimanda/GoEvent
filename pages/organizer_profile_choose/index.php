<?php
    require_once '../backend/organizer_profile_choose.php';
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="utf-8" />
  <meta name="HVSZ" content="GoEvent" />

  <title>GoEvent</title>

  <link rel="shortcut icon" href="../../images/title.png" />

  <!-- pengaturan view agar responsif namun pada mobile tidak bisa zooming -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

  <!-- attach JavaScripts -->
  <script src="../../js/bootstrap.min.js"></script>
  <script src="../../js/jquery.min.js"></script>
  <!--<script src="//maps.google.com/maps/api/js?sensor=true"></script>-->
  <!--<script src="js/main.js"></script>-->

  <!-- attach CSS styles -->
  <link href="../../css/bootstrap.min.css" rel="stylesheet">
  <link href="../../css/style.css" rel="stylesheet" />

  <!-- Online attachment - offline doesnt work -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


  <!-- Select/option css -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

  <!-- (Optional) Latest compiled and minified JavaScript translation files -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/i18n/defaults-*.min.js"></script>


</head>

<!--<script type="text/javascript" src="js/bootstrap.min.js"></script> -->

<body class="page_background_snow" style="background-color: #f1f1f1 !important;">
  <!-- NavBar -->
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" id="goevent_color" href="../../">GoEvent</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="../../pages/browse_event">Browse Event</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Organize <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Overview</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="#">Certificate</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="#">Pricing</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="#">Resources</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Help <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="#">Where are my tickets?</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">How to contact event organizer</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Help Center</a></li>
                </ul>
              </li>

              <?php if (!empty($_SESSION['user_id'])) { ?>

              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php $user_name = $_SESSION['user_name']; echo strtoupper(substr($user_name,0,1)) ?><span class="caret"></span></a>
                <ul class="dropdown-menu">
                <li><a href="../profile">Profile</a></li>
                <li><a href="../profile">Tickets</a></li>
                <li><a href="../profile">Bookmarks</a></li>
                <li><a href="../profile">Certificates</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="../organizer_profile_choose">Organizer Profile</a></li>
                <li><a href="../manage_event">Manage Events</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="../account_setting">Account Settings</a></li>
                <li><a href="../backend/logout.php">Log Out</a></li>
                </ul>
              </li>
              <?php } else {
               header('Location: ../sign_in/' );
              } ?>

              <li><a href="../../pages/organizer_profile_choose_create">Create Event</a></li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>


  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1>Choose Organizer</h1>
      </div>
    </div>
    <br />
    <!-- organizer_card -->
    <?php
    if($query_organizer->num_rows > 0 )
    {
      while($row = $query_organizer->fetch_assoc())
      {
        if($row['organizer_id'] == 0) continue ; ?>
    <!-- <a href="../organizer_profile?organizer_id= <?php echo $row['organizer_id'] ; ?>"> -->
      <div onclick="location.href='../organizer_profile?organizer_id= <?php echo $row['organizer_id'] ; ?>';" style="cursor: pointer;" class="row card_browse_event">
        <div class="col-lg-4 text-center">
          <img src="../../photo_organizer/<?php echo $row['organizer_photo']?>" class="img-responsive" style="margin: 0 auto;" onError="this.onerror=null;this.src='../../images/default.png';" alt="Organizer Profile Pict" width="300" height="300" />
        </div>
        <div class="col-lg-6">

                <br />
                <div class="form-group">
                  <label for="exampleInputEmail1" id="date_card">Organizer Name</label>
                  <h1 id="date_card"><?php echo $row['organizer_name']?></h1>
                </div>
                <br />

                <div class="form-group">
                  <label for="exampleInputEmail1" id="date_card">Phone Number</label>
                  <h4 id="date_card"><?php echo $row['organizer_phone_number']?></h4>
                </div>
                <br />

                <div class="form-group">
                  <label for="exampleInputEmail1" id="date_card">Website</label>
                  <h4><?php echo $row['organizer_website']?></h4>
                </div>
        </div>
        <div class="col-lg-2">

        <a href="../backend/delete_organizer.php?organizer_id= <?php echo $row['organizer_id'] ; ?>" class="btn btn-danger btn-round btn-block">Delete</a>
        </div>
      </div>
    <!-- </a> -->
    <?php }}?>
    <!-- create_new_button -->
    <a href="../organizer_profile?organizer_id=%200">
      <div class="row card_browse_event">
        <div class="col-lg-4 text-center"></div>
        <div class="col-lg-4 text-center">
          <img src="../../images/add.png" class="img-responsive" style="margin: 0 auto;" alt="Organizer Profile Pict" width="250" height="250" />
          <h3>Create New Organizer</h3>
        </div>
        <div class="col-lg-4"></div>
      </div>
    </a>
  </div>

  <!-- footer -->
  <footer>
    <hr />
    <div class="container">
      <p class="text-center">Copyright @GoEvent   HVSZ 2017</p>
    </div>
  </footer>

</body>
</html>
