<?php $__env->startSection('content'); ?>
	<div class="container main-container">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">

				<img src="/image/<?php echo e($user->user_imagepath); ?>" class="img-responsive user-pp img-circle"/>

				<h1 class="user-name"><?php echo e(empty($sponsor1)? $sponsor->sponsor_fname : $sponsor1->sponsor_fname); ?></h1>
				<h2 class="work"> <?php echo e(empty($sponsor1)? $sponsor->sponsor_agency : $sponsor1->sponsor_agency); ?>, <?php echo e(empty($sponsor1)? $sponsor->sponsor_job : $sponsor1->sponsor_job); ?></h2>
				<h3 class="user-email"><?php echo e(empty($user1)? $user->email : $user1->email); ?></h3>

				<?php if(Auth::user()->hasRole('sponsor')): ?>
					<?php if(Auth::user()->user_id==$user1->user_id): ?>
					<div class="btn-group flex">	
						<a href="/Sponsor/Account Settings" class="btn btn-default acc_settings">
							<span class="glyphicon glyphicon-cog"></span> Account Settings
						</a>
						<a href="#" class="btn btn-success acc_settings">
							<span class="glyphicon glyphicon-plus"></span> Create Scholarship
						</a>
					</div>
					<?php endif; ?>
				<?php endif; ?>
				<?php if(Auth::user()->hasRole('student')): ?>
				<div class="btn-group flex">
					<button class="btn btn-primary"> <span class="glyphicon glyphicon-envelope"></span> Message</button>
				</div>
				<?php endif; ?>
				<?php if(Auth::user()->hasRole('student')): ?>
				
				<?php endif; ?>
				<div>
					<?php if(!empty($scholarships)): ?>
					<h2 class="text-center">Scholarships</h2>
					<ul class="scholarships">
					
					<!-- <?php if($scholarships->count()>0): ?> -->
						<h4> Open Scholarships </h4>
						<?php $__currentLoopData = $scholarships; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $scho): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php if($scho->scholarship_deadlineenddate > $currentTime): ?>
							<li>
								<h2 class="first-letter"><?php echo e($scho->scholarship_name[0]); ?></h2>
								<article>
									<h2 class="name"><?php echo e($scho->scholarship_name); ?></h2>
									<?php if(Auth::user()->user_id==$user1->user_id): ?>
										<div class="btns">
											<a href="#" class="edit"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
											<a href="<?php echo e(url('profile sponsor/scholars')); ?>" class="view_scholars"><span class="glyphicon glyphicon-eye-open"></span> Scholars</a>
										</div>
									<?php else: ?>
										<div class="btns">
											<a href="/profile scholarship/<?php echo e($scho->scholarship_id); ?>" class="view_scholars"><span class="glyphicon glyphicon-eye-open"></span> View</a>
										</div>
									<?php endif; ?>
								</article>
							</li>
							<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<!-- //<?php endif; ?> -->

					<!-- <?php if(!empty($scholarships)): ?> -->
						<h4> Closed Scholarships </h4>
						<?php $__currentLoopData = $scholarships; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $scho): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php if($scho->scholarship_deadlineenddate < $currentTime): ?>
							<li>
								<h2 class="first-letter"><?php echo e($scho->scholarship_name[0]); ?></h2>
								<article>
									<h2 class="name"><?php echo e($scho->scholarship_name); ?> </h2>
									<?php if(Auth::user()->user_id==$user1->user_id): ?>
										<div class="btns">
											<a href="#" class="edit" data-toggle="modal" data-target="#reOpen"><span class="glyphicon glyphicon-pencil"></span> Re-open</a>
											<a href="<?php echo e(url('profile sponsor/scholars')); ?>" class="view_scholars"><span class="glyphicon glyphicon-eye-open"></span> Scholars</a>
										</div>
									<?php else: ?>
										<div class="btns">
											<a href="/profile scholarship/<?php echo e($scho->scholarship_id); ?>" class="view_scholars"><span class="glyphicon glyphicon-eye-open"></span> View</a>
										</div>
									<?php endif; ?>
								</article>
							</li>
							<?php endif; ?>
							<!-- RE-OPEN MODAL -->
							<div id="reOpen" class="modal fade" role="dialog">
							  	<div class="modal-dialog">
								    <div class="modal-content">
								      	<div class="modal-header">
								        	<button type="button" class="close" data-dismiss="modal">&times;</button>
								        	<h4 class="modal-title">Re-Open <?php echo e($scho->scholarship_name); ?> Application</h4>
								      	</div>
								      	<div class="modal-body">
								        	<form action="/scholarship/reopen" method="get">
									        	<div class="input-group">
													<input type="date" name="new_deadline" class="form-control" />
													<input type="text" name="scholarship_id" value="<?php echo e($scho->scholarship_id); ?>" style="display:none"/>
										</div>
								      	<div class="modal-footer">
													<div class="input-group-btn">
														<button class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span> Re-Open</button>
														<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
													</div>
												</div>
								        		
								        	</form>								        	
								      	</div>
								    </div>
							  	</div>
							</div>

						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<!-- <?php endif; ?> -->
					</ul>
					<?php else: ?>
					<?php if( (empty($sponsor1) && $user->user_type == "sponsor") || (empty($sponsor) && $user->user_type == "student") ): ?>
					<h3 class="text-center">You haven't created any scholarships.</h3>
					<?php else: ?>
					<h3 class="text-center">No scholarship to show.</h3>
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
<?php echo $__env->make('layouts.userTab', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>