<?php
  include('../backend/attendance_event.php');
  if(isset($_GET['event_id']))
  {
    $id = $_GET['event_id'];
    $event_query="SELECT * FROM events e WHERE e.event_id= '$event_id'";
    $events = mysqli_query($connect, $event_query);
    $event_array = mysqli_fetch_array($events);
    $i=0;
    $j=0;
  }

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

  <!-- ini script untuk chart -->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart()
          {
                var data = google.visualization.arrayToDataTable([
                          ['status', 'number'],
                          <?php
                          while($row = mysqli_fetch_array($chart))
                          {
                               echo "['".$row["status"]."', ".$row["number"]."],";
                          }
                          ?>
                     ]);
                var options = {
                      title: 'Percentage of Already Arrive and Not Yet Arrive',
                      //is3D:true,
                      pieHole: 0.4
                     };
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                chart.draw(data, options);
          }
  </script>
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
    <h1><?php echo $event_array['event_name']?></h1>
    <p><?php echo date('F d, Y', strtotime($event_array['event_date_starts']))?></p>
    <!-- tabs -->
    <br />
    <br />


    <!-- Search -->
  <div class="container">
    <div class="row">
      <div class="col-lg-4"></div>
      <div class="col-lg-4">
        <h3 class="text-center">Input Attendance ID</h3>
        <form method="post" action="../backend/attendance_event.php" >
          <div class="input-group">
            <input type="text" class="form-control" name="id_attendance" id="event_name" placeholder="Attendance ID">
            <input type="hidden" name="id_event" id="id_event "value="<?php echo $event_id ?>">
            <span class="input-group-btn">
              <button class="btn btn-default" type="submit" name="sign">SIGN</button>
            </span>
          </div><!-- /input-group -->
        </form>
      </div><!-- /.col-lg-6 -->
      <div class="col-lg-4"></div>
    </div><!-- /.row -->
  </div>
  <div class="container text-center">
    <?php
      $status = $_GET['status'];
      // if($status==0) echo '<h4><span class="text-center label label-success">Input Ticket id here</span></h4>';
      if($status==1) echo '<h4><span class="text-center label label-danger">Tiket Id Not Found</span></h4>';
      if($status==2) echo '<h4><span class="text-center label label-success">Success Sign Tiket</span></h4>';
    ?>
  </div>
  <br />
  <br />



    <div class="container">
      <ul class="nav nav-tabs text-center">
        <li class="active"><a data-toggle="tab" href="#list">LIST</a></li>
        <li><a data-toggle="tab" href="#chart">CHART</a></li>
        <li><a data-toggle="tab" href="#special">SPECIAL CASE</a></li>
      </ul>

      <div class="tab-content text-center">
        <div id="list" class="tab-pane fade in active">
          <br />
          <!-- Table -->
          <div class="container">
            <div class="row text-center">
                <div class="col-lg-3 text-left">
                  <b>Name
                </div>
                <div class="col-lg-3">
                  ID
                </div>
                <div class="col-lg-3">
                  Arrival Time
                </div>
                <div class="col-lg-3">
                  Status</b>
                </div>
                <br />
                <hr />
            </div>
            <div class="row">
                <?php while ($item = mysqli_fetch_array($attendance_table)) { ?>
                <div class="col-lg-3 text-left">
                  <p><?php echo $item['user_name']?><br /><p>
                </div>
                <div class="col-lg-3 text-center">
                  <p><?php echo $item['ticket_id']?><br /><p>
                </div>
                <div class="col-lg-3 text-center">
                  <p><?php echo date('h:i A', strtotime($item['arrival_time'])) ?><br /><p>
                </div>
                <div class="col-lg-3 text-center">
                  <p><?php
                    if($item['status']==1) echo "Signed";
                    else echo "Not Signed" ?><br /><p>
                </div>
                <hr />
                <?php } ?>
            </div>
          </div>
        </div>
        <div id="chart" class="tab-pane fade">
          <br />
          <div>
                <br />
                <div id="piechart" class="piechart_attendance"></div>
           </div>
        </div>
        <div id="special" class="tab-pane fade">
          <br />
          <p>Coming Soon</p>
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
