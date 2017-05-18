<?php $__env->startSection('content'); ?>
	<div class="container main-container">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<div class="panel">
					<img src="/image/<?php echo e($user->user_imagepath); ?>.jpg" class="img-responsive user-pp img-circle"/>
					<h1 class="user-name"><?php echo e($student->student_fname); ?></h1>
					<h2 class="education"> <?php echo e($student->student_studyfield); ?>, <?php echo e($student->student_university); ?></h2>
					<h3 class="user-email"><?php echo e($user->email); ?></h3>
					<?php if(Auth::user()->hasRole('student')): ?>
					<div class="btn-group flex">
						<button class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span> Edit Profile</button>
					
						<button class="btn btn-default"><span class="glyphicon glyphicon-cog"></span> Account Settings</button>
					</div>
					<?php endif; ?>
					<?php if(Auth::user()->hasRole('sponsor')): ?>
					<div class="btn-group flex">
						<button class="btn btn-primary"> <span class="glyphicon glyphicon-envelope"></span> Message</button>
					</div>
					<?php endif; ?>
					<?php if(Auth::user()->hasRole('student')): ?>
					<div class="row">
						<div class="col-sm-6">
							<div class="paper">
								<h4 class="text-center youHave">You have</h4>
								<h4 class="count"><?php echo e($scholarships); ?></h4>
								<h4 class="text-center">Scholarships</h4>
								<div class="flex"><button class="btn btn-default"><span class="glyphicon glyphicon-modal-window"></span> See all</button></div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="paper">
								<h4 class="text-center youHave">You have</h4>
								<h4 class="count"><?php echo e($sponsors); ?></h4>
								<h4 class="text-center">Sponsors</h4>
								<div class="flex">
									<button class="btn btn-default"><span class="glyphicon glyphicon-modal-window"></span> See all</button>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="paper margin-top">
								<h4 class="text-center youHave">You have</h4>
								<h4 class="count"><?php echo e($pending); ?></h4>
								<h4 class="text-center">Pending Scholarships</h4>
								<div class="flex">
									<button class="btn btn-default"><span class="glyphicon glyphicon-modal-window"></span> See all</button>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="paper margin-top">
								<h4 class="text-center youHave">You have</h4>
								<h4 class="count">5</h4>
								<h4 class="text-center">Expired Scholarships</h4>
								<div class="flex">
									<button class="btn btn-default"><span class="glyphicon glyphicon-modal-window"></span> See all</button>
								</div>
							</div>
						</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
	<link rel="stylesheet" type="text/css" href="css/scholar_page.css"/>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
	<script src="js/default_img.js"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.userTab', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>