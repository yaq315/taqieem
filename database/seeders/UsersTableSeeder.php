<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        // تعطيل فحص المفاتيح الخارجية مؤقتاً
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        
        DB::table('users')->truncate();
        
        // إعادة تفعيل فحص المفاتيح الخارجية
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $users = [
            [
                'name' => 'leen',
                'phone' => '0790000000',
                'email' => 'leen@taqieem.com',
                'password' => Hash::make('123456789'),
                'role' => 'manager',
            ],
              [
                'name' => 'Rama',
                'phone' => '0791111111',
                'email' => 'Rama@taqieem.com',
                'password' => Hash::make('123456789'),
                'role' => 'parent',
            ],
            [
                'name' => 'raneem',
                'phone' => '0792222222',
                'email' => 'raneem@taqieem.com',
                'password' => Hash::make('123456789'),
                'role' => 'parent',
            ],
            [
                'name' => 'rawan',
                'phone' => '0793333333',
                'email' => 'rawan@taqieem.com',
                'password' => Hash::make('123456789'),
                'role' => 'manager',
            ],
            [
                'name' => 'saba',
                'phone' => '0794444444',
                'email' => 'saba@taqieem.com',
                'password' => Hash::make('123456789'),
                'role' => 'manager',
            ],
        
        ];

        DB::table('users')->insert($users);
    }
}




