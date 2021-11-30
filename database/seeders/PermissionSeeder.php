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
        Permission::create([
            'name' => 'Administracion'
        ]);

        Permission::create([
            'name' => 'Admision'
        ]);

        Permission::create([
            'name' => 'Atenciones'
        ]);

        Permission::create([
            'name' => 'Paciente_index'
        ]);

        Permission::create([
            'name' => 'Paciente_create'
        ]);

        Permission::create([
            'name' => 'Paciente_update'
        ]);

        Permission::create([
            'name' => 'Paciente_destroy'
        ]);

        Permission::create([
            'name' => 'Empresa_index'
        ]);

        Permission::create([
            'name' => 'Empresa_create'
        ]);

        Permission::create([
            'name' => 'Empresa_update'
        ]);

        Permission::create([
            'name' => 'Empresa_destroy'
        ]);

        Permission::create([
            'name' => 'Prueba_index'
        ]);

        Permission::create([
            'name' => 'Prueba_create'
        ]);

        Permission::create([
            'name' => 'Prueba_update'
        ]);

        Permission::create([
            'name' => 'Prueba_destroy'
        ]);

        Permission::create([
            'name' => 'Puesto_index'
        ]);

        Permission::create([
            'name' => 'Puesto_create'
        ]);

        Permission::create([
            'name' => 'Puesto_update'
        ]);

        Permission::create([
            'name' => 'Puesto_destroy'
        ]);

        Permission::create([
            'name' => 'Orden_index'
        ]);

        Permission::create([
            'name' => 'Orden_create'
        ]);

        Permission::create([
            'name' => 'Orden_update'
        ]);

        Permission::create([
            'name' => 'Orden_destroy'
        ]);

        Permission::create([
            'name' => 'Medicina_index'
        ]);

        Permission::create([
            'name' => 'Medicina_update'
        ]);

        Permission::create([
            'name' => 'Laboratorio_index'
        ]);

        Permission::create([
            'name' => 'Laboratorio_update'
        ]);

        Permission::create([
            'name' => 'Auditoria_index'
        ]);

        Permission::create([
            'name' => 'Auditoria_update'
        ]);

        Permission::create([
            'name' => 'Auditoria_print'
        ]);

        Permission::create([
            'name' => 'Role_index'
        ]);

        Permission::create([
            'name' => 'Role_create'
        ]);

        Permission::create([
            'name' => 'Role_update'
        ]);

        Permission::create([
            'name' => 'Role_destroy'
        ]);

        Permission::create([
            'name' => 'Permiso_index'
        ]);

        Permission::create([
            'name' => 'Permiso_create'
        ]);

        Permission::create([
            'name' => 'Permiso_update'
        ]);

        Permission::create([
            'name' => 'Permiso_destroy'
        ]);

        Permission::create([
            'name' => 'Asignar_index'
        ]);

        Permission::create([
            'name' => 'Asignar_create'
        ]);

        Permission::create([
            'name' => 'Asignar_update'
        ]);

        Permission::create([
            'name' => 'Asignar_destroy'
        ]);

        Permission::create([
            'name' => 'Usuario_index'
        ]);

        Permission::create([
            'name' => 'Usuario_create'
        ]);

        Permission::create([
            'name' => 'Usuario_update'
        ]);

        Permission::create([
            'name' => 'Usuario_destroy'
        ]);

        Permission::create([
            'name' => 'Resultado_index'
        ]);
    }
}
