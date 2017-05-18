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
<body class="container">
	<div id="app">
		<nav class="navbar navbar-default customized navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<a href="{{ url('/home') }}" class="navbar-brand"><span class="isko">Isko</span></a>
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
				</div>
				<div class="collapse navbar-collapse" id="app-navbar-collapse">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
						@if(Auth::user()->hasRole('student'))
							<a href="/profile scholar" class="dropdown-toggle" data-toggle="dropdown">{{ $student->student_fname }} {{ $student->student_lname}} <span class="caret"></span></a>
						@elseif(Auth::user()->hasRole('sponsor'))
<<<<<<< HEAD
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ $sponsor->sponsor_fname }} {{$sponsor->sponsor_lname}} <span class="caret"></span></a>
=======
							<a href="" class="dropdown-toggle" data-toggle="dropdown">{{ $sponsor->sponsor_fname }} {{$sponsor->sponsor_lname}} <span class="caret"></span></a>
>>>>>>> 4966d5f8e2b496ae8616a5e968ce876a3e724d26
						@endif
							<ul class="dropdown-menu">
							@if(Auth::user()->hasRole('sponsor'))
								<li><a href="{{ url('/profile scholarship') }}"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
							@elseif(Auth::user()->hasRole('student'))
								<li><a href="{{ url('/profile scholar')}}"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
							@endif
								@if(Auth::check())
								<li><a href="{{ url('/messages') }}"><span class="glyphicon glyphicon-envelope"></span> Messages</a></li>
								<li><a href="#"><span class="glyphicon glyphicon-bell"></span> Notifications</a></li>
								@endif
								<li><a href="/Account Settings"><span class="glyphicon glyphicon-cog"></span> Account Settings</a></li>
								@if(Auth::check())
									<li><a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span class="glyphicon glyphicon-off"></span>&nbsp;Logout</a></li>
									 <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
			                           		{{ csrf_field() }}
			                         </form>
		                         @endif
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</div>
	@yield('content')

	@stack('scripts')
	<script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/app.js"></script>
    <script>
        $(document).ready(function(){$('[data-toggle="popover"]').popover();});
        $(document).ready(function(){$('[data-toggle="tooltip"]').tooltip();});
    </script>
</body>
</html>