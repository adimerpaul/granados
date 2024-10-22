<?php

namespace App\Http\Controllers\Logistics\Supplier;

use App\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::paginate(10);

        return view('modules.logistics.supplier.index')
                ->with('suppliers', $suppliers);
    }

    public function store(Request $request)
    {

        Supplier::create([
            'name' => $request['name'],
            'phone' => $request['phone'],
            'ubication' => $request['ubication'],
            'ruc' => $request['ruc']
        ]);

        return redirect()->back();
    }

    public function update(Request $request, Supplier $supplier){
        /* dd($supplier); */

        $supplier->name = $request['name'];
        $supplier->phone = $request['phone'];
        $supplier->ubication = $request['ubication'];
        $supplier->ruc = $request['ruc'];
        $supplier->save();

        return redirect()->back();
    }

    public function destroy(Supplier $supplier){

        $supplier->delete();

        return redirect()->back();
    }
}
