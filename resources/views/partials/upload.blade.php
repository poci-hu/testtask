{{-- Uses the following:
 - $video: For model binding
--}}
@extends('welcome')
@section('main')
@if ($errors->any())
<ul class="list-group">
	@foreach ($errors->all() as $error)
	<li class="list-group-item list-group-item-danger">
		<span class="glyphicon glyphicon-warning-sign"></span> {{ $error }}
	</li>
	@endforeach
</ul>
@endif
{!! Form::model($video, [
	'class' => 'form',
    'action' => 'VideoUploader@upload',
    'method' => 'POST',
    'files' => true,
    ]	) !!}
    <div class="form-group">
        <label>Cím</label>
        {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'A videó címe']) !!}
    </div>
    <div class="form-group">
        <label>Rövid leírás</label>
        {!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'Néhány információ a videóról']) !!}
    </div>
    <div class="form-group">
        <label>Kategória <small>(több választás lehetséges)</small></label>
        {!! Form::select('category_list[]', \App\Models\Category::orderBy('name')->get()->lists('name', 'id'), null, ['class' => 'form-control', 'multiple' => 'multiple']) !!}
    </div>
    <div class="form-group">
        <label>Szerző</label>
        {!! Form::select('user_id', ['' => 'Kérem, válasszon!'] + \App\User::orderBy('name')->get()->lists('name', 'id'), null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        <label>Videó <small>(maximum méret: {!! ini_get('post_max_size') !!})</small></label>
        {!! Form::file('video', ['class' => 'form-control', 'accept' => 'video/mp4,video/webm']) !!}
    </div>
{!! Form::submit('Feltöltés', ['class' => 'btn btn-block']) !!}
{!! Form::close() !!}
@endsection
