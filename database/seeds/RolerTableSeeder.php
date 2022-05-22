<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
          Permission::create(['name' => 'add post']);
          Permission::create(['name' => 'edit post']);
          Permission::create(['name' => 'delete post']);
          Permission::create(['name' => 'comment post']);

          $role = Role::create(['name' => 'admin']);
          $role->givePermissionTo(Permission::all());
          $role = Role::create(['name' => 'user']);
          $role->givePermissionTo('comment post');

    }
}
