<?php $__env->startSection('content'); ?>
	<div class="container main-container">
		<div class="col-sm-2">
			<span class="square-img">
				<img src="/image/<?php echo e($user->user_imagepath); ?>" class="img-circle img-responsive" id="img-preview" />
			</span>

			<form action="/Sponsor/upload" method="POST" enctype="multipart/form-data">
				<?php echo e(csrf_field()); ?>

				<div class="input-group text-center <?php echo e($errors->has('image') ? ' has-error' : ''); ?> ">
					<label class="file-label"><span class="glyphicon glyphicon-download-alt"></span> <span id="file-name">Select a file</span><input type="file" class="btn btn-default btn-block <?php echo e($errors->has('image') ? ' has-error' : ''); ?>" name="image" value="Upload New" id="img-upload"/></label>
				<?php if($errors->has('image')): ?>
					<span class="help-block">
						<strong><?php echo e($errors->first('image')); ?></strong>
					</span>
				<?php endif; ?>
				<?php if(Session::has('success')): ?>
				    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> <?php echo e(session('success')); ?></em></div>
				<?php endif; ?>
				<?php if(Session::has('error')): ?>
				    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> <?php echo e(session('success')); ?></em></div>
				<?php endif; ?>
				
					<button type="submit" class="btn btn-success btn-block" id="change-pic"><span class="glyphicon glyphicon-upload"></span>&nbsp;Upload Image</button> 
				</div>
			</form>
			<form action="/Sponsor/Change Password" method="POST"  id="changePass">
			    <?php echo e(csrf_field()); ?>


		    	<?php if(Session::has('success_pass')): ?>
					<div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> <?php echo e(session('success_pass')); ?></em></div>
				<?php endif; ?>
					<div class="input-group <?php echo e($errors->has('password') ? ' has-error' : ''); ?> ">
				        <label><span class="glyphicon glyphicon-lock"></span> Password:</label>
						<input type="password" name="password" placeholder="Password" class="form-control" />

						<?php if($errors->has('password')): ?>
							<span class="help-block">
								<strong><?php echo e($errors->first('password')); ?></strong>
							</span>
						<?php endif; ?>

					</div>
					<div class="input-group <?php echo e($errors->has('repassword') ? ' has-error' : ''); ?> ">
						<label><span class="glyphicon glyphicon-lock"></span> Confirm Password</label>
						<input type="password" name="repassword" placeholder="Retype password" class="form-control" />

			 			<?php if($errors->has('repassword')): ?>
							<span class="help-block">
								<strong><?php echo e($errors->first('repassword')); ?></strong>
							</span>
						<?php endif; ?>
					</div>
		    	<button type="submit" class="btn btn-success btn-block text-center" style="margin-top: 10px;">
					<span class="glyphicon glyphicon-refresh"></span>&nbsp;&nbsp;Confirm Password
				</button> 
		    </form>
		</div>
		<div class="col-sm-10">
			<div class="row">
				<form action="/Sponsor/Update Profile" method="POST" id="editForm">
					<div class="col-sm-6">
						<?php echo e(csrf_field()); ?>

						<!-- <?php echo e(method_field('PUT')); ?> -->
						<div class="form-group">

						<?php if(Session::has('success_update')): ?>
						    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> <?php echo e(session('success_update')); ?></em></div>
						<?php endif; ?>

							<div class="input-group name" >
								<label>Name:</label>
								<input type="text" name="fname" placeholder="First Name" class="form-control" value="<?php echo e($sponsor->sponsor_fname); ?>" />

								<input type="text" name="lname" placeholder="Last Name" class="form-control" value="<?php echo e($sponsor->sponsor_lname); ?>" />
							</div>

							<div class="input-group" >
								<label>About Me</label>
								<textarea name="aboutme" placeholder="Provide a short description about yourself. (max of 250 characters)" class="form-control"><?php echo e($user->user_aboutme); ?></textarea>
							</div>

							<div class="input-group">
								<label>Address:</label>
							
								<input type="text" name="address" placeholder="e.g. Quitoles Street, San Pedro, San Jose, Antique" class="form-control" value="<?php echo e($sponsor->sponsor_address); ?>"/>
							</div>
							<div class="input-group">
								<label>Contact Number</label>
								<input type="text" name="contact" placeholder="09-XXXXXXXXX" value="<?php echo e($user->user_contact); ?>" class="form-control" />
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<div class="input-group">
								<label><span class="glyphicon glyphicon-envelope"></span> Email Address:</label>
								<input type="text" name="email" placeholder="What's your email Address?" class="form-control"  value="<?php echo e($user->email); ?>"/>
							</div>
							<div class="input-group <?php echo e($errors->has('curr_agency') ? ' has-error' : ''); ?> ">
								<label>Agency Name:</label>
								<input type="text" name="curr_agency" placeholder="e.g. University of Sample, College of Sample" class="form-control" value="<?php echo e($sponsor->sponsor_agency); ?>"/>

								<?php if($errors->has('curr_agency')): ?>
									<span class="help-block">
										<strong><?php echo e($errors->first('curr_agency')); ?></strong>
									</span>
								<?php endif; ?>

							</div>
							<div class="input-group <?php echo e($errors->has('addr_agency') ? ' has-error' : ''); ?> ">
								<label>Agency Address:</label>
								<input type="text" name="addr_agency" placeholder="e.g Jaro, Iloilo City" class="form-control" value="<?php echo e($sponsor->sponsor_agencyaddress); ?>"/>

								<?php if($errors->has('addr_agency')): ?>
									<span class="help-block">
										<strong><?php echo e($errors->first('addr_agency')); ?></strong>
									</span>
								<?php endif; ?>

							</div>
							<div class="input-group <?php echo e($errors->has('job_title') ? ' has-error' : ''); ?> ">
								<label>Job Title:</label>
								<input type="text" name="job_title" placeholder="e.g. III, IV" class="form-control" value="<?php echo e($sponsor->sponsor_job); ?>"/>

								<?php if($errors->has('job_title')): ?>
									<span class="help-block">
										<strong><?php echo e($errors->first('job_title')); ?></strong>
									</span>
								<?php endif; ?>

							</div>
							<button type="submit" class="btn btn-success pull-right">
								<span class="glyphicon glyphicon-refresh"></span>&nbsp;&nbsp;Update
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>


<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/main.css')); ?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/edit_profile.css')); ?>"/>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
	<script src="<?php echo e(asset('js/upload_img.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.userTab', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>