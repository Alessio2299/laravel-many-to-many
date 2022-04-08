@extends('layouts.app')

@section('title','All Post')

@section('content')
    <div class="container">
        <h1>Posts</h1>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
                <th scope="col">Slug</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                    <tr>
                        <td>{{$tag->id}}</td>                      
                        <td>{{$tag->name}}</td>                      
                        <td>{{$tag->slug}}</td>                      
                        <td class="d-flex">
                            <a class="mr-2 btn btn-primary" href="{{route('admin.tags.show', $tag->id)}}">Show</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection