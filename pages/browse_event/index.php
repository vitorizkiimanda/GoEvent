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

<body class="page_background_snow">
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
              <li><a href="../../pages/organizer_profile_choose_create">Create Event</a></li>
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
        
        <form method='post'>      
          <div class="input-group">
              <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-map-marker
                " aria-hidden="true"></span></span>
              <input type="text" class="form-control" name="event_city" id="event_city" placeholder="Jakarta, Indonesia" aria-describedby="basic-addon1">
          </div>
          <br />
          <select class="selectpicker" name = "event_topic">
                    <option value="All Categories">All Categories</option>
                    <option value="Automotive">Automotive</option>
                    <option value="Business & professional">Business & professional</option>
                    <option value="Charity">Charity</option>
                    <option value="Automotive">Community & Culture</option>
                    <option value="Community">Education</option>
                    <option value="Familiy">Familiy</option>
                    <option value="Fashion & Beauty">Fashion & Beauty</option>
                    <option value="Film, Media & Entertainment">Film, Media & Entertainment</option>
                    <option value="Food and Beverage">Food and Beverage</option>
                    <option value="Government & Politics">Government & Politics</option>
                    <option value="Health & Wellness">Health & Wellness</option>
                    <option value="Hobbies & Special Interest">Hobbies & Special Interest</option>
                    <option value="Home & Lifestyle">Home & Lifestyle</option>
                    <option value="Music">Music</option>
                    <option value="Performing & Visual Arts">Performing & Visual Arts</option>
                    <option value="Religion & Spirituality">Religion & Spirituality</option>
                    <option value="School Activities">School Activities</option>
                    <option value="Science & Technology">Science & Technology</option>
                    <option value="Holiday">Holiday</option>
                    <option value="Sport & Fitness">Sport & Fitness</option>
                    <option value="Travel & Outdoor">Travel & Outdoor</option>
                    <!-- <option value="Automotive">Other</option> -->
          </select>
          <br />
          <select class="selectpicker" name = "event_type">
                    <option value="All Event Types">All Event Types</option>
                    <option value="Attraction">Attraction</option>
                    <option value="Camp/Trip">Camp/Trip</option>
                    <option value="Class, Training,or Workshop">Class, Training,or Workshop</option>
                    <option value="Concert or Performance">Concert or Performance</option>
                    <option value="Conference">Conference</option>
                    <option value="Convention">Convention</option>
                    <option value="Dinner or Gala">Dinner or Gala</option>
                    <option value="Festival or Fair">Festival or Fair</option>
                    <option value="Game or Competition">Game or Competition</option>
                    <option value="Meeting or Networking Event">Meeting or Networking Event</option>
                    <option value="Party or Social Gathering">Party or Social Gathering</option>
                    <option value="Race or Endurance Event">Race or Endurance Event</option>
                    <option value="Rally">Rally</option>
                    <option value="Seminar">Seminar</option>
                    <option value="Tour">Tour</option>
                    <option value="Tournament">Tournament</option>
                    <option value="Tradeshow or Expo">Tradeshow or Expo</option>
                    <!-- <option>Other</option> -->
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
                    <option value="0">All Prices</option>
                    <option value="1">Free</option>
                    <option value="2">Paid</option>
          </select>
          <button class="btn btn-default" type="submit" name="filter_browse">SEARCH</button>
        </form>
      </div>
        

      <div class="col-lg-9">
          <h1>Jakarta, Indonesia Events Just For You</h1>
          <?php while ($item = mysqli_fetch_array($event)) { ?>
          <?php $event_id_encrypt = base64_encode($item['event_id']); ?>
          <!-- looping events card -->
          <!-- <a href="../../pages/event_detail/index.php?event_id=<?php echo $event_id_encrypt?>"> -->
            <div onclick="location.href='../../pages/event_detail/index.php?event_id=<?php echo $event_id_encrypt?>';" style="cursor: pointer;" class="row card_browse_event">
              <div class="col-lg-3 text-center">
                <img src='../../photo_event/<?php echo $item['event_photo']; ?>' width='200' height='200'>
              </div>
              <div class="col-lg-9">
                <br />
                <p id="date_card"> <?php echo date('d F Y', strtotime($item['event_date_starts']) ). "\r\n" . date('h:i A', strtotime($item['event_time_starts'])); ?> </p>
                  <p id="title_card"><?php echo $item['event_name'] ?></p>
                  <br />
                  <p id="location_card"><?php echo $item['event_city'] ?></p>
                  <hr />
                  <a id="location_card"><?php echo "#".$item['event_topic']?> </a>
                  <a id="location_card"><?php echo "#".$item['event_type']?> </a>
                  <br />
              </div>
            </div>
          <!-- </a> -->
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
