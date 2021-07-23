<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $user = \App\Models\User::create([
            'name' => "Administrador",
            'lastname'=>"Admin",
            'email' => "admin" . '@Admin.com',
            'password' => Hash::make('password'),
        ]);
        $user2 = \App\Models\User::create([
            'name' => "Usuario",
            'email' => "Usuario" . '@Admin.com',
            'password' => Hash::make('password'),
        ]);
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'Crear Avisos']);
        Permission::create(['name' => 'eliminar avisos']);
        Permission::create(['name' => 'Ver avisos']);
        Permission::create(['name' => 'Ver usuarios']);

        // create roles and assign created permissions
        $role = Role::create(['name' => 'Administrador']);
        $role->givePermissionTo(['Crear Avisos', 'eliminar avisos', 'Ver avisos', 'Ver usuarios']);

        $role = Role::create(['name' => 'Usuario'])
            ->givePermissionTo(['Ver avisos']);

        $user->assignRole('Administrador');
        $user2->assignRole('Usuario');
    }
}
