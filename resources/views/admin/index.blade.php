@extends('layoutAdmin')

@section('content')
<script src="/js/ajaxAdministrationIndex.js"></script>

<div class="container-fluid ">
    <div class="col-xs-12 jumbotron overview" style=" margin-right: 10px;">
        <h2 class="glyphicon glyphicon-envelope"> MESSAGES</h2>
        <p class="x">

            <label>Boîte de reception : </label> <input class="valueInbox" id="allMais" type="text" readonly value="{{$compteur->total}}"> <span title="Non lus" class="glyphicon  glyphicon-inbox" > </span>
            <label>Lu : </label><input class="valueInbox" type="text" id="mailLu" readonly value="{{$compteur->lu}}" ><span title="Total de mails"  class="glyphicon  glyphicon-ok" aria-hidden="true"></span>
            <label>Non Lu : </label> <input class="valueInbox" id="mailNonLu" type="text" readonly value="{{$compteur->nonLu}}"><span title="Lus" class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
            <label>Brouillon : </label> <input class="valueInbox" id="draft" type="text" readonly value="{{$compteur->draft}}"><span title="draft" class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
        </p>
    </div>
    <div class="col-xs-12  jumbotron overview" style="margin-right: 10px;">
        <h2 class="glyphicon glyphicon-list-alt"> ARTICLES</h2>
        <p class="x">
        <label>TOTAL articles :</label> <input class="valueInbox" id="allMais" type="text" readonly value="{{$compteurArticles->total}}">
        </p>

    </div>
    <div class="col-xs-12 jumbotron overview" style="margin-right: 10px;">
        <h2 class="glyphicon glyphicon-calendar"> Calendrier</h2>
        <p class="x">
            <label>TOTAL MEMBRES :</label>
            <label>MEMBRES ACTIF : </label>
            <label>MEMBRES :</label>
        </p>
    </div>
    <div class="col-xs-12 jumbotron overview" style="margin-right: 10px;">
        <h2 class="glyphicon glyphicon-user"> Membres </h2>
        <p class="x">
            <label>TOTAL MEMBRES :</label>
            <label>MEMBRES ACTIF : </label>
            <label>MEMBRES :</label>
       </p>
    </div>
</div>

@stop
