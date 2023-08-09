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
        $roles = ['Admins','Gerants'];
        foreach ($roles as $role) {
            Role::create([
                'type' => $role,
                'created_at' =>now(),
                'updated_at' =>now(),
            
            ]);
        }
    }
}
