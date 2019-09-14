<!DOCTYPE html>
<html>
<head>
    <title>Suchal Todo</title>
    <link rel="stylesheet" type="text/css" href="{{ url('css/all.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('css/app.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div id="app">
        <App></App>
    </div>
    <script src="{{ url('js/app.js') }}"></script>
    <script src="{{ url('js/all.js') }}"></script>
</body>
</html>