@extends('master.admin.master')

@section('title')
    CMS | Admin | Notice | Add
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
                        <form action="{{route('notice-create')}}" method="post">
                            @csrf
                            <div class="form-group row mb-3">
                                <label class="col-sm-3 col-form-label">Notice Title</label>
                                <div class="col-sm-9">
                                    <input type="text" name="title" class="form-control" placeholder="noticeTitle">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <label class="col-sm-3 col-form-label">Notice Detail</label>
                                <div class="col-sm-9">
                                    <textarea  name="body" class="form-control" rows="2"></textarea>
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