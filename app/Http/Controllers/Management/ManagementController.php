<?php

namespace App\Http\Controllers\Management;

use App\Work;
use App\Warehouse;
use App\Management;
use App\Requirement;
use App\RequiredProduct;
use App\PurchaseRequirement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManagementController extends Controller
{

    public function dashboard()
    {
        return view('modules.management.dashboard');
    }
    
    

    
    
    
}
