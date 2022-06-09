@extends('layouts.dashboard')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
            {{-- Title card  --}}
            <div class="card">
                <div class="card-header">Edit a Post</div>

                <div class="card-body">
                <form action="{{route('admin.posts.update', $post)}}" method="POST" enctype="multipart/form-data">
                    {{-- Token  --}}
                    @csrf
                    {{-- / Token  --}}

                    {{-- title post --}}
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror " placeholder="Post's title" value="{{old('title',$post->title)}}">

                        @error('title')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>

                        @enderror
                    </div>
                    {{--/ title post --}}
                    {{-- Slug  --}}
                    <div class="form-group">
                        <label for="slug">Slug:</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror " placeholder="Post's title" value="{{old('slug',$post->slug)}}">
                    </div>
                    {{--/ Slug  --}}
                    <div class="form-group">
                        <div>
                        <img src="{{ asset('storage/' . $post->cover)}}">

                        </div>
                        <label for="image">Cover image:</label>
                        <input type="file" name="image" />

                    </div>
                    {{-- category post  --}}
                    <div class="form-group">
                        <label>Category</label>
                        <select name="category_id" class=" @error('category_id') is-invalid @enderror">
                            <option value="">Choose Category</option>
                            @foreach ($categories as $category)
                            {{-- Category id è selezionato? se si  me lo fa vedere se è no rimane vuoto --}}
                            <option value="{{$category->id}}" {{$category->id == old('category_id', $post->category_id) ? 'selected' : ''}}> {{-- Se non inserisco il secondo valore su old, mi rimane quello di default--}}
                                {{$category->name}}
                            </option>

                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="invalid-feedback">
                            {{$message}}
                         </div>
                        @enderror
                    </div>
                    {{-- /category post  --}}
                      <div class="form-group">
                        <label for="content">Content:</label>
                        <textarea type="text" name="content" class="form-control @error('content') is-invalid @enderror" placeholder="Post's content">{{old('content', $post->content)}}</textarea>
                         @error('content')
                                <div class="invalid-feedback">
                                    {{$message}}
                                 </div>
                        @enderror
                    </div>
                    {{--/ content post --}}
                    {{-- Tags input  --}}
                    <div class="form-group">
                        <p>Tags:</p>
                        @foreach ($tags as $tag)
                            <div class="ml-3">
                                <input type="checkbox" value="{{ $tag->id }}" name="tags[]"
                                    class="form-check-input @error('tags') is-invalid @enderror "
                                    {{ $post->tag->contains($tag) ? 'checked' : '' }}>
                                <div class="form-check-label">{{ $tag->name }}</div>
                            </div>
                        @endforeach
                        @error('tags[]')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- /Tags input  --}}
                    <div class="form-group">
                        <input type="submit" class="btn btn-info white" value="Edit Post">
                    </div>
                </form>
            </div>
        </div>
                <a href="{{route('admin.posts.index')}}" class="btn btn-success"> Back</a>

        </div>
    </div>
</div>
@endsection
