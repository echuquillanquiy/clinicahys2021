<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create([
            'name' => 'Admin'
        ]);

        $role->permissions()->attach([1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51]);

        $role = Role::create([
            'name' => 'Empresa'
        ]);

        $role->syncPermissions(['Resultado_index', 'Auditoria_index','Auditoria_print', 'COVID-19']);

        $role = Role::create([
            'name' => 'Auditoria'
        ]);

        $role->syncPermissions(['Auditoria_index', 'Auditoria_update', 'Auditoria_print', 'COVID-19', 'Atenciones']);

        $role = Role::create([
            'name' => 'Laboratorio'
        ]);

        $role->syncPermissions(['Laboratorio_index', 'Laboratorio_update', 'COVID-19', 'Atenciones']);

        $role = Role::create([
            'name' => 'Medicina'
        ]);

        $role->syncPermissions(['Medicina_index', 'Medicina_update', 'COVID-19', 'Atenciones']);
    }
}
