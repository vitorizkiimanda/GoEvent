<?php
    require_once '../backend/dbconnect.php';
    require_once '../backend/account_setting.php';
    
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

              <!-- <li><a href="../../pages/sign_in">Sign In</a></li>
              <li><a href="../../pages/profile">Profile</a></li> -->
              <li><a href="../../pages/organizer_profile_choose_create">Create Event</a></li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>


    <div class="container">
    <h1>Account Settings</h1>
    <!-- tabs -->
    <br />
    <div class="row">
    <div class="col-lg-3">

    <div class="panel-group" id="accordion">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
            Account</a>
          </h4>
        </div>
        <div id="collapse1" class="panel-collapse collapse in">
          <ul class="list-group">
            <li class="list-group-item" id="contact_button" data-toggle="collapse" data-target="#contact"><a href="#">Contact Info</a></li>
            <li class="list-group-item" id="password_button" data-toggle="collapse" data-target="#password"><a href="#">Password</a></li>
            <li class="list-group-item" id="email_button" data-toggle="collapse" data-target="#email"><a href="#">Email Preferences</a></li>
            <li class="list-group-item" id="close_button" data-toggle="collapse" data-target="#close"><a href="#">Close Account</a></li>
          </ul>
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
            Organizer</a>
          </h4>
        </div>
        <div id="collapse2" class="panel-collapse collapse">
          <ul class="list-group">
            <li class="list-group-item">Package</li>
            <li class="list-group-item">Delete Organizers</li>
            <li class="list-group-item">Multi-User Access</li>
          </ul>
        </div>
      </div>
    </div>

              <!-- kode untuk autocollapse -->
    <script>
    $(document).ready(function(){
        $("#contact_button").click(function(){
            $("#password").collapse('hide');
            $("#email").collapse('hide');
            $("#close").collapse('hide');
        });
        $("#password_button").click(function(){
            $("#contact").collapse('hide');
            $("#email").collapse('hide');
            $("#close").collapse('hide');
        });
        $("#email_button").click(function(){
            $("#password").collapse('hide');
            $("#contact").collapse('hide');
            $("#close").collapse('hide');
        });
        $("#close_button").click(function(){
            $("#password").collapse('hide');
            $("#email").collapse('hide');
            $("#contact").collapse('hide');
        });
    });
    </script>

    </div>
    <div class="col-lg-9">

      <div id="contact" class="collapse in">
        <h3>Account Information</h3>
        <hr />
          <form action="#" enctype="multipart/form-data" method="post">
                <div class="form-group">
                  <label for="exampleInputEmail1">Account Email</label>
                  <input type="email" name="user_email" class="form-control" id="exampleInputEmail1" value="<?php echo $_SESSION['user_email']; ?>" required>
                </div>


                <div class="form-group">
                    <label for="exampleInputEmail1">Profile Photo</label><br>
                    <input class="form-control" name="organizer_photo" accept="image/*" type='file' id="my_file" name="my_file"/>
                      <br/>
                      <img id="blah" src="../../photo_organizer/<?php echo $organizer_query['organizer_photo']?>" onError="this.onerror=null;this.src='../../images/default.png';" class="img-responsive" style="margin: 0 auto;" />
                      <br />
                      <div class="text-center">
                        <p>JPG, GIF or PNG no larger than 1MB. Square images look the best!</p>
                      </div>
                    <script>
                              function readURL(input) {
                                  if (input.files && input.files[0]) {
                                          var reader = new FileReader();
                                          
                                          reader.onload = function (e) {
                                              $('#blah').attr('src', e.target.result);
                                          }
                                          
                                          reader.readAsDataURL(input.files[0]);
                                      }
                                  }
                        
                                  $("#my_file").change(function(){
                                      readURL(this);
                                  });
                                      </script>
                    
                                      <script>
                                        $(document).ready(function(){
                                            $("input[type='image']").click(function() {
                                                $("input[id='my_file']").click(); 
                                                // ambil designnya di sini
                    
                                                
                                                if (window.FileReader) {
                                                  //then your code goes here
                                                } else {
                                                  alert('This browser does not support FileReader');
                                                }
                    
                    
                                            });
                                            // $("#default").click(function(){
                                            //   $('.nav-tabs a[href="#preview"]').tab('show')
                                            // });
                                        });
                    </script>
                    

                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" name="user_name" class="form-control" id="exampleInputEmail1" value="<?php echo $_SESSION['user_name']; ?>" required>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Home Address</label>
                  <!-- <input type="text" name="event_city" class="form-control" id="exampleInputEmail1" placeholder="Search for a venue or address"> -->
                  <!-- Google API autocomplete starts -->
                  <br />
                                <input id="autocomplete" class="form-control" placeholder="Enter your address" onFocus="geolocate()" type="text" name="user_city" value="<?php if(!empty($_SESSION['user_city'])) echo $_SESSION['user_city']; ?>" required></input>
                                    <script>
                                      var placeSearch, autocomplete;
                                      var componentForm = {
                                        street_number: 'short_name',
                                        route: 'long_name',
                                        locality: 'long_name',
                                        administrative_area_level_1: 'short_name',
                                        country: 'long_name',
                                        postal_code: 'short_name'
                                      };

                                      function initAutocomplete() {
                                        // Create the autocomplete object, restricting the search to geographical
                                        // location types.
                                        autocomplete = new google.maps.places.Autocomplete(
                                            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
                                            {types: ['geocode']});

                                        // When the user selects an address from the dropdown, populate the address
                                        // fields in the form.
                                        autocomplete.addListener('place_changed', fillInAddress);
                                      }

                                      function fillInAddress() {
                                        // Get the place details from the autocomplete object.
                                        var place = autocomplete.getPlace();

                                        for (var component in componentForm) {
                                          document.getElementById(component).value = '';
                                          document.getElementById(component).disabled = false;
                                        }

                                        // Get each component of the address from the place details
                                        // and fill the corresponding field on the form.
                                        for (var i = 0; i < place.address_components.length; i++) {
                                          var addressType = place.address_components[i].types[0];
                                          if (componentForm[addressType]) {
                                            var val = place.address_components[i][componentForm[addressType]];
                                            document.getElementById(addressType).value = val;
                                          }
                                        }
                                      }
                                      function geolocate() {
                                        if (navigator.geolocation) {
                                          navigator.geolocation.getCurrentPosition(function(position) {
                                            var geolocation = {
                                              lat: position.coords.latitude,
                                              lng: position.coords.longitude
                                            };
                                            var circle = new google.maps.Circle({
                                              center: geolocation,
                                              radius: position.coords.accuracy
                                            });
                                            autocomplete.setBounds(circle.getBounds());
                                          });
                                        }
                                      }
                                    </script>
                                    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1-maPhWUiX_tOR5JEz5fsU7gOm4y_r_s&libraries=places&callback=initAutocomplete"
                                        async defer></script>
                                  <!-- End of google API autocomplete -->
                </div>


                <br />
                <div class="row">

                    <button type="submit" class="btn btn-primary btn-round btn-block">Save</button>

                </div>
            </form>
        </div>

      <div id="password" class="collapse">
        <h3>Your Password</h3>
        <hr />
        <form action="#" enctype="multipart/form-data" method="post">
                <div class="form-group">
                  <label for="exampleInputEmail1">Current Password</label>
                  <input type="password" name="user_password" class="form-control" id="exampleInputEmail1">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">New Password</label>
                    <input type="password" name="user_password_new" class="form-control" id="exampleInputEmail1">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Repeat Password</label>
                  <input type="password" name="user_password_new_validate" class="form-control" id="exampleInputEmail1">
                </div>

                <br />
                <div class="row">

                    <button type="submit" class="btn btn-primary btn-round btn-block">Save</button>

                </div>
            </form>
      </div>

      <div id="email" class="collapse">
        <h3>Email Preferences</h3>
        <hr />
        
      </div>

      <div id="close" class="collapse">
        <h3>Close Account</h3>
        <hr />
        
      </div>


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
