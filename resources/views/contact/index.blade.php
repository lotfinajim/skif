@extends('layout')

@section('title')
About Page - Skif
@stop
@section('content')
<div class="row mapAndInfo">
    <div class="col-xs-12 col-sm-4 map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2519.3189103145273!2d4.426016415656162!3d50.84377846682631!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c3db5f3f87eff1%3A0x39998053d06d630d!2sAvenue+des+Vaillants+2%2C+1200+Woluwe-Saint-Lambert%2C+Belgique!5e0!3m2!1sfr!2sus!4v1452604945858" width="95%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>               </div>
    <div class="col-xs-12 col-sm-8 addr">
        <div class="jumbotron" style="margin-right: 15px">
            <h2><strong>Complexe sportif du Poseidon</strong></h2>
            <p>Avenue des Vaillants,2 <br>
                1200 Bruxelles
            </p>
           Tel:
        </div>
    </div>
</div>
<div class="form" style="padding-top: 15px;">
    {!! Form::open(['url' => '/valid'])!!}
        <div class="col-xs-12 col-sm-4" style="padding-right:15px;">
        <div class="form-group">
            {!! Form::label('name', 'nom :')!!}
            {!! Form::text('nom', null, ['class' => 'form-control contact','id'=>'nom', 'required' => 'required']) !!}
        </div>
        </div>
        <div class="col-xs-12 col-sm-4" style="padding-right:15px;">
            <div class="form-group">
                {!! Form::label('name', 'Prenom :')!!}
                {!! Form::text('prenom', null, ['class' => 'form-control contact','id' => 'prenom', 'required' => 'required']) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-4" >
            <div class="form-group">
                {!! Form::label('name', 'Email :')!!}
                {!! Form::email('email', null, ['class' => 'form-control contact','id' => 'email', 'required' => 'required']) !!}
            </div>
        </div>
        <div class="col-xs-12 ">
            <div class="form-group">
                {!! Form::label('name', 'Information :')!!}
                {!! Form::textarea('information', null, ['class' => 'form-control contact','id' => 'information', 'required' => 'required']) !!}
            </div>
        </div>
    <div class="col-xs-12">
        <div class="form-group">
            {!! Form::submit('Envoyer', ['class' => 'btn btn-primary btnContact', 'id' => 'envoyer-message'])!!}
        </div>
     </div>
    {!! Form::close()!!}
</div>
@stop


