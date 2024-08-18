<?php

namespace App\Http\Controllers;

use App\Models\League;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
    public function index()
    {
        $leagues = League::all();
        return view('front.index', compact('leagues'));
    }
}
