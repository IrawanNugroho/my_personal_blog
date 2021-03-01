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
            <div class="card-header">{{ __('Edit Project') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('projects.update', ['id' => $project->id]) }}">
                    @csrf

                    <div class="form-group row">
                        <label for="title" class="col-md-2 col-form-label text-md-right">{{ __('Title') }}</label>

                        <div class="col-md-9">
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $project->title }}" required autocomplete="title" autofocus>

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="content" class="col-md-2 col-form-label text-md-right">{{ __('Description') }}</label>

                        <div class="col-md-9">
                            <textarea id="content" maxlength="370" rows="20" type="text" class="form-control content" name="description">
                            {{ $project->description }}
                            </textarea>

                            {{-- @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror --}}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="status" class="col-md-2 col-form-label text-md-right">{{ __('Status') }}</label>
                        <div class="col-md-2">
                            <select class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="status" name="status">
                                @foreach ($list_status as $status)
                                    @if ($status->id == $project->status_id)
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

                            <button class="btn btn-basic" onclick="window.location='{{ route("projects.index") }}'; return false;">
                                {{ __('Cancel') }}
                            </button>
                            
                        </div>
                    </div>

                </form>
                <form action="{{route('projects.delete',[$project->id])}}" method="POST">
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
