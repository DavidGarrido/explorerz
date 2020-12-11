<?php

namespace Database\Seeders;

use App\Models\Departamento;
use Illuminate\Database\Seeder;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Departamento::create(['nombre' => 'Antioquia', 'codigo' =>  5]);
        Departamento::create(['nombre' => 'Atlantico', 'codigo' =>  8]);
        Departamento::create(['nombre' => 'D. C. Santa Fe de Bogotá', 'codigo' =>  11]);
        Departamento::create(['nombre' => 'Bolivar', 'codigo' =>  13]);
        Departamento::create(['nombre' => 'Boyaca', 'codigo' =>  15]);
        Departamento::create(['nombre' => 'Caldas', 'codigo' =>  17]);
        Departamento::create(['nombre' => 'Caqueta', 'codigo' =>  18]);
        Departamento::create(['nombre' => 'Cauca', 'codigo' =>  19]);
        Departamento::create(['nombre' => 'Cesar', 'codigo' =>  20]);
        Departamento::create(['nombre' => 'Cordova', 'codigo' =>  23]);
        Departamento::create(['nombre' => 'Cundinamarca', 'codigo' =>  25]);
        Departamento::create(['nombre' => 'Choco', 'codigo' =>  27]);
        Departamento::create(['nombre' => 'Huila', 'codigo' =>  41]);
        Departamento::create(['nombre' => 'La Guajira', 'codigo' =>  44]);
        Departamento::create(['nombre' => 'Magdalena', 'codigo' =>  47]);
        Departamento::create(['nombre' => 'Meta', 'codigo' =>  50]);
        Departamento::create(['nombre' => 'Nariño', 'codigo' =>  52]);
        Departamento::create(['nombre' => 'Norte de Santander', 'codigo' =>  54]);
        Departamento::create(['nombre' => 'Quindio', 'codigo' =>  63]);
        Departamento::create(['nombre' => 'Risaralda', 'codigo' =>  66]);
        Departamento::create(['nombre' => 'Santander', 'codigo' =>  68]);
        Departamento::create(['nombre' => 'Sucre', 'codigo' =>  70]);
        Departamento::create(['nombre' => 'Tolima', 'codigo' =>  73]);
        Departamento::create(['nombre' => 'Valle', 'codigo' =>  76]);
        Departamento::create(['nombre' => 'Arauca', 'codigo' =>  81]);
        Departamento::create(['nombre' => 'Casanare', 'codigo' =>  85]);
        Departamento::create(['nombre' => 'Putumayo', 'codigo' =>  86]);
        Departamento::create(['nombre' => 'San Andres', 'codigo' =>  88]);
        Departamento::create(['nombre' => 'Amazonas', 'codigo' =>  91]);
        Departamento::create(['nombre' => 'Guainia', 'codigo' =>  94]);
        Departamento::create(['nombre' => 'Guaviare', 'codigo' =>  95]);
        Departamento::create(['nombre' => 'Vaupes', 'codigo' =>  97]);
        Departamento::create(['nombre' => 'Vichada', 'codigo' =>  99]);
    }
}
