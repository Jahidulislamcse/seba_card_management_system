<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class WordAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $allData = [
            [
                'name' => 'Word admin',
                'email' => 'word_admin@example.com',
                'role'  => USER_ROLE_WARD_ADMIN,
                'password' => Hash::make('password')
            ]
        ];
            //word admin create
            User::updateOrCreate([
                'email' => $allData[0]['email']
            ],[
                'name' => $allData[0]['name'],
                'email' => $allData[0]['email'],
                'role'  => $allData[0]['role'],
                'password' => $allData[0]['password']
            ]);
    }
}
