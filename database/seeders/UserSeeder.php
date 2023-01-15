<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run()
    {
        $dateTime = date('Y-m-d h:i:s', time());

        $data = [
            [
                'username' => 'SuperAdmin',
                'email' => 'superadmin@superadmin.test',
                'password' => Hash::make('test-superadmin'),
                'email_verified_at' => $dateTime,
                'remember_token' => Str::random(60),
                'created_at' => $dateTime,
                'updated_at' => $dateTime,
                'deleted_at' => null,
            ],
            [
                'username' => 'Admin',
                'email' => 'admin@admin.test',
                'password' => Hash::make('test-admin'),
                'email_verified_at' => $dateTime,
                'remember_token' => Str::random(60),
                'created_at' => $dateTime,
                'updated_at' => $dateTime,
                'deleted_at' => null,
            ],
            [
                'username' => 'Moderator',
                'email' => 'mod@mod.test',
                'password' => Hash::make('test-mod'),
                'email_verified_at' => $dateTime,
                'remember_token' => Str::random(60),
                'created_at' => $dateTime,
                'updated_at' => $dateTime,
                'deleted_at' => null,
            ],
        ];

        User::insert($data);
    }
}
