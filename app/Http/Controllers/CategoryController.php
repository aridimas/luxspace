<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax()){
            $query = Category::orderBy('id', 'DESC')->get(); 
                 
            return DataTables::of($query)
                ->addColumn('action', function($item){
                    return '
                    <a href="'. route('dashboard.category.edit', $item->id) .'" class="bg-yellow-500 text-white rounded-md px-2 py-1 mr-2">
                        Edit
                    </a>
                    <form class="inline-block" action="'. route('dashboard.category.destroy', $item->id) .'" method="POST">
                        <button class="bg-red-500 text-white rounded-md px-2 py-1 mr-2">
                            Hapus
                        </button>
                    '. method_field('delete') . csrf_field() .'
                    </form>
                        
                    ';
                })
               
                ->rawColumns(['action'])
                ->make();
           }
                
           
            return view('pages.dashboard.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dashboard.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        Category::create($data);
        
        return redirect()->route('dashboard.category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('pages.dashboard.category.edit', // bisa jg menggunakan = compact ('product')
         [
           'item' => $category
         ]
    );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        $category->update($data);
        
        return redirect()->route('dashboard.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        
        return redirect()->route('dashboard.category.index');
    }
}
