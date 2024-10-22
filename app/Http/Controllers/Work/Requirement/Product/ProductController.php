<?php

namespace App\Http\Controllers\Work\Requirement\Product;

use App\Product;
use App\Inventory;
use App\InventoryProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{

    public function create(Request $request, $workId)
    {
        $productName = $request['name'];

        $productExists = Product::where('name', $productName)->exists();

        if ($productExists) {
            return redirect()->back();
        }
        
        $product = Product::create([
            'name' => $request['name'],
            'category_id' => $request['category_id'],
            'measure_id' => $request['measure_id']
        ]);

        Product::where('id', $product->id)->update([
            'code' => 'PROD' . $product->id
        ]);

        $inventories = Inventory::all();

        foreach ($inventories as $inventory) 
        {
            InventoryProduct::create([
                'inventory_id' => $inventory->id,
                'product_id' => $product->id,
                'stock' => 0
            ]);
        }

        return redirect()->back();

    } 

    
}
