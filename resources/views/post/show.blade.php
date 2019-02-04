@extends('layouts.app')

@section('content')
<div class="container panel-body">
<h1>{{$post['title']}}</h1>
<hr>
<img src="{{$post['image']}}" alt="{{$post['tag']}}" height = 10%; width = 10%;>
<hr>
<p  title = "{{$post['tags']}}">{{$post['body']}}</p>

</div>
<div class="row panel-primary">
@if(count($cat)>0)

@foreach($cat as $caty)

<li><a href = "../category/{{$caty->id}}">{{$caty->Category}}</a></li>

@endforeach
@endif

</div>

@stop
