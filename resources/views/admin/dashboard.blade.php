@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Dashboard</div>

        <div class="panel-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            Welcome!
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3">
            <div class="panel panel-info">
                <div class="panel-heading text-center">Posted</div>

                <div class="panel-body">
                    <h1 class="text-center">{{ $posts_count }}</h1>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="panel panel-danger">
                <div class="panel-heading text-center">Trashed Post</div>

                <div class="panel-body">
                    <h1 class="text-center">{{ $trashed_count }}</h1>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="panel panel-success">
                <div class="panel-heading text-center">Users</div>

                <div class="panel-body">
                    <h1 class="text-center">{{ $users_count }}</h1>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="panel panel-info">
                <div class="panel-heading text-center">Categories</div>

                <div class="panel-body">
                    <h1 class="text-center">{{ $categories_count }}</h1>
                </div>
            </div>
        </div>
    </div>
@endsection
