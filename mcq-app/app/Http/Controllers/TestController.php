<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Question;
use Carbon\Carbon;
use \Cache;
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
        $result= $request->all();
        // $user_id = Auth::user()->id;
        $category = Category::where('id', '=', $result['category'])->first();
        $questions = $category->question()->get();
        // dd($result);
        $question_answered = $request->get('question');
        // dd($question_answered);
        $point =0;
        $answer[] = array(
            "question" => "",
            "option1" => "",
            "option2"   => "",
            "option3"  => "",
            "option4"  => "",
            "correct"  => "",
            "selected"  => "",
        );
        $i =0;
        if(isset($question_answered)&& !empty($question_answered)):
            foreach($question_answered as $qid=>$oneLeadOptions):
                foreach($oneLeadOptions as $opt):
                    foreach($questions as $dbquestion):
                        if($dbquestion->id == $qid):
                            if($dbquestion->answer->answer == $opt):
                                $point++;
                            endif;
                            $answer[$i]['question'] = $dbquestion->question;
                            $answer[$i]['option1'] = $dbquestion->option->option_1;
                            $answer[$i]['option2'] = $dbquestion->option->option_2;
                            $answer[$i]['option3'] = $dbquestion->option->option_3;
                            $answer[$i]['option4'] = $dbquestion->option->option_4;
                            $answer[$i]['correct'] = $dbquestion->answer->answer;
                            $answer[$i]['selected'] = $opt;
                            $i++;
                        endif;
                    endforeach; 
                endforeach;
                
            endforeach;
            DB::table('user_test_result')->insert(
                ['user_id' => Auth::user()->id ?? 0,
                'category_id' => $result['category'],
                'sub_category_id' => 0,
                'result' => $point,
                "created_at" =>  date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),]
            );
        else:
            return redirect()->back()->with('error', 'Please answer question and submit');  
        endif;
        Cache::put('answer', $answer); 
        return redirect()->route('test.answer');
        // return redirect()->route('test.result');
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
    public function testAnswer(){
        $answers = Cache::get('answer');
        $rank = 0;
        // $answers = (object) $ans;

        // dd($answers);
        return view('user.pages.test.answer',compact(['answers','rank']));  
       
    }
    public function testResult(){
        $user_id = Auth::user()->id;
        $test_result = DB::table('user_test_result')->where('user_id', $user_id)->orderBy('id', 'DESC')->get();
        return view('user.pages.test.result',compact(['test_result']));  
    }
  
}
