<?php

namespace App\Http\Controllers\Work\InternalRequirement;

use App\Measure;
use App\Product;
use App\Category;
use App\Inventory;
use App\RequiredProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\InternalRequiredProduct;
use App\InternalRequirement;
use App\InventoryProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class InternalRequirementController extends Controller
{

    public function index($workId)
    {
        $internalRequirements = InternalRequirement::where('work_id', $workId)->where('status', '!=', 'Incompleto')->get();

        return view('modules.work.internalRequirement.index')
                ->with('internalRequirements', $internalRequirements);
    }

    public function create()
    {
        $measures = Measure::all();
        $products = Product::all();
        $categories = Category::all();
        $internalRequirement = InternalRequirement::where('id', Session::get('internalRequirementId'))->first();
        $inventories = Inventory::where('work_id', Auth::user()->work_id)->get();

        return view('modules.work.internalRequirement.create')
                ->with('measures', $measures)
                ->with('products', $products)
                ->with('categories', $categories)
                ->with('internalRequirement', $internalRequirement)
                ->with('inventories', $inventories);;
    }

    public function store(Request $request, $workId, Product $product)
    {

        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);
        
        $requiredQuantity = intval($request['quantity']);

        $inventory = Inventory::where('work_id', $workId)->first();
        
        $inventoryProduct = InventoryProduct::where('inventory_id', $inventory->id)
                                            ->where('product_id', $product->id)
                                            ->first();

        if ($requiredQuantity > $inventoryProduct->stock) {

            return redirect()->back();

        }

        if (!Session::has('internalRequirementId')) {
            $internalRequirement = InternalRequirement::create([
                'user_id' => Auth::user()->id,
                'work_id' => Auth::user()->work->id,
                'status' => 'Incompleto'
            ]);
            
            Session::put('internalRequirementId', $internalRequirement->id);
            Session::save();
        }
        else {
            $internalRequirement = InternalRequirement::find(Session::get('internalRequirementId'));

            if (empty($internalRequirement)) {

                $internalRequirement = InternalRequirement::create([
                    'user_id' => Auth::user()->id,
                    'work_id' => Auth::user()->work->id,
                    'status' => 'Incompleto'
                ]);
                
                Session::put('internalRequirementId', $internalRequirement->id);
                Session::save();
            }
        }

        $internalRequiredProducts = InternalRequiredProduct::where('internal_requirement_id', Session::get('internalRequirementId'))->get();

        foreach ($internalRequiredProducts as $internalRequiredProduct) 
        {
            if ($internalRequiredProduct->product->id == $product->id) 
            {
                return redirect()->back();
            }
        }

        InternalRequiredProduct::create([
            'internal_requirement_id' => Session::get('internalRequirementId'),
            'product_id' => $product->id,
            'quantity' => $requiredQuantity,
            'status' => "Por despachar"
        ]); 
        
        return redirect()->back();

    }

    public function show($workId, InternalRequirement $internalRequirement)
    {
        return view('modules.work.internalRequirement.show')
                ->with('internalRequirement', $internalRequirement);
    }
  
    public function destroy( $workId, InternalRequiredProduct $internalRequiredProduct)
    {
        $internalRequiredProduct->delete();

        $internalRequiredProducts = InternalRequiredProduct::where('internal_requirement_id', Session::get('internalRequirementId'))->get();

        if (count($internalRequiredProducts) == 0) {

            InternalRequirement::where('id', Session::get('internalRequirementId'))->delete();
        }

        return redirect()->back();
    }


    public function send($workId, InternalRequirement $internalRequirement)
    {
        $internalRequirement->status = 'Por Despachar';
        $internalRequirement->save();

        Session::forget('internalRequirementId');
        Session::save();

        return redirect()->route('works.internalRequirements.index', ['work' => Auth::user()->work_id]);
    }
}
