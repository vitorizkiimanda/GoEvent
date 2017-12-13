<?php require_once '../backend/event_detail.php'; ?>

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
    <!-- header -->
    <div class="row">
      <div class="col-lg-8 text-center">
         <img src='../../photo_event/<?php echo $hasil['event_photo']; ?>' class="img-responsive" width='400' height='400' style="margin: 0 auto;">
         <br />
      </div>
      <div class="col-lg-4">
        <br />
        <p><?php echo date('d F', strtotime($hasil['event_date_starts'])); ?> </p>
        <br />
        <h3><?php echo $hasil['event_name']?> </h3>
        <a href="../../pages/organizer_profile_view?organizer_id=<?php echo $hasil['organizer_id']?> "><h6>by <?php echo $hasil['organizer_name'] ?></h6></a>
        <br />
        <br />
        <p>
          <?php if($hasil['ticket_price'] === '0' ) echo "FREE" ;
                else echo "Rp ".$hasil['ticket_price'].",00" ; ?>
        </p>
      </div>
    </div>

    <div class="clearfix"></div>
    <!-- buttons -->
    <div class="row">
      <div class="col-lg-8">
          <button type="button" class="btn btn-default" aria-label="Left Align">
              <span class="glyphicon glyphicon-share" aria-hidden="true"></span>
          </button>

          <?php if(isset($_SESSION['user_id']))
                  if(mysqli_num_rows($mark) == 0){ ?>
          <button id="bookmark_button" type="button" class="btn btn-primary" aria-label="Left Align">
              <span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span>
          </button>
        <?php } else { ?>
          <button id="unbookmark_button" type="button" class="btn btn-danger" aria-label="Left Align">
              <span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span>
          </button>
        <?php } ?>

    </div>
      <div class="col-lg-4">
      <br />
          <form action=<?php if(isset($_SESSION['user_id'])) echo "../backend/register.php"; else echo "../sign_in/"?> enctype="multipart/form-data" method="post">
            <input type="hidden" name="event_id" value="<?php echo $event_id?>" >
          <button id="submission" type="submit" class="btn btn-success btn-round btn-block">REGISTER</button>

      </div>
    </div>

    <?php if(isset($_SESSION['user_id'])) {?>
    <script>
    $(document).ready(function(){
        $("#bookmark_button").click(function(){
          window.alert("Bookmark");
          <?php $sql2 = "INSERT INTO bookmark (user_id, event_id) VALUES ('$user_id', '$event_id')";
          $connect->query($sql2)  ?>
        });
        $("#unbookmark_button").click(function(){
          window.alert("Unbookmark");
          <?php $sql2 = "DELETE FROM bookmark WHERE user_id ='$user_id' and event_id = '$event_id' ";
          $connect->query($sql2);  ?>
        });
    });
    </script>
    <?php } ?>

    <br />
    <div class="clearfix"></div>
    <!-- details -->

    <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-6">
            <!-- <h5><b>DESCRIPTION</b></h5> -->
            <p><?php echo $hasil['event_description']?></p>
            <br />
            <?php $sub = substr($hasil['event_video'] ,-11)?>
            <iframe allowfullscreen="allowfullscreen"
        mozallowfullscreen="mozallowfullscreen"
        msallowfullscreen="msallowfullscreen"
        oallowfullscreen="oallowfullscreen"
        webkitallowfullscreen="webkitallowfullscreen" width="100%" height="345" src="https://www.youtube.com/embed/<?php echo $sub?>?playlist=<?php echo $sub?>&loop=1">
            </iframe>
            <br />
            <br />
            <p><i>FOR MORE INFORMATION PLEASE CONTACT :</i></p>
            <p>VITO 089657011491</p>
            <p>email : vitorizkiimanda@gmail.com</p>

            <br />
            <br />
            <p>TAGS</p>
            <br />
            <button type="button" class="btn btn-primary"> <?php echo $hasil['event_type'] ?> </button>
            <button type="button" class="btn btn-primary"> <?php echo $hasil['event_topic'] ?> </button>

        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-3">
            <h5><b>DATE AND TIME</b></h5>
            <p> <?php echo date('l jS F Y', strtotime($hasil['event_date_starts'])).", ".date('H:i', strtotime($hasil['event_time_starts']))." WIB" ?> <br/>
              <?php echo date('l jS F Y', strtotime($hasil['event_date_ends'])).", ".date('H:i', strtotime($hasil['event_time_ends']))." WIB" ?> <br/>
            <!-- <p>Wed, Jan 24, 2018, 9:00 AM –<br/>Fri, Jan 25, 2019, 8:00 PM WIB<br /> -->
              <a>Add to Calendar</a></p>
            <br />
            <h5><b>LOCATION</b></h5>
            <p> <?php echo $hasil['event_city']?><br /><a>View Map</a></p>
        </div>
        <div class="col-lg-1"></div>
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
