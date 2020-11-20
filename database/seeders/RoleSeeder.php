<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->name = 'admin';
        $role->slug = 'admin';
        $role->description = 'Permisos de administrador';
        $role['full-access'] = 'yes';
        $role->save();

        $role->users()->sync([1,2,3]);

        $role = new Role();
        $role->name = 'teacher';
        $role->slug = 'teacher';
        $role->description = 'Permisos de teacher';
        $role['full-access'] = 'no';
        $role->save();
        $role->users()->sync([4,5,6,7,8,9,10]);

        $role = new Role();
        $role->name = 'parent';
        $role->slug = 'parent';
        $role->description = 'Permisos de parent';
        $role['full-access'] = 'no';
        $role->save();
        for ($i=11; $i < 26; $i++) { 
            $role->users()->attach($i);
        }
        

        $role = new Role();        
        $role->name = 'studen';
        $role->slug = 'studen';
        $role->description = 'Permisos de studen';
        $role['full-access'] = 'no';
        $role->save();
        for ($i=26; $i < 41; $i++) { 
            $role->users()->attach($i);
        }
    }
}
