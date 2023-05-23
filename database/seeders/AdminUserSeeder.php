<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\UserType;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $adminUserType = UserType::create(['type' => 'admin']);

        User::create([
            'username' => 'admin',
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => Hash::make('12345'),
            'user_type' => $adminUserType->id,
            'address' => '',
            'discount' => 0,
        ]);
    }
}
