<?php

namespace App\Http\Controllers;
use App\Models\Sale;
use App\Models\LmsG41Product;
use App\Models\LmsG45MonthlyPredictedSale;
use App\Models\LmsG45AnnualPredictedSale;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReportController extends Controller
{
  public function index(Request $request)
  {
    $yearly = LmsG45AnnualPredictedSale::all();
    $monthly = LmsG45MonthlyPredictedSale::all();
    $products = LmsG41Product::all();
    $sales = Sale::all();
    return view('reports.forecast-report', compact('yearly','monthly', 'products', 'sales'));
  }
  public function createProduct()
  {
    return view('reports.create-product');
  }
  public function createSale()
  {
    $products = LmsG41Product::all();
    return view('reports.create-sale', compact('products'));
  }

  public function storeProduct(Request $request)
  {
    $product = new LmsG41Product(); // Create a new instance of the product model
    $product->name = $request->name;
    $product->unit_price = $request->unit_price;
    $product->save();

    return redirect('admin/report')->with('message', 'new data added');
  }

  public function storeSale(Request $request)
  {
    $product = LmsG41Product::findOrFail($request->product_id); // Retrieve the product by its ID

    $total_sale = $product->unit_price * $request->quantity_sold;
    $product->sales()->create([
      'quantity_sold' => $request->quantity_sold,
      'total_sale' => $total_sale,
      'sale_date' => $request->sale_date,
    ]);
    return redirect('admin/report')->with('message', 'new data added');
  }
}
