@extends('layoutAdmin')

@section ('content')
<?php $activeClass = 'lister';?>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector:'textarea',
        plugins: ("fullscreen emoticons textcolor colorpicker image insertdatetime media"),
        auto_focus: 'element1',
        elementpath: false,
        height : 400,
        toolbar: "fullscreen emoticons forecolor backcolor image insertdatetime media"
    });

</script>
<div class="row ">
    <div class="col-xs-12 menu" >
        <ul class="nav nav-tabs ">
            <li class="{{$activeClass == 'maj' ? 'active' : ''}}"><a data-toggle="tab" href="#lister">Modifier </span></a></li>
            <li class="{{$activeClass == 'ajouter' ? 'active' : ''}}"><a data-toggle="tab" href="#ajouter">Ajouter <span class="glyphicon glyphicon-user"></span></a></li>
        </ul>
    </div>
</div>

<div class="row menu">
    <div class="col-xs-12">
        <div class="tab-content menu">
            <div id="lister" class="tab-pane fade {{$activeClass == 'maj' ? 'active' : ''}}">

                <div class="row">
                    <div class="col-sm-2">
                        <div class="list-group">
                            @foreach ($articles as $article)
                            <button type="button" class="list-group-item"><h2>{{$article->post_title }}<h2>
                            </button>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-sm-10">
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

                    </div>
                </div>


            </div><!--Fin de la div Lister-->

            <div id="ajouter" class="tab-pane fade {{$activeClass == 'ajouter' ? 'active' : ''}}">
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

            </div><!--Fin de la div Ajouter-->
            <div id="maj" class="tab-pane fade {{$activeClass == 'maj' ? 'active' : ''}}">
                Modifier Articles
            </div><!--Fin de la div Ajouter->
        </div><!-- fin tab-content -->
        </div><!-- fin col-xs-12 -->
    </div><!-- fin row Menu -->
@stop
