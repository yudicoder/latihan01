<nav class="navbar navbar-inverse bg">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
                <a class="navbar-brand white" href="#">My Website</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                        
                    <li class="active"><a href="{{ route('awal') }}" class="bg-blueblack">Home 
                    <span class="sr-only">(current)</span></a></li>
                    {{-- <li><a href="{{ url('article') }}" class="white">Articles</a></li> --}}
                    <li><a href="{{ url('profile') }}" class="white">Profile</a></li>
                    <li><a href="{{ route('contact') }}" class="white">Contact</a></li>
                    {{-- <li><a href="{{ url('image') }}" class="white">Images Home</a></li> --}}
                                        
                    @if(Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @elseif(Auth::user()->hasRole('manager'))
                        {{-- <li><a href="{{url('/get-users')}}">User</a></li> --}}
                        <li><a href="{{ url('article') }}" class="white">Articles</a></li>
                        <li><a href="{{ url('image') }}" class="white">Images Home</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                            aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{url('/get-users')}}">User Manager</a>
                                    <a href="{{url('/status')}}">Article Manager</a>
                                    <a href="{{ url('/logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">Logout</a>
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display:none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @elseif(Auth::user()->hasRole('employee'))
                        <li><a href="{{ url('article') }}" class="white">Articles</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url('/logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">Logout</a>
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    
                    {{--  @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ url('/logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>  --}}
                    @endif
                    {{--  route = url  --}}
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
        <!--/.container-fluid -->
    </nav>