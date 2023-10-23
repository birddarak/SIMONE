<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DpaController extends Controller
{
    public function index()
    {
        return view('panel.pages.dpa.index');
    }
}
