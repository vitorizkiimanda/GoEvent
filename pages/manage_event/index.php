<?php
    require_once '../backend/dbconnect.php';
    include('../backend/manage_event.php');
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

              <?php if (!empty($_SESSION['user_id'])) { ?>

              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php $user_name = $_SESSION['user_name']; echo strtoupper(substr($user_name,0,1)) ?><span class="caret"></span></a>
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


    <div class="container">
    <h1>Manage Events</h1>
    <!-- tabs -->
    <br />
    <br />

    <div class="container">
      <ul class="nav nav-tabs text-center">
        <li class="active"><a data-toggle="tab" href="#live">UPCOMING EVENTS</a></li>
        <li><a data-toggle="tab" href="#draft">DRAFT EVENTS</a></li>
        <li><a data-toggle="tab" href="#past">PAST EVENTS</a></li>
      </ul>

      <div class="tab-content text-center">
        <div id="live" class="tab-pane fade in active">
          <br />
          <p><?php if(mysqli_num_rows($upcoming)==0) echo "You have no live events" ?></p>

          <!-- Events Card -->
          <div class="container text-left">
            <?php while ($item = mysqli_fetch_array($upcoming)) { ?>
            <?php $event_id_encrypt = base64_encode($item['event_id']); ?>
            <div class="row">
                <p><span><?php echo date('M d, Y', strtotime($item['event_date_starts']) )?></span> <span><?php echo date('h:i A', strtotime($item['event_time_starts']))?></span> <span><?php echo $item['event_name'] ?></span></p>
                <?php if($item['event_date_starts']==date("Y-m-d")) 
                echo "<a href='../../pages/attendance_event/?event_id=".$event_id_encrypt."&status=0'><span class='glyphicon glyphicon-list-alt'></span> Attendance</a>&nbsp&nbsp&nbsp"
                ?>
                <a><span class="glyphicon glyphicon-wrench"></span> Manage</a>&nbsp&nbsp&nbsp
                <a href="../../pages/create_event"><span class="glyphicon glyphicon-pencil"></span> Edit</a>&nbsp&nbsp&nbsp
                <a href="../../pages/event_detail/?event_id=<?php echo $event_id_encrypt; ?>"><span class="glyphicon glyphicon-expand"></span> View</a>&nbsp&nbsp&nbsp
                <hr />
            </div>
            <?php } ?>
          </div>


        </div>
        <div id="draft" class="tab-pane fade">
          <br />
          <p>You have no draft events</p>
        </div>
        <div id="past" class="tab-pane fade">
          <br />
          <p>You have no past events</p>
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
