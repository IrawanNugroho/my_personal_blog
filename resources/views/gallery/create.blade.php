@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if(!empty($message))
            <div class="alert alert-success">
                {{ $message }}
            </div>
        @endif
        
        @if(count($errors) > 0 )
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <ul class="p-0 m-0" style="list-style: none;">
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
            <div class="card">
                <div class="card-header">{{ __('Image') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('galleries.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-md-2 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-9">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="excerpt" class="col-md-2 col-form-label text-md-right">{{ __('Image') }}</label>
                            <div class="col-md-9">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image" aria-describedby="inputGroupFileAddon01">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="excerpt" class="col-md-2 col-form-label text-md-right">{{ __('Excerpt') }}</label>

                            <div class="col-md-9">
                                <textarea id="excerpt" type="excerpt" class="form-control @error('excerpt') is-invalid @enderror" name="excerpt" value="{{ old('excerpt') }}" required>
                                </textarea>

                                @error('excerpt')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="credit" class="col-md-2 col-form-label text-md-right">{{ __('Credit') }}</label>

                            <div class="col-md-9">
                                <input id="credit" type="text" class="form-control @error('credit') is-invalid @enderror" name="credit" value="{{ old('credit') }}" required autocomplete="credit" autofocus>

                                @error('credit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="status" class="col-md-2 col-form-label text-md-right">{{ __('Status') }}</label>
                            <div class="col-md-2">
                                <select class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="status" name="status">
                                    @foreach ($list_status as $status)
                                        <option value="{{ $status->id }}">{{ $status->name }}</option>
                                    @endforeach
                                </select>
                                
                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-9 offset-md-5">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>

                                <button class="btn btn-basic" onclick="window.location='{{ route("galleries.index") }}'">
                                    {{ __('Cancel') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <!-- <div class="col-md-2">
            <div class="card-header">{{ __('Menus') }}</div>
            <div class="card-body">
            </div>
        </div> -->
    </div>
</div>
@endsection
