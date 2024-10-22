<?php

namespace App\Http\Controllers\Management\Inventory;

use App\Work;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $works = Work::all();
        return view('modules.management.inventory.index')
                ->with('works', $works);
    }
    public function show(Work $work)
    {
        dd($work);
    }

}
