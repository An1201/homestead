<?php

use Illuminate\Database\Seeder;

class CategoryItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('category_item')->delete();

		DB::table('category_item')->insert([
			['category_id' => 1, 'item_id' => 1],
			['category_id' => 2, 'item_id' => 2],
			['category_id' => 3, 'item_id' => 2],
			['category_id' => 2, 'item_id' => 3],
		]);
    }
}
