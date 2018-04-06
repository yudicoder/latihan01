<!doctype html>

<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--  The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags  -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/favicon.ico">
    <style>
        html{position:relative;min height:100%;}
        body{margin-bottom:60px}
        body>.container{padding:60px 15px 0;}
        .container .text-muted{margin:20px 0;}
        .footer>.container{padding-right:15px; padding-left: 15px;}
        code {font-size:80%;}
    </style>
    <title>Laravel Gallery</title>
    <!-- Bootstrap Core CSS-->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">
</head>

<body>

    <!-- Fixed Navbar -->
    <nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-
                toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                    <a class="navbar-brand" href="#">Laravel Gallery</a>
            </div>
            <!-- nav-collapse -->
            <div id="navbar"class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="#">Images Home</a></li>
                    <li><a href="{{ route('awal') }}">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#contact">Contact</a></li> 
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" 
                        role="button" aria-haspopup="true" aria-expanded="false">
                        Dropdown<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another Action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li class="dropdown-header">Nav header</li>
                            <li><a href="#">Separated link</a></li>
                            <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li>
                </ul>
            </div> <!-- end nav collapse -->
        </div>
    </nav> <!-- /End fixed navbar -->

    <!-- Begin page content -->
    <div class="container">
        <div class="page-header">
            <h1>Welcome To Laravel Gallery</h1>
        </div>
        @yield('body')
    </div> <!-- /End page content -->

    <!-- Bootstrap Core JavaScript 
    ========================================= -->
    <!-- Placed at the end of document so the pages load faster -->
    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/app.js"></script>

</body>

</html>
                    