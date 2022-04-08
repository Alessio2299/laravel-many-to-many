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
        @foreach ($tags as $tag)
          @if ($errors->any())
              <div class="custom-control custom-checkbox">
                  <input name="tags[]" type="checkbox" class="custom-control-input" id="tag_{{$tag->id}}" value={{$tag->id}} {{in_array($tag->id, old('tags'))?'checked':''}}>
                  <label class="custom-control-label" for="tag_{{$tag->id}}">{{$tag->name}}</label>
              </div>
          @else
          <div class="form-check form-check-inline">
            <input name="tags[]" class="form-check-input" type="checkbox" id="tag_{{$tag->id}}" value="{{$tag->id}}" {{$post->tags->contains($tag->id)? 'checked' : ''}} >
            <label class="form-check-label" for="tag_{{$tag->id}}">{{$tag->name}}</label>
          </div>
          @endif
        @endforeach
        <div>
          <button class="my-2 btn btn-success" type="submit">Edit</button>
        </div>
      </form> 
    </div>
@endsection