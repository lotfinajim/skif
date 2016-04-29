@extends('layoutAdmin')
@section('title')
Articles
@stop
@section ('content')
<script src="/js/bootstrap3-typeahead.min.js"></script>

<script src="//cdn.ckeditor.com/4.5.3/full/ckeditor.js"></script>
<!--<script>
tinymce.init({

        selector:'textarea#textareaUpdate, textarea#post_content',
        body_id :'ok',
        plugins: [/*"advlist autolink link image lists charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
            "table contextmenu directionality emoticons paste textcolor responsivefilemanager code",*/
            "fullscreen emoticons textcolor colorpicker image insertdatetime media contextmenu paste  "],
        toolbar: "fullscreen emoticons forecolor backcolor image insertdatetime media paste",
        contextmenu: "link image inserttable | cell row column deletetable | copy | paste",
        paste_data_images: true,
        auto_focus: 'element1',
        elementpath: false,
        height : 400
    });
</script>-->



<div class="row ">
    <div class="col-xs-12 menu" >
        <ul class="nav nav-tabs ">
            <li class="{{$activeMenu == 'ajouter' ? 'active' : ''}}"><a data-toggle="tab" href="#ajouter">Ajouter </a></li>
            <li class="{{$activeMenu == 'maj' ? 'active' : ''}}"><a data-toggle="tab" href="#lister">Modifier </span></a></li>
        </ul>
    </div>
</div>

<div class="row menu">
    <div class="col-xs-12">
        <div class="tab-content menu">
            <div id="lister" class="tab-pane fade {{$activeMenu == 'maj' ? ' in active' : ''}}">
                <div class="row">
                    <div class="col-xs-12 col-sm-2">
                           <input type="text" id="typeahead"  class="form-control typeahead"  placeholder="search" data-provide="typeahead"/>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-2" id="searchResults">
                </div>
                <br>

                <div class="row">
                    <div class="col-sm-2">
                        <ul class="list-group">
                            @foreach ($articles as $article)
                            <li type="button" class="btn-article list-group-item"   id="{{$article->id}}" data-val="{{$article->id}}"  href="{{route('showArticles', ['id' => $article->id])}}">{{$article->post_title }}</li>
                            </button>
                            @endforeach
                            {!!$articles->render()!!}
                        </ul>
                    </div>

                    <div class="col-sm-10">
                        {!! Form::open(['url' => 'administration/update'])!!}
                        <div class="col-xs-12">
                            <div class="form-group">
                                <img style="border:none;float: right; padding-right:10px; padding-bottom: 10px;" src="" id="img" width="200px" height="200px">
                            </div>
                        </div>

                        <div class="form-group">
                            {!! Form::label('name', 'Titre :')!!}
                            {!! Form::text('posttitle', null, ['class' => 'form-control','id' => 'posttitle']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('name', 'Description :')!!}
                            {!! Form::text('description', null, ['class' => 'form-control','id' => 'description']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::text('update',null,['id'=>'update','readonly', 'hidden']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('name', 'Content :')!!}
                            {!! Form::textarea('editor', null, ['class' => 'form-control', 'id'=>'editor', 'name'=>"editor"]) !!}
                        </div>
                        <div class="form-group col-xs-12 col-sm-6 statusClass">
                            {!! Form::label('name', 'Type Categorie :')!!}
                            {!! Form::select('categorie', ['New','Instructeur','Citation'],null,['class' => 'form-control','id'=>'categorie'] )!!}
                        </div>
                        <div class="form-group col-xs-12 col-sm-6 statusClass">
                            {!! Form::label('name', 'Status:')!!}
                            {!! Form::select('status', ['Brouillon','Publier',],null,['class' => 'form-control','id'=>'status','required'] )!!}
                        </div>
                        <div class="form-group">
                            {!! Form::submit('update', ['class' => 'btn btn-primary'])!!}
                        </div>
                        {!! Form::close()!!}
                    </div>
                </div>
            </div><!--Fin de la div modifier-->
            <div id="ajouter" class="tab-pane fade {{$activeMenu == 'ajouter' ? ' in active' : ''}}">
    {!! Form::open(['url' => 'administration/storePost','files'=>true])!!}
               <!-- {!! Form::open(['url' => 'http://localhost:1300/simpleserver/'])!!}-->
              <div class="form-group">
                    {!! Form::label('name', 'Titre :')!!}
                    {!! Form::text('post_title', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('name', 'Description :')!!}
                    {!! Form::text('description', null, ['class' => 'form-control','id' => 'post_description']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('name', 'Content :')!!}
                    {!! Form::textarea('post_content', null, ['class' => 'form-control', 'id'=>'post_content']) !!}
                </div>
                <div class="form-group col-xs-12 col-sm-6 statusClass">
                    {!! Form::label('name', 'Type Categorie :')!!}
                    {!! Form::select('categorie', ['New','Citation'],null,['class' => 'form-control','id'=>'categorie'] )!!}
                </div>
                <div class="form-group col-xs-12 col-sm-6 statusClass">
                    {!! Form::label('name', 'Status:')!!}
                    {!! Form::select('status', ['Brouillon','Publier',],null,['class' => 'form-control','id'=>'status','required'] )!!}
                </div>
                <div class="control-group">
                    <div class="controls">
                        {!! Form::file('image') !!}
                        <p class="errors">{!!$errors->first('image')!!}</p>
                        @if(Session::has('error'))
                        <p class="errors">{!! Session::get('error') !!}</p>
                        @endif
                    </div>
                    </div>
                <div class="form-group">
                    {!! Form::submit('Ajouter', ['class' => 'btn btn-primary', ])!!}
                </div>
                {!! Form::close()!!}

            </div><!--Fin de la div Ajouter-->
            <div id="maj" class="tab-pane fade {{$activeMenu == 'maj' ? 'active' : ''}}">
                Modifier Articles
            </div><!--Fin de la div Ajouter->
        </div><!-- fin tab-content -->
        </div><!-- fin col-xs-12 -->
    </div><!-- fin row Menu -->
    <script type="text/javascript">
                CKEDITOR.replace( 'editor', {
                    language: 'fr',
                    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                    filebrowserBrowseUrl: '/laravel-filemanager?type=Files'

                });
        jQuery('.typeahead').typeahead({
            source:function(query,process){
                jQuery.ajax({
                    url: "{!!URL::route('searchArticle')!!}",
                    data:'query=' + query,
                    dataType:'JSON',
                    async:true,
                    success:function(data){
                        process(data);
                    }
                })
            }
        });

        CKEDITOR.replace( 'post_content', {
            filebrowserBrowseUrl: "{!! url('filemanager/index.html') !!}"
        });
    </script>

    @stop
