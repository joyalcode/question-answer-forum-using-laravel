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
        if($request->answer_comment)
        {
            $answer_comment->user_id = Auth::user()->id;
            $answer->comments()->save($answer_comment);
            return '<hr><div>'. $request->answer_comment . ' <a href="user/'.$answer_comment->user->id.'">'.$answer_comment->user->name.'</a></div>';
        }
    }

}
