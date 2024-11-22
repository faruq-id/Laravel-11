<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Miftahul Faruq, S.Kom',
            'username' => 'faroeq.id',
            'phone_number' => '081999835837',
            'email' => 'faruq@uim.ac.id',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'is_admin' => 1,
            'remember_token' => Str::random(10)
        ]);

        User::create([
            'name' => 'Deny Silvia',
            'username' => 'dany.silvia',
            'phone_number' => '085954090462',
            'email' => 'denyfaruq@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('aaaaaa'),
            'is_admin' => 1,
            'remember_token' => Str::random(10)
        ]);

        User::factory(11)->create();
    }
}
