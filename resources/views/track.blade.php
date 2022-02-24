<!doctype html>
<html lang="en">

  <head>
    <title>Track a Shipment | YSG Courier Services - Shipping, Freight Transportation and Logistics</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/aos.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/style.css">

  </head>

  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    

    <div class="site-wrap" id="home-section">

      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>


      <div class="top-bar">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <a href="#" class=""><span class="mr-2  icon-envelope-open-o"></span> <span class="d-none d-md-inline-block">ysgcourierservice906@gmail.com</span></a>
              <span class="mx-md-2 d-inline-block"></span>
              <a href="#" class=""><span class="mr-2  icon-phone"></span> <span class="d-none d-md-inline-block">1+ (518) 978-0920</span></a>


              <div class="float-right">

                <a href="#" class=""><span class="mr-2  icon-twitter"></span> <span class="d-none d-md-inline-block">Twitter</span></a>
                <span class="mx-md-2 d-inline-block"></span>
                <a href="#" class=""><span class="mr-2  icon-facebook"></span> <span class="d-none d-md-inline-block">Facebook</span></a>

              </div>

            </div>

          </div>

        </div>
      </div>

      <header class="site-navbar js-sticky-header site-navbar-target" role="banner">

        <div class="container">
          <div class="row align-items-center position-relative">


            <div class="site-logo">
              <a href="index.html" class="text-black"><span class="text-primary">YSG</a>
            </div>

            <div class="col-12">
              <nav class="site-navigation text-right ml-auto " role="navigation">

                <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
                  <li><a href="#home-section" class="nav-link">Home</a></li>
                  <li><a href="#services-section" class="nav-link">Services</a></li>


                  <li>
                    <a href="#about-section" class="nav-link">About Us</a>
                    
                  </li>

                  <li><a href="#why-us-section" class="nav-link">Why Us</a></li>

                  <li><a href="#testimonials-section" class="nav-link">Testimonials</a></li>
                  <li><a href="#contact-section" class="nav-link">Contact</a></li>
                </ul>
              </nav>

            </div>

            <div class="toggle-button d-inline-block d-lg-none"><a href="#" class="site-menu-toggle py-5 js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

          </div>
        </div>

      </header>




    <div class="site-section bg-light" id="contact-section">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center mb-5" data-aos="fade-up" data-aos-delay="">
            <div class="block-heading-1">
	         <h2>
			 <div class="icon mb-0">
                <span class="flaticon-ship"></span>
              </div>
			 Track a Shipment</h2>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-lg-12" data-aos="fade-up" data-aos-delay="100">
            <form action="#" method="post">
			<?php
			 $tracking = isset($ret['tracking']) ? $ret['tracking'] : [];
			 $shipper = isset($ret['shipper']) ? $ret['shipper'] : [];
			 $receiver = isset($ret['receiver']) ? $ret['receiver'] : [];
			 $history = isset($ret['history']) ? $ret['history'] : [];
			 
			 $bmodes = ['none' => "Select booking mode", 'paid' => "Paid", 'unpaid' => "Unpaid"];
		     $statuses = ['none' => "Select status", 'station' => "ARRIVED AT STATION", 'hold' => "ON HOLD", 'transit' => "IN TRANSIT", 'delivery' => "OUT FOR DELIVERY", 'delivered' => "DELIVERED"];
			
			?>
              <div class="form-group row">
                <div class="col-md-6 mb-4 mb-lg-0">
                  <p class="form-control-plaintext">
				    <strong>Shipper name</strong>: <span style="margin-left: 20px;">{{$shipper['name']}}</span> 
				  </p>
				  <p class="form-control-plaintext">
				    <strong>Shipper phone</strong>: <span style="margin-left: 20px;">{{$shipper['phone']}}</span> 
				  </p>
				  <p class="form-control-plaintext">
				    <strong>Shipper address</strong>: <span style="margin-left: 20px;">{{$shipper['address']}}</span> 
				  </p>
                </div>
                <div class="col-md-6">
                  <p class="form-control-plaintext">
				    <strong>Receiver name</strong>: <span style="margin-left: 20px;">{{$receiver['name']}}</span> 
				  </p>
				  <p class="form-control-plaintext">
				    <strong>Receiver phone</strong>: <span style="margin-left: 20px;">{{$receiver['phone']}}</span> 
				  </p>
				  <p class="form-control-plaintext">
				    <strong>Receiver address</strong>: <span style="margin-left: 20px;">{{$receiver['address']}}</span> 
				  </p>
                </div>
              </div><br>
			  <div class="form-group row">
                <div class="col-md-12 mb-4 mb-lg-0 text-center">
                  <p class="form-control-plaintext" style="background: #ddd;">
				    <strong>Tracking #</strong>: <span style="margin-left: 20px;"><a href="#">{{$tracking['tnum']}}</a></span> 
				  </p>
				  <p class="form-control-plaintext">
				    <strong>Ship Type</strong>: <span style="margin-left: 20px;">{{$tracking['stype']}}</span> 
				  </p>
				  <p class="form-control-plaintext">
				    <strong>Weight</strong>: <span style="margin-left: 20px;">{{$tracking['weight']}}kg</span> 
				  </p>
				  <p class="form-control-plaintext">
				    <strong>Origin office</strong>: <span style="margin-left: 20px;">{{$tracking['origin']}}</span> 
				  </p>
				  <p class="form-control-plaintext">
				    <strong>Destination office</strong>: <span style="margin-left: 20px;">{{$tracking['dest']}}</span> 
				  </p>
				  <p class="form-control-plaintext">
				    <strong>Date issued</strong>: <span style="margin-left: 20px;">{{$tracking['date']}}</span> 
				  </p>
				  <p class="form-control-plaintext">
				    <strong>Pickup date</strong>: <span style="margin-left: 20px;">{{$tracking['pickup_at']}}</span> 
				  </p>
				  <p class="form-control-plaintext">
				    <strong>Booking mode</strong>: <span style="margin-left: 20px;"><span class="badge badge-success text-white text-uppercase" style="margin: 8px;">{{$bmodes[$tracking['bmode']]}}</span> </span> 
				  </p>
				  <p class="form-control-plaintext">
				    <strong>Total freight</strong>: <span style="margin-left: 20px;">${{number_format($tracking['freight'],2)}}</span> 
				  </p><p class="form-control-plaintext">
				    <strong>Mode</strong>: <span style="margin-left: 20px;">{{$tracking['mode']}}</span> 
				  </p><p class="form-control-plaintext">
				  
				    <strong>Status</strong>: <span style="margin-left: 20px;"><span class="badge badge-primary" style="margin: 8px;">{{$statuses[$tracking['status']]}}</span></span> 
				  </p><p class="form-control-plaintext" style="background: #ddd;">
				    <strong>Description</strong>: <span style="margin-left: 20px;">{{$tracking['desc']}}</span> 
				  </p>
                </div>
              </div><br><br>
			  <div class="form-group row">
                <div class="col-md-12 mb-4 mb-lg-0 text-center">
				   <div class="block-heading-1">
	                 <h3>Shipment Travel History</h3>
                  </div>
				   <div class="table-responsive">
				    <table class="table">
					  <thead>
					    <tr>
						  <th>Tracking #</th>
						  <th>Location</th>
						  <th>Status</th>
						  <th>Date/Time</th>
						  <th>Remarks</th>
						</tr>
					  </thead>
					  <tbody>
					    @foreach($history as $h)
						 <tr>
						   <td>{{$h['tnum']}}</td>
						   <td>{{$h['location']}}</td>
						   <td>{{$statuses[$h['status']]}}</td>
						   <td>{{$h['date']}}</td>
						   <td>{{$h['remarks']}}</td>
						 </tr>
						@endforeach
					  </tbody>
					</table>
				   </div>
				</div>
			  </div>
			  
            </form>
          </div>
          
        </div>
      </div>
    </div>


    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-7">
                <h2 class="footer-heading mb-4">About Us</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum voluptate debitis voluptatum et dolorum.</p>
              </div>
              <div class="col-md-4 ml-auto">
                <h2 class="footer-heading mb-4">Features</h2>
                <ul class="list-unstyled">
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Testimonials</a></li>
                  <li><a href="#">Terms of Service</a></li>
                  <li><a href="#">Privacy</a></li>
                  <li><a href="#">Contact Us</a></li>
                </ul>
              </div>

            </div>
          </div>
          <div class="col-md-4 ml-auto">

            <div class="mb-5">
              <h2 class="footer-heading mb-4">Subscribe to Newsletter</h2>
              <form action="#" method="post" class="footer-suscribe-form">
                <div class="input-group mb-3">
                  <input type="text" class="form-control border-secondary text-white bg-transparent" placeholder="Enter Email" aria-label="Enter Email" aria-describedby="button-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-primary text-white" type="button" id="button-addon2">Subscribe</button>
                  </div>
                </div>
            </div>


            <h2 class="footer-heading mb-4">Follow Us</h2>
            <a href="#about-section" class="smoothscroll pl-0 pr-3"><span class="icon-facebook"></span></a>
            <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
            <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
            <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
            </form>
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
              <p>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright YSG&copy;<script>document.write(new Date().getFullYear());</script> All rights reserved</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
          </div>

        </div>
      </div>
    </footer>

    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/aos.js"></script>

    <script src="js/main.js"></script>


  </body>

</html>
