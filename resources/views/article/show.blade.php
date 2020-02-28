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
            <div class="card-header">{{ __('Show Article') }}</div>
            <div class="card-body">
                    <div class="form-group row">
                        <label for="title" class="col-md-2 col-form-label text-md-right">{{ __('Title') }}</label>

                        <div class="col-md-9">
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $article->title }}" disabled>

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="slug" class="col-md-2 col-form-label text-md-right">{{ __('Slug') }}</label>

                        <div class="col-md-9">
                            <input id="slug" type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ $article->slug }}" disabled>

                            @error('slug')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="excerpt" class="col-md-2 col-form-label text-md-right">{{ __('Excerpt') }}</label>

                        <div class="col-md-9">
                            <textarea id="excerpt" type="excerpt" class="form-control @error('excerpt') is-invalid @enderror" name="excerpt" disabled>
                            {{ $article->excerpt }}
                            </textarea>

                            @error('excerpt')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="content" class="col-md-2 col-form-label text-md-right">{{ __('Content') }}</label>

                        <div class="col-md-9">
                            <textarea id="content" rows="20" type="text" class="form-control content" name="content" disabled>
                            {{ $article->content }}
                            </textarea>

                            {{-- @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror --}}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tags" class="col-md-2 col-form-label text-md-right">{{ __('Tags') }}</label>

                        <div class="col-md-9">
                            <input id="tags" type="text" class="form-control @error('tags') is-invalid @enderror" name="tags" value="{{ $article->tags }}" disabled>

                            @error('tags')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="author" class="col-md-2 col-form-label text-md-right">{{ __('Author') }}</label>

                        <div class="col-md-9">
                            <input id="author" type="text" class="form-control @error('author') is-invalid @enderror" name="author" value="{{ $article->author }}" disabled>

                            @error('author')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="status" class="col-md-2 col-form-label text-md-right">{{ __('Status') }}</label>
                        <div class="col-md-2">
                            <select class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="status" name="status" disabled>
                                @foreach ($list_status as $status)
                                    @if ($status->id == $article->status_id)
                                        <option value="{{ $status->id }}" selected>{{ $status->name }}</option>
                                    @else
                                        <option value="{{ $status->id }}">{{ $status->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            
                            @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="updated_by" class="col-md-2 col-form-label text-md-right">{{ __('Updated By') }}</label>
                    
                        <div class="col-md-9">
                            <input id="updated_by" type="text" class="form-control @error('updated_by') is-invalid @enderror" name="updated_by" value="{{ $article->updated_by }}" disabled>
                    
                            @error('updated_by')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="last_update" class="col-md-2 col-form-label text-md-right">{{ __('Last Update') }}</label>
                    
                        <div class="col-md-9">
                            <input id="last_update" type="text" class="form-control @error('last_update') is-invalid @enderror" name="last_update" value="{{ $article->last_update }}" disabled>
                    
                            @error('last_update')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="created_at" class="col-md-2 col-form-label text-md-right">{{ __('Created At') }}</label>

                        <div class="col-md-9">
                            <input id="created_at" type="text" class="form-control @error('created_at') is-invalid @enderror" name="created_at" value="{{ $article->created_at }}" disabled>

                            @error('created_at')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-9 offset-md-5">
                            <button class="btn btn-info" onclick="window.location='{{ route("articles.index") }}'">
                                {{ __('Back To Home') }}
                            </button>
                        </div>
                    </div>
            </div>
        </div>

        {{-- <div class="col-md-2">
            <div class="card-header">{{ __('Menus') }}</div>
            <div class="card-body">
            </div>
        </div> --}}
    </div>
</div>
@endsection
