<?php $__env->startSection('content'); ?>
	<div class="container main-container">
		<div class="col-sm-6 col-sm-offset-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h1 class="unmargined txt-success">Register<small> as a Student. <span class="glyphicon glyphicon-education"></span></small></h1>
				</div>
				<form action="/registration/Student" method="post">
					<?php echo e(csrf_field()); ?>


					<div class="panel-body">
						<h2 class="unmargined"><small><span class="glyphicon glyphicon-list-alt"></span> Personal Information</small><span class="section well">1</span></h2>
						<div class="form-group">
							<label>Name:</label>
							<div class="input-group
							<?php echo e($errors->has('fname') ? ' has-error' : '',
								$errors->has('lname') ? ' has-error' : ''); ?>" >
								<input type="text" name="fname" placeholder="First Name" class="form-control" value="<?php echo e(old('fname')); ?>" />

								<?php if($errors->has('fname')): ?>
									<span class="help-block">
										<strong><?php echo e($errors->first('fname')); ?></strong>
									</span>
								<?php endif; ?>

								<!-- FIX PLS. CSS. -->
								<!-- <span class="input-group-addon"></span> --> 

								<input type="text" name="lname" placeholder="Last Name" class="form-control" value="<?php echo e(old('lname')); ?>" />

								<?php if($errors->has('lname')): ?>
									<span class="help-block">
										<strong><?php echo e($errors->first('lname')); ?></strong>
									</span>
								<?php endif; ?>

							</div>

							<label>Address:</label>
							<div class="input-group <?php echo e($errors->has('address') ? ' has-error' : ''); ?> ">
							
								<input type="text" name="address" placeholder="e.g. Quitoles Street, San Pedro, San Jose, Antique" class="form-control" value="<?php echo e(old('address')); ?>"/>

								<?php if($errors->has('address')): ?>
									<span class="help-block">
										<strong><?php echo e($errors->first('address')); ?></strong>
									</span>
								<?php endif; ?>

							</div>
							<label>Sex:</label>
							<div class="input-group <?php echo e($errors->has('gender') ? ' has-error' : ''); ?> ">
								<div class="radio male">
									<label>
										<input type="radio" name="gender" value="male"  <?php echo e(old('gender')=="male" ? 'checked='.'"'.'checked'.'"' : ''); ?>>
										<span class="circle"><span class="dot"></span></span>&nbsp;
										<span class="label-text">Male</span>
									</label>
								</div>
								<div class="radio female">
									<label>
										<input type="radio" name="gender"  value="female" <?php echo e(old('gender')=="female" ? 'checked='.'"'.'checked'.'"' : ''); ?>>
										<span class="circle"><span class="dot">
										</span></span>&nbsp;<span class="label-text">Female</span>
									</label>
								</div>

								<?php if($errors->has('gender')): ?>
									<span class="help-block">
										<strong><?php echo e($errors->first('gender')); ?></strong>
									</span>
								<?php endif; ?>

							</div>
							<label>Birthdate:</label>
							<div class="input-group <?php echo e($errors->has('bdate') ? ' has-error' : ''); ?> ">
								<input type="date" name="bdate" placeholder="First Name" class="form-control" value="<?php echo e(old('bdate')); ?>"/>

								<?php if($errors->has('bdate')): ?>
									<span class="help-block">
										<strong><?php echo e($errors->first('bdate')); ?></strong>
									</span>
								<?php endif; ?>

							</div>
							<label>Contact Number</label>
							<div class="input-group <?php echo e($errors->has('contact') ? ' has-error' : ''); ?> ">
								<input type="text" name="contact" placeholder="09-XXXXXXXXX" value="<?php echo e(old('contact')); ?>" class="form-control" />

								<?php if($errors->has('contact')): ?>
									<span class="help-block">
										<strong><?php echo e($errors->first('contact')); ?></strong>
									</span>
								<?php endif; ?>

							</div>
							<label>Nationality:</label>
							<div class="input-group <?php echo e($errors->has('ntnlty') ? ' has-error' : ''); ?> ">
								<input type="text" name="ntnlty" placeholder="e.g. Filipino, American" class="form-control" value="<?php echo e(old('ntnlty')); ?>"/>

								<?php if($errors->has('ntnlty')): ?>
									<span class="help-block">
										<strong><?php echo e($errors->first('ntnlty')); ?></strong>
									</span>
								<?php endif; ?>

							</div>
							<label>Region:</label>
							<div class="input-group <?php echo e($errors->has('region') ? ' has-error' : ''); ?> ">
								<select name="region" class="form-control">
									<option disabled selected>Select Region</option>
									<optgroup label="Philippines">
										<optgroup label="LUZON">
											<option <?php echo e(old('region') == "NCR" ? 'selected' : ''); ?>>NCR</option>
											<option <?php echo e(old('region') == "Region I" ? 'selected' : ''); ?>>Region I</option>
											<option <?php echo e(old('region') == "CAR" ? 'selected' : ''); ?>>CAR</option>
											<option <?php echo e(old('region') == "Region II" ? 'selected' : ''); ?>>Region II</option>
											<option <?php echo e(old('region') == "Region III" ? 'selected' : ''); ?>>Region III</option>
											<option <?php echo e(old('region') == "Region IV-A" ? 'selected' : ''); ?>>Region IV-A</option>
											<option <?php echo e(old('region') == "MIMAROPA" ? 'selected' : ''); ?>>MIMAROPA</option>
											<option <?php echo e(old('region') == "Region IV-B" ? 'selected' : ''); ?>>Region IV-B</option>
											<option <?php echo e(old('region') == "Region V" ? 'selected' : ''); ?>>Region V</option>
										</optgroup>
										<optgroup label="VISAYAS">
											<option <?php echo e(old('region') == "Region VI" ? 'selected' : ''); ?>>Region VI</option>
											<option <?php echo e(old('region') == "Region VII" ? 'selected' : ''); ?>>Region VII</option>
											<option <?php echo e(old('region') == "Region VIII" ? 'selected' : ''); ?>>Region VIII</option>
											<option <?php echo e(old('region') == "Region XVIII" ? 'selected' : ''); ?>>Region XVIII</option>
										</optgroup>
										<optgroup label="MINDANAO">
											<option <?php echo e(old('region') == "Region IX" ? 'selected' : ''); ?>>Region IX</option>
											<option <?php echo e(old('region') == "Region X" ? 'selected' : ''); ?>>Region X</option>
											<option <?php echo e(old('region') == "Region XI" ? 'selected' : ''); ?>>Region XI</option>
											<option <?php echo e(old('region') == "Region XII" ? 'selected' : ''); ?>>Region XII</option>
											<option <?php echo e(old('region') == "Region XIII" ? 'selected' : ''); ?>>Region XIII</option>
											<option <?php echo e(old('region') == "ARMM" ? 'selected' : ''); ?>>ARMM</option>
										</optgroup>
									</optgroup>
									<optgroup label="Outside the Philippines">
										<option <?php echo e(old('region') == "Outside the Philippines" ? 'selected' : ''); ?>>Outside the Philippines</option>
									</optgroup>
								</select>

								<?php if($errors->has('region')): ?>
									<span class="help-block">
										<strong><?php echo e($errors->first('region')); ?></strong>
									</span>
								<?php endif; ?>

							</div>
						</div>
						<hr/>
						<h2 class="unmargined"><small><span class="glyphicon glyphicon-user"></span> Account Details</small><span class="section well">2</span></h2>
							<label><span class="glyphicon glyphicon-envelope"></span> Email Address:</label>
							<div class="input-group <?php echo e($errors->has('email') ? ' has-error' : ''); ?> ">
								<input type="text" name="email" placeholder="What's your email Address?" class="form-control"  value="<?php echo e(old('email')); ?>"/>

								<?php if($errors->has('email')): ?>
									<span class="help-block">
										<strong><?php echo e($errors->first('email')); ?></strong>
									</span>
								<?php endif; ?>

							</div>
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
								<input type="password" name="repassword" placeholder="Create a secure password. Minimum of 6 characters" class="form-control" />

								<?php if($errors->has('repassword')): ?>
									<span class="help-block">
										<strong><?php echo e($errors->first('repassword')); ?></strong>
									</span>
								<?php endif; ?>

							</div>

						<hr/>
						<h2 class="unmargined"><small><span class="glyphicon glyphicon-education"></span> Current Education</small><span class="section well">3</span></h2>
						<div class="form-group">
							<label>University Name:</label>
							<div class="input-group <?php echo e($errors->has('univ') ? ' has-error' : ''); ?> ">
								<input type="text" name="univ" placeholder="e.g. University of the Philippines, College of XXXX" class="form-control" value="<?php echo e(old('univ')); ?>"/>

								<?php if($errors->has('univ')): ?>
									<span class="help-block">
										<strong><?php echo e($errors->first('univ')); ?></strong>
									</span>
								<?php endif; ?>

							</div>
							<label>University Address:</label>
							<div class="input-group <?php echo e($errors->has('univ_address') ? ' has-error' : ''); ?> ">
								<input type="text" name="univ_address" placeholder="e.g. Miagao, Iloilo" class="form-control" value="<?php echo e(old('univ_address')); ?>"/>

								<?php if($errors->has('univ_address')): ?>
									<span class="help-block">
										<strong><?php echo e($errors->first('univ_address')); ?></strong>
									</span>
								<?php endif; ?>

							</div>
							<label>Begin Study:</label>
							<div class="input-group <?php echo e($errors->has('begin_study') ? ' has-error' : ''); ?> ">
								<input type="date" name="begin_study" placeholder="First Name" class="form-control" value="<?php echo e(old('begin_study')); ?>"/>

								<?php if($errors->has('begin_study')): ?>
									<span class="help-block">
										<strong><?php echo e($errors->first('begin_study')); ?></strong>
									</span>
								<?php endif; ?>

							</div>
							<label>Highest Degree Attained:</label>
							<div class="input-group <?php echo e($errors->has('degree_att') ? ' has-error' : ''); ?> ">
								<select name="degree_att" class="form-control" value="<?php echo e(old('degree_att')); ?>">
									<option disabled selected>Select Degree</option>
									<option <?php echo e(old('degree_att') == "Highschool" ? 'selected' : ''); ?>>Highschool</option>
									<option <?php echo e(old('degree_att') == "Bachelor's Degree" ? 'selected' : ''); ?>>Bachelor's Degree</option>
									<option <?php echo e(old('degree_att') == "Master's Degree" ? 'selected' : ''); ?>>Master's Degree</option>
									<option <?php echo e(old('degree_att') == "Doctoral Degree" ? 'selected' : ''); ?>>Doctoral Degree</option>
								</select>

								<?php if($errors->has('degree_att')): ?>
									<span class="help-block">
										<strong><?php echo e($errors->first('degree_att')); ?></strong>
									</span>
								<?php endif; ?>

							</div>
							<label>Study Field:</label>
							<div class="input-group <?php echo e($errors->has('field') ? ' has-error' : ''); ?> ">
								<input type="text" name="field" placeholder="e.g. BS in Computer Science" class="form-control" value="<?php echo e(old('field')); ?>" />

								<?php if($errors->has('field')): ?>
									<span class="help-block">
										<strong><?php echo e($errors->first('field')); ?></strong>
									</span>
								<?php endif; ?>

							</div>
							<label>Degree Sought:</label>
							<div class="input-group <?php echo e($errors->has('degree_st') ? ' has-error' : ''); ?> ">
								<select name="degree_st" class="form-control">
									<option disabled selected>Select Degree</option>
									<option <?php echo e(old('degree_st') == "Highschool" ? 'selected' : ''); ?>>Highschool</option>
									<option <?php echo e(old('degree_st') == "Bachelor's Degree" ? 'selected' : ''); ?>>Bachelor's Degree</option>
									<option <?php echo e(old('degree_st') == "Master's Degree" ? 'selected' : ''); ?>>Master's Degree</option>
									<option <?php echo e(old('degree_st') == "Doctoral Degree" ? 'selected' : ''); ?>>Doctoral Degree</option>
								</select>

								<?php if($errors->has('degree_st')): ?>
									<span class="help-block">
										<strong><?php echo e($errors->first('degree_st')); ?></strong>
									</span>
								<?php endif; ?> 
							</div>
						</div>
					</div>
					<div class="panel-footer overflow-a">
						<button type="submit" class="btn btn-success pull-right">
							<span class="glyphicon glyphicon-user register"><span class="register-icon">+</span></span>&nbsp;&nbsp;Register
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.registerGuest", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>