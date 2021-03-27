<?php

namespace App\Http\Controllers;

use DB;
use Validator;
use App\Models\Question;
use App\Models\Category;
use App\Models\Option;
use App\Models\Answer;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Stevebauman\Purify\Facades\Purify;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories= Category::all();
        $sub_categories= SubCategory::all();
        return view('admin.pages.question.list',compact(['categories','sub_categories']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories= Category::all();
        $sub_categories= SubCategory::all();
        return view('admin.pages.question.add', compact(['categories', 'sub_categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $quest = Purify::clean($request->all());
        // dd($quest);

        $validator = Validator::make($request->all(), [
            'question' => 'required|max:500',
            'option_1' => 'required|max:200',
            'option_2' => 'required|max:200',
            'option_3' => 'required|max:200',
            'option_4' => 'required|max:200',
            'explanation' => 'required|max:500',
        ]);
        if ($validator->fails()):
            return back()->withErrors($validator->errors())->withInput();
        endif;

        $question = new Question();
        $question->question = $quest['question'];
        $question->save();
        if(!empty($quest['category'])):
            foreach($quest['category'] as $cat):
                $i= 0;
                DB::table('category_question')->insert(
                    ['category_id' => $cat[$i],
                    'question_id' => $question->id,
                    "created_at" =>  date('Y-m-d H:i:s'),
                    "updated_at" => date('Y-m-d H:i:s'),]
                );
                $i++;
            endforeach;
        else:
            DB::table('category_question')->insert(
                ['category_id' => 1,
                'question_id' => $question->id,
                "created_at" =>  date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),]
            );
        endif;
        if(!empty($quest['sub_category'])):
            foreach($quest['sub_category'] as $sub_cat):
                $i= 0;
                DB::table('question_sub_category')->insert(
                    ['sub_category_id' => $sub_cat[$i],
                    'question_id' => $question->id,
                    "created_at" =>  date('Y-m-d H:i:s'),
                    "updated_at" => date('Y-m-d H:i:s'),]
                );
                $i++;
            endforeach;
        else:
            DB::table('question_sub_category')->insert(
                ['sub_category_id' => 1,
                'question_id' => $question->id,
                "created_at" =>  date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),]
            );
        endif;
        $question->option()->create([
            'option_1' =>  $quest['option_1'],
            'option_2' =>  $quest['option_2'],
            'option_3' =>  $quest['option_3'],
            'option_4' =>  $quest['option_4']
        ]);
        $question->answer()->create([
          
            'answer' =>  $quest['answer'] ?? 0,
            'explanation' =>  $quest['explanation']
        ]);
        return back()->with('success', 'Successfully Added Category');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        Question::destroy($question->id);
        return back()->with('success', 'Successfully Added Category');
    }

    public function questionBankHome()
    {
        $categories= Category::all();
        $questions= Question::all();
        return view('user.pages.question_bank.home',compact(['categories','questions']));  
    }
    public function questionBankCategory($slug)
    {
        $category = Category::where('slug', '=', $slug)->first();
        $questions = $category->question()->paginate(25);
        $rank = $questions->firstItem();
        return view('user.pages.question_bank.category_question',compact(['category','questions','rank']));  
    }
}
