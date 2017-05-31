  
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

					<?php if(($pendingApplications->count())>0): ?>
					<h3 class="text-center" id="pend">Pending</h3>
					<ul class="scholarships">

						<?php $__currentLoopData = $pendingApplications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $application): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<li>
							<!-- Image of the scholarship is placed here. -->
							<!-- The H2 here is just a place holder -->
							<h2 class="first-letter"><?php echo e($application->scholar->student_fname[0]); ?></h2>
							<article>
								<h2 class="name"><?php echo e($application->scholar->student_fname); ?> <?php echo e($application->scholar->student_lname); ?>

									<small><?php echo e($application->scholarship->scholarship_name); ?></small>
								</h2>
								<div class="btns">
									<form method="POST" action="/application/accept">
											<?php echo e(csrf_field()); ?>

										<input type="hidden" value="<?php echo e($application->application_id); ?>" name="app_id" />
										<button type="submit" class="accept"><span class="glyphicon glyphicon-ok"></span> Accept</button>
									</form>

									<a href="/application/<?php echo e($application->application_id); ?>" class="view"><span class="glyphicon glyphicon-eye-open"></span> View</a>
									<form method="POST" action="/application/reject">
											<?php echo e(csrf_field()); ?>

										<input type="hidden" value="<?php echo e($application->application_id); ?>" name="app_id" />
										<button type="submit" class="reject"><span class="glyphicon glyphicon-remove"></span> Reject</button>
									</form>

								</div>
							</article>
						</li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</ul>
					<?php else: ?> 
						<h5 class="text-center">No pending applications.</h5>
					<?php endif; ?>

					<?php if(($officialScholars->count())>0): ?>
					<h3 class="text-center" id="offic">Official</h3>
					<ul class="scholarships">
						<?php $__currentLoopData = $officialScholars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $scholar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<li>
							<h2 class="first-letter"><?php echo e($scholar->scholar->student_fname[0]); ?></h2>
							<article>
								<h2 class="name"><?php echo e($scholar->scholar->student_fname); ?> <?php echo e($scholar->scholar->student_lname); ?>

									<small><?php echo e($scholar->scholarship->scholarship_name); ?></small>
								</h2>
								<div class="btns">

									<a href="/profile scholar/<?php echo e($scholar->scholar->student_id); ?>" class="view"><span class="glyphicon glyphicon-eye-open"></span> View</a>

									<form method="get" action="/scholars/remove">
											<?php echo e(csrf_field()); ?>

										<input type="hidden" value="<?php echo e($scholar->application_id); ?>" name="app_id" />
										<button type="submit" class="reject"><span class="glyphicon glyphicon-remove"></span> Remove</button>
									</form>

								</div>
							</article>
						</li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</ul>
					<?php else: ?>
						<h5 class="text-center">No official scholars.</h5>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
	<link rel="stylesheet" type="text/css" href="/css/profile_page.css"/>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.userTab', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>