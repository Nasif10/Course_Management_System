@extends('master.admin.master')

@section('title')
    CMS | Admin | Notice | Manage
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
                    <th scope="col">noticeTitle</th>
                    <th scope="col">noticeContent</th>
                    <th scope="col"></th>
                </thead>
                <tbody>
                @foreach($notices as $n)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$n->title}}</td>
                        <td>{{$n->body}}</td>             
                        <td style="text-align: center;">
                            <a role="button" class="btn btn-sm btn-outline-danger mx-1" href="{{route('notice-delete', ['id' => $n->id])}}"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
    </div>
</section>
@endsection