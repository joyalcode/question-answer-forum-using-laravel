@extends('layout')
@section('contents')
<div class="container">
   @if(Session::has('message'))
      <p class="alert alert-success">{{ Session::get('message') }}</p>
   @endif   
   <div class="col-md-8">
      <ul class="list-group">
         <li class="list-group-item"><h4>Latest Questions</h4></li>
         @if(!$questions->isEmpty())
            @foreach($questions as $question_array)
            <li class="list-group-item">
               <div class="row">
                  <div class="col-md-12 questions-list">
                     <div><a href="{{url('questions/user/'.$question_array->user->id)}}">{{$question_array->user->name}}</a> <i>on April 25, 2015</i></div>
                     <a class="questions-list-item" href="{{url('questions/'.$question_array->id)}}">
                        <div>
                        {{$question_array->title}}
                        </div>
                     </a>
                     <a href="{{url('questions/'.$question_array->id)}}" class="btn btn-primary btn-xs pull-right" style="margin-top: 10px;">{{$question_array->answers->count()}}
                        @if($question_array->answers->count() == 1) Answer @else Answers @endIf 
                           </a>
                     <div style="margin-top: 10px;">
                        @foreach($question_array->tags as $tag_array)
                        <a href="{{url('questions/tagged/'.$tag_array->id.'/'.strtolower($tag_array->tag))}}" class="btn btn-info btn-xs">{{$tag_array->tag}}</a>
                        @endForeach
                     </div>
                  </div>
               </div>
            </li>
            @endForeach
         @else
         <li class="list-group-item">
            <i>No questions found.</i>
         </li>   
         @endIF
      </ul>
   </div>
   <div class="col-md-4">
      <div class="well">
         <h4>Tags</h4>
         <div class="row">
            <div class="col-lg-12">
               <a href="" class="btn btn-default btn-xs">PHP</a>
               <a href="" class="btn btn-default btn-xs">Java</a>
               <a href="" class="btn btn-default btn-xs">HTML</a>
            </div>
         </div>
      </div>
      <div class="well">
         <div class="row">
            <div class="col-lg-12" style="height: 550px;">
            </div>
         </div>
      </div>
   </div>
</div>
@endSection