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


    <!-- Select/option css -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

  <!-- (Optional) Latest compiled and minified JavaScript translation files -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/i18n/defaults-*.min.js"></script>


</head>

<!--<script type="text/javascript" src="js/bootstrap.min.js"></script> -->

<body class="page_browse_event">
  <!-- NavBar -->
    <nav class="navbar navbar-inverse">
        <div class="container">
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
        <div class="visible-lg">
          <iframe
            width="250"
            height="250"
            frameborder="0" style="border:0"
            src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA2dfwGpL-WaAvUGPqxKGS4yZoc8dnVxnY
              &q=IPB+Dramaga" allowfullscreen>
          </iframe>
        </div>

        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-map-marker
              " aria-hidden="true"></span></span>
            <input type="text" class="form-control" placeholder="Jakarta, Indonesia" aria-describedby="basic-addon1">
        </div>
        <br />
        <select class="selectpicker" name = "event_topic">
                  <option>All Categories</option>
                  <option>Automotive</option>
                  <option>Business & professional</option>
                  <option>Charity</option>
                  <option>Community & Culture</option>
                  <option>Education</option>
                  <option>Familiy</option>
                  <option>Fashion & Beauty</option>
                  <option>Film, Media & Entertainment</option>
                  <option>Food and Beverage</option>
                  <option>Government & Politics</option>
                  <option>Health & Wellness</option>
                  <option>Hobbies & Special Interest</option>
                  <option>Home & Lifestyle</option>
                  <option>Music</option>
                  <option>Performing & Visual Arts</option>
                  <option>Religion & Spirituality</option>
                  <option>School Activities</option>
                  <option>Science & Technology</option>
                  <option>Holiday</option>
                  <option>Sport & Fitness</option>
                  <option>Travel & Outdoor</option>
                  <option>Other</option>
        </select>
        <br />
        <select class="selectpicker" name = "event_type">
                  <option>All Event Types</option>
                  <option>Attraction</option>
                  <option>Camp/Trip</option>
                  <option>Class, Training,or Workshop</option>
                  <option>Concert or Performance</option>
                  <option>Conference</option>
                  <option>Convention</option>
                  <option>Dinner or Gala</option>
                  <option>Festival or Fair</option>
                  <option>Game or Competition</option>
                  <option>Meeting or Networking Event</option>
                  <option>Party or Social Gathering</option>
                  <option>Race or Endurance Event</option>
                  <option>Rally</option>
                  <option>Seminar</option>
                  <option>Tour</option>
                  <option>Tournament</option>
                  <option>Tradeshow or Expo</option>
                  <option>Other</option>
        </select>
        <br />
        <select class="selectpicker" name=date_categorized>
                  <option value="1">All Dates</option>
                  <option value="2">Today</option>
                  <option value="3">Tomorrow</option>
                  <option value="4">This Week</option>
                  <option value="5">This Weekend</option>
                  <option value="6">Next Week</option>
                  <option value="7">Next Month</option>
        </select>
        <br />
        <select class="selectpicker" name=price_event>
                  <option value="1">All Prices</option>
                  <option value="2">Free</option>
                  <option value="3">Paid</option>
        </select>
      </div>
      <div class="col-lg-9">
          <h1>Jakarta, Indonesia Events Just For You</h1>
          <?php while ($item = mysqli_fetch_array($event)) { ?>
          <?php $event_id_encrypt = base64_encode($item['event_id']); ?>
          <!-- looping events card -->
          <a href="../../pages/event_detail/index.php/?event_id=<?php echo $event_id_encrypt?>">
            <div class="row card_browse_event">
              <div class="col-lg-3 text-center">
                <img src='../../photo_event/<?php echo $item['event_photo']; ?>' width='200' height='200'>
              </div>
              <div class="col-lg-9">
                <br />
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
