@extends('layout')

@section('title')
    Instructeurs
@stop


@section('content')


<div class="row">
    @foreach ($instructeurs as $instructeur)
    @if($instructeur->status==1)
    <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="col-xs-12 instructeurThumbnail">
            <div class="thumbnail" >
                <img src="{{$instructeur->linkImage}}" alt="achour" style="padding-top:15px">
                <div class="caption">
                    <h3 class="text-center"><a  href="{{route('showInst', ['id' => $instructeur->id])}}">{{$instructeur->nom}}</a></h3>
                    <hr>
                </div>
            </div>
        </div>
        </div>


    @endif
@endforeach

</div>
@stop
