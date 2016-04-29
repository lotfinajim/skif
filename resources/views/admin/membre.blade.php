@extends('layoutAdmin')


@section('title')
Membres
@stop
@section ('content')
<script src="/js/bootstrap3-typeahead.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/t/bs-3.3.6/dt-1.10.11/datatables.min.js"></script>
<div class="row ">
    <div class="col-xs-12 menu" >
        <ul class="nav nav-tabs ">
            <li class="{{$activeMenu == 'lister' ? 'active' : ''}}"><a data-toggle="tab" href="#lister">Lister </span></a></li>
            <li class="{{$activeMenu == 'ajouter' ? 'active' : ''}}"><a data-toggle="tab" href="#ajouter">Ajouter <span class="glyphicon glyphicon-user"></span></a></li>
            <li class="{{$activeMenu == 'maj' ? 'active' : ''}} "><a data-toggle="tab" href="#maj">Mettre à jour <span class="glyphicon glyphicon-refresh"></span></a></li>
        </ul>
    </div>
</div>
<div class="row menu">
    <div class="col-xs-12">
        <div class="tab-content menu">
            <div id="lister" class="tab-pane fade {{$activeMenu == 'lister' ? 'in active' : ''}}">
                    <table id="listerMembre" class="displayMembre table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Email</th>
                                <th>Sexe</th>
                                <th>Addresse</th>
                                <th>Localite</th>
                                <th>Phone</th>
                                <th>Nr Id</th>
                                <th>Date de naissance</th>
                                <th>Début de cotisation</th>
                                <th>Fin de cotisation</th>
                                <th>Renouvellement</th>
                                <th>Actif</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($all as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->Nom}}</td>
                            <td>{{$user->Prenom}}</td>
                            <td>{{$user->Email}}</td>
                            <td>{{$user->sexe}}</td>
                            <td>{{$user->Adres}}</td>
                            <td>{{$user->Localite}}</td>
                            <td>{{$user->Phone}}</td>
                            <td>{{$user->NrID}}</td>
                            <td>{{$user->DateNaissance}}</td>
                            <td>{{$user->DebutCot}}</td>
                            <td>{{$user->FinCot}}</td>
                            <td>{{$user->RenouvelementSigner}}</td>
                            <td>{{$user->Actif}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
            </div><!--Fin de la div Lister-->

            <div id="ajouter" class="tab-pane fade {{$activeMenu == 'ajouter' ? ' in active' : ''}}">
                {!! Form::open(['url' => 'administration/storeMembre'])!!}
                <div class="form-group">
                    {!! Form::label('name', 'Nom :',['class' => 'col-xs-12 col-sm-3'])!!}
                    {!! Form::text('nom', null, ['class' => 'form-control', 'style'=>'width:75%', 'required' ])!!}
                </div>
                <div class="form-group">
                    {!! Form::label('name', 'Prénom :',['class' => 'col-xs-12 col-sm-3'])!!}
                    {!! Form::text('prenom', null, ['class' => 'form-control', 'style'=>'width:75%', 'required']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('name', 'Sexe :',['class' => 'col-xs-12 col-sm-3'])!!}
                    {!! Form::radio('sexe', 'H',['class' => 'form-control', 'style'=>'width:75%']) !!} H
                    {!! Form::radio('sexe', 'F', ['class' => 'form-control', 'style'=>'width:75%']) !!} F
                </div>
                <div class="form-group">
                    {!! Form::label('name', 'Addresse :',['class' => 'col-xs-12 col-sm-3'])!!}
                    {!! Form::text('addresse', null, ['class' => 'form-control', 'style'=>'width:75%', 'required']) !!}
                </div>
                <div class="form-group" id="localiteSearch">
                    {!! Form::label('name', 'Localité :',['class' => 'col-xs-12 col-sm-3 '])!!}
                    {!! Form::text(null, null, ['class' => 'form-control typeahead','name'=>'localite', 'style'=>'width:75%', 'required', 'data-provide'=>"typeahead",'id'=>'localiteAjax']) !!}
                </div>
                <div class="form-group col-xs-12"  id="resLocalite"></div>
                <div class="form-group">
                    {!! Form::label('name', 'email :',['class' => 'col-xs-12 col-sm-3'])!!}
                    {!! Form::text('email', null, ['class' => 'form-control', 'style'=>'width:75%', 'required']) !!}

                </div>
                <div class="form-group">
                    {!! Form::label('name', 'Nr Id :',['class' => 'col-xs-12 col-sm-3'])!!}
                    {!! Form::text('nrId', null, ['class' => 'form-control', 'style'=>'width:75%', 'required']) !!}
                </div>

                    <div class="form-group">
                        {!! Form::label('name', 'Gsm / Tel :',['class' =>  'col-xs-12 col-sm-3'])!!}

                        {!! Form::text('Phone', null, ['class' => 'form-control', 'style'=>'width:75%', 'required']) !!}
                    </div>

                <div class="form-group">
                    {!! Form::label('name', 'Date de naissance :',['class' => 'col-xs-12 col-sm-3'])!!}
                    {!! Form::selectRange('dayN',1,31,null,['class' => 'btn btn-default dropdown-toggle', 'style'=>'width:24%']) !!}
                    {!! Form::selectMonth('monthN',null,['class' => 'btn btn-default dropdown-toggle', 'style'=>'width:24%']) !!}
                    {!! Form::selectYear('yearN',2016,1945,null,['class' => 'btn btn-default dropdown-toggle', 'style'=>'width:24%']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('name', 'Début cotisation :',['class' => 'col-xs-12 col-sm-3'])!!}
                    {!! Form::selectRange('dayD',1,31,null,['class' => 'btn btn-default dropdown-toggle', 'style'=>'width:24%']) !!}

                    {!! Form::selectMonth('monthD',null,['class' => 'btn btn-default dropdown-toggle', 'style'=>'width:24%']) !!}
                    {!! Form::selectYear('yearD',2016,1945,null,['class' => 'btn btn-default dropdown-toggle', 'style'=>'width:24%']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('name', 'Fin cotisation:',['class' => 'col-xs-12 col-sm-3'])!!}
                    {!! Form::selectRange('dayF',1,31,null,['class' => 'btn btn-default dropdown-toggle', 'style'=>'width:24%']) !!}

                    {!! Form::selectMonth('monthF',null,['class' => 'btn btn-default dropdown-toggle', 'style'=>'width:24%']) !!}
                    {!! Form::selectYear('yearF',2016,1945,null,['class' => 'btn btn-default dropdown-toggle', 'style'=>'width:24%']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('name', 'Renouvellement :',['class' => 'col-xs-12 col-sm-3'])!!}
                    {!! Form::radio('renouvellement', 1, ['class' => 'form-control', 'style'=>'width:75%,margin-right:15px;']) !!} Oui
                    {!! Form::radio('renouvellement', 0, ['class' => 'form-control', 'style'=>'width:75%']) !!} Non
                </div>
                <div class="form-group">
                    {!! Form::label('name', 'Actif :',['class' => 'col-xs-12 col-sm-3'])!!}
                    {!! Form::radio('actif', 1,['class' => 'form-control', 'style'=>'width:75%, margin-right:15px;'])!!} Oui
                    {!! Form::radio('actif', 0, ['class' => 'form-control', 'style'=>'width:75%']) !!} Non
                </div>

                <div class="form-group">
                    {!! Form::submit('Ajouter', ['class' => 'btn btn-primary'])!!}
                </div>

                {!! Form::close()!!}
            </div><!--Fin de la div Ajouter-->
            <div id="maj" class="tab-pane fade {{$activeMenu == 'maj' ? 'in active' : ''}}">
                <div class="row">
                    <div class="col-xs-12 col-sm-4 " id="updateUser">
                        <input type="text"  id="search" class="form-control typeahead col-sm-push-3"  placeholder="search" data-provide="typeahead"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-4  "  id="resultlistCP"></div>
                </div>
                <div class="row">
                    {!! Form::hidden('idSearch', "hello", ['class' => 'form-control', 'style'=>'width:75%','hidden']) !!}
                </div>


                <div class="row">
                    <div id="showUser" style="display: none" >
                        {!! Form::open(['url' => 'administration/updateMembre', 'methode'=>'post'])!!}
                        {!! Form::text('id',null,['id'=>'idU','readonly', 'hidden']) !!}
                        <div class="form-group">
                            {!! Form::label('name', 'Nom :',['class' => 'col-xs-12 col-sm-3'])!!}
                            {!! Form::text('nomU', null,  ['class' => 'form-control', 'style'=>'width:75%', 'required', 'id' => 'nomU'])!!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('name', 'Prénom :',['class' => 'col-xs-12 col-sm-3'])!!}
                            {!! Form::text('prenomU', null, ['class' => 'form-control', 'style'=>'width:75%', 'required', 'id'=> 'prenomU']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('name', 'Sexe :',['class' => 'col-xs-12 col-sm-3'])!!}
                            {!! Form::radio('sexe', 'H',['class' => 'form-control', 'style'=>'width:75%' , 'id'=> 'sexe']) !!} H
                            {!! Form::radio('sexe', 'F', ['class' => 'form-control', 'style'=>'width:75%', 'id'=> 'sexe']) !!} F
                        </div>
                        <div class="form-group">
                            {!! Form::label('name', 'Addresse :',['class' => 'col-xs-12 col-sm-3'])!!}
                            {!! Form::text('addresseU', null, ['class' => 'form-control', 'style'=>'width:75%', 'required', 'id'=> 'addresseU']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('name', 'Localité :',['class' => 'col-xs-12 col-sm-3'])!!}
                            {!! Form::text('localiteU', null, ['class' => 'form-control', 'style'=>'width:75%', 'required', 'id'=> 'localiteU']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('name', 'email :',['class' => 'col-xs-12 col-sm-3'])!!}
                            {!! Form::text('emailU', null, ['class' => 'form-control', 'style'=>'width:75%', 'required', 'id'=> 'emailU']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('name', 'Nr Id :',['class' => 'col-xs-12 col-sm-3'])!!}
                            {!! Form::text('nrIdU', null, ['class' => 'form-control', 'style'=>'width:75%', 'required', 'id'=> 'nrIdU']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('name', 'Gsm / Tel :',['class' =>  'col-xs-12 col-sm-3'])!!}

                            {!! Form::text('PhoneU', null, ['class' => 'form-control', 'style'=>'width:75%', 'required', 'id'=> 'PhoneU']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('name', 'Date de naissance :',['class' => 'col-xs-12 col-sm-3'])!!}
                            {!! Form::selectRange('dayNU',01,31,null,['class' => 'btn btn-default dropdown-toggle', 'style'=>'width:24%', 'id'=>'dayNU']) !!}
                            {!! Form::selectMonth('monthNU',null,['class' => 'btn btn-default dropdown-toggle', 'style'=>'width:24%', 'id'=>'monthNU']) !!}
                            {!! Form::selectYear('yearNU',2016,1945,null,['class' => 'btn btn-default dropdown-toggle', 'style'=>'width:24%', 'id'=>'yearNU']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('name', 'Début cotisation :',['class' => 'col-xs-12 col-sm-3'])!!}
                            {!! Form::selectRange('dayDU',1,31,null,['class' => 'btn btn-default dropdown-toggle', 'style'=>'width:24%', 'id'=>'dayDU']) !!}

                            {!! Form::selectMonth('monthDU',null,['class' => 'btn btn-default dropdown-toggle', 'style'=>'width:24%', 'id'=>'monthDU']) !!}
                            {!! Form::selectYear('yearDU',2016,1945,null,['class' => 'btn btn-default dropdown-toggle', 'style'=>'width:24%', 'id'=>'yearDU']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('name', 'Fin cotisation:',['class' => 'col-xs-12 col-sm-3'])!!}
                            {!! Form::selectRange('dayFU',1,31,null,['class' => 'btn btn-default dropdown-toggle', 'style'=>'width:24%', 'id'=>'dayFU']) !!}

                            {!! Form::selectMonth('monthFU',null,['class' => 'btn btn-default dropdown-toggle', 'style'=>'width:24%', 'id'=>'monthFU']) !!}
                            {!! Form::selectYear('yearFU',2016,1945,null,['class' => 'btn btn-default dropdown-toggle', 'style'=>'width:24%', 'id'=>'yearFU']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('name', 'Renouvellement :',['class' => 'col-xs-12 col-sm-3'])!!}
                            {!! Form::radio('renouvellementU', 1, ['class' => 'form-control', 'style'=>'width:75%,margin-right:15px;']) !!} Oui
                            {!! Form::radio('renouvellementU', 0, ['class' => 'form-control', 'style'=>'width:75%']) !!} Non
                        </div>
                        <div class="form-group">
                            {!! Form::label('name', 'Actif :',['class' => 'col-xs-12 col-sm-3'])!!}
                            {!! Form::radio('actifU', 1,['class' => 'form-control', 'style'=>'width:75%, margin-right:15px;'])!!} Oui
                            {!! Form::radio('actifU', 0, ['class' => 'form-control', 'style'=>'width:75%']) !!} Non
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Maj', ['class' => 'btn btn-primary', 'id'=>'majUser'])!!}
                        </div>

                        {!! Form::close()!!}
                    </div>
                </div>
            </div><!--Fin de la div Ajouter->
        </div><!-- fin tab-content -->
    </div><!-- fin col-xs-12 -->
</div><!-- fin row Menu -->


    <script type="text/javascript">
        jQuery('#localiteSearch .typeahead').typeahead({
            source:function(query,process){
                jQuery.ajax({
                    url: '{!!URL::route('searchLocalite')!!}',
                    data:'query=' + query,
                    dataType:'JSON',
                    async:true,
                    success:function(data){
                        if(data=="vide")
                        {
                            jQuery('#resLocalite').attr('class','col-xs-12 ').val("Aucun résultat trouvé");
                        }else{
                            jQuery('#resLocalite').text('');
                            jQuery.each(data, function(key,val){
                                jQuery('#resLocalite').attr('class','col-xs-12 col-xs-offset-3 alert alert-info').append('<li class="itemOnClickLoc" data-idlocalite="'+val.ID+'" >'+val.CodePostal+ '</li>').css('width','75%')
                                jQuery('.itemOnClickLoc').click(function(t){

                                    jQuery('#localiteAjax').val(jQuery(this).text());
                                    jQuery('#resLocalite').empty().attr('class','');
                                });

                            });

                        }
                    }
                });

            }
        });

        jQuery('#updateUser .typeahead').typeahead({
            source:function(query,process){
                jQuery.ajax({
                        url: '{!!URL::route('searchAllUser')!!}',
                        data:'query=' + query,
                        dataType:'JSON',
                        async:true,
                        success:function(data){

                        if(data=="vide"){
                            jQuery('#resultlistCP').attr('class','col-sm-push-3 col-sm-4 alert alert-info').val("Aucun résultat trouvé");
                        }else{
                        //process(data);
                            jQuery('#resultlistCP').text('');
                            jQuery.each(data, function(key,val){
                            jQuery('#resultlistCP').attr('class','col-xs-12 col-sm-4 alert alert-info').append('<li class="itemOnClickCP" data-idmembre="'+val.id+'" >'+val.Prenom+' ' + val.Nom+ '</li>')
                                jQuery('.itemOnClickCP').click(function(t){
                                    jQuery('#search').val(jQuery(this).text());
                                    jQuery('#resultlistCP').empty().attr('class','');
                                    var idMembre=val.id;
                                    jQuery("#showUser").show(function(){
                                        jQuery.ajax({
                                            url: '{!!URL::route('searchUser')!!}',
                                            data:'query=' + idMembre,
                                            dataType:'JSON',
                                            async:true,
                                            success:function(data){
                                               jQuery("#nomU").val(data.Nom);
                                               jQuery('#prenomU').val(data.Prenom);

                                                if(data.sexe == 'H'){
                                                    jQuery('input#sexe').prop("checked",true);
                                                }else{
                                                    jQuery('input#sexe').prop("checked",true);
                                                }
                                              jQuery("#idU").val(data.id)
                                               jQuery('#addresseU').val(data.Adres);
                                               jQuery('#localiteU').val(data.Localite);
                                               jQuery('#emailU').val(data.Email);
                                               jQuery('#nrIdU').val(data.NrID);
                                               jQuery('#PhoneU').val(data.Phone);

                                                var dateNaissance = data.DateNaissance;
                                                var daysN=dateNaissance.substring(8,10);
                                                var monthN=dateNaissance.substring(5,7);
                                                var yearsN=dateNaissance.substring(0,4);
                                                jQuery("select#dayNU").val(daysN.replace(/^0+/,''));
                                                jQuery("select#monthNU").val(monthN.replace(/^0+/,''));
                                                jQuery("select#yearNU").val(yearsN.replace(/^0+/,''));

                                                var dateD = data.DebutCot;
                                                var daysD=dateD.substring(8,10);
                                                var monthD=dateD.substring(5,7);
                                                var yearsD=dateD.substring(0,4);
                                                jQuery("select#dayDU").val(daysD.replace(/^0+/,''));
                                                jQuery("select#monthDU").val(monthD.replace(/^0+/,''));
                                                jQuery("select#yearDU").val(yearsD.replace(/^0+/,''));


                                                var dateF = data.FinCot;
                                                var daysF=dateF.substring(8,10);
                                                var monthF=dateF.substring(5,7);
                                                var yearsF=dateF.substring(0,4);
                                                jQuery("select#dayFU").val(daysF.replace(/^0+/,''));
                                                jQuery("select#monthFU").val(monthF.replace(/^0+/,''));
                                                jQuery("select#yearFU").val(yearsF.replace(/^0+/,''));
                                                var x =  daysF.replace(/^0+/,'');

                                            }
                                        });
                                    });
                                });


                            });
                        }

                    }
                });




            }
        });


        jQuery('#listerMembre').DataTable();



    </script>
@stop
