{{-- Uses the following:
 - $selected_category:   The category we display
 - $videos: The videos to list
--}}
@extends('welcome')
@section('main')
<div class="row">
@if (!empty($videos) && $videos->count())
    @foreach($videos as $video)
    <div class="col-sm-4">
        <div class="panel panel-default">
            <div class="panel-body text-center">
                <a href="/video/{!! $video->getKey() !!}">
                    <img src="{!! asset('previews/' . $video->filename . '.jpg') !!}" style="height: 100px;">
                </a>
            </div>
            <div class="panel-footer">
                <p><a href="/video/{!! $video->getKey() !!}">{!! $video->title !!}</a></p>
                @include('partials.video_details')
            </div>
        </div>
    </div>
    @endforeach
@else
    <div class="text-center">Sajnos nem található videó</div>
@endif
<div>
@endsection
