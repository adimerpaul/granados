<?php

namespace App\Http\Controllers\Management;

use App\Work;
use App\Warehouse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Inventory;
use App\InventoryProduct;
use App\Product;

class WorkController extends Controller
{

    public function index()
    {
        $works = Work::paginate(10);
        return view('modules.management.work.index')
                ->with('works', $works);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'entity' => 'required',
            'work_cost' => 'required',
            'contractual_term' => 'required',
            'work_executor' => 'required'
        ]);

        $work = Work::where('name', $request['name'])->exists();

        if ($work) {
            return redirect()->back();
        }

        $work = Work::create([
            'name' => $request['name'],
            'entity' => $request['entity'],
            'work_cost' => $request['work_cost'],
            'contractual_term' => $request['contractual_term'],
            'work_executor' => $request['work_executor'],
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        $inventory = Inventory::create([
            'work_id' => $work->id
        ]);

        $products = Product::all();

        foreach ($products as $product) {
            InventoryProduct::create([
                'inventory_id' => $inventory->id,
                'product_id' => $product->id,
                'stock' => 0
            ]);
        }


        return redirect()->back();
    }

    public function update(Request $request, Work $work)
    {
        $request->validate([
            'name' => 'required',
            'work_cost' => 'required',
            'entity' => 'required',
            'work_cost' => 'required',
            'contractual_term' => 'required',
            'work_executor' => 'required'
        ]);
        $work->name = $request['name'];
        $work->work_cost = $request['work_cost'];
        $work->entity = $request['entity'];
        $work->contractual_term = $request['contractual_term'];
        $work->work_executor = $request['work_executor'];
        $work->save();

        return redirect()->back();
    }

    public function destroy(Work $work)
    {    
        $usersQuantity = count($work->users);

        if ($usersQuantity > 0) 
        {
            return redirect()->back();
        }

        $work->delete();

        return redirect()->back();
    }
}
