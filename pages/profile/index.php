<?php
    require_once '../backend/dbconnect.php';    
    require_once '../backend/attendant.php';
    require_once '../backend/bookmark.php';
    require_once '../backend/certificate.php';
    
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
  <link href="../../css/style_goevent.css" rel="stylesheet" />

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

<body>
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

              <?php if (!empty($_SESSION['user_id'])) { $user_name = $_SESSION['user_name'];?>

              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo strtoupper(substr($user_name,0,1)) ?><span class="caret"></span></a>
                <ul class="dropdown-menu">
                <li><a href="../profile">Profile</a></li>
                <li><a href="../profile">Tickets</a></li>
                <li><a href="../profile">Bookmarks</a></li>
                <li><a href="../profile">Certificates</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="../organizer_profile">Organizer Profile</a></li>
                <li><a href="../manage_event">Manage Events</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="../account_setting">Account Settings</a></li>
                <li><a href="../backend/logout.php">Log Out</a></li>
                </ul>
              </li>
              <?php } else {
               header('Location: ../sign_in/' );
              } ?>

              <li><a href="../../pages/create_event">Create Event</a></li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

    <div class="container text-center">
      <h1>Vito Rizki Imanda</h1>
      <a href="../../pages/account_setting">EDIT PROFILE</a>
    </div>


    <!-- tabs -->
    <br />
    <br />

    <div class="container">
      <ul class="nav nav-tabs nav-justified text-center">
            <li class="active"><a data-toggle="tab" href="#upcoming">UPCOMING EVENTS</a></li>
            <li><a data-toggle="tab" href="#bookmark">BOOKMARKED EVENTS</a></li>
            <li><a data-toggle="tab" href="#past">PAST EVENTS</a></li>
            <li><a data-toggle="tab" href="#certificate">CERTIFICATE</a></li>
      </ul>

      <div class="tab-content text-center">
        <div id="upcoming" class="tab-pane fade in active">
          <br />
          <?php if($upcoming!=0) { 
            for($i=0; $i<count($upcoming); $i++){?>

                  <!-- Events Card -->
              <div class="container">
                <div class="row">
                    <a href="pages/event_detail/" >
                      <div class="col-lg-4">
                        <p> <img src='photo_event/' width='100' height='70'> </p>
                        <p> <?php echo $upcoming[$i]["event_name"]; ?> </p>
                        <p> <?php echo $upcoming[$i]["event_city"]; ?> </p>
                        <p> <?php echo $upcoming[$i]["event_date_starts"]; ?> </p>
                        <p> <?php echo $upcoming[$i]["event_date_ends"]; ?> </p>
                        <p> <?php echo $upcoming[$i]["event_description"]; ?> </p>
                      </div>
                    </a>
                </div>
              </div>

            <?php } ?>
            
            
          <?php } else { ?>
          <p>You have no upcoming events</p>
          <?php } ?>

          <a href="../../pages/browse_event" class="btn btn-primary btn-round text-center">DISCOVER EVENTS</a>

         


        </div>
        <div id="bookmark" class="tab-pane fade">
          <br />

          <?php if($bookmark!=0) { 
            for($i=0; $i<count($bookmark); $i++){?>

                  <!-- Events Card -->
              <div class="container">
                <div class="row">
                    <a href="pages/event_detail/" >
                      <div class="col-lg-4">
                        <p> <img src='photo_event/' width='100' height='70'> </p>
                        <p> <?php echo $bookmark[$i]["event_name"]; ?> </p>
                        <p> <?php echo $bookmark[$i]["event_city"]; ?> </p>
                        <p> <?php echo $bookmark[$i]["event_date_starts"]; ?> </p>
                        <p> <?php echo $bookmark[$i]["event_date_ends"]; ?> </p>
                        <p> <?php echo $bookmark[$i]["event_description"]; ?> </p>
                      </div>
                    </a>
                </div>
              </div>

            <?php } ?>
            
            
          <?php } else { ?>
            <p>Bookmarked events will show up here</p>
          <?php } ?>

        </div>
        <div id="past" class="tab-pane fade">
          <br />

          <?php if($past!=0) { 
              for($i=0; $i<count($past); $i++){?>

                    <!-- Events Card -->
                <div class="container">
                  <div class="row">
                      <a href="pages/event_detail/" >
                        <div class="col-lg-4">
                          <p> <img src='photo_event/' width='100' height='70'> </p>
                          <p> <?php echo $past[$i]["event_name"]; ?> </p>
                          <p> <?php echo $past[$i]["event_city"]; ?> </p>
                          <p> <?php echo $past[$i]["event_date_starts"]; ?> </p>
                          <p> <?php echo $past[$i]["event_date_ends"]; ?> </p>
                          <p> <?php echo $past[$i]["event_description"]; ?> </p>
                        </div>
                      </a>
                  </div>
                </div>

              <?php } ?>
              
              
            <?php } else { ?>
              <p>You have no past events</p>
            <?php } ?>

          <a href="../../pages/browse_event" class="btn btn-primary btn-round text-center">DISCOVER EVENTS</a>
        </div>
        <div id="certificate" class="tab-pane fade">
          <br />
          <?php if($certificate!=0) { 
              for($i=0; $i<count($certificate); $i++){?>

                    <!-- Events Card -->
                <div class="container">
                  <div class="row">
                      <a href="pages/event_detail/" >
                        <div class="col-lg-4">
                          <p> <img src='photo_event/' width='100' height='70'> </p>
                          <p> <?php echo $certificate[$i]["certificate"]; ?> </p>
                        </div>
                      </a>
                  </div>
                </div>

              <?php } ?>
              
              
            <?php } else { ?>
              <p>You have no certificate yet</p>
            <?php } ?>

          <a href="../../pages/browse_event" class="btn btn-primary btn-round text-center">DISCOVER EVENTS</a>
        </div>
      </div>
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
