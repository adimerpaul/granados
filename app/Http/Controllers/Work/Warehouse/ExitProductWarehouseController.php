<?php

namespace App\Http\Controllers\Work\Warehouse;

use App\ExitProductWarehouse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExitProductWarehouseController extends Controller
{
    public function index($workId)
    {
        $exitProductsWarehouse = ExitProductWarehouse::where('work_id', $workId)->get();
        
        return view('modules.work.warehouse.existProduct.index')
                    ->with('exitProductsWarehouse', $exitProductsWarehouse);
    }
}
