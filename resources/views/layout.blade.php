<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>Laravel</title>
      <link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet">
      <link href="{{url('css/styles.css')}}" rel="stylesheet">
      <link href="{{ url('css/select2.min.css')}}" rel="stylesheet">
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
               <a class="navbar-brand" href="{{url('questions')}}">Laravel question answer forum</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
               <ul class="nav navbar-nav">
                  <li class="{{ Request::is('questions') ? 'active' : ''}}"><a href="{{url('questions')}}">Questions</a></li>
                  <li class="{{ Request::is('questions/create') ? 'active' : ''}}">
                     @if (Auth::guest())
                     <a href="{{url('login?src=questions/create')}}">Ask Question</a>
                     @else
                     <a href="{{url('questions/create')}}">Ask Question</a>
                     @endIf
                  </li>
               </ul>
               <!-- Right Side Of Navbar -->
               <ul class="nav navbar-nav navbar-right">
                  <!-- Authentication Links -->
                  @if (Auth::guest())
                  <li><a href="{{ url('/login')}}">Login</a></li>
                  <li><a href="{{ url('/register') }}">Register</a></li>
                  @else
                  <li class="dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                     </a>
                     <ul class="dropdown-menu" role="menu">
                        <li>
                           <a href="{{ url('/logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                              Logout
                           </a>
                           <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                              {{ csrf_field() }}
                           </form>
                        </li>
                     </ul>
                  </li>
                  @endif
               </ul>
               </div><!--/.nav-collapse -->
            </div>
         </nav>
         @yield('contents')
      <footer style="height: 100px;"><hr></footer>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="{{ url('/') }}/js/bootstrap.min.js"></script>
      <script src="{{ url('/') }}/js/select2.min.js"></script>
      <script src="{{ url('/') }}/js/scripts.js"></script>
      <script type="text/javascript">
      $(".js-example-basic-multiple").select2({
      placeholder: "Select one more tags"
      });
      </script>
   </body>
</html>