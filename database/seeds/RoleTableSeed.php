<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'administrador']);
        $role->givePermissionTo('usuario');
        $role->givePermissionTo('perfil');
        $role->givePermissionTo('roles');
        $role->givePermissionTo('permisos');
        $role->givePermissionTo('config');

        $role = Role::create(['name' => 'editor']);
        $role->givePermissionTo('perfil');
        $role->givePermissionTo('config');
    }
}
