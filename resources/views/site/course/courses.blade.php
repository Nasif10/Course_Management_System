@extends('master.site.master')

@section('title')
    CMS | Home | Courses
@endsection

@section('body')

<section class="pt-5">
    <div class="container">
        <div class="row justify-content-end">
            <div class="col col-3">
                <form class="input-group post-form mb-4" action="{{route('course-search')}}" method="post">
                @csrf
                    <input type="text" name="search" class="form-control" @if(isset($_POST['search'])) value = "{{$_POST['search']}}" @endif>
                    <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i></button>
                </form>
            </div>
        </div> 
        <div class="row">
            @foreach($courses as $c)
            <div class="col-md-6 mb-3">
                <div class="card h-100">
                    <div class="row g-0">
                        <div class="col-md-4">
                          <img src="{{asset($c->image)}}" class="img-fluid rounded-start" style="height:0; min-height: 100%" alt="...">
                        </div>
                        <div class="col-md-8 align-items-center">
                            <div class="card-body">
                                <h5 class="card-title fw-bolder">{{$c->name}}</h5><hr class="my-2">
                                <p><i>By : {{$c->teacher->name}}</i></p>
                                <p class="card-text mb-1">{{$c->shortDescription}}</p>
                                <p class="card-text"><small class="text-muted">Last updated {{$c->updated_at->format('Y-m-d')}}</small></p>
                                <a href="{{route('course-detail', ['id' => $c->id])}}" class="card-link" style="text-decoration: none">Detail</a>
                                <a href="{{route('course-enroll', ['id' => $c->id])}}" class="card-link float-end" style="text-decoration: none">Enroll</a>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
            @endforeach  
        </div>
</section>

@endsection