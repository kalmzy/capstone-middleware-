<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LmsG45QualityStandard;

class QualityStandardController extends Controller
{
    public function index()
    {
        $standards = LmsG45QualityStandard::all();
        return view('quality_standard.index', compact('standards'));
    }

    public function create()
    {
        return view('quality_standard.create');
    }
    public function store(Request $request)
    {
        LmsG45QualityStandard::create($request->all());
        return redirect()->route('quality_standards.index');
    }   
}
