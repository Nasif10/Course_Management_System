@extends('master.teacher.master')

@section('title')
    CMS | Course | Add
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
                        <form action="{{route('course-create')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row mb-3">
                                <label class="col-sm-3 col-form-label">CourseName</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" class="form-control" placeholder="name">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-sm-3 col-form-label">CourseCode</label>
                                <div class="col-sm-9">
                                    <input type="text" name="code" class="form-control" placeholder="code">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-sm-3 col-form-label">CourseDuration</label>
                                <div class="col-sm-9">
                                    <input type="number" name="duration" class="form-control" placeholder="duration" min="1" max="6">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-sm-3 col-form-label">CourseImage</label>
                                <div class="col-sm-9">
                                    <input type="file" name="image" class="form-control" accept="image/*">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-sm-3 col-form-label">ShortDescription</label>
                                <div class="col-sm-9">
                                    <textarea  name="shortDescription" class="form-control" rows="2"></textarea>
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-sm-3 col-form-label">LongDescription</label>
                                <div class="col-sm-9">
                                    <textarea  name="longDescription" class="form-control" rows="4"></textarea>
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