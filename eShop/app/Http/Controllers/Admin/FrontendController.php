<?php

namespace App\Http\Controllers\Admin;

use index;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpKernel\Event\ViewEvent;

class FrontendController extends Controller
{
    //
    public function index()
    {
        return View('admin.index');
    }
}
