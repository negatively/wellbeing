<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        // Admin user
        $admin = User::create([
            'name' => 'Super Admin',
            'email' => 'admin@mail.com',
            'password' => 'dummyadmin',
        ]);
        $admin->assignRole(RoleEnum::ADMIN);
        $admin->markEmailAsVerified();

        $hr = User::create([
            'name' => 'Dummy HR',
            'email' => 'dummy_hr@mail.com',
            'password' => 'dummyhr',
        ]);
        $hr->assignRole(RoleEnum::HR);
        $hr->markEmailAsVerified();

        $employee = User::create([
            'name' => 'Dummy Employee',
            'email' => 'dummy_employee@mail.com',
            'password' => 'dummyemployee',
        ]);
        $employee->assignRole(RoleEnum::EMPLOYEE);
        $employee->markEmailAsVerified();

    }
}