<?php
include "../backend/sign_in_password.php";
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
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
  </nav>

<div class="container-fluid">
  <br />
  <a href="../../" class="close" role="button">X</a>
</div>

<div class="container text-center">
  <p>logo</p>
  <h2>Welcome back</h2>
  <p>Please enter your password to log in.</p>
  <br />   
</div>

<div class="container">
  <div class="row">
    <div class="col-lg-4"></div>
    <div class="col-lg-4">
        <form method=post>
            <div class="form-group">
              <label for="email">Email address</label>
              <!-- <input type="email" class="form-control" id="email" name="email" placeholder="Email"> -->
              <p class="form-control-static"><?php echo $email;?>
              <a href="../../pages/sign_in"><span class="glyphicon glyphicon-pencil right_hvsz" aria-hidden="true"></span></a></p>  
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="">
            </div>
            <button type="submit" class="btn btn-primary btn-round btn-block">Log In</button>
        </form>
        <br />
        <div class="text-center"><a>Forgot password</a></div>
    </div>
    <div class="col-lg-4"></div>
  </div>
</div>


</body>
</html>