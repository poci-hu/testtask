<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
        DB::table('users')->delete();

        DB::table('users')->insert([
			['name' => 'Tipli Tamás', 'profile' => 'tipli.jpg',],
            ['name' => 'Próba Péter', 'profile' => 'probap.jpg',],
            ['name' => 'Gonosz Gerzson', 'profile' => 'gonigeri.jpg',],
            ['name' => 'Vandál Vendel', 'profile' => 'vendel.jpg',],
            ['name' => 'Hűbele Balázs', 'profile' => 'hubele.jpg',],
			]);

	}

}
