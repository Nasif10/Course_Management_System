@extends('master.admin.master')

@section('title')
    CMS | Teacher | Register
@endsection

@section('body')

<section class="pt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-body">
                        @if(Session::has('msg'))
                             <p class="text-primary text-center">{{Session::get('msg')}}</p>
                        @endif      
                        <form action="{{route('teacher-new-register')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row mb-3">
                                <label class="col-sm-3 col-form-label">TeacherName</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" class="form-control" placeholder="name">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-sm-3 col-form-label">TeacherEmail</label>
                                <div class="col-sm-9">
                                    <input type="email" name="email" class="form-control" placeholder="email@example.com">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-sm-3 col-form-label">TeacherPhone</label>
                                <div class="col-sm-9">
                                    <input type="number" name="phone" class="form-control" placeholder="phone">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-sm-3 col-form-label">TeacherAddress</label>
                                <div class="col-sm-9">
                                    <input type="text" name="address" class="form-control" placeholder="address">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-sm-3 col-form-label">TeacherImage</label>
                                <div class="col-sm-9">
                                    <input type="file" name="image" class="form-control" accept="image/*">
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