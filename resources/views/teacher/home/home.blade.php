@extends('master.teacher.master')

@section('title')
    CMS | Teacher | Home
@endsection

@section('body')

<section class="pt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <div class="list-group mx-3">
                    <a class="btn btn-outline-primary btn-toggle list-group-item list-group-item-action text-primary" role="button" data-bs-toggle="collapse" data-bs-target="#teacher-collapse" aria-expanded="true">
                        Manage Course
                    </a>
                    <div class="collapse show" id="teacher-collapse">
                        <ul class="btn-toggle-nav list-unstyled">
                            <li><a class="dropdown-item" href="{{route('course-add')}}">Add Course</a></li>
                            <li><a class="dropdown-item" href="{{route('course-manage')}}">Manage Course</a></li>  
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-10">
                <div class="row text-center">
                    <div class="col mx-5">
                        <div class="p-4 border" style="background: rgba(2, 117, 216, 0.1)">
                            <h1> {{$totalCourse}}<small>+</small></h1>
                            <p>Active Course</p>
                        </div>
                    </div>
                    <div class="col mx-5">
                        <div class="p-4 border" style="background: rgba(2, 117, 216, 0.1)">
                            <h1>{{$totalUser}}<small>+</small></h1>
                            <p>Active User</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection