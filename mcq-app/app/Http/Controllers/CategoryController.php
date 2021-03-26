<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Stevebauman\Purify\Facades\Purify;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories= Category::all();
        $sub_categories= SubCategory::get();
        return view('admin.pages.category')->with('categories',$categories)->with('sub_categories',$sub_categories);
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $cat = Purify::clean($request->all());
        $category = new Category();
        $category->name = $cat['category'];
        $category->slug = str_slug($cat['category']);
        $category->save();
        return back()->with('success', 'Successfully Added Category');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        Category::destroy($category->id);
        return back()->with('success', 'Successfully Added Category');
    }
    public function storeSubCat(Request $request)
    {

        $subcat = Purify::clean($request->all());
        // dd($subcat);
        $subcategory = new SubCategory();
        $subcategory->cat_id = $subcat['cat_id'];
        $subcategory->name = $subcat['sub_category'];
        $subcategory->slug = str_slug($subcat['sub_category']);
        $subcategory->save();
        return back()->with('success', 'Successfully Added Sub Category');
    }
    public function destroySubCat($id)
    {
        SubCategory::destroy($id);
        $categories= Category::all();
        $sub_categories= SubCategory::get();
        return back()->with('success', 'Successfully Added Category');
    }

}
