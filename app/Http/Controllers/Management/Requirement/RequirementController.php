<?php

namespace App\Http\Controllers\Management\Requirement;

use App\Requirement;
use App\RequiredProduct;
use App\PurchaseRequirement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PurchaseOrder;

class RequirementController extends Controller
{
    public function index(){

        $requirements = Requirement::where('status', '!=', 'Creando')->get();

        return view('modules.management.requirement.index')
                    ->with('requirements', $requirements);
    }

    public function purchaseRequirements(){

        $purchaseOrders = PurchaseOrder::all();

        return view('modules.management.purchaseRequirement.index')
                ->with('purchaseOrders', $purchaseOrders);
    }

    public function show($requirementId){

        $requirement = Requirement::find($requirementId);
        $requiredProducts =  RequiredProduct::where('requirement_id', $requirementId)->get();
        
        return view('modules.management.requirement.showRequirement')
                ->with('requirement', $requirement)
                ->with('requiredProducts', $requiredProducts);
    }

    public function  approve($requirementId){

        Requirement::where('id', $requirementId)->update([
            'area' => 'Logistica',
            'status' => 'Gestionando'
        ]);

        return redirect()->route('managements.requirements.index');
    }

    public function  disapprove(Request $request, $requirementId){

        Requirement::where('id', $requirementId)->update([
            'status' => 'Desaprobado' 
        ]);

        return redirect()->route('managements.requirements.index');
    }

    public function addObservationRequiredProduct(Request $request, $requirementId, $requiredProductId){
        /* dd($requirementId . ' ' . $requiredProductId); */
        $valor = RequiredProduct::where('id', $requiredProductId)->where('requirement_id', $requirementId)->update([
            'observation' => $request['observation']
        ]);

        return redirect()->back();
    }
}
