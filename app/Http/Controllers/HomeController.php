<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('display_order')->get();
        return view('home', [
			'categories' => $categories
		]);
    }

    public function menu()
    {
        $categories = Category::with('menuItems')
                        ->orderBy('display_order')
                        ->get();
        return view('menu', [
            'categories' => $categories
        ]);
    }
}
