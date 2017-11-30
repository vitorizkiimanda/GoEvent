<?php
  include "../backend/sign_in.php";
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

  <div class="container-fluid">
    <br />
    <a href="../../" class="close" role="button">X</a>
  </div>

  <div class="container text-center">
    <p>logo</p>
    <h2>Let's get started</h2>
    <p>Enter your email to sign up or sign in.</p>
    <br />
  </div>

  <div class="container">
    <div class="row">
      <div class="col-lg-4"></div>
      <div class="col-lg-4">
          <form method=post>
              <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" req>
              </div>
              <button type="submit" class="btn btn-primary btn-round btn-block">Get Started</button>
              <a href="../backend/sign_in_google" class="btn btn-danger btn-round btn-block">Google</a>
          </form>
      </div>
      <div class="col-lg-4"></div>
    </div>
  </div>


</body>
</html>
