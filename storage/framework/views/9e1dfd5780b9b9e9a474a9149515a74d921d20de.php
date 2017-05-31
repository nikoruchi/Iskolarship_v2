<!DOCTYPE html>
<html>
<head>
	<title>Iskolarship</title>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<link rel="shortcut icon" href="<?php echo e(asset('image/I.ico')); ?>" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/app.css')); ?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/font-awesome/css/font-awesome.min.css')); ?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/main.css')); ?>"/>

	<script type="text/javascript" src="/js/js.js"></script>

    <script type="text/javascript" src="/js/reopen_script.js"></script>
    <script type="text/javascript" src="/js/notif_script.js"></script>
 	<script type="text/javascript" src="/js/script.js"></script>

    <meta name="csrf_token" content = "<?php echo e(csrf_token()); ?>">

	<?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body class="container">
	<div id="app">
		<nav class="navbar navbar-default customized navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<a href="<?php echo e(url('/home')); ?>" class="navbar-brand"><span class="isko">Isko</span></a>
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
				</div>
				<div class="collapse navbar-collapse" id="app-navbar-collapse">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
						<?php if(Auth::user()->hasRole('student')): ?>
							<a href="/profile scholar" class="dropdown-toggle" data-toggle="dropdown"><img src="/image/<?php echo e($user->user_imagepath); ?>" class="dropdown-pp img-circle"/> <?php echo e($student->student_fname); ?> <?php echo e($student->student_lname); ?> <span class="caret"></span></a>
						<?php elseif(Auth::user()->hasRole('sponsor')): ?>
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img src="/image/<?php echo e($user->user_imagepath); ?>" class="dropdown-pp img-circle"/> <?php echo e($sponsor->sponsor_fname); ?> <?php echo e($sponsor->sponsor_lname); ?> <span class="caret"></span></a>
						<?php endif; ?>
							<ul class="dropdown-menu">
							<?php if(Auth::user()->hasRole('sponsor')): ?>
								<li><a href="<?php echo e(url('/profile sponsor')); ?>">
									<span class="glyphicon glyphicon-user"></span> Profile
								</a></li>
							<?php elseif(Auth::user()->hasRole('student')): ?>
								<li><a href="<?php echo e(url('/profile scholar')); ?>">
									<span class="glyphicon glyphicon-user"></span> Profile
								</a></li>
							<?php endif; ?>
							<?php if(Auth::check()): ?>
							<li><a href="<?php echo e(url('/messages')); ?>"><span class="glyphicon glyphicon-envelope"></span> Messages <span class="label label-success"><?php if($unread > 0): ?> <?php echo e($unread); ?> <?php endif; ?></span></a></li>
							<li><a href="<?php echo e(url('/notifications')); ?>"><span class="glyphicon glyphicon-bell"></span> Notifications <span class="label label-warning"><?php if($unnotif > 0): ?> <?php echo e($unnotif); ?> <?php endif; ?></span></a></li>
							<?php endif; ?>
							<?php if(Auth::user()->hasRole('sponsor')): ?>
							<li><a href="/Sponsor/Account Settings"><span class="glyphicon glyphicon-cog"></span> Account Settings</a></li>
							<?php elseif(Auth::user()->hasRole('student')): ?>
							<li><a href="/Scholar/Account Settings"><span class="glyphicon glyphicon-cog"></span> Account Settings</a></li>
							<?php endif; ?>
							<?php if(Auth::check()): ?>
									<li><a href="<?php echo e(url('/logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span class="glyphicon glyphicon-off"></span>&nbsp;Logout</a></li>
									 <form id="logout-form" action="<?php echo e(url('/logout')); ?>" method="POST" style="display: none;">
			                           		<?php echo e(csrf_field()); ?>

			                         </form>
		                         <?php endif; ?>
							</ul>
						</li>
					</ul>
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