<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductGalleryRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductGallery;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class ProductGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        if(request()->ajax()){
            $query = ProductGallery::where('products_id', $product->id);
                 
            return DataTables::of($query)
                ->addColumn('action', function($item){
                    return '
                        
                        <form class="inline-block" action="'. route('dashboard.gallery.destroy', $item->id) .'" method="POST">
                            <button class="bg-red-500 text-white rounded-md px-2 py-1 m-2">
                                Delete
                            </button>
                        '. method_field('delete') . csrf_field() .'
                        </form>
                    ';
                })

                ->editColumn('url', function($item){
                    return '<img style="max-width:150pxW" src="'. Storage::url($item->url) .'"/>';
                })    
                ->editColumn('is_featured', function($item){
                    return $item->is_featured ? "<button  class='bg-green-500 text-white rounded-md px-2 py-1 m-2' onclick='submit_form(1,".$item->id.")'> Yes </button>" : "<button  class='bg-red-500 text-white rounded-md px-2 py-1 m-2' onclick='submit_form(2,".$item->id.")'> No </button>" ;
                })
                ->escapeColumns([])
                ->rawColumns(['action','url'])
                ->make();

        }
        
        return view('pages.dashboard.gallery.index', compact('product')); 
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        return view('pages.dashboard.gallery.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductGalleryRequest $request, Product $product)
    {
        $files = $request->file('files');

        if($request->hasFile('files'))        
        {
            foreach ($files as $file) {
                $path = $file->store('public/gallery');

                ProductGallery::create([
                    'products_id' => $product->id, 
                    'url'=>$path
                ]);
            }
        }
        return redirect()->route('dashboard.product.gallery.index', $product->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductGallery $gallery)
    {
        $gallery->delete(); 

        return redirect()->route('dashboard.product.gallery.index', $gallery->products_id);
    }

    public function is_featured(Request $request, Product $product)
    {
        $cek_featured = ProductGallery::where('is_featured', 1)->first();
        if ($cek_featured) {
            $cek = ProductGallery::where('is_featured', 1)->update([
                'is_featured' => 0
            ]);
        }

        $value_col = ($request->value == 2) ? 1 : 0;
        $update_produk = ProductGallery::where('id', $request->id)->update([
            'is_featured' => $value_col
        ]);
        
        if (!is_null($update_produk)) {
            return 1;
        } else {
            return 0;
        }
    }
}