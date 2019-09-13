<!DOCTYPE html>
<html>
<head>
    <title>Suchal Todo</title>
    <link rel="stylesheet" type="text/css" href="{{ url('css/all.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('css/app.css') }}">
    <style type="text/css">
        body{
            background-color: #3A4250;
        }
        body,html,.sidebar, .container-fluid,.content, .row{
            height: 100%;
            margin:0;padding:0;
            overflow: auto;
        }
        .navbar-right{
            margin-right: 20px;
        }
        .bg-dark{
            background: #222831 !important;
        }
        .sidebar, .content{
            width: 100%;
            padding-top: 50px;
            float: left;
            color: #eee;
        }
        .sidebar input, .sidebar button{
            color: #000;
        }
        .sidebar hr{
            width: 100%;
        }
        .content{
            width:100%;
            padding-top: 50px;
            float:right;
            background-color: #3A4250;
        }
        .center{
            text-align: center;
        }
        .new-box{
            position: relative;
        }
        .new-box input{
            border: none;
            width: 100%;
            height: 35px;
            line-height: 20px;
            padding: 2px 5px;
            outline: none;
            background-color: #ffffffc7;
        }
        .new-box button{
            width: 35px;
            height: 35px;
            border: none;
            background: transparent;
            font-size: 24px;
            position: absolute;
            top:0; right:0;
        }
        .create-box .new-box{
            width: 90%;
            margin-left: auto;
            margin-right: auto;
        }
        .todo-items{
            list-style: none;
            margin-top: 20px;
            padding: 0px;

        }
        .todo-item{
            display: flex;
        }
        .todo-item input[type="checkbox"]{
            width: 20px;
            height: 20px;
            margin-top: 7px;
        }
        .todo-item .editable-text-box{
            flex-grow: 1;
        }
        .todo-list{
            margin-left: auto;
            margin-right: auto;
            list-style: none;
            margin-top: 20px;
            padding: 0px;
            width: 90%;

        }
        .todo-list li{
            padding: 0px;
            background-color: #2C3441;
            cursor: pointer;
            padding:10px 20px ;
        }
        .todo-list li:hover, .todo-list li:active{
            background-color: #262D38;
        }

        .editable-text-box{
            position: relative;
        }
        .editable-text-box input{
            border: none;
            background: transparent;
            width: 100%;
            cursor: pointer !important;
            color: #fff;
            height: 35px;
            line-height: 20px;
            padding: 2px 5px;
            outline: none;
        }
        .editable-text-box button{
            width: 35px;
            height: 35px;
            border: none;
            background: transparent;
            font-size: 15px;
            opacity: 0.6;
            color: #fff;
        }
        .editable-text-box:hover button{
            opacity: 0.9;
        }
        .editable-text-box .btn-box{
            position: absolute;
            top:0; right:0;
        }
        .todo-header, .todo-content{
            margin:20px;
        }
        .todo-header{

        }
        .todo-item{

        }
        .todo-content .new-box input, .todo-content .new-box button{
            color:#000;
            border: none;
            background-color: #ffffffc7;
        }
        .todo-header input{
            border: none;
            font-size: 32px;
        }
        @media only screen and (min-width: 600px){
            .sidebar{
                width: 33%;
                float: left;
            }
            .content{
                width:66%;
                float:right;
            }
        }
    </style>
</head>
<body>
    <div class="head">
        <nav class="navbar navbar-inverse bg-dark navbar-fixed-top">
          {{-- <div class="container-fluid"> --}}
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Suchal Todo</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li class="navbar-text center">
                              Monday, 13th January, 2019
                    </li>
                   <li class="dropdown center">
                          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Suchal
                          <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li><a href="#">Logout</a></li>
                          </ul>
                    </li>
                </ul>
            </div>
          {{-- </div> --}}
        </nav>
    </div>
    <div class="row">
        <div class="sidebar bg-dark">
            <div class="create-box">
                <h4 class="center">Create New List</h4>
                <div class="new-box">
                    <input type="text">
                    <button>+</button>
                </div>
            </div>
            <ul class="todo-list">
                <li>
                <div class="editable-text-box">
                    <input type="text" disabled="" value="Text">
                    <div class="btn-box">
                        <button><i class="fas fa-minus-circle"></i></button>
                        <button><i class="fas fa-edit"></i></button>
                    </div>
                </div>
                </li>
            </ul>
        </div>
        <div class="content">
            <div class="todo-header">
                <div class="editable-text-box">
                    <input type="text" disabled="" value="Text">
                    <div class="btn-box">
                        <button><i class="fas fa-minus-circle"></i></button>
                        <button><i class="fas fa-edit"></i></button>
                    </div>
                </div>
            </div>
            <div class="todo-content">
                <div class="new-box">
                    <input type="text">
                    <button>+</button>
                </div>
                <ul class="todo-items">
                    <li class="todo-item">
                    <input type="checkbox">
                    <div class="editable-text-box">
                        <input type="text" disabled="" value="Text">
                        <div class="btn-box">
                            <button><i class="fas fa-minus-circle"></i></button>
                            <button><i class="fas fa-edit"></i></button>
                        </div>
                    </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <script src="{{ url('js/app.js') }}"></script>
    <script src="{{ url('all.js') }}"></script>
</body>
</html>