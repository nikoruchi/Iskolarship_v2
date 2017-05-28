<?php $__env->startSection('content'); ?>
	<div class="container main-container">
		<div class="col-sm-2">
			<span class="square-img">
				<img src="/image/<?php echo e($user->user_imagepath); ?>" class="img-circle img-responsive" id="img-preview"/>
			</span>
			<form action="/Scholar/upload" method="POST" enctype="multipart/form-data">
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
			<form action="/Scholar/Change Password" method="POST"  id="changePass">
			    <?php echo e(csrf_field()); ?>

			    	<?php if(Session::has('success_pass')): ?>
					    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> <?php echo e(session('success_pass')); ?></em></div>
					<?php endif; ?>

					<div class="input-group <?php echo e($errors->has('password') ? ' has-error' : ''); ?> ">
				        <label><span class="glyphicon glyphicon-lock"></span> Change Password</label>
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
				<form action="/Scholar/Update Profile" method="POST" id="editForm">
					<div class="col-sm-6">
						<?php echo e(csrf_field()); ?>

						<div class="form-group">

						<?php if(Session::has('success_update')): ?>
						    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> <?php echo e(session('success_update')); ?></em></div>
						<?php endif; ?>
							<div class="input-group name" >
								<label><span class="glyphicon glyphicon-user"></span> Name</label>
								<input type="text" name="fname" placeholder="First Name" class="form-control" value="<?php echo e($student->student_fname); ?>" />
								<input type="text" name="lname" placeholder="Last Name" class="form-control" value="<?php echo e($student->student_lname); ?>" />
							</div>
							<div class="input-group">
								<label><span class="glyphicon glyphicon-map-marker"></span> Address</label>
								<input type="text" name="address" placeholder="e.g. Quitoles Street, San Pedro, San Jose, Antique" class="form-control" value="<?php echo e($student->student_address); ?>"/>
							</div>
							<div class="input-group">
								<label><span class="glyphicon glyphicon-phone"></span> Contact Number</label>
								<input type="text" name="contact" placeholder="09-XXXXXXXXX" value="<?php echo e($user->user_contact); ?>" class="form-control" />
							</div>
							<div class="input-group">
								<label><span class="glyphicon glyphicon-user"></span> Nationality</label>
								<input type="text" name="ntnlty" placeholder="e.g. Filipino, American" class="form-control" value="<?php echo e($student->student_nationality); ?>"/>
							</div>
							<div class="input-group">
								<label><span class="glyphicon glyphicon-calendar"></span> Birthdate</label>
								<input type="date" name="bdate" placeholder="First Name" class="form-control" value="<?php echo e($student->student_birthdate); ?>"/>
							</div>
							<div class="input-group">
								<label><span class="glyphicon glyphicon-map-marker"></span> Region:</label>
								<select name="region" class="form-control">
									<option disabled selected>Select Region</option>
									<optgroup label="Philippines">
										<optgroup label="LUZON">
											<option <?php echo e($student->student_region == "NCR" ? 'selected' : ''); ?>>NCR</option>
											<option <?php echo e($student->student_region == "Region I" ? 'selected' : ''); ?>>Region I</option>
											<option <?php echo e($student->student_region == "CAR" ? 'selected' : ''); ?>>CAR</option>
											<option <?php echo e($student->student_region == "Region II" ? 'selected' : ''); ?>>Region II</option>
											<option <?php echo e($student->student_region == "Region III" ? 'selected' : ''); ?>>Region III</option>
											<option <?php echo e($student->student_region == "Region IV-A" ? 'selected' : ''); ?>>Region IV-A</option>
											<option <?php echo e($student->student_region == "MIMAROPA" ? 'selected' : ''); ?>>MIMAROPA</option>
											<option <?php echo e($student->student_region == "Region IV-B" ? 'selected' : ''); ?>>Region IV-B</option>
											<option <?php echo e($student->student_region == "Region V" ? 'selected' : ''); ?>>Region V</option>
										</optgroup>
										<optgroup label="VISAYAS">
											<option <?php echo e($student->student_region == "Region VI" ? 'selected' : ''); ?>>Region VI</option>
											<option <?php echo e($student->student_region == "Region VII" ? 'selected' : ''); ?>>Region VII</option>
											<option <?php echo e($student->student_region == "Region VIII" ? 'selected' : ''); ?>>Region VIII</option>
											<option <?php echo e($student->student_region == "Region XVIII" ? 'selected' : ''); ?>>Region XVIII</option>
										</optgroup>
										<optgroup label="MINDANAO">
											<option <?php echo e($student->student_region == "Region IX" ? 'selected' : ''); ?>>Region IX</option>
											<option <?php echo e($student->student_region == "Region X" ? 'selected' : ''); ?>>Region X</option>
											<option <?php echo e($student->student_region == "Region XI" ? 'selected' : ''); ?>>Region XI</option>
											<option <?php echo e($student->student_region == "Region XII" ? 'selected' : ''); ?>>Region XII</option>
											<option <?php echo e($student->student_region == "Region XIII" ? 'selected' : ''); ?>>Region XIII</option>
											<option <?php echo e($student->student_region == "ARMM" ? 'selected' : ''); ?>>ARMM</option>
										</optgroup>
									</optgroup>
									<optgroup label="Outside the Philippines">
										<option <?php echo e($student->student_region == "Outside the Philippines" ? 'selected' : ''); ?>>Outside the Philippines</option>
									</optgroup>
								</select>
							</div>
							<div class="input-group" >
								<label><span class="glyphicon glyphicon-comment"></span> About Me</label>
								<textarea name="aboutme" placeholder="Provide a short description about yourself. (max of 250 characters)" class="form-control"><?php echo e($user->user_aboutme); ?></textarea>
							</div>
							<div class="input-group sex">
								<label class="sex-label">Sex:</label>
								<label class="radio-inline">
									<input type="radio" name="gender" value="male"  <?php echo e($student->student_gender=="male" ? 'checked='.'"'.'checked'.'"' : ''); ?>><span class="label-text">Male</span>
								</label>
								<label class="radio-inline">
									<input type="radio" name="gender"  value="female" <?php echo e($student->student_gender=="female" ? 'checked='.'"'.'checked'.'"' : ''); ?>></span>&nbsp;<span class="label-text">Female</span>
								</label>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="input-group">
							<label><span class="glyphicon glyphicon-envelope"></span> Email Address:</label>
							<input type="text" name="email" placeholder="What's your email Address?" class="form-control"  value="<?php echo e($user->email); ?>"/>
						</div>
						<div class="form-group">
							<div class="input-group">
								<label><span class="glyphicon glyphicon-education"></span> University Name</label>
								<input type="text" name="univ" placeholder="e.g. University of the Philippines, College of XXXX" class="form-control" value="<?php echo e($student->student_university); ?>"/>
							</div>
							<div class="input-group">
								<label><span class="glyphicon glyphicon-map-marker"></span> University Address:</label>
								<input type="text" name="univ_address" placeholder="e.g. Miagao, Iloilo" class="form-control" value="<?php echo e($student->student_universityaddress); ?>"/>
							</div>
							<div class="input-group ">
								<label><span class="glyphicon glyphicon-education"></span> Study Field</label>
								<input type="text" name="field" placeholder="e.g. BS in Computer Science" class="form-control" value="<?php echo e($student->student_studyfield); ?>" />
							</div>
							<div class="input-group">
								<label><span class="glyphicon glyphicon-education"></span> Begin Study</label>
								<input type="date" name="begin_study" placeholder="First Name" class="form-control" value="<?php echo e($student->student_beginstudies); ?>"/>
							</div>
							<div class="input-group">
								<label><span class="glyphicon glyphicon-education"></span> Highest Degree Attained:</label>
								<select name="degree_att" class="form-control" >
									<option disabled selected>Select Degree</option>
									<option <?php echo e($student->student_highestdegree == "Highschool" ? 'selected' : ''); ?>>Highschool</option>
									<option <?php echo e($student->student_highestdegree == "Bachelor's Degree" ? 'selected' : ''); ?>>Bachelor's Degree</option>
									<option <?php echo e($student->student_highestdegree == "Master's Degree" ? 'selected' : ''); ?>>Master's Degree</option>
									<option <?php echo e($student->student_highestdegree == "Doctoral Degree" ? 'selected' : ''); ?>>Doctoral Degree</option>
								</select>
							</div>
							<div class="input-group">
								<label><span class="glyphicon glyphicon-education"></span> Degree Sought</label>
								<select name="degree_st" class="form-control">
									<option disabled selected>Select Degree</option>
									<option <?php echo e($student->student_degreesought == "Highschool" ? 'selected' : ''); ?>>Highschool</option>
									<option <?php echo e($student->student_degreesought == "Bachelor's Degree" ? 'selected' : ''); ?>>Bachelor's Degree</option>
									<option <?php echo e($student->student_degreesought == "Master's Degree" ? 'selected' : ''); ?>>Master's Degree</option>
									<option <?php echo e($student->student_degreesought == "Doctoral Degree" ? 'selected' : ''); ?>>Doctoral Degree</option>
								</select>
							</div>
						</div>
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
    <!-- <link rel="stylesheet" type="text/css" href="/css/index.css"/> -->
    <!-- <link rel="stylesheet" type="text/css" href="/css/register.css"/> -->
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/edit_profile.css')); ?>"/>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
	<script src="<?php echo e(asset('js/upload_img.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.userTab', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>