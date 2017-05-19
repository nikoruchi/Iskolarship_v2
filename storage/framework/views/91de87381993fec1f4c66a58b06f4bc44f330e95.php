<?php $__env->startSection('content'); ?>
	<ul class="scholar-links">
	<?php if(Auth::user()->hasRole('sponsor')): ?>
		<li><a href="<?php echo e(url('/profile sponsor')); ?>"><span class="glyphicon glyphicon-arrow-left"></span> Back to Profile</a></li>
	<?php elseif(Auth::user()->hasRole('student')): ?>
		<li><a href="<?php echo e(url('/profile scholar')); ?>"><span class="glyphicon glyphicon-arrow-left"></span> Back to Profile</a></li>
	<?php endif; ?>
		<li><a href="#pend">Pending</a></li>
		<li><a href="#offic">Official</a></li>
	</ul>
	<div class="container main-container">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<div>
					<h2 class="text-center scholars">Scholars</h2>
					<h3 class="text-center" id="pend">Pending</h3>
					<ul class="scholarships">
						<li>
							<!-- Image of the scholarship is placed here. -->
							<!-- The H2 here is just a place holder -->
							<h2 class="first-letter">C</h2>
							<article>
								<h2 class="name">Clyde Joshua Delgado</h2>
								<div class="btns">
									<a href="#" class="accept"><span class="glyphicon glyphicon-ok"></span> Accept</a>
									<a href="#" class="view"><span class="glyphicon glyphicon-eye-open"></span> View</a>
									<a href="#" class="reject"><span class="glyphicon glyphicon-remove"></span> Remove</a>
								</div>
							</article>
						</li>
						<li>
							<!-- Image of the scholarship is placed here. -->
							<!-- The H2 here is just a place holder -->
							<h2 class="first-letter">N</h2>
							<article>
								<h2 class="name">Nicole Beatriz Pascasio</h2>
								<div class="btns">
									<a href="#" class="accept"><span class="glyphicon glyphicon-ok"></span> Accept</a>
									<a href="#" class="view"><span class="glyphicon glyphicon-eye-open"></span> View</a>
									<a href="#" class="reject"><span class="glyphicon glyphicon-remove"></span> Remove</a>
								</div>
							</article>
						</li>
					</ul>
					<h3 class="text-center" id="offic">Official</h3>
					<ul class="scholarships">
						<li>
							<!-- Image of the scholarship is placed here. -->
							<!-- The H2 here is just a place holder -->
							<h2 class="first-letter">A</h2>
							<article>
								<h2 class="name">Allyn Joy Calcaben</h2>
								<div class="btns">
									<a href="#" class="edit"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
									<a href="#" class="view"><span class="glyphicon glyphicon-eye-open"></span> View</a>
									<a href="#" class="reject"><span class="glyphicon glyphicon-remove"></span> Remove</a>
								</div>
							</article>
						</li>
						<li>
							<!-- Image of the scholarship is placed here. -->
							<!-- The H2 here is just a place holder -->
							<h2 class="first-letter">M</h2>
							<article>
								<h2 class="name">Maria Angelica Talabucon</h2>
								<div class="btns">
									<a href="#" class="edit"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
									<a href="#" class="view"><span class="glyphicon glyphicon-eye-open"></span> View</a>
									<!-- We will place the delete inside the edit form. -->
									<a href="#" class="reject"><span class="glyphicon glyphicon-remove"></span> Remove</a>
								</div>
							</article>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
	<link rel="stylesheet" type="text/css" href="/css/profile_page.css"/>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.userTab', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>