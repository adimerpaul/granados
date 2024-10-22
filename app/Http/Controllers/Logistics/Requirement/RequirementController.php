<?php

namespace App\Http\Controllers\Logistics\Requirement;

use App\Requirement;
use App\RequiredProduct;
use App\DispatchRequirement;
use App\PurchaseRequirement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PurchaseOrder;

class RequirementController extends Controller
{
    public function index()
    {

        $requirements = Requirement::whereIn('status', ['Gestionando', 'Comprando y/o Despachando'])->get();

        /* dd($requirements); */

        return view('modules.logistics.requirement.index')
                ->with('requirements', $requirements);
    }

    public function show($requirementId)
    {

        $requirement = Requirement::find($requirementId);

        $requiredProducts =  RequiredProduct::where('requirement_id', $requirementId)->get();
        $dispatchRequirements = DispatchRequirement::where('requirement_id', $requirementId)->get();
        $purchaseRequirements = PurchaseRequirement::where('requirement_id', $requirementId)->get();
        
        return view('modules.logistics.requirement.showRequirement')
                ->with('requirement', $requirement)
                ->with('requiredProducts', $requiredProducts)
                ->with('dispatchRequirements', $dispatchRequirements)
                ->with('purchaseRequirements', $purchaseRequirements);
    }

    public function updateStatus(Requirement $requirement)
    {
        
        /* $requiredProducts = RequiredProduct::where('requirement_id', $requirement->id)->get();

        

        foreach ($requiredProducts as $requiredProduct) {

            $quantityProducts = 0;

            $purchaseRequirements = PurchaseRequirement::where('requirement_id', $requirement->id)->where('required_product_id', $requiredProduct->id)->get();
            $dispatchRequirements = DispatchRequirement::where('requirement_id', $requirement->id)->where('required_product_id', $requiredProduct->id)->get();

            foreach ($purchaseRequirements as $purchaseRequirement) {
                if ($purchaseRequirement) {
                    
                }
            }
        }

        

        dd($purchaseRequirements);

        if (isset($purchaseRequirements) && isset($dispatchRequirements)) 
        {
            
        } */


        if (PurchaseRequirement::where('requirement_id', $requirement->id)->exists()) 
        {
            PurchaseRequirement::where('requirement_id', $requirement->id)->update([
                'status' => 'Req de Compra'
            ]);
        }

        if (DispatchRequirement::where('requirement_id', $requirement->id)->exists()) 
        {
            DispatchRequirement::where('requirement_id', $requirement->id)->update([
                'status' => 'Por Despachar'
            ]);
        }

        Requirement::where('id', $requirement->id)->update([
            'status' => 'Comprando y/o Despachando'
        ]);

        PurchaseOrder::where('requirement_id', $requirement->id)->update([
            'status' => 'Por comprar'
        ]);

        return redirect()->route('workRequirements.index');
    }
}
