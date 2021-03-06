@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        {{--<div class="panel-heading">Create a new post</div>--}}

        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                    <th>Tag Name</th>
                    <th>Editing</th>
                    <th>Deleting</th>
                </thead>

                <tbody>
                @if($tags->count() == 0)
                    <tr>
                        <th colspan="3" class="text-center">
                            No Tags Yet
                        </th>
                    </tr>
                @endif
                    @foreach($tags as $tag)
                        <tr>
                            <td>{{ $tag->tag }}</td>
                            <td><a href="{{ route('tag.edit', ['id' => $tag->id, ]) }}" class="btn btn-xs btn-info">Edit</a></td>
                            <td><a href="{{ route('tag.delete', ['id' => $tag->id, ]) }}" class="btn btn-xs btn-danger">Delete</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop