@extends('layouts.app')


@section('content')

    @include('admin.includes.errors')

    <div class="panel panel-default">
        <div class="panel-heading">
            Create new post.
        </div>
    
    
        <div class="panel-body">
            <form action="{{ route('post.update', ['id' => $post->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input value="{{ $post->title }}" type="text" name="title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="featured">Featured</label>
                    <input type="file" name="featured" class="form-control">
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category_id" id="category" class="form-control">
                        @foreach($categories as $category)
                            @if($post->category->id == $category->id)
                            <option value="{{ $category->id }}"
                                    selected
                            >{{ $category->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                @foreach($tags as $tag)
                    <div class="checkbox"><label for=""><input name="tags[]" type="checkbox" value="{{ $tag->id }}"
                    @foreach($post->tags as $ptag)
                        @if($tag->id == $ptag->id)
                            checked         
                        @endif
                    @endforeach
                    >{{ $tag->tag }}</label></div>
                @endforeach
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" cols="30" row="10" class="form-control">{{ $post->content }}</textarea>
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit" >Store Post</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop