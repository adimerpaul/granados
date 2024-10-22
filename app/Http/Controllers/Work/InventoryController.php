<?php

namespace App\Http\Controllers\Work;

use App\Category;
use App\Http\Controllers\Controller;
use App\Inventory;
use App\Measure;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InventoryController extends Controller
{
    public function index($workId){

        $categories = Category::all();
        $measures = Measure::all();

        /* $inventories = Inventory::where('work_id', Auth::user()->work_id)
                                ->where('stock', '<>', 0)
                                ->get(); */

        return view('modules.work.inventory.index')
                ->with('categories', $categories)
                ->with('measures', $measures)
                /* ->with('inventory', $inventories) */;
    }

    public function storeProduct(Request $request, $workId){

        $product = Product::create([
            'name' => $request['name'],
            'category_id' => $request['category_id'],
            'measure_id' => $request['measure_id']
        ]);
        Product::where('id', $product->id)->update([
            'code' => 'Prod-' . $product->id
        ]);

        $inventory = Inventory::where('warehouse_id', $workId)->first();

        $inventory->products()->attach($product, ['stock' => 20]);

        return redirect()->back();

    }
}
