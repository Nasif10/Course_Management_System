@extends('master.admin.master')

@section('title')
    CMS | Admin | Course | Manage
@endsection

@section('body')

<section class="pt-5">
    <div class="container">

        @if(Session::has('msg'))
            <p class="text-primary text-center">{{Session::get('msg')}}</p>
        @endif 
            <table class="table table-bordered table-hover" cellpadding="2px">
                <thead class="table-light">
                    <th scope="col">#</th>
                    <th scope="col">CourseName</th>
                    <th scope="col">CourseCode</th>
                    <th scope="col">CourseTeacherName</th>
                    <th scope="col">CourseDuration</th>
                    <th scope="col">CourseImage</th>
                    <th scope="col">ShortDescription</th>          
                    <th scope="col">Status</th>  
                    <th scope="col"></th>
                </thead>
                <tbody>
                @if(!empty($courses))   
                    @foreach($courses as $c)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$c->name}}</td>
                            <td>{{$c->code}}</td>
                            <td>{{$c->teacher->name}}</td>
                            <td>{{$c->duration}} Month</td>
                            <td style="text-align:center;"><img src="{{asset($c->image)}}" alt="" width="45" height="45"></td>
                            <td>{{substr_replace($c->shortDescription, "...",50)}}</td>            
                            <td>{{$c->status==1 ? 'Active' : 'Inactive'}}</td>             
                            <td style="text-align: center; width:12%">
                                <a role="button" class="btn btn-sm btn-outline-primary" href="{{route('admin-course-detail', ['id' => $c->id])}}"><i class="bi bi-info-circle"></i></a>
                                <a role="button" class="btn btn-sm {{$c->status==1 ? 'btn-outline-danger' : 'btn-outline-success'}}" href="{{route('course-update-status', ['id' => $c->id])}}"><i class="bi {{$c->status==1 ? 'bi-arrow-down-circle-fill' : 'bi-arrow-up-circle-fill'}}"></i></a>
                                <a role="button" class="btn btn-sm btn-outline-danger" href="{{route('course-delete', ['id' => $c->id])}}"><i class="bi bi-trash-fill"></i></a>
                            </td>
                        </tr>
                    @endforeach
                @endif   
                </tbody>
            </table>
    </div>
</section>
@endsection