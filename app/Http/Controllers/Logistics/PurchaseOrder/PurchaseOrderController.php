<?php

namespace App\Http\Controllers\Logistics\PurchaseOrder;

use App\Http\Controllers\Controller;
use App\PurchaseOrder;
use App\PurchaseRequirement;
use App\Requirement;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class PurchaseOrderController extends Controller
{
    public function index()
    {
        /* $requirements = Requirement::with('purchaseRequirements')->where('status', '=', 'Gestionando')->get(); */

        $purchaseOrders = PurchaseOrder::with('purchaseRequirements')->where('status', '!=', 'Pendiente')->get();

        return view('modules.logistics.purchaseOrder.index')
                ->with('purchaseOrders', $purchaseOrders);
    }

    public function show(PurchaseOrder $purchaseOrder)
    {
        /* dd($requirement); */
        $purchaseRequirements = PurchaseRequirement::where('requirement_id', $purchaseOrder->requirement->id)->get();

        return view('modules.logistics.purchaseOrder.show')
                ->with('purchaseOrder', $purchaseOrder)
                ->with('purchaseRequirements', $purchaseRequirements);
    }

    public function updateAmount(Request $request, Requirement $requirement, PurchaseRequirement $purchaseRequirement)
    {
        /* dd($request->all()); */

        $amount = intval($purchaseRequirement->quantity) * floatval($request['cost_price']);

        $purchaseRequirement->cost_price = $request['cost_price'];
        $purchaseRequirement->amount = $amount;
        $purchaseRequirement->save();

        return redirect()->back();
        
    }

    public function dispatchWarehouse(Requirement $requirement, PurchaseRequirement $purchaseRequirement){
        /* dd($requirement); */

        if (empty($purchaseRequirement->amount)) {
            return redirect()->back();
        }

        PurchaseOrder::where('requirement_id', $requirement->id)->update([
            'status' => 'Comprado'
        ]);

        Requirement::where('id', $requirement->id)->update([
            'status' => 'Comprando y/o Despachando'
        ]);

        PurchaseRequirement::where('requirement_id', $requirement->id)->update([
                                                        'status' => 'Despachado'
                                                    ]);

        return redirect()->back();
        
    }
}
