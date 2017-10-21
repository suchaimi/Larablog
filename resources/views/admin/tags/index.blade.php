@extends('layouts.app')


@section('content')

    <div class="panel panel-default">
    <div class="panel body">
    <table class="table table-hover">
        <thead>
            <th>Tags Name</th>
            <th>Edit</th>
            <th>Delete</th>
        </thead>
        <tbody>
        @if($tags->count() > 0)
            @foreach($tags as $tag)
    
            <tr>
                <td>{{ $tag->tag }}</td>
                <td><a href="{{ route('tags.edit', ['id' => $tag->id]) }}" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-pencil"></span>&nbsp Edit</a></td>
                <td><a href="{{ route('tags.delete', ['id' => $tag->id]) }}" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-erase"></span>&nbsp Delete</a></td>
            </tr>

            @endforeach
        @else
            <tr>
                <th colspan="5" class="text-center"> No tags yet. </th>
            </tr>
        @endif 
        </tbody>
    </table>
    </div>
    </div>

@endsection