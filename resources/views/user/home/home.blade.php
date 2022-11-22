@extends('master.site.master')

@section('title')
    CMS | User | Home
@endsection

@section('body')

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="list-group list-group-flush">
                        <a href="" class="list-group-item">Enrolled Course</a>
                        <a class="list-group-item" data-bs-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Profile</a>     
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header text-center">
                        Applied Course
                    </div>
                    @if(Session::has('msg'))
                        <p class="text-primary text-center">{{Session::get('msg')}}</p>
                    @endif   
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>CourseName</th>
                                <th>CourseCode</th>
                                <th>paymentStatus</th>
                                <th>enrollStatus</th> 
                                <th></th> 
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($enrolls as $e)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$e->course->name}}</td>
                                    <td>{{$e->course->code}}</td>
                                    <td>{{$e->payment_status==1 ? 'Complete' : 'Pending'}}</td>
                                    <td>{{$e->enroll_status==1 ? 'Enrolled' : 'Pending'}}</td>
                                    <td class="text-center">
                                        <a role="button" href="{{route('course-payment', ['id' => $e->id])}}" class="btn btn-sm {{$e->payment_status==1 ? 'btn-outline-success disabled' : 'btn-outline-danger'}} mx-1"><i class="bi {{$e->payment_status==1 ? 'bi-list-check' : 'bi-credit-card-fill'}}"></i></a>
                                        <a role="button" href="{{route('course-files', ['id' => $e->course_id])}}" class="btn btn-sm {{$e->enroll_status==1 ? 'btn-outline-success' : 'btn-outline-danger disabled'}} mx-1"><i class="bi bi-folder-fill"></i></a>
                                        <a role="button" href="{{route('enrolled-user', ['id' => $e->course_id])}}" class="btn btn-sm {{$e->enroll_status==1 ? 'btn-outline-success' : 'btn-outline-danger disabled'}} mx-1"><i class="bi bi-people-fill"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> 
                <div class="card mt-4 collapse multi-collapse" id="multiCollapseExample1">
                    <div class="card-body">
                        @if(Session::has('msg2'))
                             <p class="text-primary text-center">{{Session::get('msg2')}}</p>
                        @endif      
                        <form action="{{route('user-update', ['id' => $user->id])}}" method="post">
                            @csrf
                            <div class="mb-2">
                                <label class="form-label">userName</label>
                                <input type="text" name="name" value="{{$user->name}}" class="form-control" placeholder="name">
                            </div>
                            <div class="mb-2">
                                <label class="col-form-label">userEmail</label>
                                <input type="email" name="email" value="{{$user->email}}" class="form-control" placeholder="email@example.com">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">userPassword</label>
                                <input type="password" name="password" class="form-control" placeholder="Password"> 
                            </div>
                            <div>
                                <button type="submit" class="btn btn-sm btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
                
                
            </div>
        </div>
    </div>
</section>

@endsection