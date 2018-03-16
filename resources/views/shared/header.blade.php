<nav class="navbar navbar-inverse bg">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
                <a class="navbar-brand white" href="#">Training Bootstrap</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="{{ route('home') }}" class="bg-blueblack">Home 
                    <span class="sr-only">(current)</span></a></li>
                    <li><a href="{{ url('article') }}" class="white">Articles</a></li>
                    <li><a href="{{ url('profile') }}" class="white">Profile</a></li>
                    <li><a href="{{ route('contact') }}" class="white">Contact</a></li> //route = url
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
        <!--/.container-fluid -->
    </nav>