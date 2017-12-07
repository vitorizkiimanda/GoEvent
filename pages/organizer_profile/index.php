<?php
    require_once '../backend/dbconnect.php';
    require_once '../backend/organizer_profile.php';
    $organizer_id=$_GET['organizer_id'];
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
    <div class="row">
      <div class="col-lg-10">
        <h1>Organizer Profile</h1>
      </div>
      <div class="col-lg-2 text-center">
        <select class="selectpicker" name = "organizer">
        <?php if(mysqli_num_rows($query_organizer)>0) { ?>
        <?php while($result =mysqli_fetch_assoc($query_organizer)){ ?>
                <option><a href="index.php?organizer_id = ".$result['organizer_id']."" > <?php echo $result['organizer_name'] ?></a></option>
      <?php     }} ?>
                <option><a href="index.php?organizer_id = '-1'">Create a new organizer</a></option>
                </select>
                <br />
      </div>
    </div>
    <br />
    <div class="row">
      <div class="col-lg-3 text-center">
        <img src="../../images/title.png" class="img-responsive" alt="Organizer Profile Pict" />
        <p>JPG, GIF or PNG no larger than 1MB. Square images look the best!</p>
        <a href="#" class="btn btn-primary btn-round btn-block">CHOOSE FILE</a>
      </div>
      <div class="col-lg-9">

        <form action="#" enctype="multipart/form-data" method="post">
              <div class="form-group">
                <label for="exampleInputEmail1">Organizer Name</label>
                <input type="text" name="organizer_name" class="form-control" id="exampleInputEmail1" placeholder="Give it a short distinict name">
              </div>

              <div class="form-group">
                  <label for="exampleInputEmail1">About The Organizer</label>
                  <textarea type="textarea" name="about_organizer" class="form-control" id="exampleInputEmail1" placeholder="Describe your event briefly">
                  </textarea>
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Phone Number</label>
                <input type="number" name="website_organizer" class="form-control" id="exampleInputEmail1" value="">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Website</label>
                <input type="url" name="website_organizer" class="form-control" id="exampleInputEmail1" value="http://">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Facebook Page</label>
                <input type="url" name="facebook_organizer" class="form-control" id="exampleInputEmail1" value="facebook.com/">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Twitter</label>
                <input type="text" name="twitter_organizer" class="form-control" id="exampleInputEmail1" value="@">
              </div>

              <div class="form-group">
                <label for="exampleInputEmail1">Instagram</label>
                <input type="text" name="instagram_organizer" class="form-control" id="exampleInputEmail1" value="@">
              </div>

              <!-- Rich text editor -->

              <div class="container" id="sample">
                <script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script> <script type="text/javascript">
              //<![CDATA[
                      bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
                //]]>
                </script>
              </div>

              <!-- Rich text editor -->



              <br />
              <div class="row">
                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-3">
                  <button type="submit" class="btn btn-primary btn-round btn-block">Save</button>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-5 col-xs-5">
                  <a href="../../pages/organizer_profile_attendance" class="btn btn-success btn-round btn-block">View Profile</a>
                </div>
              </div>
          </form>


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
