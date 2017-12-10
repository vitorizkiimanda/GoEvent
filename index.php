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
  <link href="css/style.css" rel="stylesheet" />

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
            <a class="navbar-brand" id="goevent_color" href="">GoEvent</a>
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

              <?php if (!empty($_SESSION['user_id'])) { ?>
                <?php
              $user_name = $_SESSION['user_name'];
              ?>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo strtoupper(substr($user_name,0,1)) ?> <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="pages/profile">Profile</a></li>
                  <li><a href="pages/profile">Tickets</a></li>
                  <li><a href="pages/profile">Bookmarks</a></li>
                  <li><a href="pages/profile">Certificates</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="pages/organizer_profile_choose">Organizer Profile</a></li>
                  <li><a href="pages/manage_event">Manage Events</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="pages/account_setting">Account Settings</a></li>
                  <li><a href="pages/backend/logout.php">Log Out</a></li>
                </ul>
              </li>
              <?php } else {?>
              <li><a href="pages/sign_in">Sign In</a></li>
              <?php }?>
              <li><a href="pages/organizer_profile_choose_create">Create Event</a></li>
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
        <form method="post" action="pages/browse_event/index.php" >
          <div class="input-group">
            <input type="text" class="form-control" name="event_search" id="event_name" placeholder="Search events or categories">
            <span class="input-group-btn">
            <!-- <button type="button" class="btn btn-clear"> -->
                <select class="selectpicker" name=date_categorized>
                  <option value="1">All Dates</option>
                  <option value="2">Today</option>
                  <option value="3">Tomorrow</option>
                  <option value="4">This Week</option>
                  <option value="5">This Weekend</option>
                  <option value="6">Next Week</option>
                  <option value="7">Next Month</option>
                </select>
                <!-- vito kalo comment nya dibawah ini apus aja wkkwkw -->
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
              <button class="btn btn-default" type="submit">SEARCH</button>
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
      <br />
      <p>Events for you in <a>jakarta</a></p>
    </div>
  </div>

  <!-- Events Card -->
  <div class="container">
    <br />
    <div class="row">
      <?php while ($item = mysqli_fetch_array($event)) { ?>
        <?php $event_id_encrypt = base64_encode($item['event_id']); ?>
        <a href="pages/event_detail/index.php/?event_id=<?php echo $event_id_encrypt?>" >
          <div class="col-lg-4 text-center" id="card_event">
            <img src='photo_event/<?php echo $item['event_photo']; ?>' width='200' height='200' id="card_event2">
            <br/>
              <p id="date_card"> <?php echo date('d F Y', strtotime($item['event_date_starts']) ). "\r\n" . date('h:i A', strtotime($item['event_time_starts'])); ?> </p>
              <h4 id="title_card"> <?php echo $item['event_name'] ?> </h4>
              <p id="location_card"> <?php echo $item['event_city'] ?> </p>
              <hr />
              <a href="pages/browse_event" id="location_card">#tag </a>
              <a href="pages/browse_event" id="location_card">#tag </a>
              <a href="pages/browse_event" id="location_card">#tag </a>
              <a href="pages/browse_event" id="location_card">#tag </a>
              <hr />
          </div>
        </a>
      <?php } ?>
    </div>
  </div>

  <!-- button see more -->
  <div class="container text-center">
    <form method="post" action="pages/browse_event/index.php" >
      <input type="hidden" name="date_categorized" value="1" />
      <button class="btn btn-primary navbar-btn" type="submit">See More</button>
    </form>
  </div>

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
