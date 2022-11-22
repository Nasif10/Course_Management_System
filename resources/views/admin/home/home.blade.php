@extends('master.admin.master')

@section('title')
    CMS | Admin | Home
@endsection

@section('body')

<section class="pt-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <div class="list-group">
                    <a class="btn btn-outline-primary btn-toggle list-group-item list-group-item-action text-primary" role="button" data-bs-toggle="collapse" data-bs-target="#teacher-collapse" aria-expanded="true">
                        Manage Teacher
                    </a>
                    <div class="collapse show" id="teacher-collapse">
                            <ul class="btn-toggle-nav list-unstyled">
                                <li><a class="dropdown-item" href="{{route('teacher-register')}}">Add Teacher</a></li>
                                <li><a class="dropdown-item" href="{{route('teacher-manage')}}">Manage Teacher</a></li>  
                            </ul>
                    </div>
                    <a class="btn btn-outline-primary btn-toggle list-group-item list-group-item-action collapsed text-primary" role="button" data-bs-toggle="collapse" data-bs-target="#course-collapse" aria-expanded="false">
                        Manage Course
                    </a>
                    <div class="collapse" id="course-collapse">
                        <ul class="btn-toggle-nav list-unstyled">
                            <li><a class="dropdown-item" href="{{route('course-publish', ['c' => 0])}}">Pending Course</a></li>
                            <li><a class="dropdown-item" href="{{route('course-publish', ['c' => 1])}}">Published Course</a></li> 
                        </ul>
                    </div>
                    <a class="btn btn-outline-primary btn-toggle list-group-item list-group-item-action collapsed text-primary" role="button" data-bs-toggle="collapse" data-bs-target="#enroll-collapse" aria-expanded="false">
                        Manage Enroll
                    </a>
                    <div class="collapse" id="enroll-collapse">
                        <ul class="btn-toggle-nav list-unstyled">
                            <li><a class="dropdown-item" href="{{route('enroll-pending')}}">Pending Enroll</a></li>
                            <li><a class="dropdown-item" href="{{route('enroll-manage')}}">Manage Enroll</a></li> 
                        </ul>
                    </div>
                    <a class="btn btn-outline-primary btn-toggle list-group-item list-group-item-action collapsed text-primary" role="button" data-bs-toggle="collapse" data-bs-target="#notice-collapse" aria-expanded="false">
                        Manage Notice
                    </a>
                    <div class="collapse" id="notice-collapse">
                        <ul class="btn-toggle-nav list-unstyled">
                            <li><a class="dropdown-item" href="{{route('notice-add')}}">Add Notice</a></li>
                            <li><a class="dropdown-item" href="{{route('notice-manage')}}">Manage Notice</a></li> 
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-10">
                <div class="row text-center">
                    <div class="col mx-5">
                        <div class="p-4 border" style="background: rgba(2, 117, 216, 0.1)">
                            <h1>{{$totalTeacher}}<small>+</small></h1>
                            <h5>Teacher</h5>
                        </div>
                    </div>
                    <div class="col mx-5">
                        <div class="p-4 border" style="background: rgba(2, 117, 216, 0.1)">
                            <h1> {{$totalCourse}}<small>+</small></h1>
                            <h5>Course</h5>
                        </div>
                    </div>
                    <div class="col mx-5">
                        <div class="p-4 border" style="background: rgba(2, 117, 216, 0.1)">
                            <h1>{{$totalUser}}<small>+</small></h1>
                            <h5>User</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection