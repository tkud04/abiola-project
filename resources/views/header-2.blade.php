

			<!-- header with three Bootstrap columns - left for logo, center for navigation and right for includes-->
			<header class="page_header ds">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-xl-2 col-lg-3 col-11">
							<a href="./" class="logo text-center">
								<span style="color: #fff; padding: 10px; font-size: 30px;"><i class="fa fa-tv"></i> MTB</span>
							</a>
						</div>
						<div class="col-xl-8 col-lg-6 col-1 text-sm-center">
							<!-- main nav start -->
							 @include('nav')
							<!-- eof main nav -->
						</div>
						<div class="col-xl-2 col-lg-3 text-lg-left text-xl-right d-none d-lg-block">
							<div class="header_phone">
								<h6>
									<span>0706</span>1234567
								</h6>
							</div>
						</div>
						<!-- <div class="search_modal affix-top">
                <a href="#" class="search_modal_button header-button">
                    <i class="fa fa-search"></i>
                </a>
            </div> -->
					</div>
				</div>
				<!-- header toggler -->
				<span class="toggle_menu">
					<span></span>
				</span>
			</header>