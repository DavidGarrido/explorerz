<?php

namespace Database\Seeders;

use App\Models\Dimension;
use Illuminate\Database\Seeder;

class DimensionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dimension = Dimension::create(['name' => 'Corporal']);
        $dimension->course()->sync([1,2,3]);
        $dimension = Dimension::create(['name' => 'Cognitiva']);
        $dimension->course()->sync([1,2,3]);
        $dimension = Dimension::create(['name' => 'Comunicativa']);
        $dimension->course()->sync([1,2,3]);
        $dimension = Dimension::create(['name' => 'Etica']);
        $dimension->course()->sync([1,2,3]);
        $dimension = Dimension::create(['name' => 'Estetica']);
        $dimension->course()->sync([1,2,3]);
        $dimension = Dimension::create(['name' => 'Actitudinal']);
        $dimension->course()->sync([1,2,3]);
        $dimension = Dimension::create(['name' => 'Valorativa']);
        $dimension->course()->sync([1,2,3]);
        $dimension = Dimension::create(['name' => 'Matemáticas']);
        $dimension->course()->sync([4,5,6,7,8,9,10,11,12,13,14]);
        $dimension = Dimension::create(['name' => 'Humanidades: Lengua Castellana e Idioma Extranjero']);
        $dimension->course()->sync([4,5,6,7,8,9,10,11,12,13,14]);
        $dimension = Dimension::create(['name' => 'Ciencias Naturales y Educación Ambiental']);
        $dimension->course()->sync([4,5,6,7,8,9,10,11,12,13,14]);
        $dimension = Dimension::create(['name' => 'Ciencias Sociales']);
        $dimension->course()->sync([4,5,6,7,8,9,10,11,12,13,14]);
        $dimension = Dimension::create(['name' => 'Educación Artistica']);
        $dimension->course()->sync([4,5,6,7,8,9,10,11,12,13,14]);
        $dimension = Dimension::create(['name' => 'Educación Ética y en Valores Humanos']);
        $dimension->course()->sync([4,5,6,7,8,9,10,11,12,13,14]);
        $dimension = Dimension::create(['name' => 'Educación Fisica, Recreación y Deportes']);
        $dimension->course()->sync([4,5,6,7,8,9,10,11,12,13,14]);
        $dimension = Dimension::create(['name' => 'Educación Religiosa']);
        $dimension->course()->sync([4,5,6,7,8,9,10,11,12,13,14]);
        $dimension = Dimension::create(['name' => 'Tecnología e Informática']);
        $dimension->course()->sync([4,5,6,7,8,9,10,11,12,13,14]);
        $dimension = Dimension::create(['name' => 'Ciencias Sociales (Ciencias Políticas y Económicas)']);
        $dimension->course()->sync([13,14]);
        $dimension = Dimension::create(['name' => 'Filosofía']);
        $dimension->course()->sync([13,14]);
    }
}
