@extends('layoutAdmin')
@section('title')
Instructeurs
@stop
@section ('content')
<script src="/js/bootstrap3-typeahead.min.js"></script>
<script src="//cdn.ckeditor.com/4.5.3/full/ckeditor.js"></script>




<div class="row ">
    <div class="col-xs-12 menu" >
        <ul class="nav nav-tabs ">
            <li class="{{$activeMenu == 'ajouter' ? 'active' : ''}}"><a data-toggle="tab" href="#ajouter">Ajouter </a></li>
            <li class="{{$activeMenu == 'maj' ? 'active' : ''}}"><a data-toggle="tab" href="#maj">Modifier </span></a></li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="tab-content menu">
       <div id="ajouter" class="tab-pane fade {{$activeMenu == 'ajouter' ? ' in active' : ''}}">
        {!! Form::open(['url' => 'administration/instructeurs/storeInstructeurs','files'=>true])!!}

            <div class="form-group col-xs-12 col-sm-3">
                    {!! Form::label('name', 'Nom :')!!}
                    {!! Form::text('nom', null, ['class' => 'form-control','required']) !!}
            </div>
            <div class="form-group col-xs-12 col-sm-3 ">
                    {!! Form::label('name', 'Prenom :')!!}
                    {!! Form::text('prenom', null, ['class' => 'form-control','required']) !!}
            </div>
            <div class="form-group col-xs-12 col-sm-3">
            {!! Form::label('name', 'Years of Practice :')!!}
            {!! Form::number('yearPractice', null, ['class' => 'form-control','required','min'=>'0','max'=>'100', 'step'=>'1', 'value'=>'0']) !!}
            </div>
            <div class="form-group col-xs-12 col-sm-3">
            {!! Form::label('name', 'Grades:')!!}
            {!! Form::select('grade', ['9 ième kyu','8 ième kyu','7 ième kyu','6 ième kyu',
            '5 ième kyu',
            '4 ième kyu',
            '3 ième kyu',
            '2 ième kyu',
            '1 er kyu',
            '1 er dan',
            '2 ème dan',
            '3 ème dan',
            '4 ème dan',
            '5 ème dan',
            '6 ème dan',
            ],null,['class' => 'form-control','id'=>'categorie','required'] )!!}
             </div>

            <div class="form-group ">
                    {!! Form::label('name', 'Content :')!!}
                    {!! Form::textarea('editor', null, ['class' => 'form-control','required']) !!}
            </div>
             <div class="form-group col-xs-12 statusClass">
                 {!! Form::label('name', 'Status:')!!}
                 {!! Form::select('status', ['Brouillon','Publier',],null,['class' => 'form-control','required'] )!!}
             </div>

            <div class="form-group">
                    {!! Form::file('image') !!}
                <div class="form-group">
                    <p class="errors">{!!$errors->first('image')!!}</p>
                    @if(Session::has('danger'))
                    <p class="errors">{!! Session::get('danger') !!}</p>
                    @endif
                </div>

                </div>

            <div class="form-group col-xs-12">
                    {!! Form::submit('Ajouter', ['class' => 'btn btn-primary'])!!}
            </div>
    </div>
        {!! Form::close()!!}

        <div id="maj" class="tab-pane fade {{$activeMenu == 'maj' ? ' in active' : ''}}">
            <div class="col-xs-2">
                <ul class="list-group">

                    @foreach ($instructeurs as $instructeur)

                    <li type="button" class="btn-instructeur list-group-item"   id="{{$instructeur->id}}" data-val="{{$instructeur->id}}"  href="{{route('showInstructeur', ['id' => $instructeur->id])}}">{{$instructeur->nom }}</li>

                    @endforeach

                </ul>
            </div>
            <div class="col-xs-10">
                {!! Form::open(['url' => 'administration/instructeurs/updateInstructeur','files'=>true])!!}

                    {!! Form::hidden('id', null, ['class' => 'form-control','required', 'id'=>'id', 'readonly']) !!}
                <div class="form-group col-xs-12 col-sm-3">
                    {!! Form::label('name', 'Nom :')!!}
                    {!! Form::text('nom', null, ['class' => 'form-control','required', 'id'=>'nom']) !!}
                </div>
                <div class="form-group col-xs-12 col-sm-3 ">
                    {!! Form::label('name', 'Prenom :')!!}
                    {!! Form::text('prenom', null, ['class' => 'form-control','required', 'id'=>'prenom']) !!}
                </div>
                <div class="form-group col-xs-12 col-sm-3">
                    {!! Form::label('name', 'Years of Practice :')!!}
                    {!! Form::number('yearPractice', null, ['class' => 'form-control','required','id'=>'yearPractice','min'=>'0','max'=>'100', 'step'=>'1', 'value'=>'0']) !!}
                </div>
                <div class="form-group col-xs-12 col-sm-3">
                    {!! Form::label('name', 'Grades:')!!}
                    {!! Form::select('grade', ['9 ième kyu','8 ième kyu','7 ième kyu','6 ième kyu',
                    '5 ième kyu',
                    '4 ième kyu',
                    '3 ième kyu',
                    '2 ième kyu',
                    '1 er kyu',
                    '2 ème dan',
                    '3 ème dan',
                    '4 ème dan',
                    '5 ème dan',
                    '6 ème dan',
                    ],null,['class' => 'form-control','required', 'id'=>'grade'] )!!}
                </div>
                <div class="form-group ">
                    {!! Form::label('name', 'Content :')!!}
                    {!! Form::textarea('editorUpdate', null, ['class' => 'form-control','required','id'=>'editorUpdate']) !!}
                </div>
                <div class="form-group col-xs-12  statusClass">
                    {!! Form::label('name', 'Status:')!!}
                    {!! Form::select('status', ['Brouillon','Publier',],null,['class' => 'form-control','id'=>'status','required'] )!!}
                </div>
                <div class="control-group">
                    <div class="controls">
                        {!! Form::file('image') !!}
                        <p class="errors">{!!$errors->first('image')!!}</p>
                        @if(Session::has('danger'))
                        <p class="errors">{!! Session::get('danger') !!}</p>
                        @endif
                    </div>
                </div>
                <div class="form-group col-xs-12">
                    {!! Form::submit('Maj', ['class' => 'btn btn-primary'])!!}
                </div>
                {!! Form::close()!!}
            </div>
        </div>
</div>
</div>


<script type="text/javascript">
    CKEDITOR.replace( 'editor', {
        language: 'fr',
        filebrowserImageBrowseUrl:'laravel-filemanager?type=Images',
        filebrowserBrowseUrl: 'laravel-filemanager?type=Files'

    });
    CKEDITOR.replace( 'editorUpdate', {
        language: 'fr',
        filebrowserImageBrowseUrl:'laravel-filemanager?type=Images',
        filebrowserBrowseUrl: 'laravel-filemanager?type=Files'
    });
    </script>
@stop
