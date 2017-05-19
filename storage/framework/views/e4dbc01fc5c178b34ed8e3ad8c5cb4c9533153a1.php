<?php $__env->startSection('content'); ?>
	<div class="container main-container">
		<div class="col-sm-4 col-sm-offset-1">
			<div class="affix panel panel-default" style="position: relative; margin-bottom: 0; border-radius: 4px 4px 0 0;">
				<div class="panel-body">
					<img src="image/<?php echo e($user->user_imagepath); ?>" class="img-circle img-responsive" style="background-size: cover;" />
				</div>
			</div>

			<form action="/upload" method="POST" enctype="multipart/form-data">
				<?php echo e(csrf_field()); ?>

				<input type="file" class="btn btn-success btn-block <?php echo e($errors->has('image') ? ' has-error' : ''); ?>" name="image" style="border-radius: 0 0 4px 4px; border-top: 0;" value="Upload New" />
				<?php if($errors->has('image')): ?>
					<span class="help-block">
						<strong><?php echo e($errors->first('image')); ?></strong>
					</span>
				<?php endif; ?>
				<!-- <button type="file" class="btn btn-success btn-block" style="border-radius: 0 0 4px 4px; border-top: 0;"><span class="glyphicon glyphicon-upload"></span> Upload New</button> -->
				<input type="submit" />
			</form>

		</div>
		<div class="col-sm-6">
			
				<div class="panel-heading">
					<h1 class="unmargined txt-success">Account Settings</h1>
				</div>
			<div class="panel panel-default">
			<div class="panel-body">
				<div class="form-group">
					<form action="/Change Password" method="POST"  id="changePass">
					    <?php echo e(csrf_field()); ?>

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


				<form action="/Update Profile" method="POST" id="editForm">
					<?php echo e(csrf_field()); ?>

					<!-- <?php echo e(method_field('PUT')); ?> -->
					<div class="panel-body">
						<div class="form-group">

							<label>Name:</label>
							<div class="input-group" >
								<input type="text" name="fname" placeholder="First Name" class="form-control" value="<?php echo e($student->student_fname); ?>" />

								<input type="text" name="lname" placeholder="Last Name" class="form-control" value="<?php echo e($student->student_lname); ?>" />
							</div>

							<label>About Me</label>
							<div class="input-group" >
								<textarea name="aboutme" placeholder="Provide a short description about yourself. (max of 250 characters)" class="form-control"><?php echo e($user->user_aboutme); ?></textarea>
							</div>

							<label>Address:</label>
							<div class="input-group">
							
								<input type="text" name="address" placeholder="e.g. Quitoles Street, San Pedro, San Jose, Antique" class="form-control" value="<?php echo e($student->student_address); ?>"/>
							</div>
							<label>Sex:</label>
							<div class="input-group">
								<div class="radio male">
									<label>
										<input type="radio" name="gender" value="male"  <?php echo e($student->student_gender=="male" ? 'checked='.'"'.'checked'.'"' : ''); ?>>
										<span class="circle"><span class="dot"></span></span>&nbsp;
										<span class="label-text">Male</span>
									</label>
								</div>
								<div class="radio female">
									<label>
										<input type="radio" name="gender"  value="female" <?php echo e($student->student_gender=="female" ? 'checked='.'"'.'checked'.'"' : ''); ?>>
										<span class="circle"><span class="dot">
										</span></span>&nbsp;<span class="label-text">Female</span>
									</label>
								</div>
							</div>
							<label>Birthdate:</label>
							<div class="input-group">
								<input type="date" name="bdate" placeholder="First Name" class="form-control" value="<?php echo e($student->student_birthdate); ?>"/>
							</div>
							<label>Contact Number</label>
							<div class="input-group">
								<input type="text" name="contact" placeholder="09-XXXXXXXXX" value="<?php echo e($user->user_contact); ?>" class="form-control" />
							</div>
							<label>Nationality:</label>
							<div class="input-group">
								<input type="text" name="ntnlty" placeholder="e.g. Filipino, American" class="form-control" value="<?php echo e($student->student_nationality); ?>"/>
							</div>
							<label>Region:</label>
							<div class="input-group">
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
						<hr/>
							<label><span class="glyphicon glyphicon-envelope"></span> Email Address:</label>
							<div class="input-group">
								<input type="text" name="email" placeholder="What's your email Address?" class="form-control"  value="<?php echo e($user->email); ?>"/>
							</div>
						<hr/>
						<div class="form-group">
							<label>University Name:</label>
							<div class="input-group">
								<input type="text" name="univ" placeholder="e.g. University of the Philippines, College of XXXX" class="form-control" value="<?php echo e($student->student_university); ?>"/>
							</div>
							<label>University Address:</label>
							<div class="input-group">
								<input type="text" name="univ_address" placeholder="e.g. Miagao, Iloilo" class="form-control" value="<?php echo e($student->student_universityaddress); ?>"/>
							</div>
							<label>Begin Study:</label>
							<div class="input-group">
								<input type="date" name="begin_study" placeholder="First Name" class="form-control" value="<?php echo e($student->student_beginstudies); ?>"/>
							</div>
							<label>Highest Degree Attained:</label>
							<div class="input-group">
								<select name="degree_att" class="form-control" >
									<option disabled selected>Select Degree</option>
									<option <?php echo e($student->student_highestdegree == "Highschool" ? 'selected' : ''); ?>>Highschool</option>
									<option <?php echo e($student->student_highestdegree == "Bachelor's Degree" ? 'selected' : ''); ?>>Bachelor's Degree</option>
									<option <?php echo e($student->student_highestdegree == "Master's Degree" ? 'selected' : ''); ?>>Master's Degree</option>
									<option <?php echo e($student->student_highestdegree == "Doctoral Degree" ? 'selected' : ''); ?>>Doctoral Degree</option>
								</select>
							</div>
							<label>Study Field:</label>
							<div class="input-group ">
								<input type="text" name="field" placeholder="e.g. BS in Computer Science" class="form-control" value="<?php echo e($student->student_studyfield); ?>" />
							</div>
							<label>Degree Sought:</label>
							<div class="input-group">
								<select name="degree_st" class="form-control">
									<option disabled selected>Select Degree</option>
									<option <?php echo e($student->student_degreesought == "Highschool" ? 'selected' : ''); ?>>Highschool</option>
									<option <?php echo e($student->student_degreesought == "Bachelor's Degree" ? 'selected' : ''); ?>>Bachelor's Degree</option>
									<option <?php echo e($student->student_degreesought == "Master's Degree" ? 'selected' : ''); ?>>Master's Degree</option>
									<option <?php echo e($student->student_degreesought == "Doctoral Degree" ? 'selected' : ''); ?>>Doctoral Degree</option>
								</select>
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