<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

    <title>{{ $site_information->name }}</title>
</head>

<body class="overflow-auto">
    <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-decoration-none" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{__('Language')}}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            @foreach (config("app.available_locales") as $locale)
                            <a class="dropdown-item text-decoration-none" href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(),array_merge(Route::current()->parameters(),['locale'=> $locale])) }}">{{ strtoupper($locale) }}</a>
                            @endforeach
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="col-md-2 h-100 fix bg-dark">
        <div class="table-responsive">
            <table class="table table-dark table-hover" style="margin-top: 60px;">
                <thead>
                    <tr>
                        <th class="text-center"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none text-white">{{ $site_information->name }}</a></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><a href="{{ route('admin.site_information') }}" class="text-decoration-none text-white">{{__('Site Information')}}</a></td>
                    </tr>
                    <tr>
                        <td><a href="{{ route('admin.category') }}" class="text-decoration-none text-white">{{__('Categories')}}</a></td>
                    </tr>
                    <tr>
                        <td><a href="{{ route('admin.article') }}" class="text-decoration-none text-white">{{__('Articles')}}</a></td>
                    </tr>
                    <tr>
                        <td><a href="{{ route('admin.about') }}" class="text-decoration-none text-white">{{__('About Us')}}</a></td>
                    </tr>
                    <tr>
                        <td><a href="{{ route('admin.messages') }}" class="text-decoration-none text-white">{{__('Messages')}}</a></td>
                    </tr>
                    <tr>
                        <td><a href="{{ route('admin.manage') }}" class="text-decoration-none text-white">{{__('Admins')}}</a></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-3">&nbsp;</div>
    <div class="col-md-7">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
<!-- Footer -->
<footer class="bg-dark text-center text-white footer">
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © {{date('Y')}} Copyright:
        <a class="text-white" href="{{ route('home') }}">{{ $site_information->name }}</a>
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>

</html>