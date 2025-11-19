<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RevistaController extends Controller
{
    public function index()
    {
        return view('revistas.index');
    }

}
