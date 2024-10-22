<?php

namespace App\Http\Controllers\Logistics;

use App\Product;
use App\Supplier;
use App\Inventory;
use App\Warehouse;
use App\Requirement;
use App\RequiredProduct;
use App\DispatchRequirement;
use App\PurchaseRequirement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogisticsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        return view('modules.logistics.dashboard'); 
    }
}
