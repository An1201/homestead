<?php

use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('items')->delete();

		DB::table('items')->insert([
			['name' => 'скафандр'],
			['name' => 'мяч'],
			['name' => 'лыжи'],
		]);
    }
}
