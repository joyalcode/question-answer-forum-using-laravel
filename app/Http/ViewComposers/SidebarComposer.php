<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Tag;

class SidebarComposer
{
   /**
   * Bind data to the view.
   *
   * @param  View  $view
   * @return void
   */

   public function compose(View $view)
   {
    	$tags = Tag::orderBy('tag')->get();
   	$view->with('tags', $tags);
   }
}