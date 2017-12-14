<?php
  require_once '../backend/dbconnect.php';
  require_once '../backend/ticket.php';

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

</head>

<!--<script type="text/javascript" src="js/bootstrap.min.js"></script> -->

<body style="background-color: #f1f1f1 !important;">
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
            <a class="navbar-brand" id="goevent_color" style="color: #2980b9;" href="../../">GoEvent</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <form class="navbar-form navbar-left">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                  </div>
                  <button type="submit" class="btn btn-default">Submit</button>
              </form>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="../../pages/browse_event">Browse Event</a></li>
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
                    <?php } else { ?>
                        <li><a href="../../pages/sign_in">Sign In</a></li>
                        <?php } ?>
              <li><a href="../../pages/organizer_profile_choose_create">Create Event</a></li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

  <div class="container text-wrap">
    <!-- header -->
    <h1>Order for <?php echo $sql_event['event_name'] ;?></h1>
    <p><span>
    <?php if($sql_event['ticket_price'] === '0' ) echo "FREE" ;
          else echo "PAID" ?></span></p>
    <p><?php echo date('l jS F Y', strtotime($sql_event['event_date_starts'])).", ".date('H:i', strtotime($sql_event['event_time_starts']))." WIB" ?></p>
    <p><?php echo $sql_event['event_city']?></p>
    <!-- <br /> -->
    <div class="row">
      <div class="col-lg-3 text-center">
        <!-- <br /> -->
        <a href="../../pages/event_detail/index.php?event_id=<?php echo $event_id_encrypt?>" class="btn btn-primary btn-lg btn-round btn-block">See Event</a>
        <a href="../backend/cancel_order.php?event_id=<?php echo $event_id_encrypt?>" class="btn btn-danger btn-lg btn-round btn-block">Cancel Order</a>
      </div>
      <div class="col-lg-9" style="background-color: white !important;">
        <h2><?php if($sql_event['ticket_price'] === '0' ) echo "FREE" ;
              else echo "Rp ".$sql_event['ticket_price'].",00" ; ?></h2>
        <hr />
        <h3>Contact Information</h3>
        <br />
        <h4>Name</h4>
        <h4><b><?php echo $sql_user['user_name']?></b></h4>
        <br />
        <h4>Email</h4>
        <h4><b><?php echo $sql_user['user_email']?></b></h4>
        <br />
        <h4>Ticket ID</h4>
        <h4><b><?php echo $sql_att['ticket_id']?></b></h4>
        <br />
        <a href="../../pages/account_setting" class="btn btn-primary btn-lg btn-round btn-block">Edit</a>
        <br />

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
