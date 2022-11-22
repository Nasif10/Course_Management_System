@extends('master.admin.master')

@section('title')
    CMS | Admin | Course | Detail
@endsection

@section('body')

<section class="pt-5">
    <div class="container">
        @if(Session::has('msg'))
            <p class="text-primary text-center">{{Session::get('msg')}}</p>
        @endif 
        <table class="table table-bordered table-hover">
            <tbody>
                <tr>
                    <th class="w-25">Course Name</th>
                    <td>{{$course->name}}</td>
                </tr>
                <tr>
                    <th>CourseCode</th>
                    <td>{{$course->code}}</td>
                </tr>
                <tr>
                    <th>Course TeacherName</th>
                    <td>{{$course->teacher->name}}</td>
                </tr>
                <tr>
                    <th>Course Duration</th>
                    <td>{{$course->duration}} Month</td>
                </tr>
                <tr>
                    <th>Course Image</th>
                    <td><img src="{{asset($course->image)}}"  alt="" width="50" height="50"/></td>
                </tr>
                <tr>
                    <th>Short Description</th>
                    <td>{!! $course->shortDescription !!}</td>
                </tr>

                <tr>
                    <th>Long Description</th>
                    <td>{!! $course->longDescription !!}</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
@endsection