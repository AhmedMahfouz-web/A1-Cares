<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::get();

        return view('admin.dashboard')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::check())
        {
            return view('admin/create');
        }

        return redirect('admin/login')->with('success', 'you are not allowed to access');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'numeric|min:1',
        ]);
        $imageName = time().'.'.$request->photo->extension();  
        $request->photo->store('/', 'public');

        $slug = strtolower(str_replace(' ', '-', $request->slug));
        $product = Product::create([
            'name' => $request->name,
            'slug' => $slug,
            'page_title' => $request->page_title,
            'description' => $request->description,
            'photo' => $request->photo->hashName(),
            'price' => $request->price,
        ]);

        if($request->file('product_image')){
            foreach ($request->product_image as $image) {
                $image->store('/', 'public');
                ProductImage::create([
                    'photo' => $image->hashName(),
                    'product_id' => $product->id
                ]);
            };
        };
        return redirect('/'.$slug); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->with('image')->get();

        return view('product')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        
        $product = Product::where('slug', $slug)->with('image')->first();

        return view('admin.edit')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $product = Product::where('slug', $slug)->with('image')->first();

        $main_photo = $product->photo;
        if($request->photo != null || $request->photo != ''){
            $request->photo->store('/', 'public');
            $main_photo = $request->photo->hashName();
        }
        
        if($request->file('product_image')){
            foreach ($request->product_image as $image) {
                $image->store('/', 'public');
                ProductImage::create([
                    'photo' => $image->hashName(),
                    'product_id' => $product->id
                ]);
            };
        };

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
