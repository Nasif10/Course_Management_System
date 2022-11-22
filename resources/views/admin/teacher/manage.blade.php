@extends('master.admin.master')

@section('title')
    CMS | Admin | Manage
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
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                    <th scope="col">Image</th>              
                    <th scope="col">Status</th>  
                    <th scope="col"></th>
                </thead>
                <tbody>
                @foreach($teachers as $t)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$t->name}}</td>
                        <td>{{$t->email}}</td>
                        <td>{{$t->phone}}</td>
                        <td>{{$t->address}}</td>
                        <td style="text-align:center;"><img src="{{asset($t->image)}}" alt="" width="45" height="45"></td>
                        <td>{{$t->status==1 ? 'Active' : 'Inactive'}}</td>             
                        <td style="text-align: center; width:13%">
                            <a role="button" class="btn btn-sm btn-outline-warning mx-1" href="{{route('teacher-edit', ['id' => $t->id])}}"><i class="bi bi-pencil-square"></i></a>
                            <a role="button" class="btn btn-sm btn-outline-danger mx-1" href="{{route('teacher-delete', ['id' => $t->id])}}"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
    </div>
</section>
@endsection