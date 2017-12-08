<?php
  include("../backend/browse_event.php");
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

</head>

<!--<script type="text/javascript" src="js/bootstrap.min.js"></script> -->

<body class="page_browse_event">
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
              <form class="navbar-form navbar-left">
                  <div class="form-group">
                    <input type="text" class="form-control col-lg-12" placeholder="Search">
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
                <li><a href="../organizer_profile">Organizer Profile</a></li>
                <li><a href="../manage_event">Manage Events</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="../account_setting">Account Settings</a></li>
                <li><a href="../backend/logout.php">Log Out</a></li>
                </ul>
              </li>
              <?php } else { ?>
                <li><a href="../../pages/sign_in">Sign In</a></li>
                <?php } ?>
              <li><a href="../../pages/create_event">Create Event</a></li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

  <div class="container text-wrap">
    <div class="row" style="margin: auto;">
      <div class="col-lg-3">
        <h1>GOOGLE MAPS MINI</h1>
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-map-marker
              " aria-hidden="true"></span></span>
            <input type="text" class="form-control" placeholder="Jakarta, Indonesia" aria-describedby="basic-addon1">
        </div>
        <br />
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">CATEGORY            <span class="caret"></span></button>
            <ul class="dropdown-menu">
              <input class="form-control" id="myInput" type="text" placeholder="Search..">
              <li><a href="#">HTML</a></li>
              <li><a href="#">CSS</a></li>
              <li><a href="#">JavaScript</a></li>
              <li><a href="#">jQuery</a></li>
              <li><a href="#">Bootstrap</a></li>
              <li><a href="#">Angular</a></li>
            </ul>
        </div>
        <br />
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">EVENT TYPE            <span class="caret"></span></button>
            <ul class="dropdown-menu">
              <input class="form-control" id="myInput" type="text" placeholder="Search..">
              <li><a href="#">HTML</a></li>
              <li><a href="#">CSS</a></li>
              <li><a href="#">JavaScript</a></li>
              <li><a href="#">jQuery</a></li>
              <li><a href="#">Bootstrap</a></li>
              <li><a href="#">Angular</a></li>
            </ul>
        </div>
        <br />
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">DATE            <span class="caret"></span></button>
            <ul class="dropdown-menu">
              <input class="form-control" id="myInput" type="text" placeholder="Search..">
              <li><a href="#">HTML</a></li>
              <li><a href="#">CSS</a></li>
              <li><a href="#">JavaScript</a></li>
              <li><a href="#">jQuery</a></li>
              <li><a href="#">Bootstrap</a></li>
              <li><a href="#">Angular</a></li>
            </ul>
        </div>
        <br />
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">PRICE            <span class="caret"></span></button>
            <ul class="dropdown-menu">
              <input class="form-control" id="myInput" type="text" placeholder="Search..">
              <li><a href="#">HTML</a></li>
              <li><a href="#">CSS</a></li>
              <li><a href="#">JavaScript</a></li>
              <li><a href="#">jQuery</a></li>
              <li><a href="#">Bootstrap</a></li>
              <li><a href="#">Angular</a></li>
            </ul>
        </div>

      </div>
      <div class="col-lg-9">
          <h1>Jakarta, Indonesia Events Just For You</h1>
          <?php while ($item = mysqli_fetch_array($event)) { ?>
          <?php $event_id_encrypt = base64_encode($item['event_id']); ?>
          <!-- looping events card -->
          <a href="../../pages/event_detail/index.php/?event_id=<?php echo $event_id_encrypt?>">
            <div class="row card_browse_event">
              <div class="col-lg-3">
                <img src='../../photo_event/<?php echo $item['event_photo']; ?>' width='100' height='70'>
              </div>
              <div class="col-lg-9">
                  <p id="date_card"><?php echo $item['event_date_starts'] . " " . $item['event_time_starts'] ?></p>
                  <p id="title_card"><?php echo $item['event_name'] ?></p>
                  <br />
                  <p id="location_card"><?php echo $item['event_city'] ?></p>
                  <hr />
                  <a href="pages/browse_event" id="location_card">#tag </a>
                  <a href="pages/browse_event" id="location_card">#tag </a>
                  <a href="pages/browse_event" id="location_card">#tag </a>
                  <a href="pages/browse_event" id="location_card">#tag </a>
                  <br />
              </div>
            </div>
          </a>
          <?php } ?>
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
