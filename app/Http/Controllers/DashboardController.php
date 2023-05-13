<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('index');
    }
}
