<?php

namespace App\Http\Controllers\Work\Warehouse;

use App\Measure;
use App\Category;
use App\EntryProductWarehouse;
use App\Requirement;
use App\PurchaseRequirement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EntryProductWarehouseController extends Controller
{
    public function index($workId)
    {
        $categories = Category::all();
        $measures = Measure::all();

        $entryProductsWarehouse = EntryProductWarehouse::where('work_id', $workId)->get();
        return view('modules.work.warehouse.entryProduct.index')
                ->with('categories', $categories)
                ->with('measures', $measures)
                ->with('entryProductsWarehouse', $entryProductsWarehouse);
    }
}
