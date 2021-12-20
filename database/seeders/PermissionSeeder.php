<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = [
            'user_view', 'user_create', 'user_edit', 'user_destroy',
            'post_view', 'post_create', 'post_edit', 'post_destroy',
        ];

        foreach ($permission as $name) {
            Permission::firstOrCreate([
                'name' => $name
            ]);
        }
    }
}
