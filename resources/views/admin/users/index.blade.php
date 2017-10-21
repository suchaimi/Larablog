@extends('layouts.app')


@section('content')

    <div class="panel panel-default">
    <div class="panel-heading">
        Users 
    </div>
    <div class="panel body">
    <table class="table table-hover">
        <thead>
            <th>Name</th>
            <th>Avatar</th>
            <th>Permission</th>
            <th>Delete</th>
        </thead>
        <tbody>
        @if($users->count() > 0)
            @foreach($users as $user)
    
            <tr>
                <td>{{ $user->name }}</td>
                <td><img width="50px" height="50px" src="{{ asset($user->profile->avatar) }}" alt="{{ $user->avatar }}" style="border-radius: 50%;"></img></td>
                <td>
                    @if($user->admin)
                        <a href="{{ route('user.nadmin', ['id' => $user->id]) }}" class="btn btn-xs btn-success">Admin</a>
                    @else
                        <a href="{{ route('user.admin', ['id' => $user->id]) }}" class="btn btn-xs btn-success">Make admin</a>
                    @endif
                </td>
                <td><a href="{{ route('user.edit', ['id' => $user->id]) }}" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-pencil"></span>&nbsp Edit</a></td>
                <td><a href="{{ route('user.delete', ['id' => $user->id]) }}" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-erase"></span>&nbsp Delete</a></td>
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