<?php $__env->startSection('content'); ?>
	<div class="container main-container">
		<div class="col-sm-4 col-sm-offset-1">
			<div class="affix panel panel-default" style="position: relative; margin-bottom: 0; border-radius: 4px 4px 0 0;">
				<div class="panel-body">
					<img src="/image/<?php echo e($user->user_imagepath); ?>" class="img-circle img-responsive" style="background-size: cover;" />
				</div>
			</div>

			<form action="/Sponsor/upload" method="POST" enctype="multipart/form-data">
				<?php echo e(csrf_field()); ?>

				<div class="input-group  text-center <?php echo e($errors->has('image') ? ' has-error' : ''); ?> ">
					<input type="file" class="btn btn-default btn-block" name="image" style="border-radius: 0; border-top: 0;" value="Upload New" />
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
				
					<button type="submit" class="btn btn-success btn-block" style="border-radius: 4px	; border-top: 0;"><span class="glyphicon glyphicon-upload" ></span>&nbsp;Upload Image</button> 
				</div>
			</form>

		</div>
		<div class="col-sm-6">
			
				<div class="panel-heading">
					<h1 class="unmargined txt-success">Account Settings</h1>
				</div>
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="form-group">
						<form action="/Sponsor/Change Password" method="POST"  id="changePass">
						    <?php echo e(csrf_field()); ?>


					    	<?php if(Session::has('success_pass')): ?>
		    					<div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> <?php echo e(session('success_pass')); ?></em></div>
							<?php endif; ?>
						        <label><span class="glyphicon glyphicon-lock"></span> Password:</label>
								<div class="input-group <?php echo e($errors->has('password') ? ' has-error' : ''); ?> ">
									<input type="password" name="password" placeholder="Create a secure password. Minimum of 6 characters" class="form-control" />

									<?php if($errors->has('password')): ?>
										<span class="help-block">
											<strong><?php echo e($errors->first('password')); ?></strong>
										</span>
									<?php endif; ?>

								</div>
								<label><span class="glyphicon glyphicon-lock"></span> Re-type Password</label>
								<div class="input-group <?php echo e($errors->has('repassword') ? ' has-error' : ''); ?> ">
									<input type="password" name="repassword" placeholder="Re-type your password" class="form-control" />

						 			<?php if($errors->has('repassword')): ?>
										<span class="help-block">
											<strong><?php echo e($errors->first('repassword')); ?></strong>
										</span>
									<?php endif; ?>
								</div>
					    	<button type="submit" class="btn btn-success pull-right" style="margin-top: 10px;">
								<span class="glyphicon glyphicon-refresh"></span>&nbsp;&nbsp;Confirm Password
							</button> 
					    </form>
					</div>
				</div>
			</div>

			<div class="panel panel-default">
				<form action="/Sponsor/Update Profile" method="POST" id="editForm">
					<?php echo e(csrf_field()); ?>

					<!-- <?php echo e(method_field('PUT')); ?> -->
					<div class="panel-body">
						<div class="form-group">

						<?php if(Session::has('success_update')): ?>
						    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> <?php echo e(session('success_update')); ?></em></div>
						<?php endif; ?>

							<label>Name:</label>
							<div class="input-group" >
								<input type="text" name="fname" placeholder="First Name" class="form-control" value="<?php echo e($sponsor->sponsor_fname); ?>" />

								<input type="text" name="lname" placeholder="Last Name" class="form-control" value="<?php echo e($sponsor->sponsor_lname); ?>" />
							</div>

							<label>About Me</label>
							<div class="input-group" >
								<textarea name="aboutme" placeholder="Provide a short description about yourself. (max of 250 characters)" class="form-control"><?php echo e($user->user_aboutme); ?></textarea>
							</div>

							<label>Address:</label>
							<div class="input-group">
							
								<input type="text" name="address" placeholder="e.g. Quitoles Street, San Pedro, San Jose, Antique" class="form-control" value="<?php echo e($sponsor->sponsor_address); ?>"/>
							</div>
							<label>Contact Number</label>
							<div class="input-group">
								<input type="text" name="contact" placeholder="09-XXXXXXXXX" value="<?php echo e($user->user_contact); ?>" class="form-control" />
							</div>
						</div>
						<hr/>
							<label><span class="glyphicon glyphicon-envelope"></span> Email Address:</label>
							<div class="input-group">
								<input type="text" name="email" placeholder="What's your email Address?" class="form-control"  value="<?php echo e($user->email); ?>"/>
							</div>
						<hr/>
						<div class="form-group">
							<label>Agency Name:</label>
							<div class="input-group <?php echo e($errors->has('curr_agency') ? ' has-error' : ''); ?> ">
								<input type="text" name="curr_agency" placeholder="e.g. University of Sample, College of Sample" class="form-control" value="<?php echo e($sponsor->sponsor_agency); ?>"/>

								<?php if($errors->has('curr_agency')): ?>
									<span class="help-block">
										<strong><?php echo e($errors->first('curr_agency')); ?></strong>
									</span>
								<?php endif; ?>

							</div>
							<label>Agency Address:</label>
							<div class="input-group <?php echo e($errors->has('addr_agency') ? ' has-error' : ''); ?> ">
								<input type="text" name="addr_agency" placeholder="e.g Jaro, Iloilo City" class="form-control" value="<?php echo e($sponsor->sponsor_agencyaddress); ?>"/>

								<?php if($errors->has('addr_agency')): ?>
									<span class="help-block">
										<strong><?php echo e($errors->first('addr_agency')); ?></strong>
									</span>
								<?php endif; ?>

							</div>
							<label>Job Title:</label>
							<div class="input-group <?php echo e($errors->has('job_title') ? ' has-error' : ''); ?> ">
								<input type="text" name="job_title" placeholder="e.g. III, IV" class="form-control" value="<?php echo e($sponsor->sponsor_job); ?>"/>

								<?php if($errors->has('job_title')): ?>
									<span class="help-block">
										<strong><?php echo e($errors->first('job_title')); ?></strong>
									</span>
								<?php endif; ?>

							</div>
						</div>
					</div>
					<div class="panel-footer overflow-a">
						<button type="submit" class="btn btn-success pull-right">
							<span class="glyphicon glyphicon-refresh"></span>&nbsp;&nbsp;Update
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>


<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
    <link rel="stylesheet" type="text/css" href="/css/main.css"/>
    <link rel="stylesheet" type="text/css" href="/css/index.css"/>
    <link rel="stylesheet" type="text/css" href="/css/register.css"/>
	<link rel="stylesheet" type="text/css" href="css/edit_profile.css"/>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
	<script src="js/default_img.js"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.userTab', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>