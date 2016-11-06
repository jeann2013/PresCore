<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companys')->insert([
            'name' => 'Company Demo',
            'ruc' => '1',
            'phone' =>'63786669',
            'address' =>'Panama',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
