<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\str;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'category_name'=>'required'
        ]);

        $existnames = Category::select('name')->get();
        $Category=new category();
        //return $existnames;

        ////name verification
        $status = false;
        foreach($existnames as $existname){
            if($request->category_name == $existname->name){
                $status = true;
                break;
            }
        }
        if($status==true){
            return redirect()->back()->with('error','name already exists!!');
        }
        else{
            $Category->name = $request->input('category_name');
        }


        $Category->description = $request->input('description');
        $Category->slug = Str::slug($request->category_name,'-');
        $Category->save();
        return redirect('/admin/category')->with('success','Category created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $category = Category::where('slug',$slug)->get();
        return view('admin.category.show')->with('category',$category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $category = Category::where('slug',$slug)->get();
        //return $category;
        return view('admin.category.update',compact('category'));
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
        $this->validate($request,[
            'category_name'=>'required'
        ]);
        $category = Category::where('slug',$slug)->first();
        
        $existnames = Category::select('name')->get();
        foreach($existnames as $existname=>$val){
            if($category->name==$val->name){
                unset($existnames[$existname]);
            }
        }
        //return $existnames;

        $status = false;
        foreach($existnames as $existname){
            if($request->category_name == $existname->name){
                $status = true;
                break;
            }
        }
        if($status==true){
            return redirect()->back()->with('error','name already exists!!');
        }
        else{
            $category->name = $request->input('category_name');
        }


        $category->description = $request->input('description');
        $category->slug = Str::slug($request->category_name,'-');
        $category->save();
        return redirect('/admin/category')->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $category->delete();
        return redirect('/admin/category')->with('success', 'Category deleted successfully.');
    }
}
