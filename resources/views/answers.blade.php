@extends('layout')
@section('contents')
<div class="container">
   <div class="col-md-8">
      <h3 class="question">{{$question->title}}</h3>
      <div class="question-description">{{$question->question}}</div>
      <span class="well well-sm author">
         Asked by
         <a href="{{url('questions/user/'.$question->user->id)}}">{{$question->user->name}}</a>
         <div>on {{date('M  d, Y \a\t H:i',strtotime($question->created_at))}}</div>
      </span>
      <div>
         <br>
         @foreach($question->tags as $tag_array)
         <a href="{{url('questions/tagged/'.$tag_array->id.'/'.strtolower($tag_array->tag))}}" class="btn btn-info btn-xs">{{$tag_array->tag}}</a>
         @endforeach
      </div>      
      <div class="help-block comments">
         @if(!$question->comments->isEmpty())
            @foreach($question->comments as $comment_array)
            <hr>
            <div class="question-comment">{{$comment_array->comment}} <a href="{{url('questions/user/'.$comment_array->user->id)}}">{{$comment_array->user->name}}</a></div>
            @endForeach
         @else
            <div class="question-comment"></div>
         @endIf   
         <hr>
         <a href="javascript:void(0)" class="add-comment-link add-question-comment">Add a comment</a>
         <div class="form-group question-comment-form hidden" style="min-height: 65px;">
            <form method="post" id="form-question_comment">
               {{csrf_field()}}
               <input type="hidden" id="question_id" value="{{$question->id}}">
               <textarea name="question_comment" rows="1" class="form-control" id="question_comment"></textarea>
               <button id="btn_add_comment" type="submit" class="btn btn-primary btn-xs margin-top-8">Add Comment</button>
               <span class="question-comment-ajax-loader hidden" style="margin-top: 8px;float:left;"><img src="{{url('images/loader.gif')}}"></span>
            </form>
         </div>
      </div>
      <h4>{{$question->answers->count()}} @if($question->answers->count() == 1) Answer @else Answers @endIf </h4>
      <hr class="division">
      @foreach($question->answers as $answer_array)
      <div class="answer">{{$answer_array->answer}}</div>
      <span class="well well-sm author">
         Ansered by
         <a href="{{url('questions/user/'.$answer_array->user->id)}}">{{$answer_array->user->name}}</a>
         <div>on {{date('M  d, Y \a\t H:i',strtotime($answer_array->created_at))}}</div>
      </span>   
      <div class="help-block comments answer-comments">

       @if(count(($answer_array->comments)))
         @foreach($answer_array->comments as $comments_array)
         <hr>
         <div class="answer-comment-{{$answer_array->id}}">{{$comments_array->comment}} <a href="{{url('questions/user/'.$comments_array->user->id)}}">{{$comments_array->user->name}}</a>  </div>
         @endforeach
       @else  
         <div class="answer-comment-{{$answer_array->id}}"></div>
       @endIf  

         <hr>
         <a href="javascript:void(0)" id="{{$answer_array->id}}" class="add-comment-link add-answer-comment">Add a comment</a>
         <div class="form-group hidden" id="answer-comment-form-{{$answer_array->id}}">
            <form method="post" id="answer_comment" class="answer-comment-form">
               {{csrf_field()}}
               <input type="hidden" id="answer_id" value="{{$answer_array->id}}">
               <textarea name="answer_comment" rows="1" class="form-control" id="answer-comment-{{$answer_array->id}}"></textarea>
               <button type="submit" class="btn btn-primary btn-xs margin-top-8 btn-answer-comment-{{$answer_array->id}}">Add Comment</button>
               <span class="answer-comment-ajax-loader-{{$answer_array->id}} hidden" style="margin-top: 8px;float:left;"><img src="{{url('images/loader.gif')}}"></span>
            </form>
         </div>
      </div>
      <hr>
      @endForeach
      <div>
         <form method="post" method="post" action="answer/{{$question->id}}">
            {{csrf_field()}}
            <h4>Your Answer</h4>
            <div class="form-group">
               <textarea class="form-control" name="answer" rows="5"></textarea>
            </div>
            <button class="btn btn-primary pull-right">Post Answer</button>
         </form>
      </div>
   </div>
   <div class="col-md-4">
      <div class="well">
         <h4>Tags</h4>
         <div class="row">
            <div class="col-lg-12">
               
            </div>
         </div>
      </div>
   </div>
</div>
@endSection