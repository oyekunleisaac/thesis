<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categories')->insert([

            [
                'name' => 'Sciences',
                'created_at' => now(),
                'updated_at' => now(),

             
            ],
            [
                'name' => 'Art',
                'created_at' => now(),
                'updated_at' => now(),

             
            ],
            [
                'name' => 'Business',
                'created_at' => now(),
                'updated_at' => now(),

             
            ],
            
        ]);
    }
}
