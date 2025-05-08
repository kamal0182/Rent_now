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
        $roles = [
            [
                'name' => 'Customer',
                'description' => 'This is a customer',
            ],
            [
                'name' => 'Renter',
                'description' => 'This is a renter',
            ],
            [
                'name' => 'Admin',
                'description' => 'This is an admin',
            ],
        ];

        foreach ($roles as $data) {
            Role::create($data);
        }
    }
    
}
