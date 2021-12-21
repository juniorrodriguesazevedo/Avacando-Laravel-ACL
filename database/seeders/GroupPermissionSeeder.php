<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class GroupPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_permissions = [
            'post_view', 'post_create', 'post_edit', 'post_destroy',
            'user_view', 'user_create', 'user_edit', 'user_destroy',
        ];

        $auhor_permissions = [
            'post_view', 'post_create', 'post_edit', 'post_destroy',
        ];

        $user_permissions = [
            'post_view'
        ];

        $admin = Role::findByName('Admin');
        $author = Role::findByName('Author');
        $user = Role::findByName('User');

        foreach ($admin_permissions as $name) {
            $admin->givePermissionTo($name);
        }

        foreach ($auhor_permissions as $name) {
            $author->givePermissionTo($name);
        }

        foreach ($user_permissions as $name) {
            $user->givePermissionTo($name);
        }
    }
}
