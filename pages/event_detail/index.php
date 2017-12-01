<?php require_once '../backend/event_detail.php'; ?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="utf-8" />
  <meta name="HVSZ" content="GoEvent" />

  <title>GoEvent</title>

  <link rel="shortcut icon" href="../../../images/title.png" />

  <!-- pengaturan view agar responsif namun pada mobile tidak bisa zooming -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

  <!-- attach JavaScripts -->
  <script src="../../../js/bootstrap.min.js"></script>
  <script src="../../../js/jquery.min.js"></script>
  <!--<script src="//maps.google.com/maps/api/js?sensor=true"></script>-->
  <!--<script src="js/main.js"></script>-->

  <!-- attach CSS styles -->
  <link href="../../../css/bootstrap.min.css" rel="stylesheet">
  <link href="../../../css/style_goevent.css" rel="stylesheet" />

  <!-- Online attachment - offline doesnt work -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
            <a class="navbar-brand" id="goevent_color" href="../../">GoEvent</a>
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
              <li><a href="../../../pages/browse_event">Browse Event</a></li>
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
              <li><a href="../../../pages/sign_in">Sign In</a></li>
              <li><a href="../../../pages/create_event">Create Event</a></li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

  <div class="container text-wrap">
    <!-- header -->
    <div class="row">
      <div class="col-lg-8">
         <img src='../../../photo_event/<?php echo $hasil['event_photo']; ?>' width='300' height='200'>
      </div>
      <div class="col-lg-4">
        <br />
        <p><?php echo $hasil['event_date_starts']?> </p>
        <br />
        <h3><?php echo $hasil['event_name']?> </h3>
        <br />
        <p><?php echo $hasil['event_city']?></p>
        <br />
        <p>free</p>
      </div>
    </div>

    <div class="clearfix"></div>
    <!-- buttons -->
    <div class="row">
      <div class="col-lg-8">
          <button type="button" class="btn btn-default" aria-label="Left Align">
              <span class="glyphicon glyphicon-share" aria-hidden="true"></span>
          </button>
          <button type="button" class="btn btn-default" aria-label="Left Align">
              <span class="glyphicon glyphicon-bookmark" aria-hidden="true"></span>
          </button>
      </div>
      <div class="col-lg-4">
          <button type="submit" class="btn btn-success btn-round btn-block">REGISTER</button>
      </div>
    </div>

    <br />
    <div class="clearfix"></div>
    <!-- details -->

    <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-6">
            <h5><b>DESCRIPTION</b></h5>
            <p><?php echo $hasil['event_description']?></p>
            <br />
            <h4><b>TERM & CONDITION</b></h4>
            <ol>
              <li>Pendaftar bersifat individual/ Group beranggotakan 3 orang . Pria/Wanita dengan usia minimum 17 tahun dan maksimal 45 tahun</li>
              <li>Setiap Pendaftar dapat memilih role masing -masing yaitu Hacker (Developer), Hustler (Business) dan Hipster (Design)</li>
              <li>Pendaftaran dikenakan biaya pendaftaran sebesar Rp.50,000 / individu</li>
              <li>Bagi peserta Individual, di acara AAJI Hackathon 2018 tanggal 24 -25 Januari akan dibentuk menjadi sebuah group dengan maksimal peserta per group sebanyak 3 orang</li>
            </ol>

            <br />
            <h4><b>TIMELINE AAJI HACKATHON 2018 :</b></h4>
            <ol>
              <li>Pendaftar bersifat individual/ Group beranggotakan 3 orang . Pria/Wanita dengan usia minimum 17 tahun dan maksimal 45 tahun</li>
              <li>Setiap Pendaftar dapat memilih role masing -masing yaitu Hacker (Developer), Hustler (Business) dan Hipster (Design)</li>
              <li>Pendaftaran dikenakan biaya pendaftaran sebesar Rp.50,000 / individu</li>
              <li>Bagi peserta Individual, di acara AAJI Hackathon 2018 tanggal 24 -25 Januari akan dibentuk menjadi sebuah group dengan maksimal peserta per group sebanyak 3 orang</li>
            </ol>

            <br />
            <br />
            <p><i>FOR MORE INFORMATION PLEASE CONTACT :</i></p>
            <p>VITO 089657011491</p>
            <p>email : vitorizkiimanda@gmail.com</p>

            <br />
            <br />
            <p>TAGS</p>
            <br />
            <button type="button" class="btn btn-primary">IT</button>
            <button type="button" class="btn btn-primary">Computer</button>
            <button type="button" class="btn btn-primary">Teen</button>

        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-3">
            <h5><b>DATE AND TIME</b></h5>
            <p> <?php echo $hasil['event_date_starts'].", ".$hasil['event_time_starts'] ?> <br/>
              <?php echo $hasil['event_date_ends'].", ".$hasil['event_time_ends'] ?> <br/>
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
