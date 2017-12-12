<?php
  require_once('../backend/certificate_mantab.php');

  if (isset($_GET['Message'])) {
    print '<script type="text/javascript">alert("' . $_GET['Message'] . '");';
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
        <div class="col-lg-6">
          <h1>Nama Acara</h1>
          <p>Tanggal Acaranya</p>
        </div>
        <div class="col-lg-4"></div>
        <div class="col-lg-2">
          <h2 class="text-center"><span class="text-center label label-dark">Create Certificate</span></h2>
        </div>
      </div>
    <!-- tabs -->


    <!-- Search -->
  <div class="container">
    <div class="row">
      <div class="col-lg-4"></div>
      <div class="col-lg-4">
      </div>
      <div class="col-lg-4"></div>
    </div>
  </div>

  
  <?php if(isset($_GET['Message'])){ ?>
      <br />
      <br />
      <hr />
      <div class="container" >
        <a href="../event_detail" class="btn btn-primary btn-round btn-lg btn-block">Skip To View Event Detail</a>
      </div>
      <script>
        window.alert("Create Event Success");
      </script>
      <hr />
      <br />
      <br />
    <?php }?>
  
  <br />
  <br />

  


    <div class="container">
      <h2>Choose Template</h2>
      <hr />
      <div class="row">
              <!-- selected img -->
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
              <div class="col-lg-4 template_certificate">
                <a id="temp1" href="#">
                  <img src="../../images/certificate_temp_1.jpg" alt="template1" class="img-responsive hover" />
                </a>
              </div>
              <div class="col-lg-4 template_certificate">
              <a id="temp2" href="#">
                <img src="../../images/certificate_temp_2.jpg" alt="template2" class="img-responsive hover" />
              </a>
              </div>
              <div class="col-lg-4 template_certificate">
              <a id="temp3" href="#">
                <img src="../../images/certificate_temp_3.jpg" alt="template3" class="img-responsive hover" />
              </a>
              </div>
          </div>
          <script>
          $('.template_certificate').click(function() {
            $(this).toggleClass('selected_certificate')
              .siblings().removeClass('selected_certificate')
          });


          $(document).ready(function(){
              $("#temp1").click(function(){
                $('.nav-tabs a[href="#pick"]').tab('show')
                // ambil id templatenya disini
                  $_SESSION['temp']=1;

                //
              });
              $("#temp2").click(function(){
                $('.nav-tabs a[href="#pick"]').tab('show')
                // ambil id templatenya disini
                $_SESSION['temp']=2;


                //
              });
              $("#temp3").click(function(){
                $('.nav-tabs a[href="#pick"]').tab('show')
                // ambil id templatenya disini
                $_SESSION['temp']=3;


                //
              });
          });
          </script>

      <h2>Pick Design</h2>
      <hr />
      <div class="row">
              <div class="col-lg-2"></div>
              <div class="col-lg-8">
                <form id="form1" runat="server">
                    <input type='file' id="my_file" name="my_file"/>
                    <img id="blah" src="#" onError="this.onerror=null;this.src='../../images/certificate_default.jpg';" class="img-responsive" />
                </form>
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
              </div>
              <div class="col-lg-2"></div>
          </div>
        </div>

        
        
      <br />
      <br />
      <br />  
      <h2>Font</h2>
      <hr />
      <div class="row text-center">
        <div class="col-lg-6">
                    <br />
                    <h4>Choose Font Color</h4>
                    <br />
                    <h4>Choose Font Style</h4>
                    <br />
                    <h4>Choose Font Size</h4>
        </div>
        <div class="col-lg-6 text-left">
                    <br />
                    <input type="color" id="html5colorpicker" onchange="clickColor(0, -1, -1, 5)" value="#fff" style="width:100%;">
                    <br />
                    <br />
                    <input id="font" type="text"/>
                    
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>
                    <link rel="stylesheet" type="text/css" href="../../css/fontselect-default.css" />
                    <script src="../../js/jquery.fontselect.js"></script>
                    <script>
                      $(function(){
                        $('#font').fontselect();
                      });
                    </script>

                    <br />
                    <br />
                    <select class="selectpicker" name=date_categorized>
                      <option value="12">12</option>
                      <option value="14">14</option>
                      <option value="16">16</option>
                      <option value="18">18</option>
                      <option value="20">20</option>
                      <option value="22">22</option>
                      <option value="24">24</option>
                      <option value="26">26</option>
                      <option value="28">28</option>
                      <option value="36">36</option>
                      <option value="48">48</option>
                      <option value="72">72</option>
                    </select>
        </div>
      </div>
      <br />
      <br />
      <br /> 

      <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
          <button type="button" class="btn btn-info btn-lg btn-block" data-toggle="modal" data-target="#myModal">Preview</button>  
          <!-- Modal Preview -->
          <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-body">
                  <img src="../../images/certificate_default_preview.jpg" alt="template2" class="img-responsive hover" />
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger btn-block" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4"></div>
      </div>
      
      <div class="container row text-left">
        <br />
        <br />
        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#generateModal">Generate & Send</button>
        <!-- Modal Generate -->
        <div class="modal fade" id="generateModal" role="dialog">
            <div class="modal-dialog modal-sm">
              <div class="modal-content">
                <div class="modal-body">
                  <p>Generate only available after or during event</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger btn-block" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
      </div>

        
        <!-- <div id="preview" class="tab-pane fade">
          <br />
          <div class="row">
              <div class="col-lg-2">
              </div>
              <div class="col-lg-8">
              <a id="temp2" href="#">
                
              </a>
              <p>kalo di click nnti nge zoom kayaknya keren</p>
              </div>
              <div class="col-lg-2">
              </div>
          </div> -->    

  <!-- footer -->
  <footer>
    <hr />
    <div class="container">
      <p class="text-center">Copyright @GoEvent   HVSZ 2017</p>
    </div>
  </footer>

</body>
</html>
