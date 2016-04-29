@extends('layoutAdmin')
@section('title')
Agenda
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
            <li class="{{$activeClass == 'ajouter' ? 'in active' : ''}}"><a data-toggle="tab" href="#ajouter">Ajouter </a></li>
            <li class="{{$activeClass == 'maj' ? 'in active' : ''}}"><a data-toggle="tab" href="#lister">Modifier </span></a></li>
        </ul>
    </div>
</div>

<div class="row menu">
    <div class="col-xs-12">
        <div class="tab-content menu">
            <div id="lister" class="tab-pane fade {{$activeClass == 'maj' ? ' in active' : ''}}">
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
                            @foreach($allEvent as $event)
                            <li type="button" class="btn-event list-group-item"   id="{{$event->id}}" data-val="{{$event->id}}"  href="{{route('showEvent', ['id' => $event->id])}}">{{$event->titre }}</li>
                            @endforeach

                        </ul>
                    </div>

                    <div class="col-sm-10">
                        {!! Form::open(['url' => 'administration/agendaAdmin/updateEvent'])!!}
                      <!--  <div class="col-xs-12">
                            <div class="form-group">
                                <img style="border:none;float: right; padding-right:10px; padding-bottom: 10px;" src="" id="img" width="200px" height="200px">
                            </div>
                        </div>-->
                        <div class="form-group">
                            {!! Form::label('name', 'Titre :')!!}
                            {!! Form::text('titreEvent', null, ['class' => 'form-control','id' => 'titreEvent']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('name', 'Description :')!!}
                            {!! Form::text('description', null, ['class' => 'form-control','id' => 'description','name'=>'description']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::text('id',null,['id'=>'update','readonly', 'id'=>'id']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('name', 'Content :')!!}
                            {!! Form::textarea('editor', null, ['class' => 'form-control', 'id'=>'editor', 'name'=>"editor"]) !!}
                        </div>
                        <div class="form-group col-xs-12 col-sm-4">
                            {!! Form::label('name', 'Start event :')!!}
                            {!! Form::text('start', null, ['class' => 'input-group date form-control','id' => 'start']) !!}
                        </div>

                        <div class="form-group col-xs-12 col-sm-4">
                            {!! Form::label('name', 'End event:')!!}
                            {!! Form::text('end', null, ['class' => 'input-group date form-control','id' => 'end']) !!}
                        </div>
                        <div class="form-group col-xs-12 col-sm-4">
                            {!! Form::label('name', 'status:')!!}
                            {!! Form::select('status', ['Brouillon','Publier'],null,['class' => 'form-control','id'=>'status'] )!!}
                        </div>
                        <div class="form-group col-xs-12 col-sm-4">
                            {!! Form::label('name', 'Type Categorie :')!!}
                            {!! Form::select('categorie', ['Stage','vacances','fermeture'],null,['class' => 'form-control','id'=>'categorie'] )!!}
                        </div>
                        <div class="form-group col-xs-12 col-sm-4">
                            {!! Form::label('name', 'Map :')!!}
                            {!! Form::text('map', null, ['class' => 'form-control','id' => 'map']) !!}
                        </div>



                       <!-- <div class="form-group col-xs-12">
                            {!! Form::file('image') !!}
                            <p class="errors">{!!$errors->first('image')!!}</p>
                            @if(Session::has('error'))
                            <p class="errors">{!! Session::get('error') !!}</p>
                            @endif
                        </div>-->
                        <div class="form-group col-xs-12 col-sm-4">
                            {!! Form::submit('Maj', ['class' => 'btn btn-primary', ])!!}
                        </div>
                        {!! Form::close()!!}
                    </div>
                </div>
            </div><!--Fin de la div modifier-->
            <div id="ajouter" class="tab-pane fade {{$activeClass == 'ajouter' ? ' in active' : ''}}">
               {!! Form::open(['url' => 'administration/agenda/store','files'=>true])!!}
<!--               {!! Form::open(['url' => 'http://localhost:1300/simpleserver/','files'=>true])!!}
-->                <div class="form-group">
                    {!! Form::label('name', 'Titre :')!!}
                    {!! Form::text('post_title', null, ['class' => 'form-control','id' => 'post_title']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('name', 'Description :')!!}
                    {!! Form::text('description', null, ['class' => 'form-control','id' => 'post_description']) !!}
                </div>
                <div class="form-group ">
                    {!! Form::label('name', 'Content :')!!}
                    {!! Form::textarea('post_content', null, ['class' => 'form-control', 'id'=>'post_content']) !!}
                </div>

                <div class="form-group col-xs-12 col-sm-4">
                    {!! Form::label('name', 'Start event :')!!}
                    {!! Form::text('startN', null, ['class' => 'input-group date form-control','id' => 'startN']) !!}
                </div>

                <div class="form-group col-xs-12 col-sm-4">
                    {!! Form::label('name', 'End event:')!!}
                    {!! Form::text('endN', null, ['class' => 'input-group date form-control','id' => 'endN']) !!}
                </div>
                <div class="form-group col-xs-12 col-sm-4">
                    {!! Form::label('name', 'status:')!!}
                    {!! Form::select('status', ['Brouillon','Publier'],null,['class' => 'form-control','id'=>'status'] )!!}
                </div>
                <div class="form-group col-xs-12 col-sm-4">
                    {!! Form::label('name', 'Type Categorie :')!!}
                    {!! Form::select('categorie', ['Stage','vacances','fermeture'],null,['class' => 'form-control','id'=>'categorie'] )!!}
                </div>
                <div class="form-group col-xs-12 col-sm-4">
                    {!! Form::label('name', 'Map :')!!}
                    {!! Form::text('map', null, ['class' => 'form-control','id' => 'map']) !!}
                </div>



              <!-- <div class="form-group col-xs-12">
                    {!! Form::file('image') !!}
                    <p class="errors">{!!$errors->first('image')!!}</p>
                    @if(Session::has('error'))
                    <p class="errors">{!! Session::get('error') !!}</p>
                    @endif
                </div>-->


                <div class="col-xs-12"></div>
                <div class="form-group col-xs-12 col-sm-4">
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
            filebrowserImageBrowseUrl:'laravel-filemanager?type=Images',
            filebrowserBrowseUrl: 'laravel-filemanager?type=Files'

        });
        CKEDITOR.replace( 'post_content', {
            language: 'fr',
            filebrowserImageBrowseUrl:'laravel-filemanager?type=Images',
            filebrowserBrowseUrl: 'laravel-filemanager?type=Files'

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




        jQuery(function () {
            jQuery('#start').datetimepicker({
                format:'Y-m-d H:i:s'

            });
            jQuery('#end').datetimepicker({
                format:'Y-m-d H:i:s'

            });
        });
        jQuery(function () {
            jQuery('#startN').datetimepicker({
                format:'Y-m-d H:i:s'

            });
            jQuery('#endN').datetimepicker({
                format:'Y-m-d H:i:s'

            });
        });
    </script>

    @stop
