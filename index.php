<?php
  include("pages/backend/home.php");
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="utf-8" />
  <meta name="HVSZ" content="GoEvent" />

  <title>GoEvent</title>

  <link rel="shortcut icon" href="images/title.png" />

  <!-- pengaturan view agar responsif namun pada mobile tidak bisa zooming -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

  <!-- attach JavaScripts -->
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.min.js"></script>
  <!--<script src="//maps.google.com/maps/api/js?sensor=true"></script>-->
  <!--<script src="js/main.js"></script>-->

  <!-- attach CSS styles -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style_goevent.css" rel="stylesheet" />

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
    <nav class="navbar navbar-default">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" id="goevent_color" href="index.php">GoEvent</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="pages/browse_event">Browse Event</a></li>
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
              <li><a href="pages/sign_in">Sign In</a></li>
              <li><a href="pages/create_event">Create Event</a></li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

    <!-- Search -->
  <div class="container">
    <div class="row">
      <div class="col-lg-2"></div>
      <div class="col-lg-8">
        <h1 class="text-center">Go get the experience</h1>
        <form method="post" action="home.php" >
          <div class="input-group">
            <input type="text" class="form-control" name="event_search" placeholder="Search events or categories">
            <span class="input-group-btn">
            <!-- <button type="button" class="btn btn-clear"> -->
                <select class="selectpicker">
                  <option>All Dates</option>
                  <option>Today</option>
                  <option>Tomorrow</option>
                  <option>This Week</option>
                  <option>This Weekend</option>
                  <option>Next Week</option>
                  <option>Next Month</option>
                </select>
            <!-- </button> -->
            
              <!-- <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Date <span class="caret"></span>
              </button> -->
                <!-- <ul class="dropdown-menu">
                  <li><a href="#">All Dates</a></li>
                  <li><a href="#">Today</a></li>
                  <li><a href="#">Tomorrow</a></li>
                  <li><a href="#">This Week</a></li>
                  <li><a href="#">This Weekend</a></li>
                  <li><a href="#">Next Week</a></li>
                  <li><a href="#">Next Month</a></li>
                </ul> -->
              <button class="btn btn-default" type="button">SEARCH</button>
            </span>
          </div><!-- /input-group -->
        </form>
      </div><!-- /.col-lg-6 -->
      <div class="col-lg-2"></div>
    </div><!-- /.row -->
  </div>

  <!-- Nearest event -->
  <div class="container">
    <div class="text-center">
      <p>Events for you in <a>jakarta</a></p>
    </div>
  </div>

  <!-- Events Card -->
  <div class="container">
    <div class="row">
      <?php while ($item = mysqli_fetch_array($event)) { ?>
        <?php $event_id_encrypt = base64_encode($item['event_id']); ?>
        <a href="pages/event_detail/index.php/?event_id=<?php echo $event_id_encrypt?>" >
          <div class="col-lg-4">
            <p> <img src='photo_event/<?php echo $item['event_photo']; ?>' width='100' height='70'> </p>
            <p> <?php echo $item['event_name'] ?> </p>
            <p> <?php echo $item['event_city'] ?> </p>
            <p> <?php echo $item['event_date_starts'] . " " . $item['event_time_starts'] ?> </p>
            <p> <?php echo $item['event_date_ends'] . " " . $item['event_time_ends'] ?> </p>
            <p> <?php echo $item['event_description'] ?> </p>
          </div>
        </a>
      <?php } ?>
    </div>
  </div>

  <!-- button see more -->
  <div class="container text-center">
    <a href="pages/browse_event/" class="btn btn-primary navbar-btn">See More</a>
  </div>

  <?php
    echo $_SESSION['id'];
    echo $_SESSION['user_name'];
    echo $_SESSION['user_city'];
    echo $_SESSION['user_photo'];
  ?>

  <!-- browse by kategories -->
  <div class="container">
    <h2 class="text-center">Browse by Top Categories</h1>
      <div class="row">
        <a href="pages/browse_event">
        <div class="col-lg-4">
        <br />
          <img src="images/music_thumbnail.jpeg" alt="music" class="img-responsive hover" />
          <div class="carousel-caption">
            <h1>MUSIC</h1>
          </div>
        </div>
        </a>

        <a href="pages/browse_event">
        <div class="col-lg-4">
          <br />
          <img src="images/food_thumbnail.jpeg" alt="music" class="img-responsive hover" />
          <div class="carousel-caption">
            <h1>FOOD & BEVERAGE</h1>
          </div>
        </div>
        </a>

        <a href="pages/browse_event">
        <div class="col-lg-4">
          <br />
          <img src="images/tech_thumbnail.jpeg" alt="music" class="img-responsive hover" />
          <div class="carousel-caption">
            <h1>SCIENCE & TECH</h1>
          </div>
        </div>
        </a>

        <a href="pages/browse_event">
        <div class="col-lg-4">
          <br />
          <img src="images/art_thumbnail.jpeg" alt="music" class="img-responsive hover" />
          <div class="carousel-caption">
            <h1>ARTS</h1>
          </div>
        </div>
        </a>

        <a href="pages/browse_event">
        <div class="col-lg-4">
          <br />
          <img src="images/sport_thumbnail.jpeg" alt="music" class="img-responsive hover" />
          <div class="carousel-caption">
            <h1>SPORT</h1>
          </div>
        </div>
        </a>

        <a href="pages/browse_event">
        <div class="col-lg-4">
          <br />
          <img src="images/networking_thumbnail.jpeg" alt="music" class="img-responsive hover" />
          <div class="carousel-caption">
            <h1>NETWORKING</h1>
          </div>
        </div>
        </a>
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
