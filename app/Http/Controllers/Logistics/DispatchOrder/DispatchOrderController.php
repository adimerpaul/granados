<?php

namespace App\Http\Controllers\Logistics\DispatchOrder;

use App\Requirement;
use App\DispatchRequirement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DispatchOrderController extends Controller
{
    public function index()
    {
        
        $requirements = Requirement::with('dispatchRequirements')
                                    ->where('status', 'Comprando y/o Despachando')
                                    ->get();

        return view('modules.logistics.dispatchOrder.index')
                ->with('requirements', $requirements);
    }

    public function show(Requirement $requirement)
    {
        $dispatchRequirements = DispatchRequirement::where('requirement_id', $requirement->id)->get();

        return view('modules.logistics.dispatchOrder.show')
                ->with('dispatchRequirements', $dispatchRequirements);
    }
}
