@extends('layout')

@section('title',"Dashboard")

@section('content')
<?php
$pu = url('profile');
?>

@include('banner-2',['class' => "terms", 'title' => "Teacher Dashboard"])
<section class="service-area"> 
<div class="container">
<div class="row">
<div class="col-lg-6 col-sm-6" onclick="window.location='{{$pu}}';">

<div class="single-service text-center">
<div class="service-icon">
<i class="flaticon-account"></i>
</div>
<div class="service-content">
<h2>Profile</h2>
<p>{{$user->fname." ".$user->lname}}</p>
<p>Role: {{$user->role}}<p>
</div>
</div>

</div>
<div class="col-lg-6 col-sm-6" onclick="window.location='subjects';">
<div class="single-service text-center">
<div class="service-icon">
<i class="flaticon-pinn"></i>
</div>
<div class="service-content">
<h2>Subjects</h2>
<p>{{count($subjects)}} subjects</p>
</div>
</div>
</div>
</div>
</div>
</section>

@stop