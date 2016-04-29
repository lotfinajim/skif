@extends('layout')
@section('title')
<h3>{{$post->post_title}}</h3>
@stop
@section ('content')
{!!$post->post_content!!}
@stop
