<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

// use App\Http\Controllers\Frontend\FrontendController;

class FrontendController extends Controller
{
    public function index()
    {
        $featured_products = Product::where('trending', '1')->take(15)->get();
        return view('frontend.index', compact('featured_products'));
    }

    public function category()
    {
        $category = Category::where('status','0')->get();  //getting the category where status is 0
        return view('frontend.category', compact('category'));
    }
}
