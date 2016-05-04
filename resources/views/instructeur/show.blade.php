@extends('layout')

@section('title')
{{strtoupper($instructeur->nom)}}
@stop


@section('content')


{!!$instructeur->Description!!}
@stop