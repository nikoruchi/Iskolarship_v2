<!DOCTYPE html>
<html>
<head>
	<title>Iskolarship</title>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
<<<<<<< HEAD
	<link rel="stylesheet" type="text/css" href="css/app.css"/>
	<link rel="stylesheet" type="text/css" href="css/font-awesome/css/font-awesome.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/main.css"/>
	<!-- <link rel="stylesheet" type="text/css" href="css/scholarship_page.css"/> -->
	<?php echo $__env->yieldPushContent('styles'); ?>
=======
	<link rel="stylesheet" type="text/css" href="/css/app.css"/>
	<link rel="stylesheet" type="text/css" href="/css/font-awesome/css/font-awesome.min.css"/>
	<link rel="stylesheet" type="text/css" href="/css/main.css"/>
	<link rel="stylesheet" type="text/css" href="/css/home.css"/>
	<link rel="stylesheet" type="text/css" href="/css/scholar_page.css"/>
	<link rel="stylesheet" type="text/css" href="/css/scholarship_page.css"/>
>>>>>>> 9dc1e86788c62aa660e1218e084f319b012e8a76
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
<<<<<<< HEAD
						<li><a href="#"><span class="glyphicon glyphicon-home"></span> Home</a></li>
						<li><a href="#"><span class="glyphicon glyphicon-envelope"></span> Messages</a></li>
						<li><a href="#"><span class="glyphicon glyphicon-bell"></span> Notifications</a></li>
						<li><a href="#"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Clyde Joshua Delgado <span class="caret"></span></a>
=======
						<li><a href="<?php echo e(url('/home')); ?>"><span class="glyphicon glyphicon-home"></span> Home</a></li>
						<?php if(Auth::check()): ?>
						<li><a href="#"><span class="glyphicon glyphicon-envelope"></span> Messages</a></li>
						<li><a href="#"><span class="glyphicon glyphicon-bell"></span> Notifications</a></li>
						<?php endif; ?>
						<?php if(Auth::check() && Auth::user()->hasRole('student')): ?>
						<!-- should be student_id -->
						<!-- $student_id = DB::table('student_account')->where('user_id', Auth::user()->user_id)->pluck('student_id'); -->

						<li><a href="<?php echo e(url('/profile scholar/$student_id')); ?>"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
						<?php elseif(Auth::check() && Auth::user()->hasRole('sponsor')): ?>
						<li><a href="<?php echo e(url('/profile scholarship')); ?>"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
						<?php endif; ?>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<?php if(Auth::check()): ?>
						<li><a href="<?php echo e(url('/logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span class="glyphicon glyphicon-off"></span>&nbsp;Logout</a></li>
						 <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
                           		<?php echo e(csrf_field()); ?>

                         </form>
                         <?php endif; ?>
						<li class="dropdown">
						<!-- dpat name hehe to check lng danay -->
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo e(Auth::user()->email); ?> <span class="caret"></span></a>
>>>>>>> 9dc1e86788c62aa660e1218e084f319b012e8a76
							<ul class="dropdown-menu">
								<li><a href="profile.html"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
								<li><a href="#"><span class="glyphicon glyphicon-cog"></span> Account Settings</a></li>
								<li><a href="index.html"><span class="glyphicon glyphicon-off"></span>&nbsp;Logout</a></li>
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
<<<<<<< HEAD
	
	<?php echo $__env->yieldContent('content'); ?>

	<?php echo $__env->yieldPushContent('scripts'); ?>
=======
	<?php echo $__env->yieldContent('content'); ?>
>>>>>>> 9dc1e86788c62aa660e1218e084f319b012e8a76
</body>
</html>