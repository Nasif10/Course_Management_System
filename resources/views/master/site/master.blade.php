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
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top shadow">
        <div class="container">
            <a class="navbar-brand" href="{{route('home')}}">CMS</a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="{{route('courses')}}">All Course</a>
                </li>
            </ul>
            @unless(Session::has('u_id'))
                <a role="button" class="btn btn-outline-light me-2" href="{{route('user-login')}}">Login</a>
                <a role="button" class="btn btn-light" href="{{route('user-register')}}">SignUp</a>
            @endunless
            @if(Session::has('u_id'))
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person-up"></i> {{Session::get('u_name')}}</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @if(Session::has('u_id'))
                    <li><a class="dropdown-item" href="{{route('user-home')}}">Dashboard</a></li>
                        <li><a class="dropdown-item" href="" onclick="event.preventDefault(); document.getElementById('userLogoutForm').submit();">Logout</a></li>
                        <form action="{{route('user-logout')}}" method="POST" id="userLogoutForm">
                            @csrf
                        </form>
                     @endif
                    </ul>
                </li>
                @endif
            </ul>
        </div>
    </nav>

    <div class="divider" style="height: 3rem;"></div>
    @yield('body')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>   
</body>
</html> 