<?php

use Illuminate\Database\Seeder;

class MenuTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menuItems =  [
//            [
//            'name' => 'Pacientes',
//            'icon' => 'icon  fas fa-male',
//            'childs' => [
//                    [
//                        'name' => 'Listado de Pacientes',
//                        'path' => '/patients',
//                        'icon' => 'fas fa-project-diagram',
//                        'permission' => 'Ver Pacientes',
//                        'childs' => null,
//                    ]
//                ]
//            ],
//            [
//                'name' => 'Quirofano',
//                'icon' => 'icon  fas fa-procedures',
//                'childs' => [
//                    [
//                        'name' => 'Listado de Procedimientos',
//                        'path' => '/or/types',
//                        'icon' => 'fas fa-project-diagram',
//                        'permission' => 'Ver Procedimientos',
//                        'childs' => null,
//                    ],
//                    [
//                        'name' => 'Tipo de procedimientos',
//                        'path' => '/projects',
//                        'icon' => 'fas fa-project-diagram',
//                        'permission' => 'Ver Tipos de Procedimientos',
//                        'childs' => null,
//                    ],
//                    [
//                        'name' => 'Salas (Ubicaciónes)',
//                        'path' => '/projects',
//                        'icon' => 'fas fa-project-diagram',
//                        'permission' => 'Ver Quirófanos',
//                        'childs'  => null,
//                    ]
//                ]
//            ],
	        [
		        'name' => 'CMMS',
		        'icon' => 'icon  fas fa-tools',
		        'childs' => [
			        [
				        'name' => 'Catalogo De Marcas',
				        'path' => '/cmms/brandsInventory',
				        'icon' => 'fas fa-project-diagram',
				        'permission' => 'Ver Inventario de equipos',
				        'childs'=> null,
			        ],
//                    [
//                        'name' => 'Inventario de equipos',
//                        'path' => '/cmms/equipmentInventory',
//                        'icon' => 'fas fa-project-diagram',
//                        'permission' => 'Ver Inventario de equipos',
//                        'childs'=> null,
//                    ],
//                    [
//                        'name' => 'Inventario y gestión de repuestos',
//                        'path' => '/cmms/inventoryAndManagementOfSpareParts',
//                        'icon' => 'fas fa-project-diagram',
//                        'permission' => 'Ver Inventario y gestión de repuestos',
//                        'childs' => null,
//                    ],
//                    [
//                        'name' => 'Inventario y gestion de Herramientas',
//                        'path' => '/cmms/inventoryAndManagementOfTools',
//                        'icon' => 'fas fa-project-diagram',
//                        'permission' => 'Ver Inventario y gestion de Herramientas',
//                        'childs' => null,
//                    ],
//	                [
//		                'name' => 'Mantenimientos',
//		                'path' => '/cmms/maintenance',
//		                'icon' => 'fas fa-project-diagram',
//		                'permission' => 'Ver Mantenimientos',
//		                'childs'  => null,
//	                ],
//	                [
//		                'name' => 'Gestión de Contratos',
//		                'path' => '/cmms/contractManagement',
//		                'icon' => 'fas fa-project-diagram',
//		                'permission' => 'Ver Gestión de Contratos',
//		                'childs'  => null,
//	                ],
		        ]
	        ],
            [
                'name' => 'Ajustes',
                'icon' => 'icon  fas fa-cog',
                'childs' => [
                    [
                        'name' => 'Listado de Usuarios',
                        'path' => '/projects',
                        'icon' => 'fas fa-project-diagram',
                        'permission' => 'Ver Usuarios',
                        'childs'=> null,
                    ],
                    [
                        'name' => 'Listado de Roles & Permisos',
                        'path' => '/projects',
                        'icon' => 'fas fa-project-diagram',
                        'permission' => 'Ver Roles',
                        'childs' => null,
                    ],
                    [
                        'name' => 'Ubicaciónes',
                        'path' => '/projects',
                        'icon' => 'fas fa-project-diagram',
                        'permission' => 'Ver Ubicaciónes',
                        'childs' => null,
                    ]
                ]
            ],
	        
	        
        ];

        foreach ($menuItems as $parent){
            if(empty($parent['childs'])){
                $data = $parent;
                unset($data['childs']);
                \Illuminate\Support\Facades\DB::table('menus')->insert($data);

            } else {
                $childs = $parent['childs'];
                unset($parent['childs']);
                $id = \Illuminate\Support\Facades\DB::table('menus')->insertGetId($parent);

                foreach ($childs as $child){
                    $child['parent_id'] = intval($id);
                    unset($child['childs']);
                    $pId = \Spatie\Permission\Models\Permission::where('name', 'LIKE', '%'.$child['permission'].'%')->first()->id;
                    unset($child['permission']);
                    $child['permission_id'] = $pId;

                    \Illuminate\Support\Facades\DB::table('menus')->insert($child);
                }
            }
        }
    }
}
