<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Category $category)
    {
        $orderBy = $request->query('orderby');
        $menus = $category->menus();

        if ($orderBy) {
            $sort_arr = explode('|', $orderBy);
            foreach($sort_arr as $s) {
                $menus->orderBy($s, 'ASC');
            }
        }   
        $menus = $menus->paginate(15);

        return response()->json($menus);
    }

}
