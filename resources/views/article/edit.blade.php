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
            <div class="card-header">{{ __('Edit Article') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('articles.update', ['id' => $article->id]) }}">
                    @csrf

                    <div class="form-group row">
                        <label for="title" class="col-md-2 col-form-label text-md-right">{{ __('Title') }}</label>

                        <div class="col-md-9">
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $article->title }}" required autocomplete="title" autofocus>

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
                            <textarea id="excerpt" type="excerpt" class="form-control @error('excerpt') is-invalid @enderror" name="excerpt" required>{{ $article->excerpt }}</textarea>

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
                            <textarea id="content" rows="20" type="text" class="form-control content" name="content">
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
                        <label for="author" class="col-md-2 col-form-label text-md-right">{{ __('Author') }}</label>

                        <div class="col-md-9">
                            <input id="author" type="text" class="form-control @error('author') is-invalid @enderror" name="author" value="{{ $article->author }}" required autocomplete="author" autofocus>

                            @error('author')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="category" class="col-md-2 col-form-label text-md-right">{{ __('Category') }}</label>
                        <div class="col-md-2">
                            <select class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="category" name="category">
                                @foreach ($list_category as $category)
                                    @if ($category->id == $article->category_id)
                                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                    @else
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            
                            @error('category')
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

                    <div class="form-group row mb-0">
                        <div class="col-md-9 offset-md-5">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Update') }}
                            </button>

                            <button class="btn btn-basic" onclick="window.location='{{ route("articles.index") }}'; return false;">
                                {{ __('Cancel') }}
                            </button>
                            
                        </div>
                    </div>

                </form>
                <form action="{{route('articles.delete',[$article->id])}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger float-right" type="submit">Delete</button>               
               </form>
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
