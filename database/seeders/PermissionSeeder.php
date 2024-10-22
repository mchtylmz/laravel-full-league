<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name' => 'Yönetici']);

        Permission::insert([
            ['name' => 'messages:view'],
            ['name' => 'messages:send'],

            ['name' => 'news:view'],
            ['name' => 'news:add'],
            ['name' => 'news:update'],
            ['name' => 'news:media'],
            ['name' => 'news:delete'],

            ['name' => 'category:view'],
            ['name' => 'category:add'],
            ['name' => 'category:update'],
            ['name' => 'category:delete'],

            ['name' => 'information:view'],
            ['name' => 'information:add'],
            ['name' => 'information:update'],
            ['name' => 'information:delete'],

            ['name' => 'boards:view'],
            ['name' => 'boards:add'],
            ['name' => 'boards:update'],
            ['name' => 'boards:delete'],

            ['name' => 'users:view'],
            ['name' => 'users:add'],
            ['name' => 'users:add-all-roles'],
            ['name' => 'users:update'],
            ['name' => 'users:update-password'],
            ['name' => 'users:delete'],

            ['name' => 'roles:view'],
            ['name' => 'roles:add'],
            ['name' => 'roles:update'],
            ['name' => 'roles:delete'],

            ['name' => 'settings:view'],
            ['name' => 'settings:update'],

            ['name' => 'user-type:admin'],
            ['name' => 'admin:access'],
        ]);

        $admin->givePermissionTo(Permission::all());
    }
}
