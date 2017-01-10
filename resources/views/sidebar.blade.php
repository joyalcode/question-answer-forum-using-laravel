<div class="well">
         <h4>Tags</h4>
         <div class="row">
            <div class="col-lg-12">
               @foreach($tags as $tag_array)
               <a href="{{url('questions/tagged/'.$tag_array->id.'/'.strtolower($tag_array->tag))}}" class="btn btn-default btn-xs">{{$tag_array->tag}}</a>
               @endForeach
            </div>
         </div>
      </div>
      <div class="well">
         <div class="row">
            <div class="col-lg-12 sidebar">
            </div>
         </div>
      </div>