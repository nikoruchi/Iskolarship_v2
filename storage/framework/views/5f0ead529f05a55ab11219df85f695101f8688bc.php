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
	<?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body class="container-white">
	<div id="app">
		<nav class="navbar navbar-default customized navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<a href="<?php echo e(url('/home')); ?>" class="navbar-brand">Iskolarship</a>
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
				</div>
				<div class="collapse navbar-collapse" id="app-navbar-collapse">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
						<!-- dpat name hehe to check lng danay -->
						<?php if(Auth::user()->hasRole('student')): ?>
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo e($student->student_fname); ?> <?php echo e($student->student_lname); ?> <span class="caret"></span></a>
						<?php elseif(Auth::user()->hasRole('sponsor')): ?>
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo e(Auth::user()->$sponsor->sponsor_fname); ?> <?php echo e($sponsor->sponsor_lname); ?> <span class="caret"></span></a>
						<?php endif; ?>
							<ul class="dropdown-menu">
								<li><a href="profile.html"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
								<?php if(Auth::check()): ?>
								<li><a href="#"><span class="glyphicon glyphicon-envelope"></span> Messages</a></li>
								<li><a href="#"><span class="glyphicon glyphicon-bell"></span> Notifications</a></li>
								<?php endif; ?>
								<li><a href="#"><span class="glyphicon glyphicon-cog"></span> Account Settings</a></li>
								<?php if(Auth::check()): ?>
									<li><a href="<?php echo e(url('/logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span class="glyphicon glyphicon-off"></span>&nbsp;Logout</a></li>
									 <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
			                           		<?php echo e(csrf_field()); ?>

			                         </form>
		                         <?php endif; ?>
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
	<?php echo $__env->yieldContent('content'); ?>

	<?php echo $__env->yieldPushContent('scripts'); ?>
	
	<script type="text/javascript" src="/js/jquery.min.js"></script>
	<script type="text/javascript" src="/js/app.js"></script>
	<script>
		$(document).ready(function(){$('[data-toggle="popover"]').popover();});
		$(document).ready(function(){$('[data-toggle="tooltip"]').tooltip();});
	</script>

</body>
</html>