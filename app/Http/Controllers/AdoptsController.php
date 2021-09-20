<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdoptsController extends Controller
{
    public function store(Request $request, $id)
    {
        \Auth::user()->adopt($id);
        return back();
    }
    
    public function destroy($id)
    {
        \Auth::user()->unadopt($id);
        return back();
    }
}
