{{-- Uses the following:
 - $video: The video to display
--}}
@extends('welcome')
@section('main')
<div class="row">
    <div class="col-sm-10 col-sm-offset-1">
        <div class="panel panel-default">
            <div class="panel-body text-center">
                <video width="400" controls autoplay>
                    <source src="{!! asset('videos/' . $video->video) !!}" type="video/{!! $video->extension !!}">
                    A videólejátszó nem támogatott :(
                </video>
            </div>
            <div class="panel-footer">
                <p>
                    {!! $video->description !!}
                </p>
                @include('partials.video_details')
            </div>
        </div>
    </div>
</div>
@endsection
