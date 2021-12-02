<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Eduardo Chuquillanqui',
            'email' => 'echuquillanquiy@gmail.com',
            'password' => bcrypt('12345678'),
            'profile' => 'Admin',
            'place' => 'HUANCAYO'
        ]);

        $user->syncRoles(['Admin']);

        $user = User::create([
            'name' => 'Minera Caraveli',
            'email' => 'avillanueva@cmc.com.pe',
            'password' => bcrypt('12345678'),
            'profile' => 'Empresa'
        ]);

        $user->syncRoles(['Empresa']);
    }
}
