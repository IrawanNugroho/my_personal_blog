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
            <div class="card-header">{{ __('Show Project') }}</div>
            <div class="card-body">
                    <div class="form-group row">
                        <label for="title" class="col-md-2 col-form-label text-md-right">{{ __('Title') }}</label>

                        <div class="col-md-9">
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $project->title }}" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-md-2 col-form-label text-md-right">{{ __('Description') }}</label>

                        <div class="col-md-9">
                            <textarea id="description" rows="20" type="text" class="form-control content" name="description" disabled>{{ $project->description }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="status" class="col-md-2 col-form-label text-md-right">{{ __('Status') }}</label>
                        <div class="col-md-2">
                            <select class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="status" name="status" disabled>
                                <option value="{{ $project->status }}">{{ $project->status }}</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="updated_by" class="col-md-2 col-form-label text-md-right">{{ __('Updated By') }}</label>
                    
                        <div class="col-md-9">
                            <input id="updated_by" type="text" class="form-control @error('updated_by') is-invalid @enderror" name="updated_by" value="{{ $project->updated_by }}" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="last_update" class="col-md-2 col-form-label text-md-right">{{ __('Last Update') }}</label>
                    
                        <div class="col-md-9">
                            <input id="last_update" type="text" class="form-control @error('last_update') is-invalid @enderror" name="last_update" value="{{ $project->last_update }}" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="created_at" class="col-md-2 col-form-label text-md-right">{{ __('Created At') }}</label>

                        <div class="col-md-9">
                            <input id="created_at" type="text" class="form-control @error('created_at') is-invalid @enderror" name="created_at" value="{{ $project->created_at }}" disabled>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-9 offset-md-5">
                            <form action="{{route('projects.delete',[$project->id])}}" method="POST">
                                @method('DELETE')
                                @csrf
                                
                                <button class="btn btn-info" onclick="window.location='{{ route("projects.index") }}'; return false;">
                                {{ __('Back To Home') }}
                                </button>

                                <button class="btn btn-danger" type="submit">Delete</button>               
                           </form>
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
