<?php

namespace App\Http\Controllers;
use App\Models\Datacon;
use App\Models\Product;
use App\Models\Income;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class DataController extends Controller
{

 
  public function index(Request $request): Response
  {
    $query = Income::query();
      $ProductFilter = $request->product_filter;

      if ($ProductFilter) {
        $query->where('product_unit', $ProductFilter);
      }
      
      $daTa = $query->selectRaw('MONTH(created_at) as month, 
                              SUM(revenue) as totala, 
                              SUM(stock) as totals, 
                              SUM(price) as totalp, 
                              SUM(sold) as totalso')
                      ->groupByRaw('MONTH(created_at)')
                      ->orderByRaw('MONTH(created_at)')
                      ->get();
      
      $inCome = $query->get();
      $products = product::all();
      $distinctProduct = Income::distinct()->pluck('product_unit');
      $dataCon = Datacon::paginate(10);
      
      // Find the missing months and fill them with 0s
$dataWithMissingMonths = [];
$missingMonths = [];

// Find the missing months and fill them with 0s
$currentMonth = 0;
$currentTotal = 0;

foreach ($daTa as $row) {
    if ($currentMonth + 1 != $row->month) {
        for ($i = $currentMonth + 1; $i < $row->month; $i++) {
            $missingMonths[] = $i;
            $dataWithMissingMonths[] = (object)[
                'month' => $i,
                'totala' => 0,
                'totals' => 0,
                'totalp' => 0,
                'totalso' => 0,
            ];
        }
    }

    $currentMonth = $row->month;
    $currentTotal = $row->totala;
    $dataWithMissingMonths[] = $row;
}

// Add the missing months after the last row

      
      // Sort by month again
      usort($dataWithMissingMonths, function ($a, $b) {
        return $a->month <=> $b->month;
      });
      
      return response()->view('connection.datacon', compact('distinctProduct','dataCon', 'products','inCome','ProductFilter','daTa', 'dataWithMissingMonths'));
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
      'product_unit' => ['required', Rule::exists('product', 'product_unit')],
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
