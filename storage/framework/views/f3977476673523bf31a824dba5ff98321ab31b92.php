<?php $__env->startSection('content'); ?>
	<div class="container main-container">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<img src="/image/<?php echo e($user->user_imagepath); ?>" class="img-responsive user-pp img-circle"/>
				<h1 class="user-name"><?php echo e($studentProfile->student_fname); ?></h1>
				<h2 class="education"> <?php echo e($studentProfile->student_studyfield); ?>, <?php echo e($studentProfile->student_university); ?></h2>
				<h3 class="user-email"><?php echo e($studentProfile->student->email); ?></h3>
<<<<<<< HEAD
				<h3 class="text-center"><?php echo e($studentProfile->student->user_aboutme); ?></h3>
=======
				<h3 class="about-me"><?php echo e($studentProfile->student->user_aboutme); ?></h3>
>>>>>>> c56d1face5c7d4d0175025c21191924dd9cc77a1
				<?php if(Auth::user()->hasRole('student')): ?>
<<<<<<< HEAD:storage/framework/views/924482e0a94481880e1c0c76d67e8ef75b76686e.php
				<div class="btn-group flex">
=======
				<div class="btn-group flex">	
>>>>>>> dae4c2eec17e82b2cb0f745a9a4f5cb159659ad1:storage/framework/views/f3977476673523bf31a824dba5ff98321ab31b92.php
					<a href="/Account Settings" class="acc_settings">
						<button class="btn btn-default"><span class="glyphicon glyphicon-cog"></span> Account Settings</button>
					</a>
				</div>
				<?php endif; ?>
				<?php if(Auth::user()->user_id != $studentProfile->user_id): ?>
				<div class="btn-group flex">
					<button class="btn btn-primary"> <span class="glyphicon glyphicon-envelope"></span> Message</button>
				</div>
				<?php endif; ?>
				<div>
					<?php if((Auth::user()->user_id)==($studentProfile->user_id)): ?>
						<?php if($pendingAvail->count()>0): ?>
							<h2 class="text-center">Scholarships</h2>
							<ul class="scholarships">
								<?php $__currentLoopData = $pendingAvail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $scholarshipAvail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<li>
									<!-- Image of the scholarship is placed here. -->
									<!-- The H2 here is just a place holder -->
									<h2 class="first-letter">S</h2>
									<article>
										<h2 class="name"><?php echo e($scholarshipAvail->appscholarship->scholarship_name); ?></h2>
										<div class="btns">
											<form method="post" action="/application/avail" id="acceptForm">
											<?php echo e(csrf_field()); ?>

												<input type="hidden" value="<?php echo e($scholarshipAvail->application_id); ?>" name="app_id" />
												<button type="submit" data-id="<?php echo e($scholarshipAvail->application_id); ?>" class="accept"><span class="glyphicon glyphicon-ok"></span> Accept</button>

											</form>
											<a href="/profile scholarship/<?php echo e($scholarshipAvail->scholarship_id); ?>" class="view"><span class="glyphicon glyphicon-eye-open"></span> View</a>
											<form method="post" action="/application/rejectAvail">
													<?php echo e(csrf_field()); ?>

												<input type="hidden" value="<?php echo e($scholarshipAvail->application_id); ?>" name="app_id" />
												<button type="submit" class="reject" "><span class="glyphicon glyphicon-remove"></span> Reject</button>
											</form>
										</div>
									</article>
								</li>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</ul>
						<?php else: ?>
							<h2 class="text-center">No pending scholarships for avail</h2>
						<?php endif; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('styles'); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/profile_page.css')); ?>"/>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('scripts'); ?>
	<script src="js/default_img.js"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.userTab', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>