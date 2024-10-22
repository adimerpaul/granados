<?php

namespace App\Http\Controllers\Work\Warehouse;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function index(){
        return view('modules.work.warehouse.inventory.index');
    }
}
