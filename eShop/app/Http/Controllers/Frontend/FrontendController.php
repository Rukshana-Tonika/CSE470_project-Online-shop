<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// use App\Http\Controllers\Frontend\FrontendController;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }
}
