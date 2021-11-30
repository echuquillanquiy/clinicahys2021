<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Client::create([
            'ruc' => '20126702737 ',
            'name' => 'COMPAÑIA MINERA CARAVELI S.A.C.',
            'address' => 'AV. PABLO CARRIQUIRRY NRO. 691 URB. URB. EL PALOMAR SAN ISIDR (A UNA CUADRA MINISTERIO DEL INTERIOR) LIMA - LIMA - SAN ISIDRO'
        ]);
    }
}
