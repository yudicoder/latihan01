@extends('shared.layout')

@section('page_title', 'Contact')

@section('content')
		<form class="form-horizontal m-20" action="" onclick="validate()">
				<div class="form-group">
					<label class="control-label col-sm-1" for="email">Email</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="email" placeholder="Email Anda"/>
						<span id="get_error_email" style="color:#d9534f;"></span>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-1" for="pwd">Messages</label>
					<div class="col-sm-10"> 
						<textarea class="form-control" rows="10" id="msg" placeholder="Messages Anda"></textarea>
						<span id="get_error_msg" style="color:#d9534f;"></span>
					</div>
				</div>
				<div class="col-sm-10 col-sm-offset-1" style="padding:5px"> 
					<input type="button" id="btn" class="btn btn-default" value="Submit" />
				</div>
			</form>
		<script>
		function validate() {
			document.getElementById("get_error_email").innerHTML = "";
			var x = document.getElementById("email").value;
			var valid1 = document.getElementById("get_error_email");
			var valid2 = document.getElementById("get_error_msg");
			if (x == "") {
				valid1.innerHTML = "*Email tidak boleh kosong";
			} else if (x != "") {
				valid1.innerHTML = "";
				var check = x.indexOf("@");
				if(check<1) {
					valid1.innerHTML = "*Gunakan tanda @ untuk alamat e-mail. Email anda tidak valid";
				} else {
					var y = document.getElementById("msg").value;
					if (y == "") {
						valid2.innerHTML = "*Messages anda kosong";
					} else if (y != "") {
						valid2.innerHTML = "";
						alert("Terima Kasih atas pesan anda");
						}
					}	
				}
			}
		</script>
@endsection


<!-- <html>
<head>
	<title>Task HTML, CSS, Javascript</title>

	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-theme.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">

	<script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
</head>
<body>
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
					<li><a href="index.html" class="white">Home <span class="sr-only">(current)</span></a></li>
					<li><a href="profile.html" class="white">Profile</a></li>
					<li class="active"><a href="contact.html" class="white">Contact</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		<!-- </div>/.container-fluid
	</nav>
	<div class="container-fluid">
		<div class="col-md-4 user-data">
			<h1>Riku Kiranatama</h1>
			<div class="user-image"></div>
		</div>
		<div class="col-md-8">
			<form class="form-horizontal m-20" action="" onclick="validate()">
				<div class="form-group">
					<label class="control-label col-sm-1" for="email">Email</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="email" placeholder="Email Anda"/>
						<span id="get_error_email" style="color:#d9534f;"></span>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-1" for="pwd">Messages</label>
					<div class="col-sm-10"> 
						<textarea class="form-control" rows="10" id="msg" placeholder="Messages Anda"></textarea>
						<span id="get_error_msg" style="color:#d9534f;"></span>
					</div>
				</div>
				<div class="col-sm-10 col-sm-offset-1" style="padding:5px"> 
					<input type="button" id="btn" class="btn btn-default" value="Submit" />
				</div>
			</form>
		</div>
	</div>
	<script>
		function validate() {
			document.getElementById("get_error_email").innerHTML = "";
			var x = document.getElementById("email").value;
			var valid1 = document.getElementById("get_error_email");
			var valid2 = document.getElementById("get_error_msg");
			if (x == "") {
				valid1.innerHTML = "*Email tidak boleh kosong";
			} else if (x != "") {
				valid1.innerHTML = "";
				var check = x.indexOf("@");
				if(check<1) {
					valid1.innerHTML = "*Gunakan tanda @ untuk alamat e-mail. Email anda tidak valid";
				} else {
					var y = document.getElementById("msg").value;
					if (y == "") {
						valid2.innerHTML = "*Messages anda kosong";
					} else if (y != "") {
						valid2.innerHTML = "";
						alert("Terima Kasih atas pesan anda");
					}
				}	
			}
		}
	</script>
</body>
</html> --> 