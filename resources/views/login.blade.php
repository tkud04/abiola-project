@extends('layout')

@section('title',"Sign Up")

@section('content')

@include('banner-2',['class' => "signup", 'title' => "Sign up"])

<section class="signup-area">
<div class="container">
<div class="row align-items-center">
<div class="col-lg-6">
<div class="signup-form">
<h2>Welcome Back!</h2>
<form>
<div class="row">
<div class="col-lg-12">
<div class="form-group">
<input type="text" class="form-control" name="fname" placeholder="User name">
</div>
</div>
<div class="col-lg-12">
<div class="form-group">
<input type="password" class="form-control" placeholder="Password">
</div>
</div>
<div class="col-lg-12">
<a href="signup.html" class="box-btn">
Sign In
</a>
</div>
<span class="already">New to Edvi! <a href="signup.html">Sign Up</a></span>
</div>
</form>
</div>
</div>
<div class="col-lg-6">
<div class="sign-up-img">
<img src="assets/images/signup.svg" alt="singup">
</div>
</div>
</div>
</div>
</section>

@stop