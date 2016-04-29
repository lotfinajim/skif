@extends('layout')

@section('title')

@stop
@section('content')
<div class="row">
    <div class="col-sm-3 col-md-3"></div>
    <div class="col-xs-12 col-sm-6 col-md-6 ">
        <form role="form" class="form-vertical myconnexion">
            <fieldset>
                <legend style="text-align:center"><h1>Connexion</h1></legend>
            </fieldset>
            <div class="form-group">
                <lable class="sr-only" for="login">Login : </lable>
                <input type="text" class="form-control" id="login" placeholder="Votre login"/>
            </div>
            <div class="form-group">
                <lable class="sr-only" for="password">Password : </lable>
                <input type="text" class="form-control" id="password" placeholder="Votre mot de passe"/>
            </div>
            <button type="submit" class="btn btn-primary">Connexion</button>
        </form>
    </div>
@stop