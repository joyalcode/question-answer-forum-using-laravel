@extends('layout')
@section('contents')
<div class="container">
   <div class="col-md-8">
      <ul class="list-group">
         <li class="list-group-item"><h4>Latest Questions</h4></li>
         @foreach($questions as $question_array)
         <li class="list-group-item">
            <div class="row">
               <div class="col-md-12 questions-list">
                  <div><a href="">{{$question_array->user->name}}</a> <i>on April 25, 2015</i></div>
                  <a class="questions-list-item" href="{{url('questions/'.$question_array->id)}}">
                     <div>
                     {{$question_array->title}}
                     </div>
                  </a>
                  <a href="" class="btn btn-primary btn-xs pull-right" style="margin-top: 10px;">{{$question_array->answers->count()}} Answers</a>
                  <div style="margin-top: 10px;">
                     @foreach($question_array->tags as $tag_array)
                     <a href="" class="btn btn-info btn-xs">{{$tag_array->tag}}</a>
                     @endForeach
                  </div>
               </div>
            </div>
         </li>
         @endForeach
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