<?php

namespace App\Http\Controllers;

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
        return view('admin.pages.question.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories= Category::all();
        // $sub_categories= SubCategory::get();

        // $categories = Category::find(1);

        // dd($categories->subcategory()->get());

        return view('admin.pages.question.add')->with('categories',$categories);
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
        //  dd($quest);
        $question = new Question();
        $option = new Option();
        $answer = new Answer();
        // dd($option);
        $question->question = $quest['question'];
        // $question->option_id = $option->id;
        // $question->answer_id = $answer->id;
        $question->option->option_1= $quest['option_1'];
        dd($question);
        $option->option_1 = $quest['option_1'];
        $option->option_2 = $quest['option_2'];
        $option->option_3 = $quest['option_3'];
        $option->option_4 = $quest['option_4'];
        $answer->answer = $quest['answer'];
        $answer->explanation = $quest['explanation'];

        $answer->save();
        $option->save();
       
        $question->option_id = $option->id;
        $question->answer_id = $answer->id;
        $question->save();
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
        //
    }
}
