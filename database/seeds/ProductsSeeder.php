<?php

use App\Work;
use App\Product;
use App\Inventory;
use App\InventoryProduct;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Session;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            ['id' => 1,'code' => 'PRO1CEM', 'name' => 'Cemento', 'category_id' => 1, 'measure_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2,'code' => 'PRO1TUB', 'name' => 'Tubos', 'category_id' => 2, 'measure_id' => 2,  'created_at' => now(), 'updated_at' => now()],

            ['id' => 3,'code' => 'PRO1TUB', 'name' => 'Meneques Hembra y Macho para Rotomartillo Makita', 'category_id' => 3, 'measure_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4,'code' => 'PRO1TUB', 'name' => 'Aceite Mobil 25w-50', 'category_id' => 4, 'measure_id' => 4,  'created_at' => now(), 'updated_at' => now()],
            ['id' => 5,'code' => 'PRO1TUB', 'name' => 'Codo PVC 1/2"', 'category_id' => 5, 'measure_id' => 5,  'created_at' => now(), 'updated_at' => now()],
            ['id' => 6,'code' => 'PRO1TUB', 'name' => 'Enchufes Reforzados para Extensión', 'category_id' => 6, 'measure_id' => 6,  'created_at' => now(), 'updated_at' => now()],
            ['id' => 7,'code' => 'PRO1TUB', 'name' => 'Cinta Masking 1"', 'category_id' => 7, 'measure_id' => 7,  'created_at' => now(), 'updated_at' => now()],
            ['id' => 8,'code' => 'PRO1TUB', 'name' => 'Guantes Multiflex', 'category_id' => 8, 'measure_id' => 8,  'created_at' => now(), 'updated_at' => now()],
            ['id' => 9,'code' => 'PRO1TUB', 'name' => 'Gravilla 1/2"', 'category_id' => 5, 'measure_id' => 9,  'created_at' => now(), 'updated_at' => now()],
            ['id' => 10,'code' => 'PRO1TUB', 'name' => 'Areana Gruesa', 'category_id' => 2, 'measure_id' => 10,  'created_at' => now(), 'updated_at' => now()],
            ['id' => 11,'code' => 'PRO1TUB', 'name' => 'Soleras 3" X 2" para Bastidores (L=2.5)', 'category_id' => 6, 'measure_id' => 11,  'created_at' => now(), 'updated_at' => now()],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }

        $cont = 10;
        $works = Work::all();
        $products = Product::all();

        foreach ($works as $work) {

            $inventory = Inventory::create([
                'work_id' => $work->id
            ]);

            foreach ($products as $product) {

                InventoryProduct::create([
                    'inventory_id' => $inventory->id,
                    'product_id' => $product->id,
                    'stock' => $cont
                ]);

                $cont += 10;
            }
            
        }

    }
}
