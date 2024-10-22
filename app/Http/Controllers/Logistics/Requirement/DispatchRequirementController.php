<?php

namespace App\Http\Controllers\Logistics\Requirement;

use App\Inventory;
use App\RequiredProduct;
use App\InventoryProduct;
use App\DispatchRequirement;
use App\PurchaseRequirement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DispatchRequirementController extends Controller
{  
    public function productDispatch(Request $request, $requirementId, $inventoryId, $productId)
    {
        $request->validate([
            'quantity_to_dispatch' => 'required|integer|min:1'
        ]);

        /* dd("Requerimiento Id: " . $requirementId . " | " . "Inventario Id: " . $inventoryId . " | " . "Producto Id: " . $productId); */

        $inventory = Inventory::find($inventoryId);      

        $requiredProduct = RequiredProduct::where('requirement_id', $requirementId)
                                            ->where('product_id', $productId)
                                            ->first();


        if (!empty($requiredProduct)) {
                                            
            GLOBAL $quantityPurchaseOrDispatch;

            $purchaseRequirement = PurchaseRequirement::where('requirement_id', $requirementId)->where('required_product_id', $requiredProduct->id)->first();
            $dispatchRequirement = DispatchRequirement::where('requirement_id', $requirementId)->where('required_product_id', $requiredProduct->id)->first();
    
            if (isset($purchaseRequirement) && isset($dispatchRequirement)) 
            {
    
                $quantityPurchaseOrDispatch = $purchaseRequirement->quantity + $dispatchRequirement->quantity;
            }
            elseif (!isset($purchaseRequirement) && !isset($dispatchRequirement)) 
            {
    
                $quantityPurchaseOrDispatch = 0;
            }
            elseif (!isset($purchaseRequirement) && isset($dispatchRequirement)) 
            {
    
                $quantityPurchaseOrDispatch = $dispatchRequirement->quantity;
            }
            elseif (isset($purchaseRequirement) && !isset($dispatchRequirement)) 
            {
    
                $quantityPurchaseOrDispatch = $purchaseRequirement->quantity;
            }
    
            $missingPurchaseOrDispatch = $requiredProduct->quantity - $quantityPurchaseOrDispatch;


            if ($request['quantity_to_dispatch'] > $missingPurchaseOrDispatch) 
            {
                return redirect()->back();
            }
                                

            if (!$dispatchRequirement) {
                DispatchRequirement::create([
                    'requirement_id' => $requirementId,
                    'required_product_id' => $requiredProduct->id,
                    'quantity' => intval($request['quantity_to_dispatch']),
                    'work_id' => $inventory->work->id,
                    'status' =>'Pendiente'
                ]);
            }
            else {
                
                $dispatchRequirement->quantity = $dispatchRequirement->quantity + intval($request['quantity_to_dispatch']);
                $dispatchRequirement->save();
            }
        }

        return redirect()->back();

    }

    public function destroy(Request $request, DispatchRequirement $dispatchRequirement)
    {
        $dispatchRequirement->delete();

        return redirect()->back();
    
    }
    
}
