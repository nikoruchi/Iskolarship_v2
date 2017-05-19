<?php $__env->startSection('content'); ?>

	<div class="container main-container">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<div class="panel">
					<div class="panel-heading">
						<img src="uploads/dost.png" class="img-responsive scholarship-logo"/>
						<h1 class="scholarship-name"><?php echo e($scholarship->scholarship_name); ?></h1>
						<p class="scholarship-description"><?php echo e($scholarship->scholarship_desc); ?></p>
						<div class="flex">
						<!-- pa edit lang di design sang paragraph. -->
						<?php if($deadline < $currentTime): ?>
							<p class ="text-center">Submission for application is over.</p>
						<?php elseif((Auth::user()->hasRole('student')) && $exists!=0): ?>
							<p class="text-center">You have applied already. Please wait until the agency reviews your application.</p>
						<?php elseif((Auth::user()->hasRole('student')) && $exists==0): ?>
							<a href="#" class="btn btn-success btn-lg apply-btn"><span class="glyphicon glyphicon-education"><span class="glyphicon glyphicon-plus"></span></span>&nbsp;&nbsp;Apply</a>
						<?php elseif(Auth::guest()): ?>
							<p class="text-center">You must be <a href="/">logged in</a> to apply.</p>
						<?php elseif($user->user_id == ($scholarship->sponsor_id)): ?>
							<a href="/profile sponsor/scholars" class="btn btn-primary"><span class="glyphicon glyphicon-education"><span class="glyphicon glyphicon-plus"></span></span>&nbsp;&nbsp;Your Scholars</a>
						<?php endif; ?>


						</div>
						<h2 class="scholar-count"><span class="glyphicon glyphicon-education"></span> Scholars: <?php echo e($scholars->count()); ?></h2>
						<ul class="list-unstyled further-details">
							<li><button class="btn btn-default btn-md"><span class="glyphicon glyphicon-briefcase"></span></button></li>
							<li><button class="btn btn-default btn-md"><span class="glyphicon glyphicon-calendar"></span></button></li>
							<li><button class="btn btn-default btn-md"><span class="glyphicon glyphicon-search"></span></button></li>
						</ul>
					</div>
					<div class="panel-body grants-specs">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="text-center">Grants</h3>
								<ul class="list-unstyled">
									<?php $__currentLoopData = $grants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<li><?php echo e($grant->scholarship_grantDesc); ?></li>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<!-- <li><span class="glyphicon glyphicon-usd"></span> Tuition and other fees of Php10,000.00 per semester.</li>
									<li><span class="glyphicon glyphicon-book"></span> Book allowance of Php5,000.00 per semester.</li>
									<li><span class="glyphicon glyphicon-usd"></span> Monthly stipend of Php5,000.00.</li> -->
								</ul>
							</div>
							<div class="col-sm-12">
								<h3 class="text-center">Specifications</h3>
								<ol class="list-unstyled">
									<?php $__currentLoopData = $specifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $specification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<li><?php echo e($specification->scholarship_specDesc); ?></li>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</ol>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/scholarship_page.css')); ?>"/>
<?php $__env->stopPush(); ?>
<?php echo $__env->make("layouts.userTab", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>