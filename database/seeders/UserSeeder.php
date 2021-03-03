<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Alex Garrido',
            'email' => 'www.davidalexander@gmail.com',
            'password' => '$2y$10$1Q5BNth7Rihj1gKjcjUEN.vturPuGsBqi3Dcc6238azR3Ee98GhC.',
            'remember_token' => Str::random(10),
            'email_verified_at' => now()
        ]);
        $admin->roles()->attach(1);
        $admin = User::create([
            'name' => 'Lorena Suarez',
            'email' => 'explorerz.educational@gmail.com',
            'password' => '$2y$10$RWC4uFYCFjJy4If6FevkruBxXlP7q8wWHj5ViqPm7q6K2M6ElxEVu',
            'remember_token' => Str::random(10),
            'email_verified_at' => now()
        ]);
        $admin->roles()->attach(1);
        $profe = User::create([
            'name' => 'Leonardo Sanchez',
            'email' => 'leon@leon.com',
            'password' => '$2y$10$1Q5BNth7Rihj1gKjcjUEN.vturPuGsBqi3Dcc6238azR3Ee98GhC.',
            'remember_token' => Str::random(10),
            'email_verified_at' => now()
        ]);
        $profe->roles()->attach(2);
    }
}
