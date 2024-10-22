<?php

namespace App\Http\Controllers\Work\Warehouse;

use App\Requirement;
use App\PurchaseOrder;
use App\InventoryProduct;
use App\DispatchRequirement;
use App\PurchaseRequirement;
use Illuminate\Http\Request;
use App\EntryProductWarehouse;
use App\Http\Livewire\Inventory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Inventory as InventoryWarehouse;

class DispatchController extends Controller
{
    public function index(){

        $workId = Auth::user()->work_id;


        $requirements  = Requirement::where('work_id', $workId)
                                    ->where('status', '=', 'Comprando y/o Despachando')
                                    ->whereHas('purchaseRequirements', function($query) {
                                        $query->where('status', 'Despachado');
                                    })
                                    ->get();
        
        /* $requirements  = Requirement::where('work_id', $workId)->get(); */


        /* $purchaserOrders = PurchaseOrder::where('re') */
        return view('modules.work.warehouse.dispatch.index')
                ->with('requirements', $requirements);
    }

    public function showRequirement($workId, $requirementId){
        

        $requirement = Requirement::find($requirementId);

        return view('modules.work.warehouse.dispatch.showRequirement')
                ->with('requirement', $requirement);
    }

    public function addStock(Request $request, $workId, Requirement $requirement, PurchaseRequirement $purchaseRequirement){

        $missingQuantity = $purchaseRequirement->quantity - $purchaseRequirement->quantity_entered_into_the_inventory;

        if (intval($request['quantity_entered_into_the_warehouse']) > $missingQuantity) 
        {
            return redirect()->back();
        }
        
        $inventory = InventoryWarehouse::where('work_id', $workId)->first();

        $inventoryProduct = InventoryProduct::where('inventory_id', $inventory->id)->where('product_id', $purchaseRequirement->requiredProduct->product->id)->first();
        $inventoryProduct->stock = $inventoryProduct->stock + intval($request['quantity_entered_into_the_warehouse']);
        $inventoryProduct->save();

        $purchaseRequirement->observation = $request['observation'];
        $purchaseRequirement->quantity_entered_into_the_inventory = $purchaseRequirement->quantity_entered_into_the_inventory + intval($request['quantity_entered_into_the_warehouse']);
        $purchaseRequirement->save();

        if ($purchaseRequirement->quantity == $purchaseRequirement->quantity_entered_into_the_inventory) 
        {
            $purchaseRequirement->status = 'Ingresado al Inventario';
            $purchaseRequirement->save();
        }

        $existsDispatchRequirements = DispatchRequirement::where('requirement_id', $requirement->id)->where('status', '=', 'Por Despachar')->exists();

        $existsPurchaseRequirements = PurchaseRequirement::where('requirement_id', $requirement->id)->where('status', '=', 'Despachado')->exists();

        if (!$existsPurchaseRequirements) {
            EntryProductWarehouse::create([
                'work_id' => $workId,
                'product_id' => $purchaseRequirement->requiredProduct->product->id,
                'quantity_entered' => $purchaseRequirement->quantity_entered_into_the_inventory,
                'date_of_admission' => now()
            ]);
        }


        if (!$existsDispatchRequirements && !$existsPurchaseRequirements) {
        
            Requirement::where('id', $requirement->id)->update([
                'area' => 'Almacen Obra',
                'status' => 'Atendido'
            ]);

            return redirect()->route('works.warehouses.dispatchOrders.index', ['work' => $workId]);
        }

        return redirect()->back();
    }
}
