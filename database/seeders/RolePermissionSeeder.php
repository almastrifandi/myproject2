<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $ownerRole = Role::create([
            'name' => 'owner'
        ]);
        $studentrRole = Role::create([
            'name' => 'student'
        ]);
        $teacherrRole = Role::create([
            'name' => 'teacher'
        ]);

        $userOwner = User::create([
            'name' => 'Almas Trif',
            'occupation' => 'Owner',
            'avatar' => 'images/default-avatar.png',
            'email' => 'almasputra424@gmail.com',
            'password' => bcrypt('12345')
        ]);

        
        $userOwner->assignRole($ownerRole);


    }
}
