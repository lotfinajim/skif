<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>
    <link href="/css/bootstrap.min.css"  rel="stylesheet">
    <link href="/css/styleAdmin.css"  rel="stylesheet">
    <link href="/css/typeaheadjs.css"  rel="stylesheet">
    <link href="/css/jquery.datetimepicker.css"  rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/t/bs-3.3.6/dt-1.10.11/datatables.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>



</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{route('admin')}}">ADMINISTRATION</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li  class="{{$activeMenu== 'overview' ? ' active' :''}}"><a href="{{route('admin')}}">Overview </a></li>
                <li  class="{{$activeMenu == 'message' ? ' active' :''}}"><a href="{{route('message')}}">Messages</a></li>
                <li  class="{{$activeMenu == 'agenda' ? ' in active' :''}}"><a href="{{route('agendaAdmin')}}">Agenda</a></li>
                <li  class="{{$activeMenu == 'articles' ? ' active' :''}}"><a href="{{route('articles')}}">Articles</a></li>
                <li  class="{{$activeMenu == 'membres' ? ' active' :''}}"><a href="{{route('membres')}}">Membres</a></li>
                <li  class="{{$activeMenu == 'instructeur' ? ' active' :''}}"><a href="{{route('adminInstructeurs')}}">Instructeurs</a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid" style="padding-top:80px">
    <div class="row title">
        <header><h1>@yield('title','ADMINISTRATION')</h1></header>
        <hr>
    </div>
    <div class="row" >

        <div class="col-xs-12 col-sm-12">

            @if(Session::has('success'))
            <div class="alert alert-success" id="success">{{ Session::get('success')}}</div>
            @endif

            @if(Session::has('error'))
                <div class="alert alert-danger" id="danger">{{ Session::get('error')}}<br></div>
            @endif
            @yield('content')
        </div>
    </div>
</div>
@yield('footer')
</body>

</html>
<script src="/js/jquery-2.2.0.min.js" ></script>
<script src="/js/bootstrap.min.js" ></script>
<script src="/js/script.js" ></script>
<script src="/js/ajaxbtnArticles.js"></script>
<script src="/js/ajaxbtnInstructeurs.js"></script>
<script src="/js/ajaxBtnEvent.js"></script>
<script src="/js/ajaxSearchArticles.js"></script>
<script src="/js/bootstrap3-typeahead.min.js"></script>
<script src="/js/jquery.datetimepicker.min.js"></script>
<script src="/js/jquery.datetimepicker.full.min.js"></script>
