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
        //  dd($quest);
        $question = new Question();
        $question->question = $quest['question'];
        $question->sub_cat_id = 1;
        $question->cat_id = 1;
        $question->save();
        $question->option()->create([
            'option_1' =>  $quest['option_1'],
            'option_2' =>  $quest['option_2'],
            'option_3' =>  $quest['option_3'],
            'option_4' =>  $quest['option_4']
        ]);
        $question->answer()->create([
            'answer' =>  $quest['answer'],
            'explanation' =>  $quest['explanation']
        ]);
        // foreach($quest['category'] as $qcat):
        //     $question->category()->create([
        //         'category_id' => $qcat
        //     ]);
        // endforeach;
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
