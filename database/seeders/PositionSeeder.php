<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Position::create([
            'name' => 'ALMACENERO'
        ]);

        Position::create([
            'name' => 'AYUDANTE DE COCINA'
        ]);
        Position::create([
            'name' => 'AYUDANTE'
        ]);
        Position::create([
            'name' => 'AYUDANTE DE PERFORISTA'
        ]);
        Position::create([
            'name' => 'AYUDANTE PERFORISTA'
        ]);
        Position::create([
            'name' => 'AYUDANTE.P'
        ]);
        Position::create([
            'name' => 'CONDUCTOR'
        ]);
        Position::create([
            'name' => 'ENMADERADOR'
        ]);
        Position::create([
            'name' => 'INSPECTOR DE SEGURIDAD'
        ]);
        Position::create([
            'name' => 'LOCOMOT.'
        ]);
        Position::create([
            'name' => 'M. PERFORISTA'
        ]);
        Position::create([
            'name' => 'MAESTRO PERFORISTA'
        ]);
        Position::create([
            'name' => 'OPERADOR DE SCOOP'
        ]);
        Position::create([
            'name' => 'PEON'
        ]);
        Position::create([
            'name' => 'PEON MINA'
        ]);
        Position::create([
            'name' => 'PERFORISTA'
        ]);
        Position::create([
            'name' => 'PERFORISTA. A1'
        ]);
        Position::create([
            'name' => 'SUPERVISOR'
        ]);
    }
}
