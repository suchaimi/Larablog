@extends('layouts.app')


@section('content')

    @include('admin.includes.errors')

    <div class="panel panel-default">
        <div class="panel-heading">
            Create new tags.
        </div>

        <div class="panel panel-default"></div>
    
        <div class="panel-body">
            <form action="{{ route('tags.store') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Tags</label>
                    <input type="text" name="tag" class="form-control">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit" >Store Tags</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop