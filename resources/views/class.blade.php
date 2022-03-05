@extends('layout')

@section('title',$c['name'])

@section('content')
<?php
$pu = url('profile');
?>

@include('banner-2',['class' => "terms", 'title' => $c['name']])
<section class="class-area">
<div class="container">
<div class="row">
<div class="col-lg-12 col-md-12">
 <h2 class="text-primary">Subjects <a href="{{url('new-subject')}}" class="btn btn-primary">Add new subject</a></h2>
 <hr>
</div>
<?php
if(count($c['subjects']) > 0)
{
    foreach($c['subjects'] as $s)
    {
        $su = url('subject')."?xf=".$s['id'];
?>
<div class="col-lg-4 col-md-6">
<div class="single-ragular-course">
<div class="course-img">
<img src="assets/images/courses/img3.png" alt="ragular">
<h2>{{$s['name']}}</h2>
</div>
<div class="course-content">
<p>
{{$s['description']}}
</p>
<a href="{{$su}}" class="border-btn">Read More</a>
</div>
</div>
</div>
<?php
}
}
else
{
?>
<div class="col-lg-12 col-md-12">
 <p class="text-danger">No subjects found.</p>
</div>
<?php
}
?>

</div>
</div>
</section>
@stop