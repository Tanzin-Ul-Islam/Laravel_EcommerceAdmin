<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        //return $products;
        return view('admin.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create',compact('categories'));
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
            'product_name'=>'required',
            'product_category'=>'required',
            'pimage'=>'image|nullable|max:1999',
            'price'=>'required',
            'stock'=>'required',
            'description'=>'required'
        ]);

        $existnames = Product::select('name')->get();
        $product=new Product();
        //return $existnames;

        //name verification
        $status = false;
        foreach($existnames as $existname){
            if($request->product_name == $existname->name){
                $status = true;
                break;
            }
        }
        if($status==true){
            return redirect()->back()->with('error','name already exists!!');
        }
        else{
            $product->name=$request->input('product_name');
        }

        $product->slug=Str::slug($request->product_name,'-');
        $product->category_id=$request->input('product_category');
        $product->price=$request->input('price');
        $product->stock_status=$request->input('stock');
        $product->description=$request->input('description');

        //image handel

        if($request->hasfile('pimage'))
        {

            $file = $request->file('pimage');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('product_images/',$filename);

        }
        else{

            $filename='noimage';
        }
        $product->image=$filename;
        $product->save();
        return redirect('/admin/product')->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::where('slug',$slug)->first();
        //return $product;
        return view('admin.products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $categories = Category::all();
        $product=Product::where('slug',$slug)->first();
        return view('admin.products.update',compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $this->validate($request, [
            'product_name'=>'required',
            'product_category'=>'required',
            'pimage'=>'image|nullable|max:1999',
            'price'=>'required',
            'stock'=>'required',
            'description'=>'required'
        ]);


        $product=Product::where('slug',$slug)->first();

        //name verification
        $existnames = Product::select('name')->get();
    
        foreach($existnames as $existname=>$val){
            if($product->name==$val->name){
                unset($existnames[$existname]);
            }
        }

        $status = false;
        foreach($existnames as $existname){
            if($request->product_name == $existname->name){
                $status = true;
                break;
            }
        }
        if($status==true){
            return redirect()->back()->with('error','name already exists!!');
        }
        else{
            $product->name=$request->input('product_name');
        }

        $product->slug=Str::slug($request->product_name,'-');
        $product->category_id=$request->input('product_category');
        $product->price=$request->input('price');
        $product->stock_status=$request->input('stock');
        $product->description=$request->input('description');

        //image handel

        if($request->hasfile('pimage'))
        {

            $file = $request->file('pimage');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('product_images/',$filename);

        }
        else{

            $filename=$product->image;
        }
        $product->image=$filename;
        $product->save();
        return redirect('/admin/product')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $product=Product::where('slug',$slug)->first();
        $product->delete();
        return redirect('/admin/product')->with('success', 'Product deleted successfully.');
    }
}
