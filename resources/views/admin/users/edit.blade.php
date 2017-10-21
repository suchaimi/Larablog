@extends('layouts.app')


@section('content')

    @include('admin.includes.errors')

    <div class="panel panel-default">
        <div class="panel-heading">
            Edit user profile 
        </div>
    
    
        <div class="panel-body">
            <form action="{{ route('user.update', ['id' => $user->id]) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="username">Username</label>
                    <input value="{{ $user->name }}" type="text" name="username" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input value="{{ $user->email }}" type="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="avatar">Avatar</label>
                    <input type="file" name="avatar" class="form-control">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit" >Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop