<?php

namespace App\Http\Controllers\Logistics\Requirement;

use App\DispatchRequirement;
use App\Product;
use App\RequiredProduct;
use App\PurchaseRequirement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PurchaseOrder;
use Illuminate\Support\Facades\Auth;

class PurchaseRequirementController extends Controller
{
    public function productPurchase(Request $request, $requirementId, RequiredProduct $requiredProduct){

        $request->validate([
            'quantity_to_purchase' => 'required|integer|min:1'
        ]);

        if ($request['quantity_to_purchase'] > $requiredProduct->quantity) {

            return redirect()->back();

        }

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

        if ($request['quantity_to_purchase'] > $missingPurchaseOrDispatch) {

            return redirect()->back();

        }

        if (!$purchaseRequirement) {

            $purchaseOrder = PurchaseOrder::where('requirement_id', $requirementId)->first();

            if (!$purchaseOrder) {
                $purchaseOrder = PurchaseOrder::create([
                    'code' => 'OC00' . $requirementId,
                    'status' => 'Pendiente',
                    'requirement_id' => $requirementId,
                    'user_id' => Auth::user()->id
                ]);
            }

            PurchaseRequirement::create([
                'requirement_id' => $requirementId,
                'required_product_id' => $requiredProduct->id,
                'quantity' => $request['quantity_to_purchase'],
                'status' =>'Pendiente',
                'purchase_order_id' => $purchaseOrder->id
            ]);
        }
        else 
        {
            $purchaseRequirement->quantity = $purchaseRequirement->quantity + $request['quantity_to_purchase'];
            $purchaseRequirement->status = 'Pendiente';
            $purchaseRequirement->save();
        }

        return redirect()->back();

    }

    public function destroy(PurchaseRequirement $purchaseRequirement)
    {
        
        $purchaseRequirement->delete();

        return redirect()->back();
    }

}
