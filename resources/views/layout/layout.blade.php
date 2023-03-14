<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <script src="https://kit.fontawesome.com/2f9f3c776a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://kit.fontawesome.com/2f9f3c776a.css" crossorigin="anonymous">
    <title>Projeto Zamix</title>
    <style>
        .containerHome {
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

        .cardHome {
            width: 200px;
            height: 200px;
            margin: 20px;
            border: 1px solid #ccc;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .sizeCardImage {
            width: 70%;
            height: 70%;
            align-items: center;
        }
    </style>
</head>
<body>

        <div id="viewport">
            <!-- Sidebar -->
            @if(route('home') != url()->current())
                @include('includes.sidebar')
            @endif

            <!--A home page não possui o sidebar, por isso o if-->

            <!-- Corpo de pagina -->
            <div class="container">
                @if(route('home') == url()->current())
                <div class="row">
                    <div class="col-md-12 text-center pt-3">
                        {{--                        <img src="" alt="Your image" style="border: 1px solid #ddd; border-radius: 4px; padding: 5px; width: 150px;">--}}
                        <img src="{{ asset('images/logoZamix.png') }}" alt="Your image" style="border: 1px solid #ddd; border-radius: 4px; padding: 5px; width: 150px;">
                    </div>
                </div>
                @endif
                @yield('content')
            </div>
        </div>

</body>
</html>
