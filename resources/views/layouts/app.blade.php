<!DOCTYPE html>
<html>
<head>
    <title>Suchal Todo</title>
    <link rel="stylesheet" type="text/css" href="{{ url('css/all.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-82483481-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-82483481-1');
    </script>

    <link rel="stylesheet" type="text/css" href="{{ url('css/app.css') }}">
    <style type="text/css">
        body{
            background-color: #3A4250;
            color: #fff;
        }
        .container{
            margin-top: 50px;
        }
        .panel{
            padding: 50px;
            background: #ffffff22;
            margin-top: 50px;
        }
        .center{
            text-align: center;
        }
        .form-control{
            border-radius: 0px;
            border: none;
            background-color: #ffffffcc;
        }
        .form-control:hover, .form-control:focus{
            outline: none;
            background-color: #ffffff;
        }
        .btn-link{
            color: #6E9DC7;
        }
        .btn-link:hover{
            color: #79B2E4;
        }
        .btn-link:active{
            color: #57A2E4;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="center">@yield('title')</h1>
        <div class="panel">
            @yield('content')
        </div>
    </div>
    <script src="{{ url('js/app.js') }}"></script>
    <script src="{{ url('all.js') }}"></script>
</body>
</html>