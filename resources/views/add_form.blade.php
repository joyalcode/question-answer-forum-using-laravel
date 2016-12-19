@extends('layout')
@section('contents')
<div class="container">   
   <div class="col-md-8">
      <h3>Ask Question</h3>

      <form>
        <div class="form-group">
          <label for="question-title">Question title</label>
          <input type="text" class="form-control" id="question-title">
        </div>
        <div class="form-group">
          <label for="pwd">Question details</label>
          <textarea class="form-control" rows="8"></textarea>
        </div>
        <div class="form-group">
          <label for="question-title">Tags</label>
          <input type="text" class="form-control" id="question-title">
        </div>        
        <button type="submit" class="btn btn-primary pull-right">Submit</button>
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