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
                <div class="card-header">Gallery
                    <button class="btn-small btn-success float-right" onclick="window.location='{{ route("galleries.create") }}'">+</button>
                </div>

                <div class="">
                    <input class="form-control col-md-3 mt-3 mr-3 float-right" type="text" placeholder="Search" aria-label="Search">
                </div>
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- <table class="table table-hover">
                        <thead>
                            <tr>
                            <th><center>Title</center></th>
                            <th><center>Status</center></th>
                            <th><center>Last Update</center></th>
                            <th><center>Actions</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list_article as $item)
                            <tr>
                                <td><a href="{{ route('articles.show', ['id'=> $item->id]) }}">{{$item->title}}</a></td>
                                <td><center>{{$item->status}}</center></td>
                                <td><center>{{$item->updated_at}}</center></td>
                                <td>
                                    <center>
                                        <button type="button" class="btn-small btn-warning" onclick="window.location='{{ route("articles.edit", ["id" => $item->id]) }}'">Edit</button>
                                    </center>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table> --}}
                </div>
            </div>
            {{-- {{ $list_article->links() }} --}}
        </div>
    </div>
</div>
@endsection