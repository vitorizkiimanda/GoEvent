<?php
    require_once '../backend/organizer_profile_view.php';
    if($_GET['organizer_id'])
    {
      $mark = $_GET['organizer_id'];
    }
     $organizer_query = mysqli_query($connect, "SELECT * FROM organizer WHERE organizer_id = '$mark'");
     $organizer_query = mysqli_fetch_assoc($organizer_query);
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
        <h1><?php echo $item['organizer_name']?> Profile</h1>
        <hr />
      </div>
    </div>
    <br />
    <div class="row">
      <div class="col-lg-3 text-center">
        <div>
          <img id="blah" src="../../photo_organizer/<?php echo $organizer_query['organizer_photo']?>" onError="this.onerror=null;this.src='../../images/default.png';" class="img-responsive" style="margin: 0 auto;" />
          <br />
        </div>
      </div>
      <div class="col-lg-9">
              <div>
                <label id="date_card" style="font-size: 18px;" for="exampleInputEmail1">Organizer Name</label>
                <h4 id="date_card" style="font-size: 32px;"><?php echo $item['organizer_name']?></h4>

                <hr />
              </div>

              <div>
                  <label id="date_card" style="font-size: 18px;" for="exampleInputEmail1">About The Organizer</label>
                  <h4 id="date_card" style="font-size: 16px;"><?php echo $item['organizer_description']?></h4>
                  
                <hr />
              </div>

              <div>
                <label id="date_card" style="font-size: 18px;" for="exampleInputEmail1">Phone Number</label>
                <h4 id="date_card" style="font-size: 28px;"><?php echo $item['organizer_phone_number']?></h4>
                  
                <hr />
              </div>

                <div>
                  <label id="date_card" style="font-size: 18px;" for="exampleInputEmail1">Address</label>
                  <h4 id="date_card" style="font-size: 24px;"><?php echo $item['organizer_address']?></h4>
                  
                <hr />
                </div>

              <div>
                <label id="date_card" style="font-size: 18px;" for="exampleInputEmail1">Website</label>
                <h4 id="date_card" style="font-size: 24px;"><?php echo $item['organizer_website']?></h4>
                  
                <hr />
              </div>

              <div>
                <label id="date_card" style="font-size: 18px;" for="exampleInputEmail1">Facebook Page</label>
                <h4 id="date_card" style="font-size: 24px;"><?php echo $item['organizer_facebook']?></h4>
                  
                <hr />
              </div>

              <div>
                <label id="date_card" style="font-size: 18px;" for="exampleInputEmail1">Twitter</label>
                <h4 id="date_card" style="font-size: 24px;"><?php echo $item['organizer_twitter']?></h4>
                  
                <hr />
              </div>

              <div>
                <label id="date_card" style="font-size: 18px;" for="exampleInputEmail1">Instagram</label>
                <h4 id="date_card" style="font-size: 24px;"><?php echo $item['organizer_instagram']?></h4>
                  
                <hr />
              </div>
              <br />
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
