@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add New Post Here') }}</div>

                <div class="card-body">
                    <form method="POST" action="./addpost " enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">
                            {{ __('Title') }}
                            </label>

                            <div class="col-md-6">
<input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required autofocus>

                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="body" class="col-md-4 col-form-label text-md-right">
                            {{ __('body') }}
                            </label>

                            <div class="col-md-6">
<textarea id="body" rows = "10" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="body" value="{{ old('bodyl') }}">
</textarea>

                                @if ($errors->has('body'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('body') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="summary" class="col-md-4 col-form-label text-md-right">
                            {{ __('summary') }}
                            </label>

                            <div class="col-md-6">
<input id="summary" type="text" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="summary" required>

                                @if ($errors->has('summary'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('summary') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tags" class="col-md-4 col-form-label text-md-right">
                            {{ __('Tags') }}
                            </label>

                             <div class="col-md-6">
<input id="tags" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="tags" value="{{ old('tags') }}" required >

                                @if ($errors->has('tags'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tags') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="author" class="col-md-4 col-form-label text-md-right">
                            {{ __('Author') }}
                            </label>

                             <div class="col-md-6">
<input id="author" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="author" value="{{ old('author') }}" required >

                                @if ($errors->has('author'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('author') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


<div class="form-group row">
                            <label for="category_id" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>

                            <div class="col-md-6">
<select  id="category_id" type="category_id" class="form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }}" name="category_id" required>
<option value = "">select</option>
@if( count($cat) > 0 )
 @foreach($cat as $ca)
<option value="{{$ca->id}}">{{$ca->Category}}</option>


@endforeach
@endif
</select>



                         <div class="form-group row">
                            <label for="file" class="col-md-4 col-form-label text-md-right">
                            {{ __('Image') }}
                            </label>

                             <div class="col-md-6">
<input id="image" type="FILE" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="image" value="{{ old('image') }}" required >

                                @if ($errors->has('image'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Publish post') }}
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
