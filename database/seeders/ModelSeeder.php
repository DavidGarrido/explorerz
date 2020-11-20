<?php

namespace Database\Seeders;

use App\Models\Model_course;
use Illuminate\Database\Seeder;

class ModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $model_course = Model_course::create(['group' => 'Jardin']);
        $model_course = Model_course::create(['group' => 'Pre-kinder']);
        $model_course = Model_course::create(['group' => 'kinder']);
        $model_course = Model_course::create(['group' => '1er Grado']);
        $model_course = Model_course::create(['group' => '2do Grado']);
        $model_course = Model_course::create(['group' => '3ro Grado']);
        $model_course = Model_course::create(['group' => '4to Grado']);
        $model_course = Model_course::create(['group' => '5to Grado']);
        $model_course = Model_course::create(['group' => '6to Grado']);
        $model_course = Model_course::create(['group' => '7mo Grado']);
        $model_course = Model_course::create(['group' => '8vo Grado']);
        $model_course = Model_course::create(['group' => '9no Grado']);
        $model_course = Model_course::create(['group' => '10mo Grado']);
        $model_course = Model_course::create(['group' => '11vo Grado']);
    }
}
