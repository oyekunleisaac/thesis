<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([

            [
                'fname' => 'Mowadola',
                'lname' => 'Osifeso',
                'payment' => 'Pending',
                'role' => '2',
                'email' => 'mowadola@osifeso.com',
                'password' => 'password',
                'created_at' => now(),
                 'updated_at' => now(),
 
              
             ]
            ]);
    }
}
