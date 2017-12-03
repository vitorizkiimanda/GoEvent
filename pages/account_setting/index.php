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
              <li><a href="../../pages/sign_in">Sign In</a></li>
              <li><a href="../../pages/profile">Profile</a></li>
              <li><a href="../../pages/create_event">Create Event</a></li>
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
            <li class="list-group-item"><a data-toggle="collapse" data-target="#contact">Contact Info</a></li>
            <li class="list-group-item"><a data-toggle="collapse" data-target="#password">Password</a></li>
            <li class="list-group-item">Email Preferences</li>
            <li class="list-group-item">Close Account</li>
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
            <li class="list-group-item">Unused Organizers</li>
            <li class="list-group-item">Multi-User Access</li>
          </ul>
        </div>
      </div>
    </div>

    </div>
    <div class="col-lg-9">

      <div id="contact" class="collapse">
        <h3>Account Information</h3>
        <hr />
          <form action="#" enctype="multipart/form-data" method="post">
                <div class="form-group">
                  <label for="exampleInputEmail1">Account Email</label>
                  <input type="email" name="email_user" class="form-control" id="exampleInputEmail1" value="emailsiuser@gmail.com">
                </div>
              
                <div class="form-group">
                    <label for="exampleInputEmail1">Profile Photo</label>
                    <p>nnti ditampilin foto usernya</p>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Website</label>
                  <input type="url" name="website_organizer" class="form-control" id="exampleInputEmail1" value="http://">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" name="name_user" class="form-control" id="exampleInputEmail1" value="Nama Lengkap SI User di tampilin">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Phone Number</label>
                  <input type="number" name="twitter_organizer" class="form-control" id="exampleInputEmail1" value="089657011491">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Website / Blog</label>
                  <input type="url" name="instagram_organizer" class="form-control" id="exampleInputEmail1" value="alamatnya kalo udah ada">
                </div>


                <div class="form-group">
                  <label for="exampleInputEmail1">Home Address</label>
                  <!-- <input type="text" name="event_city" class="form-control" id="exampleInputEmail1" placeholder="Search for a venue or address"> -->
                  <!-- Google API autocomplete starts -->
                  <br />  
                                <input id="autocomplete" class="form-control" placeholder="Enter your address" onFocus="geolocate()" type="text" name="event_city"></input>
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

                <div class="form-group">
                  <label for="exampleInputEmail1">Postal Code</label>
                  <input type="number" name="instagram_organizer" class="form-control" id="exampleInputEmail1" value="kodenya kalo udah ada">
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
                  <input type="password" name="password_user" class="form-control" id="exampleInputEmail1">
                </div>
              
                <div class="form-group">
                    <label for="exampleInputEmail1">New Password</label>
                    <input type="password" name="password_user_new" class="form-control" id="exampleInputEmail1">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Repeat Password</label>
                  <input type="password" name="password_user_new_validate" class="form-control" id="exampleInputEmail1">
                </div>

                <br />
                <div class="row">
                  
                    <button type="submit" class="btn btn-primary btn-round btn-block">Save</button>
                  
                </div>
            </form>
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
