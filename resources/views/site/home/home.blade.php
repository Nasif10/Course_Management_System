@extends('master.site.master')

@section('title')
    CMS | Home
@endsection

@section('body')

<section class="notice-section pt-5">
    <div class="container">
        @if(Session::has('msg'))
            <p class="text-primary text-center">{{Session::get('msg')}}</p>
        @endif 
        <div class="row">
            <div class="col-md-2">
                <h5 class="border border-secondary rounded-pill text-center"> Notices </h5> 
            </div>
            <div class="col-md-10">
                <marquee>{{$notice}}</marquee>
            </div>
        </div> 
    </div>
</section>


<section class="pt-5">
    <div class="container">
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
                                <p class="card-text mb-1"><small class="text-muted">Last updated {{$c->updated_at->format('Y-m-d')}}</small></p>
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


<section class="pt-5">
  <div class="container">
        <div class="card card-body">
          <div class="row">
                <div class="col-md-6 d-flex align-items-center">
                <small>Copyright &copy; {{now()->year}} | CMS</small>
                </div>
                <div class="col-md-6">
                    <div class="row g-0">
                        <div class="col-md-8">
                        <input type="email" class="form-control" placeholder="name@cms.com">
                        </div>
                        <div class="col-md-4">
                        <button type="button" class="btn btn-outline-success w-100">Subscribe</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </div>
</section>

@endsection