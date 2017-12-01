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
              <li><a href="../../pages/sign_in">Sign In</a></li>
              <li><a href="../../pages/create_event">Create Event</a></li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

  <div class="container text-wrap">
    <div class="row">
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
          
          <!-- looping events card -->
          <a href="../../pages/event_detail">
            <div class="row">
              <div class="col-lg-3">
                <h2>Poster Events</h2>
              </div>
              <div class="col-lg-9">
                  <p>WED. JAN 24 9:00 AM</p>
                  <p>TITLE EVENT</p>
                  <br />
                  <p>Alamat event</p>
                  <br />
                  <p>#hastagKategori</p>         
              </div>
            </div>
          </a>

          <a href="../../pages/event_detail">
            <div class="row">
              <div class="col-lg-3">
                <h2>Poster Events</h2>
              </div>
              <div class="col-lg-9">
                  <p>WED. JAN 24 9:00 AM</p>
                  <p>TITLE EVENT</p>
                  <br />
                  <p>Alamat event</p>
                  <br />
                  <p>#hastagKategori</p>         
              </div>
            </div>
          </a>

          <a href="../../pages/event_detail">
            <div class="row">
              <div class="col-lg-3">
                <h2>Poster Events</h2>
              </div>
              <div class="col-lg-9">
                  <p>WED. JAN 24 9:00 AM</p>
                  <p>TITLE EVENT</p>
                  <br />
                  <p>Alamat event</p>
                  <br />
                  <p>#hastagKategori</p>         
              </div>
            </div>
          </a>

          
          
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