<?php

use App\Measure;
use Illuminate\Database\Seeder;

class MeasuresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $measures = [
            ['name' => 'KILOGRAMO', 'symbol' => 'kg',  'created_at' => now(), 'updated_at' => now()],
            ['name' => 'METRO CUADRADO', 'symbol' => 'm²',  'created_at' => now(), 'updated_at' => now()],
            ['name' => 'METRO CÚBICO', 'symbol' => 'm³',  'created_at' => now(), 'updated_at' => now()],
            ['name' => 'METRO', 'symbol' => 'm',  'created_at' => now(), 'updated_at' => now()],
            ['name' => 'CENTIMETRO', 'symbol' => 'cm',  'created_at' => now(), 'updated_at' => now()],
            ['name' => 'MILIMETRO', 'symbol' => 'mm',  'created_at' => now(), 'updated_at' => now()],
            ['name' => 'UNIDAD', 'symbol' => 'und',  'created_at' => now(), 'updated_at' => now()],
            ['name' => 'GLOBAL', 'symbol' => 'glb',  'created_at' => now(), 'updated_at' => now()],
            ['name' => 'LITRO', 'symbol' => 'L',  'created_at' => now(), 'updated_at' => now()],
            ['name' => 'GALÓN', 'symbol' => 'gln',  'created_at' => now(), 'updated_at' => now()],
            ['name' => 'BOLSA', 'symbol' => 'bls',  'created_at' => now(), 'updated_at' => now()],
            ['name' => 'PIE CUADRADO', 'symbol' => 'p²',  'created_at' => now(), 'updated_at' => now()],
            ['name' => 'PIE CÚBICO', 'symbol' => 'p³',  'created_at' => now(), 'updated_at' => now()],
            ['name' => 'TONELADA', 'symbol' => 'tn',  'created_at' => now(), 'updated_at' => now()],
        ];

        foreach ($measures as $measure) {
            Measure::create($measure);
        }
    }
}
