<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Projeto Zamix</title>
    <style>
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .logo {
            width: 200px;
            height: auto;
            margin-bottom: 50px;
        }

        .cards {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            max-width: 800px;
            margin: 0 auto;
        }

        .card {
            width: 200px;
            height: 200px;
            margin: 20px;
            border: 1px solid #ccc;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body class="bg-dark">


    @if(route('home') != url()->current())
        @include('includes.sidebar')
    @endif
    <div class="row">
        <div class="col-md-12 text-center pt-2">
            <img src="{{ asset('images/logoZamix.png') }}" alt="Your image" style="border: 1px solid #ddd; border-radius: 4px; padding: 5px; width: 150px;">
        </div>
    </div>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
