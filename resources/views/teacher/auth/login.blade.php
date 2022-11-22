@extends('master.teacher.master')

@section('title')
    CMS | Teacher | Login
@endsection

@section('body')

<section class="pt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                @if(Session::has('msg'))
                    <p class="text-primary text-center">{{Session::get('msg')}}</p>
                @endif 
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('teacher-signin')}}" method="post">
                            @csrf
                            <div class="form-group row mb-3">
                                <label class="col-sm-3 col-form-label">TeacherEmail</label>
                                <div class="col-sm-9">
                                    <input type="email" name="email" class="form-control" placeholder="email@example.com">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-sm-3 col-form-label">TeacherPassword</label>
                                <div class="col-sm-9">
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-md-3">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection