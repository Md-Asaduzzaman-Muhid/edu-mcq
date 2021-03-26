<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Question;


class TestController extends Controller
{
    public function index()
    {
        $categories= Category::all();
        $questions= Question::all();
        // dd($categories);
        return view('user.pages.test.home',compact(['categories','questions']));  
    }
    public function category($slug)
    {
        // $categories= Category::all();
        // $questions= Question::all();
        $category = Category::where('slug', '=', $slug)->first();

        $questions = $category->question()->paginate(10);
        $rank = $questions->firstItem();
        return view('user.pages.test.category_test',compact(['category','questions','rank']));  
    }
}
