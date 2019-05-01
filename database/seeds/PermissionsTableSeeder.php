<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [

            // Modlulo de EHR

                // Pacientes
                    'Ver Pacientes',
                    'Crear Pacientes',
                    'Editar Pacientes',
                    'Eliminar Pacientes',

            // Modulo de Quirofano

                // Procedimientos
                    'Ver Procedimientos',
                    'Aceptar Procedimientos',
                    'Crear Procedimientos',
                    'Editar Procedimientos',
                    'Suprimir Procedimientos',
                    'Iniciar Procedimiento',
                    'Terminar Procedimiento',
                    'Iniciar Limpieza de Procedimiento',
                    'Terminar Limpieza de Procedimiento',

                // Tipos de procedimiento

                    'Ver Tipos de Procedimientos',
                    'Crear Tipos de Procedimientos',
                    'Editar Tipos de Procedimientos',
                    'Eliminar Tipos de Procedimientos',

                // Salas (Ubicaciones)

                    'Ver Quirófanos',
                    'Crear Quirófanos',
                    'Editar Quirófanos',
                    'Eliminar Quirófanos',

            // Modulo de configuración

                // Roles
                    'Ver Roles',
                    'Crear Roles',
                    'Editar Roles',
                    'Eliminar Roles',

                // Usuarios
                    'Ver Usuarios',
                    'Crear Usuarios',
                    'Editar Usuarios',
                    'Eliminar Usuarios',

                // Ubicacion

                    'Ver Ubicaciónes',
                    'Crear Ubicaciónes',
                    'Editar Ubicaciónes',
                    'Eliminar Ubicaciónes',
	        
	        // Modulo de CMMS
	            // Inventario de Equipos
	        
			        'Ver Inventario de Equipos',
			        'Crear Inventario de Equipos',
			        'Editar Inventario de Equipos',
			        'Eliminar Inventario de Equipos',
	            // Inventario y gestión de repuestos
	        
			        'Ver Inventario y gestión de repuestos',
			        'Crear Inventario y gestión de repuestos',
			        'Editar Inventario y gestión de repuestos',
			        'Eliminar Inventario y gestión de repuestos',
	            // Inventario y gestion de Herramientas
			        'Ver Inventario y gestion de Herramientas',
			        'Crear Inventario y gestion de Herramientas',
			        'Editar Inventario y gestion de Herramientas',
			        'Eliminar Inventario y gestion de Herramientas',
	            // Mantenimientos
			        'Ver Mantenimientos',
			        'Crear Mantenimientos',
			        'Editar Mantenimientos',
			        'Eliminar Mantenimientos',
	            // Gestión de Contratos
			        'Ver Gestión de Contratos',
			        'Crear Gestión de Contratos',
			        'Editar Gestión de Contratos',
			        'Eliminar Gestión de Contratos',
        ];

        foreach ($permissions as $permission) {
            \Spatie\Permission\Models\Permission::create(['name' => $permission]);
        }
    }
}
