<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AnswerComment;
use App\Answer;
use Auth;

class AnswersController extends Controller
{

    public function comment(Answer $answer, Request $request)
    {
        $answer_comment = new AnswerComment();
        $answer_comment->comment = $request->answer_comment;
        $answer_comment->user_id = Auth::user()->id;
        $answer->comments()->save($answer_comment);
        return '<hr><div>'. $request->answer_comment . ' <a href="user/'.$answer_comment->user->id.'">'.$answer_comment->user->name.'</a></div>';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return 'hello';
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
