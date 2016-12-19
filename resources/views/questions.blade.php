@extends('layout')

@section('contents')
<div class="container">   
   <div class="col-md-8">
      <ul class="list-group">
         <li class="list-group-item"><h4>Latest Questions</h4></li>
         <?php for($i=0;$i<6;$i++) {?>
         <li class="list-group-item">
            <div class="row">
               <div class="col-md-12 questions-list">
                  <div><a href="">Thomas Abraham</a> <i>on April 25, 2015</i></div>
                  <a class="questions-list-item" href="">Updated ZF2 - Deprecated: ServiceManagerAwareInterface is deprecated and will be removed in th s version 3.0, along with the ServiceManagerAwareInitializer</a>
                  <a href="" class="btn btn-primary btn-xs pull-right">2 Answers</a>
                  <div style="margin-top: 10px;">
                     <a href="" class="btn btn-default btn-xs">HTML</a>
                     <a href="" class="btn btn-default btn-xs">CSS</a>
                     <a href="" class="btn btn-default btn-xs">Javascript</a>
                     <a href="" class="btn btn-default btn-xs">jQuery</a>
                  </div>
               </div>
            </div>
         </li>
         <?php }?>
         <li class="list-group-item">
            <div class="row">
               <div class="col-md-12 questions-list">
                  <div><a href="">Thomas Abraham</a> <i>on April 25, 2015</i></div>
                  <a class="questions-list-item" href="">Updated ZF2pdated ZF2 - Deprecated: ?</a>
                  <a href="" class="btn btn-primary btn-xs pull-right">2 Answers</a>
                  <div style="margin-top: 10px;">
                     <a href="" class="btn btn-default btn-xs">HTML</a>
                     <a href="" class="btn btn-default btn-xs">CSS</a>
                     <a href="" class="btn btn-default btn-xs">Javascript</a>
                     <a href="" class="btn btn-default btn-xs">jQuery</a>
                  </div>
               </div>
            </div>
         </li>
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