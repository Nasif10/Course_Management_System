<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <style>body {font-family: 'Nunito', sans-serif;}</style>
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-primary shadow">
        <div class="container">
            <a class="navbar-brand" href="{{route('admin-home')}}">CMS</a>
            <div class="d-flex">
            @unless(Session::has('a_id'))
                <a role="button" class="btn btn-outline-light me-2" href="{{route('admin-login')}}">Login</a>
                <a role="button" class="btn btn-light" href="{{route('admin-register')}}">Register</a>
            @endunless
            </div>
            @if(Session::has('a_id'))
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">@if(Session::has('a_name')) {{Session::get('a_name')}} @else Login @endif</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        
                        <li><a class="dropdown-item" href="" onclick="event.preventDefault(); document.getElementById('adminLogoutForm').submit();">Logout</a></li>
                        <form action="{{route('admin-logout')}}" method="POST" id="adminLogoutForm">
                            @csrf
                        </form> 
                    </ul>
                </li>
            </ul>
            @endif
        </div>
    </nav>
    
    @yield('body')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>   
</body>
</html> 