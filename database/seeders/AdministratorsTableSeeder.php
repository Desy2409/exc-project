<?php

namespace Database\Seeders;

use App\Models\Administrator;
use App\Models\User;
use Illuminate\Database\Seeder;

class AdministratorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $existingAdministrator = Administrator::where('last_name', 'DEV')->where('first_name', 'Desy')->first();
        $user =User::latest()->first();
        if(!$existingAdministrator){
            Administrator::create([
            'last_name' => 'DEV', 
            'first_name' => 'Desy', 
            'user_id' => $user->id, 
        ]);
        }
        
    }
}
