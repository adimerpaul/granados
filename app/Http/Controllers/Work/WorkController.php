<?php

namespace App\Http\Controllers\Work;

use App\Work;
use App\Http\Controllers\Controller;

class WorkController extends Controller
{
    
    public function dashboard($workId)
    {
        $works = Work::paginate(10);
        return view('modules.work.dashboard')
                ->with('works', $works);
    }
}
