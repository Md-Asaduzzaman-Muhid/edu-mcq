<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Question;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function userHome()
    {
        $categories= DB::table("categories")->count();
        $total_user = DB::table("users")->count();
        $questions = DB::table("questions")->count();
        //  dd($questions[0]->answer);
        return view('user.home',compact(['categories','questions','total_user']));
    }
}
