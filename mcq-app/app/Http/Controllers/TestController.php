<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Question;
use Carbon\Carbon;
use Auth;
use DB;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
        // dd(Carbon::now()->toTimeString());
        $category = Category::where('slug', '=', $slug)->first();
     
        // $question = $category->question()->limit(10)->get()->shuffle();
        // dd($question);
        $questions = $category->question()->limit(10)->get()->shuffle();
        $rank = 1;
        return view('user.pages.test.category_test',compact(['category','questions','rank']));  
    }
    public function testTake(Request $request){
        $user_id = Auth::user()->id;
        dd($request);
        // if (!Schema::hasTable('user_test_'.$user_id.'')) :
        //     Schema::create('user_test_'.$user_id.'', function (Blueprint $table) {
        //         $table->increments('id');
        //         $table->bigInteger('question_id');
        //         $table->integer('selected_answer');
        //         $table->integer('is_right');
        //         $table->timestamps();
        //     });
        // else:
        //     DB::table('user_test_'.$user_id.'')->truncate();
        // endif;
        // Schema::dropIfExists('user_test_'.$user_id.'');
    }
}
