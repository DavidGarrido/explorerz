<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $course_all = Permission::create(['name' => 'Todo cursos', 'slug' => "course.all", 'description' => 'Todos los permisos para cursos',]);
        $course_list = Permission::create(['name' => 'Listar cursos', 'slug' => "course.index", 'description' => 'El usuario podra vel el listado de cursos',]);
        $course_create = Permission::create(['name' => 'Crear cursos', 'slug' => "course.create", 'description' => 'El usuario podra vel el formulario de creacion de cursos',]);
        $course_store = Permission::create(['name' => 'Enviar cursos', 'slug' => "course.store", 'description' => 'El usuario podra enviar el formulacio de creacion de cursos',]);
        $course_destroy = Permission::create(['name' => 'Eliminar cursos', 'slug' => "course.destroy", 'description' => 'El usuario podra eliminar el cursos',]);
        $course_update = Permission::create(['name' => 'Editar cursos', 'slug' => "course.update", 'description' => 'El usuario enviar el formulario de edicion de cursos',]);
        $course_show = Permission::create(['name' => 'Ver cursos', 'slug' => "course.show", 'description' => 'El usuario podra ver la informacion del cursos',]);
        $course_edit = Permission::create(['name' => 'Form. editar cursos', 'slug' => "course.edit", 'description' => 'El usuario podra ver el formulario de edicion del cursos',]);
        
        $club_all = Permission::create(['name' => 'Todo club', 'slug' => "club.all", 'description' => 'Todos los permisos para club',]);
        $club_list = Permission::create(['name' => 'Listar club', 'slug' => "club.index", 'description' => 'El usuario podra vel el listado de clubes',]);
        $club_create = Permission::create(['name' => 'Crear club', 'slug' => "club.create", 'description' => 'El usuario podra vel el formulario de creacion de club',]);
        $club_store = Permission::create(['name' => 'Enviar club', 'slug' => "club.store", 'description' => 'El usuario podra enviar el formulacio de creacion de club',]);
        $club_destroy = Permission::create(['name' => 'Eliminar club', 'slug' => "club.destroy", 'description' => 'El usuario podra eliminar el club',]);
        $club_update = Permission::create(['name' => 'Editar club', 'slug' => "club.update", 'description' => 'El usuario enviar el formulario de edicion de club',]);
        $club_show = Permission::create(['name' => 'Ver club', 'slug' => "club.show", 'description' => 'El usuario podra ver la informacion del club',]);
        $club_edit = Permission::create(['name' => 'Form. editar club', 'slug' => "club.edit", 'description' => 'El usuario podra ver el formulario de edicion del club',]);
        
        $enviroment_all = Permission::create(['name' => 'Todo ambientes', 'slug' => "enviroment.all", 'description' => 'Todos los permisos para ambientes',]);
        $enviroment_list = Permission::create(['name' => 'Listar ambientes', 'slug' => "enviroment.index", 'description' => 'El usuario podra vel el listado de ambientes',]);
        $enviroment_create = Permission::create(['name' => 'Crear ambientes', 'slug' => "enviroment.create", 'description' => 'El usuario podra vel el formulario de creacion de ambientes',]);
        $enviroment_store = Permission::create(['name' => 'Enviar ambientes', 'slug' => "enviroment.store", 'description' => 'El usuario podra enviar el formulacio de creacion de ambientes',]);
        $enviroment_destroy = Permission::create(['name' => 'Eliminar ambientes', 'slug' => "enviroment.destroy", 'description' => 'El usuario podra eliminar el ambientes',]);
        $enviroment_update = Permission::create(['name' => 'Editar ambientes', 'slug' => "enviroment.update", 'description' => 'El usuario enviar el formulario de edicion de ambientes',]);
        $enviroment_show = Permission::create(['name' => 'Ver ambientes', 'slug' => "enviroment.show", 'description' => 'El usuario podra ver la informacion del ambientes',]);
        $enviroment_edit = Permission::create(['name' => 'Form. editar ambientes', 'slug' => "enviroment.edit", 'description' => 'El usuario podra ver el formulario de edicion del ambientes',]);

        $admin = Role::find(1);

        $admin->permissions()->sync([1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24]);


    }
}
