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
        @if($trashed->count() > 0)
            @foreach($trashed as $trash)
    
            <tr>
                <td>{{ $trash->title }}</td>
                <td><img width="50px" height="50px" src="{{ $trash->featured }}" alt="{{ $trash->featured }}"></img></td>
                <td><a href="{{ route('post.edit', ['id' => $trash->id]) }}" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-pencil"></span>&nbsp Edit</a></td>
                <td><a href="{{ route('post.restore', ['id' => $trash->id]) }}" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-pencil"></span>&nbsp Restore</a></td>
                <td><a href="{{ route('post.kill', ['id' => $trash->id]) }}" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-erase"></span>&nbsp Delete</a></td>
            </tr>

            @endforeach
        @else
            <tr>
                <th colspan="5" class="text-center">No trashed post yet.</th>
            </tr>
        @endif
        </tbody>
    </table>
    </div>
    </div>

@endsection