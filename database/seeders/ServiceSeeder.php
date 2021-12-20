<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Service::create([
            'name' => 'MEDICINA',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus error impedit laborum laudantium magnam, molestias nam necessitatibus officiis pariatur provident quis rem repudiandae, rerum unde veritatis voluptate voluptatem. Facilis, voluptatibus.',
            'image' => 'https://images.pexels.com/photos/2182972/pexels-photo-2182972.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940'
        ]);

        Service::create([
            'name' => 'LABORATORIO',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus error impedit laborum laudantium magnam, molestias nam necessitatibus officiis pariatur provident quis rem repudiandae, rerum unde veritatis voluptate voluptatem. Facilis, voluptatibus.',
            'image' => 'https://images.pexels.com/photos/3938023/pexels-photo-3938023.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940'
        ]);

        Service::create([
            'name' => 'RADIOLOGIA DIGITAL',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus error impedit laborum laudantium magnam, molestias nam necessitatibus officiis pariatur provident quis rem repudiandae, rerum unde veritatis voluptate voluptatem. Facilis, voluptatibus.',
            'image' => 'https://images.pexels.com/photos/7088520/pexels-photo-7088520.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940'
        ]);

        Service::create([
            'name' => 'AUDIOMETRIA',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus error impedit laborum laudantium magnam, molestias nam necessitatibus officiis pariatur provident quis rem repudiandae, rerum unde veritatis voluptate voluptatem. Facilis, voluptatibus.',
            'image' => 'https://images.pexels.com/photos/257904/pexels-photo-257904.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940'
        ]);

        Service::create([
            'name' => 'ELECTROCARDIOGRAMA',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus error impedit laborum laudantium magnam, molestias nam necessitatibus officiis pariatur provident quis rem repudiandae, rerum unde veritatis voluptate voluptatem. Facilis, voluptatibus.',
            'image' => 'https://images.pexels.com/photos/263194/pexels-photo-263194.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940'
        ]);

        Service::create([
            'name' => 'PSICOLOGIA',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus error impedit laborum laudantium magnam, molestias nam necessitatibus officiis pariatur provident quis rem repudiandae, rerum unde veritatis voluptate voluptatem. Facilis, voluptatibus.',
            'image' => 'https://images.pexels.com/photos/7176026/pexels-photo-7176026.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940'
        ]);

        Service::create([
            'name' => 'OFTALMOLOGIA',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus error impedit laborum laudantium magnam, molestias nam necessitatibus officiis pariatur provident quis rem repudiandae, rerum unde veritatis voluptate voluptatem. Facilis, voluptatibus.',
            'image' => 'https://images.pexels.com/photos/5996698/pexels-photo-5996698.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500'
        ]);

        Service::create([
            'name' => 'ODONTOLOGIA',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus error impedit laborum laudantium magnam, molestias nam necessitatibus officiis pariatur provident quis rem repudiandae, rerum unde veritatis voluptate voluptatem. Facilis, voluptatibus.',
            'image' => 'https://images.pexels.com/photos/5434017/pexels-photo-5434017.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940'
        ]);

        Service::create([
            'name' => 'ESPIROMETRIA',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus error impedit laborum laudantium magnam, molestias nam necessitatibus officiis pariatur provident quis rem repudiandae, rerum unde veritatis voluptate voluptatem. Facilis, voluptatibus.',
            'image' => 'https://images.pexels.com/photos/2280571/pexels-photo-2280571.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940'
        ]);

    }
}
