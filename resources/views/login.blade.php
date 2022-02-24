@extends('layout',['ht' => 's2'])

@section('title',"Login")


@section('slider')
@include('slider-2',['title' => "Sign in"])
@stop


@section('content')

		<section class="ls s-pt-50 s-pb-100 shop_account_login">
				<div class="container">
					<div class="row">

						<div class="d-none d-lg-block divider-65"></div>

						<main class="col-lg-12">
							<article class="text-center">
								<!-- .entry-header -->
								<div class="entry-content">
									<div class="woocommerce">

										<!--
			<div class="woocommerce-message">Are you sure you want to log out? <a
				href="shop-account-login.html">Confirm and log out</a>
			</div>
			-->

										<form action="{{url('login')}}" class="woocomerce-form woocommerce-form-login login form-control1" method="post">
										{!! csrf_field() !!}
											<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
												<label for="username">
												</label>
												<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="id" id="id" placeholder="Username or email address" value="">
											</p>
											<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
												<label for="password">
												</label>
												<input class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="pass" placeholder="Password" id="password">
											</p>

											<p class="form-row">
												<input type="submit" class="woocommerce-Button button" name="login" value="Login">
												<label class="woocommerce-form__label woocommerce-form__label-for-checkbox inline">
													<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="remember" type="checkbox" id="rememberme" value="forever">
													<span>Remember me</span>
												</label>
											</p>
											<p class="woocommerce-LostPassword lost_password">
												<a href="{{url('forgot-password')}}">Lost your password?</a>
											</p>

										</form>
									</div>
								</div>
								<!-- .entry-content -->
							</article>


						</main>

						<div class="d-none d-lg-block divider-95"></div>
					</div>

				</div>
			</section>
@stop

