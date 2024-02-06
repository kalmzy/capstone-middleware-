<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;

class DataController extends Controller
{
  public function filterdata(Request $request)
  {
  }
  public function index(Request $request)
  {
    $categoryId = $request->query('category') ?? $request->input('category');

    $query = Product::query();

    if ($categoryId) {
      $query->where('category_id', $categoryId);
    }

    $products = $query->get();
    $selectedProductId = $request->query('product');
    $categories = Category::all();
    $selectedProduct = Product::find($selectedProductId);

    return view(
      'connection.datacon',
      compact('products', 'selectedProductId', 'selectedProduct', 'categories', 'categoryId')
    );
  }
}
