<!DOCTYPE html>
<html>
<head>
	<title>Iskolarship</title>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<link rel="stylesheet" type="text/css" href="css/app.css"/>
	<link rel="stylesheet" type="text/css" href="css/font-awesome/css/font-awesome.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/main.css"/>
	<link rel="stylesheet" type="text/css" href="css/index.css"/>
</head>
<body>
	<div id="app">
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<a href="home.html" class="navbar-brand">Iskolarship</a>
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
				</div>
				<div class="collapse navbar-collapse" id="app-navbar-collapse">
					<ul class="nav navbar-nav navbar-right">
						<li class="active"><a href="#login" data-toggle="tooltip" data-placement="bottom" title="Login"><span class="glyphicon glyphicon-log-in"></span>&nbsp;Login</a></li>
						<li class="dropdown">
							<a href="#" data-toggle="dropdown"><span class="glyphicon glyphicon-user register"><span class="register-icon">+</span></span>&nbsp;&nbsp;Register <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li class="dropdown-header">Register as?</li>
								<li><a href="student_register.html"><span class="glyphicon glyphicon-education"></span>&nbsp;&nbsp;Student</a></li>
								<li><a href="sponsor_register.html"><span class="glyphicon glyphicon-briefcase"></span>&nbsp;&nbsp;Sponsor</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</div>
	<div class="container main-container">
		<div class="col-sm-6 col-sm-offset-3 headline">
			<div class="text-center">
				<h1>Iskolarship</h1>
				<h3><small>Ang iyong kaagabay sa broke mong buhay.</small></h3>
			</div>
			<form action="home.html" id="login" class="overflow-a">
				<div class="input-group">
					<input type="text" name="username" placeholder="Username or Email Address" class="form-control" />
					<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
				</div>
				<div class="input-group">
					<input type="password" name="pass" placeholder="Password" class="form-control" />
					<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
				</div>
				<div class="check-box pull-left">
					<label><input type="checkbox" name="remember me"><span class="box"><span class="check"></span></span>&nbsp;<span class="label-text">Remember me</span></label>
				</div>
				<button type="submit" name="login" class="btn btn-success pull-right">Login&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-log-in"></span></button>
			</form>
			<p class="instruction">You do not have an account yet? Click the button below.</p>
			<div class="dropdown">
				<button class="register-btn btn btn-primary" data-toggle="dropdown"><span class="glyphicon glyphicon-user register"><span class="register-icon">+</span></span>&nbsp;&nbsp;Register <span class="caret"></span></button>
				<ul class="dropdown-menu">
					<li class="dropdown-header">Register as?</li>
					<li><a href="{{ url('registration/Student Form') }}"><span class="glyphicon glyphicon-education"></span>&nbsp;&nbsp;Student</a></li>
					<li><a href="sponsor_register.html"><span class="glyphicon glyphicon-briefcase"></span>&nbsp;&nbsp;Sponsor</a></li>
				</ul>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/app.js"></script>
	<script>
		$(document).ready(function(){$('[data-toggle="popover"]').popover();});
		$(document).ready(function(){$('[data-toggle="tooltip"]').tooltip();});
	</script>
</body>
</html>