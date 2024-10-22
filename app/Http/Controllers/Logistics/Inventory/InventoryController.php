<?php

namespace App\Http\Controllers\Logistics\Inventory;

use App\Work;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InventoryController extends Controller
{
    public function index()
    {
        $works = Work::all();
        return view('modules.logistics.inventories.index')
                ->with('works', $works);
    }
}
