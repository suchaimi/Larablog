@extends('layouts.app')


@section('content')

    <div class="panel panel-default">
    <div class="panel body">
    <table class="table table-hover">
        <thead>
            <th>Category Name</th>
            <th>Edit</th>
            <th>Delete</th>
        </thead>
        <tbody>
            @foreach($categories as $category)
    
            <tr>
                <td>{{ $category->name }}</td>
                <td><a href="{{ route('category.edit', ['id' => $category->id]) }}" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-pencil"></span>&nbsp Edit</a></td>
                <td><a href="{{ route('category.destroy', ['id' => $category->id]) }}" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-erase"></span>&nbsp Delete</a></td>
            </tr>

            @endforeach
        </tbody>
    </table>
    </div>
    </div>

@endsection