{{-- Uses the following:
 - $video: The video which owns the data
--}}
<p><img src="{!! asset('profiles/' . $video->owner->getKey() . '.jpg') !!}" style="height: 25px;"> <small>{!! $video->owner->name !!}</small></p>
