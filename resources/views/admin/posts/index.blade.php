@extends('layouts.app')

@section('title','All Post')

@section('content')
    <div class="container">
        <h1>Posts</h1>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Slug</th>
                <th scope="col">Category</th>
                <th scope="col">Tags</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td><img class="w-25" src="{{$post->url}}" alt="{{$post->title}}"></td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->description}}</td>
                        <td>{{$post->slug}}</td>
                        @if ($post->category == null)
                            <td>Null</td>     
                        @else
                            <td>{{$post->category->name}}</td>     
                        @endif   
                        <td>     
                            @foreach ($post->tags as $tag)
                                <a href="{{route('admin.tags.show', $tag->id)}}"><span class="badge badge-primary">{{$tag->name}}</span></a> 
                            @endforeach     
                        </td>                      
                        <td class="d-flex">
                            <a class="mr-2 btn btn-secondary" href="{{route('admin.posts.edit', $post->id)}}">Edit</a>
                            <a class="mr-2 btn btn-primary" href="{{route('admin.posts.show', $post->id)}}">Show</a>
                            <form method="POST" action="{{route('admin.posts.destroy', $post->id)}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection