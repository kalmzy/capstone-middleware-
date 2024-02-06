<?php

namespace App\Http\Controllers;
use App\Models\Sale;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ReportController extends Controller
{
  public function index()
  {
    $categories = Category::all();
    $products = Product::all();
    $sales = Sale::all();
    return view('reports.forecast-report', compact('categories', 'products', 'sales'));
  }
  public function create()
  {
    return view('reports.create-category');
  }
  public function createProduct()
  {
    $categories = Category::all();
    return view('reports.create-product', compact('categories'));
  }
  public function createSale()
  {
    $products = Product::all();
    return view('reports.create-sale', compact('products'));
  }
  public function store(Request $request)
  {
    Category::create([
      'category_name' => $request->category_name,
    ]);

    return redirect('admin/report')->with('message', 'new data added');
  }

  public function storeProduct(Request $request)
  {
    $category = Category::findOrFail($request->category_id);
    $category->products()->create([
      'product_name' => $request->product_name,
      'price' => $request->price,
    ]);

    return redirect('admin/report')->with('message', 'new data added');
  }

  public function storeSale(Request $request)
  {
    $product = Product::with('category')->findOrFail($request->product_id);
    $total_sale = $product->price * $request->quantity_sold;
    $product->sales()->create([
      'quantity_sold' => $request->quantity_sold,
      'total_sale' => $total_sale,
    ]);
    return redirect('admin/report')->with('message', 'new data added');
  }
}
