<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Artisan::call('cache:clear');
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        
        Permission::create(['name' => 'usuario']);
        Permission::create(['name' => 'perfil']);
        Permission::create(['name' => 'roles']);
        Permission::create(['name' => 'permisos']);
        Permission::create(['name' => 'config']);
    }
}
