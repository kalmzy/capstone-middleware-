<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LmsG41Product;
use App\Models\Sale;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
  public function index(Request $request)
  {
    $query = LmsG41Product::query();

    $products = $query->get();
    $selectedProductId = $request->query('product');
    $selectedProduct = LmsG41Product::find($selectedProductId);

    // Query the sales table and join it with the products table
    $sales = Sale::query()
      ->selectRaw(
        'MONTH(sales.created_at) as month, 
                   SUM(quantity_sold) as total_quantity_sold, 
                   SUM(total_sale) as total_amount_sale'
      )
      ->join('lms_g41_products', 'sales.product_id', '=', 'lms_g41_products.id')
      ->where('sales.product_id', $selectedProductId)
      ->groupByRaw('MONTH(sales.created_at)')
      ->orderByRaw('MONTH(sales.created_at)')
      ->get();

    $dataWithMissingMonths = [];
    $missingMonths = [];
    $currentMonth = 0;
    $currentTotal = 0;

    foreach ($sales as $row) {
      if ($currentMonth + 1 != $row->month) {
        for ($i = $currentMonth + 1; $i < $row->month; $i++) {
          $missingMonths[] = $i;
          $dataWithMissingMonths[] = (object) [
            'month' => $i,
            'total_quantity_sold' => 0,
            'total_amount_sale' => 0,
          ];
        }
      }
      $currentTotal = $row->total_quantity_sold;
      $dataWithMissingMonths[] = $row;
      $currentMonth = $row->month;
    }
    $psales = Sale::all();
    usort($dataWithMissingMonths, function ($a, $b) {
      return $a->month <=> $b->month;
    });

    return view(
      'connection.datacon',
      compact('psales', 'dataWithMissingMonths', 'products', 'selectedProductId', 'selectedProduct', 'sales')
    );
  }
}
