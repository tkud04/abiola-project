@extends('layout',['ht' => 's2'])

@section('title',"Pricing")


@section('slider')
@include('slider-2',['title' => "Pricing"])
@stop


@section('content')

			<section class="ls s-pt-30 s-pb-130 s-pt-lg-50 s-pb-lg-100 pricing-page">
				<div class="container">
					<div class="row c-mb-50">
						<div class="divider-70 d-none d-lg-block"></div>
						<div class="col-lg-4 col-md-12">

							<div class="pricing-plan color1 ls ms">
								<div class="plan-name">
									<h3>
										Startup Plan
									</h3>
								</div>
								<div class="price-wrap color-darkgrey">
									<span class="plan-sign">&#8358;</span>
									<span class="plan-price">49</span>
									<span class="plan-decimals">.95</span>
								</div>
								<div class="plan-description color-darkgrey">
									Starting Business
								</div>
								<div class="plan-features">
									<ul class="list-bordered">
										<li>Lorem ipsum dolor</li>
										<li>Consetetur sadipscing</li>
										<li>Sed diam nonumy</li>
										<li>Eirmod tempor</li>
										<li>Invidunt laboret dolore</li>
									</ul>
								</div>
								<div class="plan-button">
									<a href="#" class="btn inverse-color1">get started</a>
								</div>
							</div>

						</div>


						<div class="col-lg-4 col-md-12">

							<div class="pricing-plan plan-featured color2">
								<div class="plan-name">
									<h3>
										Business Plan
									</h3>
								</div>
								<div class="price-wrap color-light">
									<span class="plan-sign">&#8358;</span>
									<span class="plan-price">99</span>
									<span class="plan-decimals">.95</span>
								</div>
								<div class="plan-description color-light">
									For Any Business
								</div>
								<div class="plan-features">
									<ul class="list-bordered">
										<li>Magna aliquyam erat</li>
										<li>Sed diam voluptua</li>
										<li>At vero eos et accusam</li>
										<li>Justo duo dolores</li>
										<li>Stet clita kasd gubergren</li>
										<li>No sea takimata</li>
									</ul>
								</div>
								<div class="plan-button">
									<a href="#" class="btn inverse-color2">get started</a>
								</div>
							</div>

						</div>

						<div class="col-lg-4 col-md-12 mx-sm-auto">

							<div class="pricing-plan color3 ls ms">
								<div class="plan-name">
									<h3>
										Expert Plan
									</h3>
								</div>
								<div class="price-wrap color-darkgrey">
									<span class="plan-sign">&#8358;</span>
									<span class="plan-price">199</span>
									<span class="plan-decimals">.95</span>
								</div>
								<div class="plan-description color-darkgrey">
									Higher Business
								</div>
								<div class="plan-features">
									<ul class="list-bordered">
										<li>Sanctus est ipsum</li>
										<li>Dolor sit amet lorem ipsum</li>
										<li>Dolor amet consetetur</li>
										<li>Sadipscing elitr</li>
										<li>Diam nonumy eirmod</li>
									</ul>
								</div>
								<div class="plan-button">
									<a href="#" class="btn inverse-color3">get started</a>
								</div>
							</div>

						</div>

						<div class="divider-80 d-none d-lg-block"></div>
					</div>
				</div>
			</section>
@stop

