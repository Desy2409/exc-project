<?php

namespace Database\Seeders;

use App\Models\User;
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

        $existingUser = User::where('email', 'desy@dev-desy.com')->first();
        if(!$existingUser){
            User::create([
            'user_type' => 'Admin', 
            'name' => 'Desy DEV', 
            'email' => 'desy@dev-desy.com', 
            'password' => Hash::make('password@'), 
            'token' => Hash::make('desy' . 'desy@dev.com' . '@$@' . $year),
        ]);
        }
        
    }
}
