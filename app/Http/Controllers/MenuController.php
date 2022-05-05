<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use DB;
use Barryvdh\DomPDF\Facade\Pdf;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $orderBy = $request->query('orderby');

        $menus = DB::table('menus');
         
        if ($orderBy) {
            $sort_arr = explode('|', $orderBy);
            foreach($sort_arr as $s) {
                $menus->orderBy($s, 'ASC');
            }
        }   

        $menus = $menus->paginate(15);
            
        return response()->json($menus);
    }

    public function search(Request $request)
    {
        $keyword = $request->query('q');
        $menus = Menu::where('name', 'like', '%' . $keyword . '%')
            ->paginate(15);

        return response()->json(["result" => $menus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function invoice()
    {
        $data = [
            "menus" => Menu::withCount('orders')->get(),
            "sales" => DB::table('orders')->sum('total_payment')
        ];
        
        return view('pdf.invoice', $data);
        // $pdf = PDF::loadView('pdf.invoice-pdf', $data)->setOptions(['defaultFont' => 'sans-serif']);
        $pdf = PDF::loadView('pdf.invoice-pdf', $data);
        return $pdf->download('invoice.pdf');
    }

     /**
     * Download the pdf.
     *
     * @return \Illuminate\Http\Response
     */
    public function invoicePdf()
    {
        $data = [
            "menus" => Menu::withCount('orders')->get(),
            "sales" => DB::table('orders')->sum('total_payment')
        ];
        
        $pdf = PDF::loadView('pdf.invoice-pdf', $data);
        return $pdf->download('invoice.pdf');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "name" => 'required|unique:menus',
            "image" => 'required|image',
            "price" => 'required',
            "qty_available" => 'required',
            "categories" => 'required'
        ]);
        $data = $request->all();
        $data['image'] = $request->image->store('images');
        
        $menu = DB::transaction(function() use($request, $data) {
            $menu = Menu::create($data);
       
            foreach ($request->categories as $category) {
                DB::table('category_menu')->insert([
                    'category_id' => $category,
                    'menu_id' => $menu['id']
                ]);
            }
            return $menu;
        });

        return response()->json($menu, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        return response()->json($menu);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $this->validate($request, ['image' => 'image|unique:menus']);

        if ($request->has('name')) $menu->name = $request->name;
        if ($request->has('image')) $menu->image = $request->image->store('images');
        if ($request->has('price')) $menu->price = $request->price;
        if ($request->has('qty_available')) $menu->qty_available = $request->qty_available;

        if ($request->has('categories')) {
            DB::transaction(function() use($request, $menu) {
           
                foreach ($request->categories as $category) {
                    DB::table('category_menu')->upsert([
                        ['category_id' => $category, 'menu_id' => $menu->id],
                    ], ['category_id', 'menu_id'], ['category_id']);
                }
            });
        }

        $menu->save();
        return response()->json($menu);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return response()->json(["message" => "success"]);
    }
}
