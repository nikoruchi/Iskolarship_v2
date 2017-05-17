<!DOCTYPE html>
<html>
<head>
	<title>Iskolarship</title>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<link rel="stylesheet" type="text/css" href="css/app.css"/>
	<link rel="stylesheet" type="text/css" href="css/font-awesome/css/font-awesome.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/main.css"/>

	<script type="text/javascript" src="/js/js.js"></script>
    <script type="text/javascript" src="/js/script-messages.js"></script>

    <!-- <meta name="csrf_token" content = "{{ csrf_token() }}"> -->

	<!-- <link rel="stylesheet" type="text/css" href="css/scholarship_page.css"/> -->
	@stack('styles')
</head>
<body class="container-white">
	<div id="app">
		<nav class="navbar navbar-default customized navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<a href="{{ url('/home') }}" class="navbar-brand">Iskolarship</a>
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
				</div>
				<div class="collapse navbar-collapse" id="app-navbar-collapse">
<<<<<<< HEAD
					<ul class="nav navbar-nav">
						<li><a href="{{ url('/home') }}"><span class="glyphicon glyphicon-home"></span> Home</a></li>
						@if(Auth::check())
						<li><a href="{{ url('/messages') }}"><span class="glyphicon glyphicon-envelope"></span> Messages</a></li>
						<li><a href="#"><span class="glyphicon glyphicon-bell"></span> Notifications</a></li>
						@endif
						@if(Auth::check() && Auth::user()->hasRole('student'))
						<li><a href="{{url('/profile scholar')}}"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
						@elseif(Auth::check() && Auth::user()->hasRole('sponsor'))
						<li><a href="{{ url('/profile scholarship') }}"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
						@endif
					</ul>
=======
>>>>>>> 2ecd27ec34e48675b80fa2bce5b20df7c3fd51f5
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
						@if(Auth::user()->hasRole('student'))
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ $student->student_fname }} {{ $student->student_lname}} <span class="caret"></span></a>
						@elseif(Auth::user()->hasRole('sponsor'))
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->$sponsor->sponsor_fname }} {{$sponsor->sponsor_lname}} <span class="caret"></span></a>
						@endif
							<ul class="dropdown-menu">
<<<<<<< HEAD
								<li><a href="{{ url('/profile scholar') }}"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
=======
								<li><a href="profile.html"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
								@if(Auth::check())
								<li><a href="#"><span class="glyphicon glyphicon-envelope"></span> Messages</a></li>
								<li><a href="#"><span class="glyphicon glyphicon-bell"></span> Notifications</a></li>
								@endif
>>>>>>> 2ecd27ec34e48675b80fa2bce5b20df7c3fd51f5
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
					<!-- <form class="navbar-nav navbar-form">
						<div class="input-group">
							<input type="text-box" class="form-control" name="search" placeholder="Search..." />
						
							<span class="input-group-btn">
								<button type="submit" class="btn btn-default input-btn"><span class="glyphicon glyphicon-search"></span></button>
							</span>
						</div>
					</form> -->
				</div>
			</div>
		</nav>
	</div>
	@yield('content')

	@stack('scripts')
<<<<<<< HEAD
	<script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/app.js"></script>
    <script>
        $(document).ready(function(){$('[data-toggle="popover"]').popover();});
        $(document).ready(function(){$('[data-toggle="tooltip"]').tooltip();});
    </script>
=======
	
	<script type="text/javascript" src="/js/jquery.min.js"></script>
	<script type="text/javascript" src="/js/app.js"></script>
	<script>
		$(document).ready(function(){$('[data-toggle="popover"]').popover();});
		$(document).ready(function(){$('[data-toggle="tooltip"]').tooltip();});
	</script>

>>>>>>> 2ecd27ec34e48675b80fa2bce5b20df7c3fd51f5
</body>
</html>