<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>
    <link href="/css/bootstrap.min.css"  rel="stylesheet">
    <link href="/css/style.css"  rel="stylesheet">
    <link href="js/owlcaroussel/owl.carousel.css"  rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="/js/moment.min.js"></script>
    <script src="/js/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="/css/fullcalendar.min.css"/>

</head>
<body>
<nav class="navbar navbar-default">
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
            <ul class="nav navbar-nav navbar-right" >

                <li class="active"><a href="{{route('welcome')}}">Acceuil</a></li>
                <li><a href="{{route('instructeurs')}}">Instructeurs</a></li>
                <li><a href="{{route('sections')}}">Sections</a></li>
                <li><a href="{{route('horaire')}}">Horaires</a></li>
                <li><a href="{{route('agenda')}}">Agenda</a></li>
                <li><a href="{{route('contact')}}">Contact</a></li>
                <li><a href="{{ url('/login') }}">Connexion</a></li>
            </ul>
    </div><!-- /.container-fluid -->
</nav>

<div class="container">
    <header><h1>@yield('title','SKIF-POSEIDON')</h1></header>
    <hr>
    @if(Session::has('success'))
    <div class="alert alert-success" id="success">{{ Session::get('success')}}</div>
    @endif
    @if(Session::has('danger'))

    <div class="alert alert-danger" id="danger">{{Session::get('danger')}}</div>
    @endif
    @yield('content')


</div>
    @yield('footer')
</body>

</html>

<script src="/js/bootstrap.min.js" ></script>
<script src="/js/script.js" ></script>
<script src="/js/postCaroussel.js" ></script>
<script src="js/owlcaroussel/owl.carousel.min.js" ></script>

