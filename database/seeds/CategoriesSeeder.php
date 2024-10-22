<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'Agregados',  'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ferretería',  'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Tubería PVC',  'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Accesorios PVC',  'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Fierro industrial',  'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Accesorios de fierros galbanizados',  'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Instalaciones eléctricas',  'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Equipo de protección personal',  'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Maquinaria',  'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Equipo y herramientas',  'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ferretería en general',  'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Útiles de escritorio',  'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Medicamentos',  'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Madera',  'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Pintura',  'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Mobiliario',  'created_at' => now(), 'updated_at' => now()]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
