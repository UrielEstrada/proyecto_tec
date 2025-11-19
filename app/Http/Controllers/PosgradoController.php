<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PosgradoController extends Controller
{
    public function index()
    {
        return view('posgrados.index');
    }

}
