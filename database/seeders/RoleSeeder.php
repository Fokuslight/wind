<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (Role::getRoles() as $idx => $roleTitle) {
            Role::firstOrCreate([
                'title' => $roleTitle
            ], [
                'idx' => $idx
            ]);
        }
    }
}
