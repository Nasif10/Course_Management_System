@extends('master.teacher.master')

@section('title')
    CMS | Teacher | enrolledUser
@endsection

@section('body')

<section class="pt-5">
    <div class="container">

        @if(Session::has('msg'))
            <p class="text-primary text-center">{{Session::get('msg')}}</p>
        @endif 
            <table class="table table-bordered table-hover" cellpadding="2px">
                @if(count($enrolls)) 
                <thead class="bg-light text-center">
                    <th colspan="4">Enrolled User in '{{$enrolls->first()->course->name}}'</th> 
                </thead>
                @endif 
                <thead class="table-light">
                    <th scope="col">#</th>
                    <th scope="col">UserName</th>          
                    <th scope="col">UserEmail</th>  
                </thead>
                <tbody>
                @if(count($enrolls))    
                @foreach($enrolls as $e)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$e->user->name}}</td>
                        <td>{{$e->user->email}}</td>                        
                    </tr>
                @endforeach
                @else 
                <tr>
                    <td class="text-center" colspan="4">No Student!</td>
                </tr>
                @endif 
                </tbody>
            </table>
    </div>
</section>
@endsection