@extends('layouts.app')

@section('content')
    @include('admin.includes.errors')

    <div class="panel panel-default">
        <div class="panel-heading">Create new user</div>

        <div class="panel-body">
            <form action="{{route('user.store', [])}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Store User</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop