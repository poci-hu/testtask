<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ContentSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        DB::table('videos')->delete();

        DB::table('videos')->insert([
			['title' => 'Jamie és a csirkék', 'description' => 'Megunhatatlan', 'video' => '1.mp4', 'user_id' => 2],
			['title' => 'Bunny Trailer', 'description' => 'Demonstrational WebM video', 'video' => '2.webm', 'user_id' => 4],
			]);

		DB::table('category_video')->delete();

		DB::table('category_video')->insert([
			['category_id' => 1, 'video_id' => 1],
			['category_id' => 2, 'video_id' => 1],
			['category_id' => 3, 'video_id' => 2],
			['category_id' => 1, 'video_id' => 2],
			['category_id' => 4, 'video_id' => 2],
			]);
	}

}
