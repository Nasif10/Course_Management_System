@extends('master.admin.master')

@section('title')
    CMS | Teacher | Edit
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
                        <form action="{{route('teacher-update', ['id' => $teacher->id])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row mb-3">
                                <label class="col-sm-3 col-form-label">TeacherName</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" value="{{$teacher->name}}" class="form-control" placeholder="name">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-sm-3 col-form-label">TeacherEmail</label>
                                <div class="col-sm-9">
                                    <input type="email" name="email" value="{{$teacher->email}}" class="form-control" placeholder="email@example.com">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-sm-3 col-form-label">TeacherPhone</label>
                                <div class="col-sm-9">
                                    <input type="number" name="phone" value="{{$teacher->phone}}" class="form-control" placeholder="phone">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-sm-3 col-form-label">TeacherAddress</label>
                                <div class="col-sm-9">
                                    <input type="text" name="address" value="{{$teacher->address}}" class="form-control" placeholder="address">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-sm-3 col-form-label">TeacherImage</label>
                                <div class="col-sm-9">
                                    <input type="file" name="image" class="form-control mb-1" accept="image/*">
                                    <img src="{{asset($teacher->image)}}" alt="" height="50" width="60">
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label class="col-sm-3 col-form-label">TeacherStatus</label>
                                <div class="col-sm-9">
                                    <label class="me-3"><input class="form-check-input" type="radio" {{$teacher->status == 1 ? 'checked' : ''}} name="status" value="1"> Active </label>
                                    <label><input class="form-check-input" type="radio" {{$teacher->status == 0 ? 'checked' : ''}} name="status" value="0"> Inactive </label>
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