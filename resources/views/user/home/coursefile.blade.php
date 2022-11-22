@extends('master.site.master')

@section('title')
    CMS | Course | File
@endsection

@section('body')

<section class="pt-5">
    <div class="container">
        <div class="row">
            <div class="col mx-auto">
                <table class="table table-bordered table-hover" cellpadding="2px">
                    <thead class="table-light">
                        <th scope="col">#</th>
                        <th scope="col">FileName</th> 
                    </thead>
                    <tbody>
                    @foreach($files as $f)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td><a href="{{ asset($f->file_name) }}">{{$f->file_name}}</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

@endsection