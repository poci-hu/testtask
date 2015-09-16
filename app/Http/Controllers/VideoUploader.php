<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VideoUploader extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//we display categories on every page
		view()->share('categories', \App\Models\Category::all());
	}

	public function upload()
	{
		$video = new \App\Models\Video();
		return view('partials.upload', compact('video'));
	}

	/**
	 * Process video upload
	 *
	 * @param  \Illuminate\Http\Request $request The form with the needed data
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function process(Request $request)
	{

		//validation rules
		$rules = [
			'title' => 'required',
			'category_list' => 'required',
			'user_id' => 'required',
			'video' => 'isneededvideo',
		];

		//validation messages
		$msgs = [
			'title.required' => 'A cím kitöltése kötelező!',
			'category_list.required' => 'A kategória kiválasztása kötelező!',
			'user_id.required' => 'A szerző kiválasztása kötelező!',
			'video.required' => 'Videó nélkül nincs mit feltölteni!',
			'isneededvideo' => 'A videónak mp4 vagy webm formátumúnak kell lennie!',
		];

		\Validator::extend('isneededvideo', function($attr, $value, $params){

			return ($value->getMimeType() == 'video/mp4' || $value->getMimeType() == 'video/webm');
		});

		$validator = \Validator::make($request->all(), $rules, $msgs);

		if ($validator->fails())
		{
			return redirect()->back()->withErrors($validator->errors())->withInput($request->all());
		}

		//ease up coding with some shortcuts
		$file = $request->file('video');
		$extension = strtolower($file->getClientOriginalExtension());

		$video = \App\Models\Video::create($request->except('video', 'category_list'));

		//set video filename
		$video->video = $video->getKey() . '.' . $extension;

		//move video file
		$file->move(public_path() . '/videos/', $video->video);

		//save object
		$video->save();

		//sync pivot
		$video->categories()->sync(array_filter($request->input('category_list')));

		//do the capture
		$this->capture($video);

		return redirect('/');
	}

	/**
	 * Create screenshot from uploaded video
	 * @param  \App\Models\Video $video The object we created
	 * @return boolean	Always true
	 */
	private function capture(\App\Models\Video $video)
	{
		//that's easier
		$video_path = public_path('/videos/' . $video->video);

		//find duration
		$ffprobe = \FFMpeg\FFProbe::create();
		$duration = $ffprobe->format($video_path)->get('duration');

		//take the shot
		$ffmpeg = \FFMpeg\FFMpeg::create();
		$capture = $ffmpeg->open($video_path);
		$capture->frame(\FFMpeg\Coordinate\TimeCode::fromSeconds(($duration > 5) ? 5: (int)($duration / 2)))
		    ->save(public_path('/previews/' . $video->getKey() . '.jpg'));

		return true;
	}

}
