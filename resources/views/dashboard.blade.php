@extends('layout',['ht' => 's2'])

@section('title',"Dashboard")


@section('slider')
@include('slider-2',['title' => "Dashboard"])
@stop


@section('content')

	<section class="ls s-pt-50 s-pb-100">
				<div class="container">
					<div class="row">

						<div class="d-none d-lg-block divider-50"></div>

						<main class="col-lg-12 animate" data-animation="fadeInUp" data-delay="150">

							<article>
								<header class="entry-header">
									<h1 class="entry-title">My account</h1>
									<span class="edit-link">
										<a class="post-edit-link" href="{{url('edit-profile')}}">Edit
											<span class="screen-reader-text"> "My account"</span>
										</a>
									</span>
								</header>
								<!-- .entry-header -->
								<div class="entry-content">
									<div class="woocommerce">
										<nav class="woocommerce-MyAccount-navigation">
											<ul>
												<li class="is-active">
													<a href="shop-account-dashboard.html">Dashboard</a>
												</li>
												<li>
													<a href="{{url('new-campaign')}}">Create a new campaign</a>
												</li>
												<li>
													<a href="{{url('transactions')}}">Transactions</a>
												</li>
												<li>
													<a href="{{url('locations')}}">View locations</a>
												</li>
												<li>
													<a href="{{url('edit-profile')}}">Account details</a>
												</li>
												<li>
													<a href="shop-account-login.html">Logout</a>
												</li>
											</ul>
										</nav>


										<div class="woocommerce-MyAccount-content">

											<p>Hello
												<strong>{{$user->username}}</strong> (not
												<strong>{{$user->username}}</strong>?
												<a href="{{url('logout')}}">Log out
												</a>)
											</p>

											<p>From your account dashboard you can view your
												<a href="#">recent ad campaigns</a>, view
												<a href="#">real-time statistics for your live ads</a> and
												<a href="#">edit your password and account details</a>.
											</p><br>
											
                                            <div class="row">
											    <div class="col-lg-12">
												    <h4 class="text-info">At a Glance</h4>
												</div>
											    <div class="col-lg-6">
												   <div class="card">
										              <div class="card-body">
											            <h4 class="card-title">10</h4>
											            <p class="card-text">
												           Live ads on your account.
											            </p>
											            <p class="card-text">
											            	<a href="#" class="btn btn-info" title="see more">See more</a>
											            </p>
										              </div>
									               </div>
												</div>
											    <div class="col-lg-6">
												   	<div class="card">
										              <div class="card-body">
											            <h4 class="card-title">10</h4>
											            <p class="card-text">
												           Live ads on your account.
											            </p>
											            <p class="card-text">
											            	<a href="#" class="btn btn-info" title="see more">See more</a>
											            </p>
										              </div>
									               </div>
												</div>
												<div class="col-lg-6">
												   <div class="card">
										              <div class="card-body">
											            <h4 class="card-title">10</h4>
											            <p class="card-text">
												           Live ads on your account.
											            </p>
											            <p class="card-text">
											            	<a href="#" class="btn btn-info" title="see more">See more</a>
											            </p>
										              </div>
									               </div>
												</div>
											    <div class="col-lg-6">
												   	<div class="card">
										              <div class="card-body">
											            <h4 class="card-title">10</h4>
											            <p class="card-text">
												           Live ads on your account.
											            </p>
											            <p class="card-text">
											            	<a href="#" class="btn btn-info" title="see more">See more</a>
											            </p>
										              </div>
									               </div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- .entry-content -->
							</article>

						</main>

						<div class="d-none d-lg-block divider-75"></div>
					</div>

				</div>
			</section>
@stop

