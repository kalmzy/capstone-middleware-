<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProductData(Request $request)
{
    $selectedProduct = $request->input('product');

    // Query the database to get data for the selected product
    $productData = Product::where('product_unit', $selectedProduct)->get();

    return response()->json($productData);
}
}
