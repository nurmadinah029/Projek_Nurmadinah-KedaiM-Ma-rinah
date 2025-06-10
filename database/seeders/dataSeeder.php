<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class dataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Nurmadinah',
                'email' => 'admin@gmail.com',
                'role' => 'Admin',
                'password' => bcrypt('123')
            ],
            [
                'name' => 'dina',
                'email' => 'Kasir@gmail.com',
                'role' => 'Kasir',
                'password' => bcrypt('123')
            ],
        ];
        foreach ($data as $key => $dt) {
            User::create($dt);
        }
    }
}
