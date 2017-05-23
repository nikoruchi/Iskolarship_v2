<?php $__env->startSection('content'); ?>
	<div class="container main-container">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<img src="/image/<?php echo e($user->user_imagepath); ?>" class="img-responsive user-pp img-circle"/>
				<h1 class="user-name"><?php echo e($sponsor->sponsor_fname); ?></h1>
				<h2 class="work"> <?php echo e($sponsor->sponsor_agency); ?>, <?php echo e($sponsor->sponsor_job); ?></h2>
				<h3 class="user-email"><?php echo e($user->email); ?></h3>

				<?php if(Auth::user()->hasRole('sponsor')): ?>
				<div class="btn-group flex">	
					<a href="/Sponsor/Account Settings" class="btn btn-default acc_settings">
						<span class="glyphicon glyphicon-cog"></span> Account Settings
					</a>
					<a href="#" class="btn btn-success acc_settings">
						<span class="glyphicon glyphicon-plus"></span> Create Scholarship
					</a>
				</div>
				<?php endif; ?>
				<?php if(Auth::user()->hasRole('student')): ?>
				<div class="btn-group flex">
					<button class="btn btn-primary"> <span class="glyphicon glyphicon-envelope"></span> Message</button>
				</div>
				<?php endif; ?>
				<?php if(Auth::user()->hasRole('student')): ?>
				<!-- <div class="row">
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
				</div> -->
				<?php endif; ?>
				<div>
					<?php if($scholarships->count()>0): ?>
					<h2 class="text-center">Scholarships</h2>
					<ul class="scholarships">
					<?php $__currentLoopData = $scholarships; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $scho): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<li>
							<!-- Image of the scholarship is placed here. -->
							<!-- The H2 here is just a place holder -->
							<h2 class="first-letter"><?php echo e($scho->scholarship_name[0]); ?></h2>
							<article>
								<h2 class="name"><?php echo e($scho->scholarship_name); ?></h2>
								<div class="btns">
									<a href="#" class="edit"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
									<a href="<?php echo e(url('profile sponsor/scholars')); ?>" class="view_scholars"><span class="glyphicon glyphicon-eye-open"></span> Scholars</a>
								</div>
							</article>
						</li>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</ul>
					<?php else: ?>
					<h3 class="text-center">You haven't created any scholarships.</h3>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/profile_page.css')); ?>"/>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.userTab', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>