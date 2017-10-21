@extends('layouts.app')


@section('content')

    <div class="panel panel-default">
    <div class="panel body">
    <table class="table table-hover">
        <thead>
            <th>Title</th>
            <th>Featured</th>
            <th>Edit</th>
            <th>Delete</th>
        </thead>
        <tbody>
        @if($posts->count() > 0)
            @foreach($posts as $post)
    
            <tr>
                <td>{{ $post->title }}</td>
                <td><img width="50px" height="50px" src="{{ $post->featured }}" alt="{{ $post->featured }}"></img></td>
                <td><a href="{{ route('post.edit', ['id' => $post->id]) }}" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-pencil"></span>&nbsp Edit</a></td>
                <td><a href="{{ route('post.destroy', ['id' => $post->id]) }}" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-erase"></span>&nbsp Delete</a></td>
            </tr>

            @endforeach
        @else
            <tr>
                <th colspan="5" class="text-center"> Not any post yet.</th>
            </tr>       
        @endif
        </tbody>
    </table>
    </div>
    </div>

@endsection