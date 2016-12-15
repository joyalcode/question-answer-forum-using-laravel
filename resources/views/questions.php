<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>Laravel</title>
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <style type="text/css">
         .col-md-10 a{
               text-decoration: none;
         }

         .col-md-8{
            padding-left: 0px;
            padding-right: 0px;
         }

         .col-md-4{
            padding-right: 4px;
         }

         .questions-list > .questions-list-item{
            color: #333;
            font-size: 16px;
         }

         .questions-list > .questions-list-item:hover{
            text-decoration: none;
            color: #999;
         }

      </style>
   </head>
   <body>
      <nav class="navbar navbar-default navbar-static-top">
         <div class="container">
            <div class="navbar-header">
               <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               </button>
               <a class="navbar-brand" href=".">Laravel Question Answer Forum</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
               <ul class="nav navbar-nav">
                  <li class="active"><a href="#">Questions</a></li>
                  <li><a href="#">Ask Question</a></li>
               </ul>
               <ul class="nav navbar-nav navbar-right">
                  <li><a href="">Login</a></li>
                  <li><a href="">Register</a></li>
               </ul>
               </div><!--/.nav-collapse -->
            </div>
         </nav>
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
                        <a href="{{url('blog/category/'.$category_array->id)}}" class="btn btn-default btn-xs">PHP</a>
                        <a href="{{url('blog/category/'.$category_array->id)}}" class="btn btn-default btn-xs">Java</a>
                        <a href="{{url('blog/category/'.$category_array->id)}}" class="btn btn-default btn-xs">HTML</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
         <script src="js/bootstrap.min.js"></script>
      </body>
   </html>