<?php include('db_connect.php') ?>
<?php
$twhere ="";
if($_SESSION['login_type'] != 1)
  $twhere = "  ";
?>

<link rel="shortcut icon" href="/primedepot/assets/img/logo.png" type="image/x-icon">
<!-- Info boxes -->
<?php if($_SESSION['login_type'] == 1): ?>
        <div class="row">
          <div class="col-12 col-sm-6 col-md-4">
            <div class="small-box bg-light shadow-sm border">
              <div class="inner">
                <h3><?php echo $conn->query("SELECT * FROM branches")->num_rows; ?></h3>

                <p>Total Branches</p>
              </div>
              <div class="icon">
                <i class="fa fa-building"></i>
              </div>
            </div>
          </div>
           <div class="col-12 col-sm-6 col-md-4">
            <div class="small-box bg-light shadow-sm border">
              <div class="inner">
                <h3><?php echo $conn->query("SELECT * FROM parcels")->num_rows; ?></h3>

                <p>Total Orders</p>
              </div>
              <div class="icon">
                <i class="fa fa-boxes"></i>
              </div>
            </div>
          </div>
           <div class="col-12 col-sm-6 col-md-4">
            <div class="small-box bg-light shadow-sm border">
              <div class="inner">
                <h3><?php echo $conn->query("SELECT * FROM users where type != 1")->num_rows; ?></h3>

                <p>Total Staff</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
            </div>
          </div>
          <hr>
          <?php 
              $status_arr = array("Item Accepted by Strore","Collected","Shipped","In-Transit","Arrived At Destination","Out for Delivery","Ready to Pickup","Delivered","Picked-up","Unsuccessfull Delivery Attempt");
               foreach($status_arr as $k =>$v):
          ?>
          <div class="col-12 col-sm-6 col-md-4">
            <div class="small-box bg-light shadow-sm border">
              <div class="inner">
                <h3><?php echo $conn->query("SELECT * FROM parcels where status = {$k} ")->num_rows; ?></h3>

                <p><?php echo $v ?></p>
              </div>
              <div class="icon">
                <i class="fa fa-boxes"></i>
              </div>
            </div>
          </div>
            <?php endforeach; ?>
      </div>
      <?php else: ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>PRIME DEPOT | Home page</title>
        <meta name="description" content="GARO is a real-estate template">
        <meta name="author" content="Kimarotec">
        <meta name="keyword" content="html5, css, bootstrap, property, real-estate theme , bootstrap template">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800' rel='stylesheet' type='text/css'>

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="icon" href="favicon.ico" type="image/x-icon">

        <link rel="stylesheet" href="assets/css/normalize.css">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/fontello.css">
        <link href="assets/fonts/icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet">
        <link href="assets/fonts/icon-7-stroke/css/helper.css" rel="stylesheet">
        <link href="assets/css/animate.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" href="assets/css/bootstrap-select.min.css"> 
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/icheck.min_all.css">
        <link rel="stylesheet" href="assets/css/price-range.css">
        <link rel="stylesheet" href="assets/css/owl.carousel.css">  
        <link rel="stylesheet" href="assets/css/owl.theme.css">
        <link rel="stylesheet" href="assets/css/owl.transitions.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/responsive.css">
    </head>
    <body>

        <div id="preloader">
            <div id="status">&nbsp;</div>
        </div>
        <!-- Body content -->

        <style>
    .hidden {
      display: none;
    }
  </style>
</head>
<body>
  <div id="welcomeMessage" class="col-12 card hidden">
    <div class="card-body">
      <?php if ($_SESSION['login_type'] == 1): ?>
        <p>Welcome Admin: <?php echo $_SESSION['login_name'] ?></p>
      <?php elseif ($_SESSION['login_type'] == 2): ?>
        <p>Welcome Customer: <?php echo $_SESSION['login_name'] ?></p>
      <?php elseif ($_SESSION['login_type'] == 3): ?>
        <p>Welcome Staff: <?php echo $_SESSION['login_name'] ?></p>
      <?php endif; ?>
    </div>
  </div>

  <script>
    function hideWelcomeMessage() {
      document.getElementById('welcomeMessage').classList.add('hidden');
    }

    function showWelcomeMessage() {
      document.getElementById('welcomeMessage').classList.remove('hidden');
    }

    // Example: Hide the message on page load
    window.onload = function() {
      hideWelcomeMessage();
    };
  </script>

        <div class="header-connect">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-sm-8  col-xs-12">
                        <div class="header-half header-call">
                            <p>
                                <span><i class="pe-7s-call"></i> 0927 857 5992 </span>
                                <span><i class="pe-7s-mail"></i> primedepothardware@gmail.com</span>
                            </p>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>            
        <!--End top header -->

        <div class="slider-area">
            <div class="slider" style="background: #494C53;">
                <div id="bg-slider" class="owl-carousel owl-theme" >
                    <div class="item"><img src="assets/img/slide1/cover1.jpg" class="responsive-img" style=" opacity: 0.8;" alt="1"></div> 

                </div>
                <style>
                  .item {
                          width: 100%;
                          height: auto; /* Adjusts height to maintain aspect ratio */
                          position: relative;
                          object-fit: cover; 
                        }

                        .responsive-img {
                          width: 100%;
                          height: auto; /* Maintain aspect ratio */
                          opacity: 0.8;
                          display: block;
                          object-fit: cover; /* Ensures the image covers the container */
                        }
                </style>

