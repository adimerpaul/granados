<?php

namespace App\Http\Controllers\Work\Warehouse;

use App\ExitProductWarehouse;
use App\Inventory;
use App\InventoryProduct;
use App\InternalRequirement;
use Illuminate\Http\Request;
use App\InternalRequiredProduct;
use App\Http\Controllers\Controller;

class InternalRequirementController extends Controller
{

    public function index($workId)
    {
        $internalRequirements = InternalRequirement::where('work_id', $workId)->where('status', '!=', 'Incompleto')->get();

        /* dd($internalRequirements); */
        return view('modules.work.warehouse.internalRequirement.index')
                ->with('internalRequirements', $internalRequirements);
    }

    public function show($workId, InternalRequirement $internalRequirement)
    {
        return view('modules.work.warehouse.internalRequirement.show')
                ->with('internalRequirement', $internalRequirement);
    }

    public function productDispatch($workId, InternalRequiredProduct $internalRequiredProduct)
    {

        $inventory = Inventory::where('work_id', $workId)->first();

        $inventoryProduct = InventoryProduct::where('inventory_id', $inventory->id)->where('product_id', $internalRequiredProduct->product->id)->first();
        $inventoryProduct->stock = $inventoryProduct->stock - intval($internalRequiredProduct->quantity);
        $inventoryProduct->save();

        $internalRequiredProduct->status = "Despachado";
        $internalRequiredProduct->save();

        $haveIncompleteRecords = InternalRequirement::where('id', $internalRequiredProduct->internalRequirement->id)
                                                    ->whereHas('internalRequiredProducts', function($query){
                                                        $query->where('status', 'Por despachar');
                                                    })
                                                    ->exists();

        if (!$haveIncompleteRecords) {
            InternalRequirement::where('id', $internalRequiredProduct->internalRequirement->id)->update([
                'status' => 'Atendido'
            ]);
        }

        ExitProductWarehouse::create([
            'work_id' => $workId,
            'product_id' => $internalRequiredProduct->product->id,
            'quantity_removed_from_inventory' => $internalRequiredProduct->quantity,
            'departure_date' => now()
        ]);
        
        return redirect()->back();
    }

}
