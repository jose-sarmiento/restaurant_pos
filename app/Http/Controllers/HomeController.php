<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application home.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $query = $request->query('category');
        if (!$query) $query = 'hot dishes';
        $query = str_replace("-", " ", $query);

        $categories = Category::all();
        $category = Category::where('category', $query)->get();
        $menus = [];
        if (count($category) > 0) {
            $menus = $category[0]->menus;
        }

        return view('home', ['menus' => $menus, 'categories' => $categories]);
    }
}
