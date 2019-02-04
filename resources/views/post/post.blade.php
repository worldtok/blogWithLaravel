@extends('layouts.app')

@section('content')

@if(count($posts)>0)
    @foreach($posts as $post)
    <h1>{{$post->title}}</h1>

@if(session('response'))
<div class="alert alert-success">{{session('response')}}</div>

@endif
<div class="row container">
<div class="col-md 4">
</div>
<div class="col-md-4">

<img  class = "img-thumbnail img-circle" src="{{$post->image}}" alt="post image" width = "270" height = "207"/>

                       </div>
                       <div class="col-md-4"></div>
                       </div>

<div class="pannel  pannel-default">
<p>{{$post['Summary']}}</p>
</div>
<div class="panel panel-primary">
<ul>
<li>
 <a href='{{url("/post/$post->id")}}'>view</a>
 </li>
 <li>
 <a href='{{url("/post/$post->id/edit")}}'>Edit</a>
 </li>

 <li>
 <a href='{{ url("/delete/$post->id") }}'>Delete</a>
 </li>

</div>
@endforeach
@endif


			<div class="text-center">

{{$posts->links()}}
            </div>



@endsection
