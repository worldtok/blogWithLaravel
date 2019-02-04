@extends('layouts.app')

@section('content')
<h1>These posts beloings to this category</h1>

<h1>{{$cat->Category}}</h1>
<hr>

@foreach($cat->posts as $post)
<h1><a href = "../post/{{$post->id}}">{{$post->title}}</a></h1>
<p>{{$post->body}}</p>
@endforeach



@stop
