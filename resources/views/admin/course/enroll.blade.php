@extends('master.admin.master')

@section('title')
    CMS | Admin | Enroll | Manage
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
                    <th scope="col">userName</th>
                    <th scope="col">courseName</th>
                    <th scope="col">courseCode</th>
                    <th scope="col">paymentStatus</th>         
                    <th scope="col">enrollStatus</th>  
                    <th scope="col"></th>
                </thead>
                <tbody>
                @if(!empty($enrolls))   
                    @foreach($enrolls as $e)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$e->user->name}}</td>
                            <td>{{$e->course->name}}</td>
                            <td>{{$e->course->code}}</td>
                            <td>{{$e->payment_status==1 ? 'Complete' : 'Pending'}}</td>           
                            <td>{{$e->enroll_status==1 ? 'Active' : 'Inactive'}}</td>             
                            <td style="text-align: center; width:13%">                    
                                <a role="button" class="btn btn-sm {{$e->enroll_status==1 ? 'btn-outline-warning' : 'btn-outline-success'}} mx-1" href="{{route('enroll-update', ['id' => $e->id])}}"><i class="bi {{$e->enroll_status==1 ? 'bi-arrow-down-square-fill' : 'bi-arrow-up-square-fill'}}"></i></a>
                                <a role="button" class="btn btn-sm btn-outline-danger mx-1" href="{{route('enroll-delete', ['id' => $e->id])}}"><i class="bi bi-file-x"></i></a>
                            </td>
                        </tr>
                    @endforeach
                @endif   
                </tbody>
            </table>
    </div>
</section>
@endsection