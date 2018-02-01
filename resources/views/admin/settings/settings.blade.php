@extends('layouts.app')

@section('content')
    @include('admin.includes.errors')

    <div class="panel panel-default">
        <div class="panel-heading">Edit blog setting</div>

        <div class="panel-body">
            <form action="{{route('settings.update', [])}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Site Name</label>
                    <input type="text" id="name" name="site_name" value="{{ $settings->site_name }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" id="address" name="address" value="{{ $settings->address }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="contact_number">Contact Number</label>
                    <input type="text" id="contact_number" name="contact_number" value="{{ $settings->contact_number }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="contact_email">Contact Email</label>
                    <input type="text" id="contact_email" name="contact_email" value="{{ $settings->contact_email }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="about_site">About Site</label>
                    <textarea name="about_site" id="about_site" rows="5" cols="5" class="form-control">{{ $settings->about_site }}</textarea>
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Update Settings</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop

{{--@section('styles')--}}
    {{--<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">--}}
{{--@stop--}}

{{--@section('scripts')--}}
    {{--<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>--}}
    {{--<script>--}}
        {{--$(document).ready(function() {--}}
            {{--$('#about_site').summernote();--}}
        {{--});--}}
    {{--</script>--}}
{{--@stop--}}