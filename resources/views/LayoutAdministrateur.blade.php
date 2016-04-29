<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>
    <link href="/css/bootstrap.min.css"  rel="stylesheet">
    <link href="/css/styleAdmin.css"  rel="stylesheet">
    <link href="/css/typeaheadjs.css"  rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/t/bs-3.3.6/dt-1.10.11/datatables.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>


</head>
<body>


<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Brand</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li >Overview <span class="sr-only">(current)</span></a></li>
                <li><a href="#">Messages</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Articles <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('admin')}}">Overview <span class="sr-only">(current)</span></a></li>
                        <li><a href="{{route('message')}}">Messages</a></li>
                        <li><a href="{{route('articles')}}">Articles</a></li>
                        <li><a href="{{route('membres')}}">Membres</a></li>
                        <li><a href="{{route('adminInstructeurs')}}">Instructeurs</a></li>
                    </ul>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Articles <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('ajouterArticle')}}">Ajouter <span class="sr-only">(current)</span></a></li>
                        <li><a href="{{route('message')}}">Modifier</a></li>
                    </ul>
                </li>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
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
<script src="/js/ajaxSearchArticles.js"></script>
<script src="/js/bootstrap3-typeahead.min.js"></script>
