<?php

namespace App\Http\Controllers\Work\Requirement\RequiredProduct;

use App\Requirement;
use App\RequiredProduct;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RequiredProductController extends Controller
{
    public function store(Request $request, $workId, $requiredProductId)
    {

        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        if (!Session::has('requirementId')) 
        {

            $requirement = Requirement::create([
                'type' => 'URGENTE',
                'user_id' => intval(Auth::user()->id),
                'work_id' => intval($workId),
                'status' => 'Creando'
            ]);
            
            Requirement::where('id', $requirement->id)->update([
                'code' => 'Req00' . $requirement->id
            ]);

            Session::put('requirementId', $requirement->id);
            Session::save();
        }
        else {
            $requirement = Requirement::find(Session::get('requirementId'));

            if (empty($requirement)) {

                $requirement = Requirement::create([
                    'type' => 'URGENTE',
                    'user_id' => intval(Auth::user()->id),
                    'work_id' => intval($workId),
                    'status' => 'Creando'
                ]);
                
                Requirement::where('id', $requirement->id)->update([
                    'code' => 'Req00' . $requirement->id
                ]);
    
                Session::put('requirementId', $requirement->id);
                Session::save();
            }

        }
       
        $requiredProducts = RequiredProduct::where('requirement_id', Session::get('requirementId'))->get();

        foreach ($requiredProducts as $requiredProduct) 
        {
            if ($requiredProduct->product->id == $requiredProductId) 
            {
                return redirect()->back();
            }
        }
        RequiredProduct::create([
            'requirement_id' => Session::get('requirementId'),
            'product_id' => intval($requiredProductId),
            'quantity' => intval($request['quantity']),
        ]);

        return redirect()->back();
    }

    public function destroy($workId, RequiredProduct $requiredProduct)
    {
       
        $requiredProduct->delete();

        $requiredProducts = RequiredProduct::where('requirement_id', intval(Session::get('requirementId')))->get();

        if (count($requiredProducts) == 0) {

            Requirement::where('id', Session::get('requirementId'))->delete();

            Session::forget('requirementId');
            Session::save();
        }

        return redirect()->back();
    }

    public function destroyRequiredProductStatus($workId, $requiredProductId)
    {

        RequiredProduct::find(intval($requiredProductId))->delete();

        $requiredProducts = RequiredProduct::where('requirement_id', intval(Session::get('requirementId')))->get();

        if (count($requiredProducts) == 0) {
            Session::forget('requirementId');
            Session::save();
        }

        return redirect()->back();
    }

    public function editRequiredProductStatus(Request $request, $workId, $requiredProductId)
    {

        RequiredProduct::where('id',$requiredProductId)->update([
            'quantity' => $request['quantity']
        ]);

        return redirect()->back();
    }
}
