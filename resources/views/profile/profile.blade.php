@extends('layouts.app')


@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Please Add profile') }}</div>

                <div class="card-body">
                    <form method="POST" action="./up" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">
                            {{ __('username') }}
                            </label>

                            <div class="col-md-6">
<input id="title" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="bio" class="col-md-4 col-form-label text-md-right">
                            {{ __('Biography') }}
                            </label>

                            <div class="col-md-6">
<textarea id="body" rows = "10" type="text" class="form-control{{ $errors->has('bio') ? ' is-invalid' : '' }}" name="bio" value="{{ old('bio') }}" required>
</textarea>

                                @if ($errors->has('bio'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('bio') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Profession" class="col-md-4 col-form-label text-md-right">
                            {{ __('Profession') }}
                            </label>

                            <div class="col-md-6">
<input id="profession" type="text" class="form-control{{ $errors->has('profession') ? ' is-invalid' : '' }}" name="profession" value = "{{old('profession')}}"  required>

                                @if ($errors->has('profession'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('profession') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telephone" class="col-md-4 col-form-label text-md-right">
                            {{ __('Telephone') }}
                            </label>

                             <div class="col-md-6">
<input id="tags" type="tel" class="form-control{{ $errors->has('telephone') ? ' is-invalid' : '' }}" name="telephone" value="{{ old('telephone') }}" required >

                                @if ($errors->has('telephone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('telephone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">
                            {{ __('gender') }}
                            </label>

                             <div class="col-md-6">
<select  id="gender" type="text" class="form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }}" name="gender" required>
<option value = "">select</option>
<option value="male">Male</option>
<option value="Female">Female</option>

</select>
                                @if ($errors->has('gender'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

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
                                    {{ __('Add profile') }}
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
