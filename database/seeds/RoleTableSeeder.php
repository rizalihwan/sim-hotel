<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        Role::create([
            'name' => 'admin'
        ]);
        Role::create([
            'name' => 'customer'
        ]);
        Role::create([
            'name' => 'boss'
        ]);
    }
}
