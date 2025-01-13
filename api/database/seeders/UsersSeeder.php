<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Users;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'Cauana',
                'login' => 'cau',
                'password' => Hash::make('1'),
                
            ],
            [
                'name' => 'Iago',
                'login' => 'iago',
                'password' => Hash::make('1'),

            ],
            [
                'name' => 'Gabriel Kochem',
                'login' => 'kochem',
                'password' => Hash::make('1'),
            ],
            [
                'name' => 'João Lodi',
                'login' => 'lodi',
                'password' => Hash::make('1'),
            ],
            [
                'name' => 'Luiz',
                'login' => 'luiz',
                'password' => Hash::make('1'),
            ],
            [
                'name' => 'Marlon',
                'login' => 'marlon',
                'password' => Hash::make('1'),
            ],
            [
                'name' => 'Sidemar',
                'login' => 'side',
                'password' => Hash::make('1'),
            ]
        ];

        foreach ($users as $user) {
            Users::create($user);
            
        }
    }
}
