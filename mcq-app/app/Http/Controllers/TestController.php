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
    public function category($catgory)
    {
        $categories= Category::all();
        $questions= Question::all();

        return view('user.pages.test.category_test',compact(['categories','questions']));  
    }
}
