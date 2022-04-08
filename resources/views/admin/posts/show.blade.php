@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Post: {{$post->title}}</h1>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Slug</th>
                <th scope="col">Category</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                    <tr>
                        <td><img class="w-50" src="{{$post->url}}" alt="{{$post->title}}"></td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->description}}</td>
                        <td>{{$post->slug}}</td>
                        @if ($post->category == null)
                            <td>Null</td>     
                        @else
                            <td>{{$post->category->name}}</td>     
                        @endif                 
                        <td class="d-flex">
                            <a class="mr-2 btn btn-secondary" href="{{route('admin.posts.edit', $post->id)}}">Edit</a>
                            <a class="mr-2 btn btn-primary" href="{{route('admin.posts.index')}}">Back</a>
                        </td>
                    </tr>
            </tbody>
        </table>
    </div>
@endsection