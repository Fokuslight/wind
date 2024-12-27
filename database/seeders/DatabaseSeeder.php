<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Role;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = [
            'name' => 'user',
            'email' => 'user@mail.ru',
            'password' => Hash::make(123123123)
        ];

        $user = User::firstOrCreate([
            'email' => $user['email']
        ], $user);

        $this->call([
            RoleSeeder::class,
            CategorySeeder::class,
            TagSeeder::class,
            PostSeeder::class,
        ]);

        $role = Role::where('idx', Role::ROLE_ADMIN)->first();
        $user->roles()->syncWithoutDetaching($role->id);

    }
}
