<?php

namespace Database\Seeders;

use App\Models\Patient;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Patient::create([
            'dni' => '46589634',
            'name' => 'RAUL EDUARDO',
            'lastname' => 'CHUQUILLANQUI YUPANQUI',
            'birthday' => '1990-09-20',
            'age' => 31,
            'origin' => 'HUANCAYO'
        ]);

        Patient::factory(100)->create();
    }
}
