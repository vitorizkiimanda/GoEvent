<?php require_once '../backend/create_event.php'; ?>

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

  <!-- datepicker js -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>


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
            <li><a href="#">Browse Event</a></li>
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
                  <li><a href="pages/profile">Profile</a></li>
                  <li><a href="pages/profile">Tickets</a></li>
                  <li><a href="pages/profile">Bookmarks</a></li>
                  <li><a href="pages/profile">Certificates</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="pages/organizer_profile">Organizer Profile</a></li>
                  <li><a href="pages/manage_event">Manage Events</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="pages/account_setting">Account Settings</a></li>
                  <li><a href="pages/backend/logout.php">Log Out</a></li>
                </ul>
              </li>
              <?php } else {
               header('Location: ../sign_in/' );
              } ?>
          </ul>

        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
  </nav>

  <div class="container">
    <div class="row">
      <div class="col-lg-2"></div>
      <div class="col-lg-8">


        <h1>1. Event Details</h1>
        <form action="../backend/create_event.php" enctype="multipart/form-data" method="post">
            <div class="form-group">
              <label for="exampleInputEmail1">Event Title</label>
              <input type="text" name="event_name" class="form-control" id="exampleInputEmail1" placeholder="Give it a short distinict name">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Location</label>
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
            <div class="row">
              <div class="col-lg-6">
                <h3>Starts</h3>
                  <div class="col-lg-6">
                      <p>Date: <input type="date" name="event_date_starts" id="datepicker"></p>
                    </div>
                    <div class="col-lg-6">
                        <label for="exampleInputEmail1">Time</label>
                        <input type="time" name="event_time_starts" class="form-control" id="exampleInputEmail1" placeholder="am/pm">
                  </div>
              </div>
              <div class="col-lg-6">
                <h3>Ends</h3>
                  <div class="col-lg-6">
                      <p>Date: <input type="date" name="event_date_ends" id="datepicker"></p>
                    </div>
                    <div class="col-lg-6">
                        <label for="exampleInputEmail1">Time</label>
                        <input type="time" name="event_time_ends" class="form-control" id="exampleInputEmail1" placeholder="am/pm">
                  </div>
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Capacity</label>
              <input type="number" name="event_capacity" class="form-control" id="exampleInputEmail1" placeholder="Maximum number of participants">
            </div>

            <div class="form-group">
                <label for="exampleInputFile">Certificate Template</label>
                <input type="file" name="event_certificate" accept="image/*" id="exampleInputFile">
            </div>

              <!-- Rich text editor -->
            <div class="form-group">
                <label for="exampleInputEmail1">Event description</label>
                  <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
              		<textarea class="ckeditor" id="ckedtor" name="ckeditor" placeholder="Describe your event briefly"></textarea>
            </div>

            <div class="form-group">
                <label for="exampleInputFile">Event Photo</label>
                <input type="file" name="event_photo" accept="image/*" id="exampleInputFile">
            </div>

            <br />
            <h1>2. Create Tickets</h1>

            <!-- header -->
            <div class="row">
              <div class="col-lg-5">
                <p>Ticket name*</p>
              </div>
              <div class="col-lg-2">
                <p>Quantitiy available*</p>
              </div>
              <div class="col-lg-3">
                <p>Price</p>
              </div>
              <div class="col-lg-2">
                <p>Actions</p>
              </div>
            </div>
            <!-- konten -->
            <div class="row">
              <div class="col-lg-5">
                <input type="text" name="ticket_name" class="form-control" id="exampleInputEmail1" placeholder="RSVP, Early Bird..">
              </div>
              <div class="col-lg-2">
              <!-- nnti ini di regex biar ga bisa minus -->
                <input type="number" name="ticket_quantity" class="form-control" id="exampleInputEmail1" placeholder="1000">
              </div>
              <div class="col-lg-3">
                <input type="number" name="ticket_price" class="form-control" id="exampleInputEmail1" placeholder="0 for free">
              </div>
              <div class="col-lg-2">
                <a><span data-toggle="collapse" data-target="#setting" class="glyphicon glyphicon-cog" aria-hidden="true"></span></a>
                &nbsp;
                <a><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
              </div>
            </div>
            <div class="row">
              <div id="setting" class="col-lg-12 collapse">
                <br />
                <h4>Settings</h4>
                <hr />
                <div class="form-group">
                  <label for="exampleInputEmail1">Ticket description</label>
                  <input type="text" name="ticket_description" class="form-control" id="exampleInputEmail1" placeholder="Tell your audience more about the ticket">
                </div>
                <div>
                  <label for="exampleInputEmail1">Ticket sale start</label>
                  <br />
                  <input type="date" name="ticket_date_starts" id="datepicker">
                  <input type="time" name="ticket_time_starts" id="exampleInputEmail1" placeholder="am/pm">
                </div>
                <div>
                  <label for="exampleInputEmail1">Ticket sale end</label>
                  <br />
                  <input type="date" name="ticket_date_ends" id="datepicker">
                  <input type="time" name="ticket_time_ends" id="exampleInputEmail1" placeholder="am/pm">
                </div>
              </div>
            </div>

            <br />
            <h1>3. Additional Settings</h1>
            <div>
                <label for="exampleInputEmail1">EVENT TYPE</label>
                <br />
                <select class="selectpicker" name = "event_type">
                  <option>Select Event Type</option>
                  <option>Attraction</option>
                  <option>Camp/Trip</option>
                  <option>Class, Training,or Workshop</option>
                  <option>Concert or Performance</option>
                  <option>Conference</option>
                  <option>Convention</option>
                  <option>Dinner or Gala</option>
                  <option>Festival or Fair</option>
                  <option>Game or Competition</option>
                  <option>Meeting or Networking Event</option>
                  <option>Party or Social Gathering</option>
                  <option>Race or Endurance Event</option>
                  <option>Rally</option>
                  <option>Seminar</option>
                  <option>Tour</option>
                  <option>Tournament</option>
                  <option>Tradeshow or Expo</option>
                  <option>Other</option>
                </select>
            </div>
            <div>
                <label for="exampleInputEmail1">EVENT TOPIC</label>
                <br />
                <select class="selectpicker" name = "event_topic">
                  <option>Select a topic</option>
                  <option>Automotive</option>
                  <option>Business & professional</option>
                  <option>Charity</option>
                  <option>Community & Culture</option>
                  <option>Education</option>
                  <option>Familiy</option>
                  <option>Fashion & Beauty</option>
                  <option>Film, Media & Entertainment</option>
                  <option>Food and Beverage</option>
                  <option>Government & Politics</option>
                  <option>Health & Wellness</option>
                  <option>Hobbies & Special Interest</option>
                  <option>Home & Lifestyle</option>
                  <option>Music</option>
                  <option>Performing & Visual Arts</option>
                  <option>Religion & Spirituality</option>
                  <option>School Activities</option>
                  <option>Science & Technology</option>
                  <option>Holiday</option>
                  <option>Sport & Fitness</option>
                  <option>Travel & Outdoor</option>
                  <option>Other</option>
                </select>
            </div>

            <br />
            <button type="submit" class="btn btn-primary btn-round btn-block">Submit</button>
        </form>
      </div>


      <div class="col-lg-2"></div>
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
