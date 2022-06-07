@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            {{-- Title card  --}}
            <div class="card">
                <div class="card-header">Write a new Post</div>

            {{--/ Title card  --}}
            <div class="card-body">
                <form action="{{route('admin.posts.store')}}" method="POST" enctype="multipart/form-data">
                    {{-- Token  --}}
                    @csrf
                    {{-- / Token  --}}

                    {{-- title post --}}
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror " placeholder="Post's title"

                        >@error('title')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>

                        @enderror
                    </div>

                    {{-- category post  --}}
                    <div class="form-group">
                        <label>Category</label>
                        <select name="category_id" class=" @error('content') is-invalid @enderror">
                            <option value="">Choose Category</option>
                            @foreach ($categories as $category)

                            <option value="{{$category->id}}" {{$category->id == old('category_id') ? 'selected' : ''}}> {{-- Se non inserisco il secondo valore su old, mi rimane quello di default--}}
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
                    {{-- Image post  --}}
                    <div class="form-group">
                        <label for="image">Cover image:</label>
                        <input type="file" name="image" class="form-control @error('content') is-invalid @enderror"/>
                            {{-- {{old('image')}} --}}

                        {{-- @error('content')
                                <div class="invalid-feedback">
                                    {{$message}}
                                 </div>
                        @enderror --}}
                    </div>
                    {{-- /Image post  --}}

                      {{-- content post --}}
                      <div class="form-group">
                        <label for="content">Content:</label>
                        <textarea type="text" name="content" class="form-control @error('content') is-invalid @enderror" placeholder="Post's content">
                            {{old('content')}}
                        </textarea>
                        @error('content')
                                <div class="invalid-feedback">
                                    {{$message}}
                                 </div>
                        @enderror
                    </div>
                    {{--/ content post --}}

                    {{-- Tags input  --}}
                    <div class="form-group">
                        <h2 for="content">Tags:</h2>
                        @foreach ($tags as $tag)

                            <input class="form-check-input" type="checkbox" value="{{ $tag->id }}"
                                name="tags[]" {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }} />
                            <div class="form-check-label">{{ $tag->name }}</div>
                        @endforeach
                        @error('tags')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    {{-- @dd($tags) --}}

                    {{-- /Tags input  --}}


                    <div class="form-group">
                        <input type="submit" class="btn btn-info white" value="Create Post">
                    </div>
                </form>
            </div>
        </div>
                <a href="{{route('admin.posts.index')}}" class="btn btn-success"> Back</a>

        </div>
    </div>
</div>
@endsection
