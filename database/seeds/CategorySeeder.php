<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CategorySeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        DB::table('categories')->delete();

        DB::table('categories')->insert([
			['name' => 'Oktatás', 'description' => ''],
			['name' => 'Szabadidő', 'description' => ''],
			['name' => 'Sport', 'description' => ''],
			['name' => 'Munka', 'description' => ''],
			['name' => 'Timelapse', 'description' => ''],
			]);

	}

}
