
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
	<title>@yield('title') – Pharmaceutical Marketing Services in Nigeria</title>
	<meta charset="utf-8">
	<!--[if IE]>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<![endif]-->
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/animations.css">
	<link rel="stylesheet" href="css/font-awesome.css">
	<link rel="stylesheet" href="css/main.css" class="color-switcher-link">
	<link rel="stylesheet" href="css/shop.css">
	<script src="js/vendor/modernizr-2.6.2.min.js"></script>

	<!--[if lt IE 9]>
		<script src="js/vendor/html5shiv.min.js"></script>
		<script src="js/vendor/respond.min.js"></script>
		<script src="js/vendor/jquery-1.12.4.min.js"></script>
	<![endif]-->

</head>

<body>
	<!--[if lt IE 9]>
		<div class="bg-danger text-center">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/" class="color-main">upgrade your browser</a> to improve your experience.</div>
	<![endif]-->

	<div class="preloader">
		<div class="preloader_image"></div>
	</div>

	<!-- search modal -->
	<div class="modal" tabindex="-1" role="dialog" aria-labelledby="search_modal" id="search_modal">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		<div class="widget widget_search">
			<form method="get" class="searchform search-form" action="/">
				<div class="form-group">
					<input type="text" value="" name="search" class="form-control" placeholder="Search keyword" id="modal-search-input">
				</div>
				<button type="submit" class="btn">Search</button>
			</form>
		</div>
	</div>

	<!-- Unyson messages modal -->
	<div class="modal fade" tabindex="-1" role="dialog" id="messages_modal">
		<div class="fw-messages-wrap ls p-normal">
			<!-- Uncomment this UL with LI to show messages in modal popup to your user: -->
			<!--
		<ul class="list-unstyled">
			<li>Message To User</li>
		</ul>
		-->

		</div>
	</div>
	<!-- eof .modal -->
    <!-- wrappers for visual page editor and boxed version of template -->
	<div id="canvas">
		<div id="box_wrapper">

			<!-- template sections -->

			@if(isset($ht) && $ht == 's2')
				@include('header-2',['user' => $user])
			@else
				@include('header-1',['user' => $user])
			@endif
		
		 <!--------- Session notifications-------------->
        	<?php
               $pop = ""; $val = "";
               
               if(isset($signals))
               {
                  foreach($signals['okays'] as $key => $value)
                  {
                    if(session()->has($key))
                    {
                  	$pop = $key; $val = session()->get($key);
                    }
                 }
              }
              
             ?> 

                 @if($pop != "" && $val != "")
                   @include('session-status',['pop' => $pop, 'val' => $val])
                 @endif
        	
					 
		  @yield('slider')
		  
		  <!--------- Input errors -------------->
                    @if (count($errors) > 0)
                          @include('input-errors', ['errors'=>$errors])
                     @endif 
		  
		  @yield('content')
		  
<section class="s-pt-50 s-pb-100 s-pt-lg-30 s-pb-lg-75 ls ms teaser-contact-icon main-icon s-parallax" id="contact">
				<div class="corner corner-inverse"></div>
				<div class="text-center img-wrap col-md-12">
					<img src="img/dark_line_short.png" alt="">
				</div>
				<div class="container">
					<div class="divider-10 d-none d-xl-block"></div>
					<div class="row c-mb-50 c-mb-lg-0">
						<div class="col-lg-4 text-center">
							<div class="border-icon">
								<div class="teaser-icon">
									<img src="images/icon1.png" alt="">
								</div>
							</div>
							<h6>
								Call Us
							</h6>
							<p>
								<strong>Support:</strong> (234) 706 123 4567
							</p>
						</div>
						<div class="col-lg-4 text-center">
							<div class="border-icon">
								<div class="teaser-icon">
									<img src="images/icon3.png" alt="">
								</div>
							</div>
							<h6>
								Write Us
							</h6>
							<p>
								suppport@mtb.com
								
							</p>
						</div>
						<div class="col-lg-4 text-center">
							<div class="border-icon">
								<div class="teaser-icon">
									<img src="images/icon2.png" alt="">
								</div>
							</div>
							<h6>
								Visit Us
							</h6>
							<p>
								15 Admiralty Way
								<br> Lekki,Lagos NG
							</p>
						</div>
					</div>
					<div class="divider-30 d-none d-lg-block"></div>
					<div class="text-center img-wrap col-md-12 layout-2">
						<img src="img/dark_line_short.png" alt="">
					</div>
				</div>
				<div class="divider-10"></div>
			</section>


			<footer class="page_footer corner-footer ds s-pt-30 s-pb-0 s-pb-lg-10 s-pb-xl-50 c-gutter-60 s-parallax">

				<div class="container">
					<div class="container">
						<div class="row">
							<div class="divider-20 d-none d-xl-block"></div>
							<div class="col-md-12 mt-4 text-center animate" data-animation="fadeInUp">
								<!--<img class="margin-negative" src="images//footer_logo.png" alt="">-->
								<span style="color: #fff; padding: 10px; font-size: 90px;"><i class="fa fa-tv"></i> MTB</span>
								<div class="widget widget_social_buttons">
									<a href="#https://www.facebook.com/#" class="fa fa-facebook color-icon" title="facebook"></a>
									<a href="#https://www.twitter.com/#" class="fa fa-twitter color-icon" title="twitter"></a>
									<a href="#https://www.instagram.com/#" class="fa fa-instagram color-icon" title="instagram"></a>
									<a href="#https://www.linkedin.com/#" class="fa fa-linkedin color-icon" title="linkedin"></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</footer>


			<section class="page_copyright light-copy cs s-py-20 s-py-lg-5 s-parallax copyright">
				<div class="container">
					<div class="row align-items-center">
						<div class="divider-20 d-none d-lg-block"></div>
						<div class="col-md-12 text-center">
							<p>&copy; Copyright MTB
								<span class="copyright_year"><script>document.write(new Date().getFullYear())</script></span>, all rights reserved | <i class="fa fa-bolt"></i> Powered by <a href="#">Disenado NG</a></p>
						</div>
						<div class="divider-20 d-none d-lg-block"></div>
					</div>
				</div>
			</section>


		</div>
		<!-- eof #box_wrapper -->
	</div>
	<!-- eof #canvas -->


	<script src="js/compressed.js"></script>
	<script src="js/main.js"></script>

</body>

</html>