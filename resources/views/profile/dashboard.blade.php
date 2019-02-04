@extends('layouts.app')

@section('content')
<h1>Welcome to your dashboard</h1>

@if(session('response'))
<div class="alert alert-success">{{session('response')}}</div>

@endif
<h2>{{ ('Username is ') .($prof->username)}}</h2>
<div class="row container">
<div class="col-md-4"></div>
<img src="{{$prof->image}}" alt="This is your default profile image" height = 10%; width = 10%; srcset="">
</div>
<ul>
<a href = "#">Update your profile details</a>

</ul>
@stop
