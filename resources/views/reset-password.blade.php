@extends('layout',['ht' => 's2'])

@section('title',"Forgot Password?")


@section('slider')
@include('slider-2',['title' => "Forgot Password?"])
@stop


@section('content')

		<section class="ls s-pt-50 s-pb-100">
				<div class="container">
					<div class="row">

						<div class="d-none d-lg-block divider-55 shop-account-password-reset"></div>

						<main class="col-lg-12">
							<form  action="{{url('forgot-password')}}" method="post" class="woocommerce-ResetPassword lost_reset_password text-center">
                               {!! csrf_field() !!}
								<p>Lost your password? Please enter your username or email address. You will receive a link to create a new password via email.</p>

								<div class="d-none d-lg-block divider-20"></div>
								<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first form-control1">
									<label for="user_login"></label>
									<input class="woocommerce-Input woocommerce-Input--text input-text" type="text" name="login" placeholder="Username or email" id="user_login">
								</p>

								<div class="clear"></div>


								<p class="woocommerce-form-row form-row">
									<input type="submit" class="woocommerce-Button button" value="Reset password">
								</p>

							</form>


						</main>

						<div class="d-none d-lg-block divider-65"></div>
					</div>

				</div>
			</section>
@stop

