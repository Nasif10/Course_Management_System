@extends('master.teacher.master')

@section('title')
    CMS | Course | File | Add
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
                        <form action="{{route('file-create', ['id' => $course_id])}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row mb-3">
                                <label class="col-sm-2 col-form-label">Course File</label>
                                <div class="col-sm-8">
                                    <input type="file" name="file" class="form-control">
                                </div>
                                <div class="col-sm-2">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row pt-4">
            <div class="col-md-8 mx-auto">
                <table class="table table-bordered table-hover" cellpadding="2px">
                    <thead class="table-light">
                        <th scope="col">#</th>
                        <th scope="col">FileName</th> 
                        <th scope="col"></th>
                    </thead>
                    <tbody>
                    @foreach($files as $f)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td><a href="{{ asset($f->file_name) }}">{{$f->file_name}}</a></td>
                            <td style="text-align: center;">
                                <a role="button" href="" class="btn btn-sm btn-outline-danger mx-1"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

@endsection