@extends('layouts.app')

@section('header')
<h1>This is the title</h1>
@stop

@section('content')

@if(count($cat)>0)
    @foreach($cat as $caty)
    <ul>
        <li><a href = "categories/{{$caty->id}}">{{$caty['Category']}}</a></li>
    </ul>
@endforeach
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add a new category here') }}</div>

@if(session('response'))
<div class="alert alert-success">{{session('response')}}</div>

@endif
                <hr>

                <div class="card-body">
                    <form method="POST" action="{{ url('/addcat') }}">
                        @csrf

                        <div class="form-group row">
            <label for="Category" class="col-md-4 col-form-label text-md-right">
            {{ __('New Category Name') }}
            </label>

                            <div class="col-md-6">
 <input id="cat" type="text" class="form-control{{ $errors->has('category') ? ' is-invalid' : '' }}" name="category" value="{{ old('category') }}" required autofocus>

                                @if ($errors->has('category'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add New Category') }}
                                </button>


                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@stop
