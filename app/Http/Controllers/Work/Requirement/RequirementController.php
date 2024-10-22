<?php

namespace App\Http\Controllers\Work\Requirement;

use App\Work;
use App\Measure;
use App\Product;
use App\Category;
use App\Inventory;
use App\Requirement;
use App\RequiredProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\InventoryProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RequirementController extends Controller
{
    public function requirements()
    {
        $measures = Measure::all();
        $products = Product::all();
        $categories = Category::all();
        $requiredProducts = RequiredProduct::where('requirement_id', Session::get('requirementId'))->get();
        $inventories = Inventory::where('work_id', Auth::user()->work_id)->get();
        
        return view('modules.work.requirement.index')
                ->with('measures', $measures)
                ->with('products', $products)
                ->with('categories', $categories)
                ->with('requiredProducts', $requiredProducts)
                ->with('inventories', $inventories);
    }  

    public function send($requirementId, $workId)
    {
        
        Requirement::where('id', Session::get('requirementId'))->update([
            'area' => 'Gerencia', 
            'status' => 'Por aprobar'
        ]);

        Session::forget('requirementId');
        Session::save();

        return redirect()->route('works.requirements.status', ['work' => Auth::user()->work_id]);

    }

    public function sendRequirementsForwarding($workId, $requirementId)
    {

        Requirement::where('id', $requirementId)->update([ 
            'status' => 'En Aprobación',
        ]);

        return redirect()->route('works.requirementsStatus', ['work' => Auth::user()->work_id]);

    }

    public function status($workId)
    {
        
        $requirements = Requirement::where('work_id', $workId)->where('status', '!=' ,'Creando')->get();

        return view('modules.work.requirementStatus.index')
                ->with('requirements', $requirements);
    }

    public function showRequirement($workId, $requirementId)
    {
       
        $requiredProducts = RequiredProduct::where('requirement_id', $requirementId)->get();
        $requirement = Requirement::find($requirementId);

        return view('modules.work.requirementStatus.showRequirement')
                ->with('requiredProducts', $requiredProducts)
                ->with('requirement', $requirement);
    }

    
}

