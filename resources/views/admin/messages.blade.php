@extends('layoutAdmin')

@section('title')
    Messages
@stop
@section('content')
<script src="/js/ajaxContact.js" ></script>
<script src="//cdn.ckeditor.com/4.5.3/full/ckeditor.js"></script>
<div class="col-xs-12 menuMail">

    <label>Boîte de reception : </label> <input class="valueInbox" id="allMais" type="text" readonly value="{{$compteurMail->total}}"> <span title="Non lus" class="glyphicon  glyphicon-inbox" aria-hidden="true"> </span>
    <label>Lu : </label><input class="valueInbox" type="text" id="Lu" readonly value="{{$compteurMail->lu}}" ><span title="Total de mails"  class="glyphicon  glyphicon-envelope" aria-hidden="true"><?php ?></span>
    <label>Non Lu : </label> <input class="valueInbox" id="nonLu" type="text" readonly value="{{$compteurMail->nonLu}}"><span title="Lus" class="glyphicon glyphicon-ok" aria-hidden="true"><?php ?></span>
    <label>Brouillon : </label> <input class="valueInbox" id="draft" type="text" readonly value="{{$compteurMail->draft}}"><span title="Lus" class="glyphicon glyphicon-pencil" aria-hidden="true"><?php ?></span>
    <hr>
</div>
<div class="col-xs-12">

</div>
<div class="col-xs-3">
    <ul class="nav nav-pills nav-stacked">
        @if(count($message) == 0)
        <br>
        <div class="alert alert-warning"> Boite de réception vide</div>
        @endif
        @foreach($message as $mess)
            @if($mess->status==0)
                 <li class='valeur'><a> <span class="userContact glyphicon glyphicon-envelope" id="{{$mess->id}}" data-status="{{$mess->status}}" data-val="{{$mess->id}}" href="{{route('showContact', ['id' =>$mess->id])}}"> {{$mess->nom}} {{$mess->prenom}}</span></a></li>
            @elseif($mess->status==1)
             <li class='valeur'><a> <span class="userContact glyphicon glyphicon-ok" id="{{$mess->id}}" data-status="{{$mess->status}}" data-val="{{$mess->id}}" href="{{route('showContact', ['id' =>$mess->id])}}"> {{$mess->nom}} {{$mess->prenom}}</span></a></li>
            @else
              <li class='valeur'><a> <span class="userContact glyphicon glyphicon-pencil" id="{{$mess->id}}" data-status="{{$mess->status}}" data-val="{{$mess->id}}" href="{{route('showContact', ['id' =>$mess->id])}}"> {{$mess->nom}} {{$mess->prenom}}</span></a></li>
            @endif
        @endforeach
        {!!$message->render()!!}
    </ul>
</div>
<div class="col-xs-9" id="formMessage">
    {!! Form::open(['url' => 'administration/message/send'])!!}
    <div class="form-group">
        {!! Form::text('reply',"Reply" ,['class' => 'btn btn-primary','id'=>'reply', 'disabled','readonly'])!!}
       {!! Form::text('draftBtn',"draft" ,['class' => 'btn btn-primary','id'=>'draftBtn', 'disabled','readonly'])!!}
        {!! Form::text('unread',"Mark as unread" ,['class' => 'btn btn-primary','id'=>'unread', 'disabled','readonly'])!!}
    </div>

    <div class="form-group">
        {!! Form::label('name', 'From :')!!}
        {!! Form::text('from', null, ['class' => 'form-control', 'id'=>'from', 'readonly'=>'readonly']) !!}
        {!! Form::text('id', null,[ 'id'=>'id', 'readonly',  'hidden']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('name', 'To :',['id'=>'nameTo', 'readonly', 'hidden'])!!}
        {!! Form::text('to', null, [ 'id'=>'to', 'readonly', 'hidden']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('name', 'Object :',['id'=>'nameObj', 'readonly', 'hidden'])!!}
        {!! Form::text('obj', null, [ 'id'=>'obj', 'readonly', 'hidden']) !!}
    </div>
    <div class="form-group">


            {!! Form::textarea('content', null, ['class' => 'form-control','id'=>'content', 'readonly']) !!}
    </div>
    <div class="form-group">

        {!! Form::submit('send', [ 'class' => 'btn btn-primary','id'=>'send', 'disabled']) !!}
    </div>
    {!! Form::close()!!}
</div>


<script type="text/javascript">
   /* CKEDITOR.replace( 'content', {
        language: 'fr',
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files'

    });*/
</script>
@stop


@section('footer')


@stop
