@extends('layout')
@section('contents')
<div class="container">
   <div class="col-md-8">
      @if (count($errors) > 0)
      <div class="alert alert-danger errors-list">
         <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
         </ul>
      </div>
      @endif
      @if(Session::has('message'))
       <p class="alert alert-success">{{ Session::get('message') }}</p>
      @endif
      <form method="POST" action="{{url('questions')}}">
         {{csrf_field()}}
         <ul class="list-group">
            <li class="list-group-item">
               <h3>Ask Question</h3>
               <div class="form-group">
                  <label for="question-title">Question title</label>
                  <input type="text" autofocus class="form-control" id="title" name="title">
               </div>
               <div class="form-group">
                  <label for="pwd">Question details</label>
                  <textarea class="form-control" rows="8" id="question" name="question"></textarea>
               </div>
               <div class="form-group">
                  <label for="question-title">Tags</label>
                  <select class="form-control js-example-basic-multiple" size="1" multiple name="tags[]" id="tags">
                     @foreach($tags as $tag_array)
                     <option value="{{$tag_array->id}}">{{$tag_array->tag}}</option>
                     @endForeach
                  </select>
               </div>
               <div class="row">
                  <button type="submit" class="btn btn-primary pull-right" style="margin-right: 18px;">Submit</button>
               </div>
               
            </li>
         </ul>
      </form>
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
   </div>
</div>
@endSection