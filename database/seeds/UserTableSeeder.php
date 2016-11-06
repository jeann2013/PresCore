<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->insert([
            'firtsname' => 'Jean Carlos',
            'lastname' => 'Nunez',
            'user' => 'jeann',
            'password' => md5('142857'),
            'id_company' => '1',
            'status' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
