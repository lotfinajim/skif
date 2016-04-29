@extends('layoutAdmin')

@section ('content')
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea' });</script>
<!--
<script type="text/javascript" src="{{ asset('/js/tinymce/tinymce.min.js') }}"></script>
<script type="text/javascript">
    tinymce.init({
        selector : "textarea"

    });
</script>-->

{!! Form::open(['url' => 'administration/storePost'])!!}
        <div class="form-group">
            {!! Form::label('name', 'Titre :')!!}
            {!! Form::text('post_title', null, ['class' => 'form-control','id' => 'post_title']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('name', 'Content :')!!}
            {!! Form::textarea('post_content', null, ['class' => 'form-control', 'id'=>'post_content']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('name', 'Type Categorie :')!!}
            {!! Form::select('categorie', ['New','Instructeur','Citation'],['class' => 'form-control','id'=>'categorie'] )!!}
        </div>
        <div class="form-group">
            {!! Form::submit('Ajouter', ['class' => 'btn btn-primary'])!!}
        </div>
{!! Form::close()!!}
@stop

