<?php

namespace App\Http\Controllers\Work\Warehouse;

use App\Requirement;
use App\DispatchRequirement;
use App\EntryProductWarehouse;
use App\ExitProductWarehouse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PurchaseRequirement;

class DispatchOrderController extends Controller
{
    public function index($workId)
    {
        /* dd($workId); */
        $requirements = Requirement::whereHas('dispatchRequirements', function ($query) use ($workId) {
            $query->where('work_id', $workId)
                    ->where('status', 'Por despachar');
            
        })->get();

        /* dd($requirements); */

        return view('modules.work.warehouse.dispatchOrder.index')
                ->with('requirements', $requirements);
    }

    public function show($workId, Requirement $requirement)
    {
        $dispatchRequirements = DispatchRequirement::where('requirement_id', $requirement->id)->get();

        return view('modules.work.warehouse.dispatchOrder.show')
                ->with('dispatchRequirements', $dispatchRequirements);
    }

    public function status($workId, Requirement $requirement, DispatchRequirement $dispatchRequirement)
    {
        /* dd($dispatchRequirement); */
        /* dd($requirement); */

        $dispatchRequirement->status = "Despachado";
        $dispatchRequirement->save();

        $existsDispatchRequirements = DispatchRequirement::where('requirement_id', $requirement->id)->where('status', '=', 'Por Despachar')->exists();

        $existsPurchaseRequriremts = PurchaseRequirement::where('requirement_id', $requirement->id)->where('status', '=', 'Despachado')->exists();

        if (!$existsDispatchRequirements) {
            ExitProductWarehouse::create([
                'work_id' => $workId,
                'product_id' => $dispatchRequirement->requiredProduct->product->id,
                'quantity_removed_from_inventory' => $dispatchRequirement->quantity,
                'departure_date' => now()
            ]);
        }

        if (!$existsDispatchRequirements && !$existsPurchaseRequriremts) {
        
            Requirement::where('id', $requirement->id)->update([
                'area' => 'Almacen Obra',
                'status' => 'Atendido'
            ]);

        }

        return redirect()->route('works.warehouses.dispatchOrders.index', ['work' => $workId]);
    }

}
