@extends('layout')

@section('title',$t['name'])

@section('content')
<?php
$pu = url('profile');
?>

@include('banner-2',['class' => "terms", 'title' => $t['name']])
<section class="class-area">
<div class="container">
<div class="row">
<?php
if(count($t) > 0)
{
 $su = url('topic')."?xf=".$t['id'];
?>
<div class="col-lg-12 col-md-12">
<div class="single-ragular-course">
<div class="course-img">
<h2>{{$t['name']}}</h2>
</div>
<div class="course-content">
<p>
{!! $t['content'] !!}
</p>
<a href="{{$su}}" class="border-btn">Read More</a>
</div>
</div>
</div>
<?php
}
else
{
?>
<div class="col-lg-12 col-md-12">
 <p class="text-danger">No topics found.</p>
</div>
<?php
}
?>

</div>
</div>
</section>
@stop