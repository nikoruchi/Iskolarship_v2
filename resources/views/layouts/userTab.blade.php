<!DOCTYPE html>
<html>
<head>
	<title>Iskolarship</title>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css')}}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome/css/font-awesome.min.css')}}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css')}}"/>

	<script type="text/javascript" src="/js/js.js"></script>
    <script type="text/javascript" src="/js/script-messages.js"></script>
    <script type="text/javascript" src="/js/reopen_script.js"></script>
    <script type="text/javascript" src="/js/script-form.js"></script>
    <script type="text/javascript" src="/js/notif_script.js"></script>
 	<!-- <script type="text/javascript" src="/js/script.js"></script> -->
    <meta name="csrf_token" content = "{{ csrf_token() }}">

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
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ $sponsor->sponsor_fname }} {{$sponsor->sponsor_lname}} <span class="caret"></span></a>
						@endif
							<ul class="dropdown-menu">
							@if(Auth::user()->hasRole('sponsor'))
								<li><a href="{{ url('/profile sponsor') }}"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
							@elseif(Auth::user()->hasRole('student'))
								<li><a href="{{ url('/profile scholar')}}"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
							@endif
							@if(Auth::check())
							<li><a href="{{ url('/messages') }}"><span class="glyphicon glyphicon-envelope"></span> Messages</a></li>
							<li><a href="{{ url('/notifications') }}"><span class="glyphicon glyphicon-bell"></span> Notifications</a></li>
							@endif
							@if(Auth::user()->hasRole('sponsor'))
							<li><a href="/Sponsor/Account Settings"><span class="glyphicon glyphicon-cog"></span> Account Settings</a></li>
							@elseif(Auth::user()->hasRole('student'))
							<li><a href="/Scholar/Account Settings"><span class="glyphicon glyphicon-cog"></span> Account Settings</a></li>
							@endif
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