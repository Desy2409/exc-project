<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $year = date('Y');

        DB::table('users')->insert([
            ['name'=>'desy','email'=>'desy@dev-desy.com','password'=>Hash::make('password@'),'token'=>Hash::make('desy'.'desy@dev.com'.'@$@'.$year)],
        ]);
    }
}
