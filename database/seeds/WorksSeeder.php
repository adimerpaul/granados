<?php

use App\Inventory;
use App\Warehouse;
use App\Work;
use Illuminate\Database\Seeder;

class WorksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $works = [
            [
                'name' => 'MANCHAY' ,
                'entity' => 'Municipalidad de Lima',
                'work_cost' => "840,850.23",
                'contractual_term' => '365 dias',
                'work_executor' => 'Ejecutor X', 
                'created_at' => now(), 
                'updated_at' => now()
            ],
            [
                'name' => 'LUNAHUANA' ,
                'entity' => 'Municipalidad de Ancash', 
                'work_cost' => "430,850.20",
                'contractual_term' => '124 dias',
                'work_executor' => 'Ejecutor Y',  
                'created_at' => now(), 
                'updated_at' => now()
            ]
        ];

        foreach ($works as $work) {
            $work = Work::create($work);
        }
    }
}
