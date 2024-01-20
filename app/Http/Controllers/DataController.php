<?php

namespace App\Http\Controllers;
use App\Models\Datacon;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;



class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
      $dataCon = Datacon::paginate(10);
        return view('connection.datacon',compact('dataCon','products'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('connection.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_unit' => [
                'required',
                Rule::exists('product', 'product_unit'),
            ],
            'sale' => 'required|integer',
        ]);
    
        // Create a new record in the Datacon model with validated data
        Datacon::create($request->all());
    
        // Flash a success message to the session
        session()->flash('success', 'Record created successfully');
    
        // Redirect the user to the 'datacon' route
        return redirect()->route('dataCon.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
