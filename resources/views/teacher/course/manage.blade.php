@extends('master.teacher.master')

@section('title')
    CMS | Teacher | Manage
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
                    <th scope="col">Code</th>
                    <th scope="col">Duration</th>
                    <th scope="col">Image</th>
                    <th scope="col">ShortDescription</th>             
                    <th scope="col">Status</th>  
                    <th scope="col"></th>
                </thead>
                <tbody>
                @foreach($courses as $c)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$c->name}}</td>
                        <td>{{$c->code}}</td>
                        <td>{{$c->duration}} month</td>
                        <td style="text-align:center;"><img src="{{asset($c->image)}}" alt="" width="45" height="45"></td>
                        <td class="w-25">{{substr_replace($c->shortDescription, "...",50)}}</td>             
                        <td>{{$c->status==1 ? 'Active' : 'Inactive'}}</td>             
                        <td style="text-align: center;">
                            <a role="button" class="btn btn-sm btn-outline-warning mx-1" href="{{route('course-edit', ['id' => $c->id])}}"><i class="bi bi-pencil-square"></i></a>
                            <a role="button" href="{{route('file-add', ['id' => $c->id])}}" class="btn btn-sm {{$c->status==1 ? 'btn-outline-success' : 'btn-outline-danger disabled'}} mx-1"><i class="bi bi-folder-fill"></i></a>
                            <a role="button" href="{{route('enrolled-users', ['id' => $c->id])}}" class="btn btn-sm {{$c->status==1 ? 'btn-outline-success' : 'btn-outline-danger disabled'}} mx-1"><i class="bi bi-people-fill"></i></a>     
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
    </div>
</section>
@endsection