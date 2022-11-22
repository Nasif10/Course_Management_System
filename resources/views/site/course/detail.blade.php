@extends('master.site.master')

@section('title')
    CMS | Course | Detail
@endsection

@section('body')

<section class="pt-5">
    <div class="container">
        <div class="row"> 
            <div class="col-md-3">
                <div class="card card-body">
                    <img src="{{asset($course->image)}}" class="img-fluid" style="min-height: 100%" alt="...">
                </div>
            </div>
            <div class="col-md-9">
                <div class="card h-100">
                    <div class="card-body">
                        <h4 class="fw-bolder mb-0">{{$course->name}}</h4>
                        <hr>
                        <p class="mb-2"><em>By : {{$course->teacher->name}} | {{$course->teacher->email}}</em></p>
                        <p class="mb-0">Duration : {{$course->duration}} Month</p>
                        <p>{{$course->shortDescription}}</p>
                    </div>
                    <div class="card-footer text-center bg-transparent">
                        <a href="{{route('course-enroll', ['id' => $course->id])}}" class="btn btn-outline-success w-25 {{$check == true ? 'disabled btn-outline-danger' : ''}}">{{$check == true ? 'Enrolled' : 'Enroll'}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-4">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card card-body">
                    <h4>Details</h4>
                    <p>{{$course->longDescription}}</p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection