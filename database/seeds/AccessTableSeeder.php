<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AccessTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('access')->insert([
            'id_user' => '1',
            'id_module' => '1',
            'id_company' =>'1',
            'views' =>'1',
            'inserts' =>'1',
            'modifys' =>'1',
            'deletes' =>'1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('access')->insert([
            'id_user' => '1',
            'id_module' => '2',
            'id_company' =>'1',
            'views' =>'1',
            'inserts' =>'1',
            'modifys' =>'1',
            'deletes' =>'1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('access')->insert([
            'id_user' => '1',
            'id_module' => '3',
            'id_company' =>'1',
            'views' =>'1',
            'inserts' =>'1',
            'modifys' =>'1',
            'deletes' =>'1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('access')->insert([
            'id_user' => '1',
            'id_module' => '4',
            'id_company' =>'1',
            'views' =>'1',
            'inserts' =>'1',
            'modifys' =>'1',
            'deletes' =>'1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('access')->insert([
            'id_user' => '1',
            'id_module' => '5',
            'id_company' =>'1',
            'views' =>'1',
            'inserts' =>'1',
            'modifys' =>'1',
            'deletes' =>'1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('access')->insert([
            'id_user' => '1',
            'id_module' => '6',
            'id_company' =>'1',
            'views' =>'1',
            'inserts' =>'1',
            'modifys' =>'1',
            'deletes' =>'1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('access')->insert([
            'id_user' => '1',
            'id_module' => '7',
            'id_company' =>'1',
            'views' =>'1',
            'inserts' =>'1',
            'modifys' =>'1',
            'deletes' =>'1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('access')->insert([
            'id_user' => '1',
            'id_module' => '8',
            'id_company' =>'1',
            'views' =>'1',
            'inserts' =>'1',
            'modifys' =>'1',
            'deletes' =>'1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('access')->insert([
            'id_user' => '1',
            'id_module' => '9',
            'id_company' =>'1',
            'views' =>'1',
            'inserts' =>'1',
            'modifys' =>'1',
            'deletes' =>'1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('access')->insert([
            'id_user' => '1',
            'id_module' => '10',
            'id_company' =>'1',
            'views' =>'1',
            'inserts' =>'1',
            'modifys' =>'1',
            'deletes' =>'1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('access')->insert([
            'id_user' => '1',
            'id_module' => '11',
            'id_company' =>'1',
            'views' =>'1',
            'inserts' =>'1',
            'modifys' =>'1',
            'deletes' =>'1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('access')->insert([
            'id_user' => '1',
            'id_module' => '12',
            'id_company' =>'1',
            'views' =>'1',
            'inserts' =>'1',
            'modifys' =>'1',
            'deletes' =>'1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
