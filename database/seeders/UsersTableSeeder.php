<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
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
        User::create([
            'name' => 'Daimer',
            'email' => 'daimer@gmail.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Maicol',
            'email' => 'maicol@gmail.com',
            'password' => Hash::make('password'),
        ]);
        
        User::create([
            'name' => 'Ralph',
            'email' => 'ralph@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