<script>

  // Ensure the image resizes automatically on window resize
  window.addEventListener('resize', function() {
    const container = document.querySelector('.container');
    const item = container.querySelector('.item');
    const img = item.querySelector('.responsive-img');
    
    img.style.width = '100%';
    img.style.height = 'auto';
  });
</script>
            </div>
            <div class="container slider-content">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12">
                        <h2>Build your Dream at Prime Depot Hardware!</h2>
                        <p style="color:white;">We offer a wide variety of Hardware and Construction Supplies, Steel, Lumber, Plywood, Boysen and Davies Paints, Tiles and Home Finishing Materials! </p>
                       
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- property area -->
        <div class="content-area recent-property" style="padding-bottom: 60px; background-color: rgb(252, 252, 252);">
    <div class="container">   
        <div class="row">
            <div class="col-12 padding-top-40 properties-page">
                <div class="col-12"> 
                    <div class="page-subheader sorting pl-0">

                        <div class="items-per-page">
                            <!-- Items per page content -->
                        </div><!--/ .items-per-page-->
                    </div>

                </div>
                <div class="col-12">
                   <!-- Any additional content can go here -->
                </div>

                <div class="col-12">
                    <?php
                        // Fetch the logged-in user's first name and last name
                        $user_id = $_SESSION['login_id'];
                        $user = $conn->query("SELECT firstname, lastname FROM users WHERE id = '$user_id'")->fetch_assoc();
                        $fullname = $user['firstname'] . ' ' . $user['lastname'];

                        // Fetch the parcels with matching recipient_name
                        $parcels = $conn->query("SELECT reference_number FROM parcels WHERE recipient_name = '$fullname'");
                    ?>

                    <?php if ($_SESSION['login_type'] == 2): ?>
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Your Order List</h3>
                            </div>
                            <div class="card-body">
                                <?php if ($parcels->num_rows > 0): ?>
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Reference Number (Copy this and Enter it to tracking number to track your order!)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while($row = $parcels->fetch_assoc()): ?>
                                                <tr>
                                                    <td><?php echo $row['reference_number'] ?></td>
                                                </tr>
                                            <?php endwhile; ?>
                                        </tbody>
                                    </table>
                                <?php else: ?>
                                    <p>Order is not processed or you don't have any orders yet.</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div> 
            </div>  
        </div>
    </div>
</div>


          <!-- Footer area-->
        <div class="footer-area">

            <div class=" footer">
                <div class="container">
                    <div class="row">

                        <div class="col-md-3 col-sm-6 wow fadeInRight animated">
                            <div class="single-footer">
                                <h4>About Company </h4>
                                <div class="footer-title-line"></div>

                                <img src="assets/img/logo.png" alt="" class="wow pulse" data-wow-delay="1s">
                                <p>BUILD YOUR DREAM AT PRIME DEPOT HARDWARE!</p>
                                <ul class="footer-adress">
                                    <li><i class="pe-7s-map-marker strong"> </i> Anilao Circumferencial Road, Intersection, Mabini, Philippines</li>
                                    <li><i class="pe-7s-mail strong"> </i> primedepothardware@gmail.com</li>
                                    <li><i class="pe-7s-call strong"> </i> 0927 857 5992</li>
                                </ul>
                                <div class="social pull-left"> 
                                    <ul>
                                        <li><a class="wow fadeInUp animated" href="https://twitter.com/kimarotec"><i class="fa fa-twitter"></i></a></li>
                                        <li><a class="wow fadeInUp animated" href="https://www.facebook.com/primedepothardware" data-wow-delay="0.2s"><i class="fa fa-facebook"></i></a></li>
                                    </ul> 
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 wow fadeInRight animated">
                            <div class="single-footer">
                                <h4>Quick links </h4>
                                <div class="footer-title-line"></div>
                                <ul class="footer-menu">
                                    <li><a href="index.php.php">Home</a>  </li> 
                                    <li><a href="about.php">About Us</a>  </li> 
                                    <li><a href="contact.php">Contact us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

         
        </div>
          
       
          <script src="assets/js/modernizr-2.6.2.min.js"></script>

        <script src="assets/js/jquery-1.10.2.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/bootstrap-select.min.js"></script>
        <script src="assets/js/bootstrap-hover-dropdown.js"></script>

        <script src="assets/js/easypiechart.min.js"></script>
        <script src="assets/js/jquery.easypiechart.min.js"></script>

        <script src="assets/js/owl.carousel.min.js"></script>   
        <script src="assets/js/wow.js"></script>

        <script src="assets/js/icheck.min.js"></script>
        <script src="assets/js/price-range.js"></script>

        <script src="assets/js/main.js"></script>
       
    </body>
</html>


<?php endif; ?>
