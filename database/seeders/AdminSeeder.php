<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $superAdmin = User::create([
//            'name'                  => 'Super Admin',
//            'email'                 => 'admin@admin.dev',
//            'password'              => Hash::make('123456'),
//            'email_verified_at'     => now(),
//            'created_at'           =>  now()
//        ]);
//
//        $superAdmin->assignRole('super admin');
    }
}
