@extends('layouts.app')

@section('content')
    <div class="container">
      <h1>Edit Post</h1>
      <form method="POST" action="{{route('admin.posts.update', $post->id)}}">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" name="title" placeholder="Add Title" value="{{old('title', $post->title)}}">
        </div>
        <div class="form-group">
          <label for="url">Url</label>
          <input type="text" class="form-control" name="url" placeholder="Add Url Image" value="{{old('title', $post->url)}}">
        </div>
        <div class="form-group">
          <label for="category_id">Category</label>
          <select class="form-control" id="category_id" name="category_id">
            <option value="">Choose a category</option>
            @foreach ($categories as $category)
              <option {{old('id', $category->id) == $post->category->id ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="description">Description</label>
          <textarea type="text" class="form-control" name="description" placeholder="Add Description" rows="6">{{old('title', $post->description)}}</textarea>
        </div>
        <button class="btn btn-success" type="submit">Edit</button>
      </form> 
    </div>
@endsection