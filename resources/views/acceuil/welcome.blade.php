@extends('layout')


@section('content')
<!--<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea',
        elementpath: false,
        menubar:false,
        statusbar:false,toolbar:false,readonly : 1,visual_table_class:0
});
</script>
-->



<div class="row" style="margin-right: 15px;">
    <div class="col-xs-12 col-sm-3  logoposeidon">
    <img src="/img/tigreposeidon.jpg" class="img-responsive" alt="test">
    </div>
<div class="col-xs-12 col-sm-9 jumbotron" style="height: 250px; margin-righ:15px;">
    LA dernier citation dans la DB
</div>
</div>

<div class="col-xs-12" >
@foreach ($val as $v)
@if($v->status==1)
    <div class="col-xs-12 col-sm-6 col-md-4">
    <div class="thumbnail" style="width: 90%; height: 350px; margin-right: 35px; ">
    <a href="{{route('showArticleId', ['id' => $v->id])}}">
    <h3 style="text-align: center;  ">{{$v->post_title, $v->id}}</h3>
<img src="{{$v->img}}" alt="..." style="width: 200px; height: 200px; padding-bottom: 15px;">
    </a>
<div style="margin-left:5px;margin-right:auto;padding-bottom:15px;">
{{$v->description}}
<h6 style="opacity:0.7" style="margin-top:10px">Créer le {{substr($v->created_at,0,-8 )}}</h6>
</div>
</div>
</div>
@endif
@endforeach
{!!$val->render()!!}
</div>
@stop