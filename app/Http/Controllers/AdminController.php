<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class AdminController extends Controller
{
    public function menu()
    {
        $categories = Category::orderBy('display_order')->get();
        return view('admin.menu-editor', [
            'categories' => $categories
        ]);
    }
}
