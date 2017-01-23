<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Question;
use App\Answer;
use App\User;
use App\QuestionComment;
use Auth;
use Session;

class QuestionsController extends Controller
{
    public function index()
    {
        $title = "Latest Questions";
        $questions = Question::orderBy('id','desc')->get();
        return view('questions',compact('questions','title'));
    }

    public function user(User $user)
    {
        $title = "Questions by $user->name";
        $questions = Question::orderBy('id','desc')->where('user_id',$user->id)->get();
        return view('questions',compact('questions','title'));
    }


    public function tagged($id, $tag)
    {
        $title = "Tagged questions: $tag";
        $questions = Question::orderBy('id','desc')->whereHas('tags', function($q) use ($id) {
                                                        $q->where('tag_id', $id);
                                                    })->get();

        return view('questions',compact('questions','title'));
    }

    public function create()
    {
        $tags = Tag::orderBy('tag','asc')->get();;
        return view('add_form',compact('tags'));
    }

    public function store(Request $request)
    {
        $this->validate($request,$this->validationRules(), $this->customErrorMessages());
        $question = new Question;
        $question->title = $request->title;
        $question->user_id = Auth::user()->id;
        $question->question = $request->question;
        $question->save();
        $question->tags()->attach($request->tags);
        Session::flash('message', 'Your question has been posted successfully.');
        return back();
    }


    public function show(Question $question)
    {
        return view('answers',compact('question'));
    }

    public function comment(Question $question, Request $request)
    {
        $question_comment = new QuestionComment();
        $question_comment->comment = $request->question_comment;
        if($request->question_comment)
        {
            $question_comment->user_id = Auth::user()->id;        
            $question->comments()->save($question_comment);
            return '<hr><div>'. $request->question_comment . ' <a href="user/'.$question_comment->user->id.'">'.$question_comment->user->name.'</a></div>';
        }   
    }

    public function answer(Question $question, Request $request)
    {
        $answer = new Answer();
        if($request->answer)
        {
            $answer->answer = $request->answer;
            $answer->user_id = Auth::user()->id;
            $question->answers()->save($answer);
            Session::flash('message', 'New answer has been added successfully.');
        }    
        return back();
    }

    public function validationRules()
    {
        return [
            'title' => 'required|max:255',
            'question' => 'required',
            'tags' => 'required'
        ];
    }

    public function customErrorMessages()
    {
        return $messages = ['tags.required' => 'One or more tags required.'];
    }    
}
