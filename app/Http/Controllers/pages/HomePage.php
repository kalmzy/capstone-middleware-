<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomePage extends Controller
{
  public function index(Request $request)
  {
    return view('content.pages.pages-home');
  }
}
