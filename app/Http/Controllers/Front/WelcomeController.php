<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Coffee;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $coffees = Coffee::orderByDesc('created_at')->get();
        return view('welcome', compact('coffees'));
    }
}
