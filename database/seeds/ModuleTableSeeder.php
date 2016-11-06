<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ModuleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modules')->insert([
            'description' => 'Principal',
            'order' => '1',
            'id_father' =>'0',
            'url' =>'#',
            'messages' => '',
            'status' =>'1',
            'visible' =>'1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('modules')->insert([
            'description' => 'User',
            'order' => '2',
            'id_father' =>'1',
            'url' =>'user',
            'messages' => '',
            'status' =>'1',
            'visible' =>'1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('modules')->insert([
            'description' => 'Company',
            'order' => '3',
            'id_father' =>'1',
            'url' =>'company',
            'messages' => '',
            'status' =>'1',
            'visible' =>'1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('modules')->insert([
            'description' => 'Module',
            'order' => '4',
            'id_father' =>'1',
            'url' =>'module',
            'messages' => '',
            'status' =>'1',
            'visible' =>'1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('modules')->insert([
            'description' => 'Medical',
            'order' => '5',
            'id_father' =>'1',
            'url' =>'medicos',
            'messages' => '',
            'status' =>'1',
            'visible' =>'1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);


        DB::table('modules')->insert([
            'description' => 'Specialtys',
            'order' => '6',
            'id_father' =>'1',
            'url' =>'specialtys',
            'messages' => '',
            'status' =>'1',
            'visible' =>'1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('modules')->insert([
            'description' => 'Agenda',
            'order' => '1',
            'id_father' =>'0',
            'url' =>'#',
            'messages' => '',
            'status' =>'1',
            'visible' =>'1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('modules')->insert([
            'description' => 'Planning',
            'order' => '1',
            'id_father' =>'7',
            'url' =>'planning',
            'messages' => '',
            'status' =>'1',
            'visible' =>'1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('modules')->insert([
            'description' => 'General Configuration',
            'order' => '2',
            'id_father' =>'0',
            'url' =>'#',
            'messages' => '',
            'status' =>'1',
            'visible' =>'1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('modules')->insert([
            'description' => 'Themes',
            'order' => '1',
            'id_father' =>'9',
            'url' =>'themes',
            'messages' => '',
            'status' =>'1',
            'visible' =>'1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('modules')->insert([
            'description' => 'Reports',
            'order' => '3',
            'id_father' =>'0',
            'url' =>'#',
            'messages' => '',
            'status' =>'1',
            'visible' =>'1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('modules')->insert([
            'description' => 'Reports Planning',
            'order' => '1',
            'id_father' =>'11',
            'url' =>'rplanning',
            'messages' => '',
            'status' =>'1',
            'visible' =>'1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
