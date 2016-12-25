<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Question;
use App\Answer;
use App\QuestionComment;
use Auth;
use Session;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::orderBy('id','desc')->get();
        return view('questions',compact('questions'));
    }

    public function user($user_id)
    {
        $questions = Question::orderBy('id','desc')->where('user_id',$user_id)->get();
        return view('questions',compact('questions'));
    }


    public function tagged($id, $tag)
    {
        $questions = Question::orderBy('id','desc')->whereHas('tags', function($q) use ($id) {
                                                        $q->where('tag_id', $id);
                                                    })->get();

        return view('questions',compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $tags = Tag::orderBy('tag','asc')->get();;
        return view('add_form',compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,$this->validationRules());
        $question = new Question;
        $question->title = $request->title;
        $question->user_id = Auth::user()->id;
        $question->question = $request->question;
        $question->save();
        $question->tags()->attach($request->tags);
        Session::flash('message', 'New Question has been added successfully.');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        return view('answers',compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function comment(Question $question, Request $request)
    {
        $question_comment = new QuestionComment();
        $question_comment->comment = $request->question_comment;
        $question_comment->user_id = Auth::user()->id;        
        $question->comments()->save($question_comment);
        return '<hr><div>'. $request->question_comment . ' <a href="user/'.$question_comment->user->id.'">'.$question_comment->user->name.'</a></div>';
    }

    public function answer(Question $question, Request $request)
    {
        $answer = new Answer();
        $answer->answer = $request->answer;
        $answer->user_id = Auth::user()->id;
        $question->answers()->save($answer);
        Session::flash('message', 'New answer has been added successfully.');
        return back();
    }


    public function validationRules()
    {
        return [
            'title' => 'required|max:255',
            'question' => 'required',
        ];
    }
}
