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
<div class="col-lg-4 col-md-6" onclick="window.location='{{$su}}';">
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

<div class="col-lg-12 col-md-12">
@if($user->role == "teacher")
<div class="home-course-slider owl-carousel owl-theme">

<?php
if(count($c['students']) > 0)
{
    foreach($c['students'] as $s)
    {
       // $cu = url('class')."?xf=".$c['id'];
?>
<div class="single-home-special-course">
<div class="course-img">
<img src="assets/images/img6.png" alt="Student">
<div class="course-content">
<h2>{{$s['fname']." ".$s['lname']}}</h2>
<p>
Class member
</p>
<a href="javascript:void(0)" class="btn btn-danger" onclick="removeStudent({{$c['id']}},{{$s['id']}});">Remove student</a>
</div>
</div>
</div>
<?php
    }
}
?>
</div>
@endif
</div>

</div>
</div>
</section>
@stop