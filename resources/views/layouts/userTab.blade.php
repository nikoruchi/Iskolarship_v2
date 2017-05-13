<!DOCTYPE html>
<html>
<head>
	<title>Iskolarship</title>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<link rel="stylesheet" type="text/css" href="css/app.css"/>
	<link rel="stylesheet" type="text/css" href="css/font-awesome/css/font-awesome.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/main.css"/>
	<!-- <link rel="stylesheet" type="text/css" href="css/scholarship_page.css"/> -->
	@stack('styles')
</head>
<body class="container-white">
	<div id="app">
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<a href="/" class="navbar-brand">Iskolarship</a>
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
				</div>
				<div class="collapse navbar-collapse" id="app-navbar-collapse">
					<ul class="nav navbar-nav">
						<li><a href="{{ url('/home') }}"><span class="glyphicon glyphicon-home"></span> Home</a></li>
						@if(Auth::check())
						<li><a href="#"><span class="glyphicon glyphicon-envelope"></span> Messages</a></li>
						<li><a href="#"><span class="glyphicon glyphicon-bell"></span> Notifications</a></li>
						@endif
						@if(Auth::check() && Auth::user()->hasRole('student'))
						<li><a href="{{url('/profile scholar')}}"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
						@elseif(Auth::check() && Auth::user()->hasRole('sponsor'))
						<li><a href="{{ url('/profile scholarship') }}"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
						@endif
					</ul>
					<ul class="nav navbar-nav navbar-right">
						
						<li class="dropdown">
						<!-- dpat name hehe to check lng danay -->
						@if(Auth::user()->hasRole('student'))
							<a href="#" class="" ="dropdown-toggle" data-toggle="dropdown">{{ $student->student_fname }} {{ $student->student_lname}} <span class="caret"></span></a>
						@elseif(Auth::user()->hasRole('sponsor'))
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->$sponsor->sponsor_fname }} {{$sponsor->sponsor_lname}} <span class="caret"></span></a>
						@endif
							<ul class="dropdown-menu">
								<li><a href="profile.html"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
								<li><a href="#"><span class="glyphicon glyphicon-cog"></span> Account Settings</a></li>
								@if(Auth::check())
									<li><a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span class="glyphicon glyphicon-off"></span>&nbsp;Logout</a></li>
									 <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
			                           		{{ csrf_field() }}
			                         </form>
		                         @endif
							</ul>
						</li>
					</ul>
					<form class="navbar-nav navbar-form">
						<div class="input-group">
							<input type="text-box" class="form-control" name="search" placeholder="Search..." />
						
							<span class="input-group-btn">
								<button type="submit" class="btn btn-default input-btn"><span class="glyphicon glyphicon-search"></span></button>
							</span>
						</div>
					</form>
				</div>
			</div>
		</nav>
	</div>
	@yield('content')

	@stack('scripts')
</body>
</html>