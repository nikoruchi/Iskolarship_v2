<?php $__env->startSection('content'); ?>
	<div class="container main-container">
		<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<form id="setup-form" method="get" action="/setup form/register">
							<h1 class="text-center">Account Setup</h1>
							<hr>
							<h3 class="text-center">Family Background</h3>
							<div class="row">
								<div class="col-sm-6">
									<div class="well">
										<h4 class="text-center">Father</h4>	
										<div class="text-center radio-btns">
											<label class="radio-inline"><input type="radio" name="father_status" value="liv" checked>Living</label>
											<label class="radio-inline"><input type="radio" name="father_status" value="dec">Deceased</label>
											<label class="radio-inline"><input type="radio" name="father_status" value="step">Stepfather</label>
										</div>
										<input type="text" class="form-control" value="Jeopet Ardales Delgado" name="father_name" placeholder="Name"/>
										<input type="text" class="form-control" value="Self-employed" name="father_occ" placeholder="Occupation"/>
										<input type="text" class="form-control" value="College" name="father_edu" placeholder="Educational Attainment"/>
										<input type="text" class="form-control" value="None" name="father_trib" placeholder="Tribal Affiliation"/>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="well">
										<h4 class="text-center">Mother</h4>	
										<div class="text-center radio-btns">
											<label class="radio-inline"><input type="radio" name="mother_status" value="liv" checked>Living</label>
											<label class="radio-inline"><input type="radio" name="mother_status" value="dec">Deceased</label>
											<label class="radio-inline"><input type="radio" name="mother_status" value="step">Stepmother</label>
										</div>
										<input type="text" class="form-control" value="May Joy Delgado" name="mother_name" placeholder="Name"/>
										<input type="text" class="form-control" value="Self-employed" name="mother_occ" placeholder="Occupation"/>
										<input type="text" class="form-control" value="College" name="mother_edu" placeholder="Educational Attainment"/>
										<input type="text" class="form-control" value="None" name="mother_trib" placeholder="Tribal Affiliation"/>
									</div>
								</div>
							</div>
							<hr>
							<h4>Brothers/Sisters Enjoying Scholarship</h4>
							<div class="table-responsive">
								<table class="table siblings" id="siblings">
									<tr>
										<th>Name</th>
										<th>Scholarship</th>
										<th>Course &amp; College/University</th>
									</tr>
								</table>
							</div>
							<div class="form-group sibling-form">
								<div class="col-xs-4">
									<input class="form-control" name="sib_name" value="Gianne Frances Delgado" id="sib_name" type="text" placeholder="Name">
								</div>
								<div class="col-xs-4">
									<input class="form-control" name="sib_scholarship" value="DOST" id="sib_scholarship" type="text" placeholder="Scholarship">
								</div>
								<div class="col-xs-4">
									<input class="form-control" name="sib_school" value="University of the Philippines" id="sib_school" type="text" placeholder="Course & College/University">
								</div>
							</div>
							<button type="button" class="btn btn-success btn-block add-sib" id="add-sib-btn">Add Sibling <span class="glyphicon glyphicon-plus"></span></button>
							<hr>
							<h3>Financial and Socio-economic Information</h3>
							<div class="row">
								<div class="col-sm-12">
									<h3 class="text-center">Employer Details</h3>
								</div>
								<div class="col-sm-6">
									<div class="well">
										<h4 class="text-center">Father</h4>
										<input type="text" class="form-control" value="None" name="father_emp_name" placeholder="Employer name"/>
										<input type="text" class="form-control" value="None" name="father_emp_add" placeholder="Employer address"/>
										<label>Annual Gross Income. <span class="further-info">(in pesos)</span></label>
										<input type="number" class="form-control" value="60000" min="0" name="father_income" placeholder="Annual gross income"/>
										<span>If self-employed, declare income here.</span>
										<input type="number" class="form-control" value="60000" min="0" name="father_self_income" placeholder="Annual gross income"/>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="well">
										<h4 class="text-center">Mother</h4>
										<input type="text" class="form-control" value="None" name="mother_emp_name" placeholder="Employer name"/>
										<input type="text" class="form-control" value="None" name="mother_emp_add" placeholder="Employer address"/>
										<label>Annual Gross Income. <span class="further-info">(in pesos)</span></label>
										<input type="number" class="form-control" value="60000" min="0" name="mother_income" placeholder="Annual gross income"/>
										<span>If self-employed, declare income here.</span>
										<input type="number" class="form-control" value="60000" min="0" name="mother_self_income" placeholder="Annual gross income"/>
									</div>
								</div>
								<div class="col-sm-12">
									<h4>Relatives who contribute to your family expenses, <span class="further-details">If both parents are unemployed</span></h4>
									<div class="table-responsive">
										<table class="table relatives" id="relatives">
											<tr>
												<th>Relative's Name</th>
												<th>Nature of Financial Contribution</th>
												<th>Relationship with the Applicant</th>
												<th>Average Contribution</th>
											</tr>
										</table>
									</div>
									<div class="form-group sibling-form">
										<div class="col-xs-3">
											<input class="form-control" value="Lendion Nonaillada" name="rel_name" id="rel_name" type="text" placeholder="Relative's Name">
										</div>
										<div class="col-xs-3">
											<input class="form-control" value="Work" name="rel_nat" id="rel_nat" type="text" placeholder="Nature of Financial Contribution">
										</div>
										<div class="col-xs-3">
											<input class="form-control" value="Uncle" name="rel_rel" id="rel_rel" type="text" placeholder="Relationship with the Applicant">
										</div>
										<div class="col-xs-3">
											<input class="form-control" value="60000" name="rel_con" id="rel_con" min="0" type="number" placeholder="Average Contribution">
										</div>
									</div>
									<button type="button" class="btn btn-success btn-block add-rel" id="add-rel-btn">Add Relative <span class="glyphicon glyphicon-plus"></span></button>
								</div>
							</div>
							<hr>
							<div class="col-sm-12">
								<label>Is your family a beneficiary of the DSWD's <i>Pantawid Pamilyang Pilipino Program</i> (4ps)</label>
								<label class="radio-inline"><input type="radio" value="yes" name="Fourps">Yes</label>
								<label class="radio-inline"><input type="radio" value="no" name="Fourps" checked>No</label>
								<br>
								<div class="house-unit-form">
									<label>Owner of the housing unit:</label>
									<div class="radio"><label><input type="radio" value="own_paid" name="h_unit">Owned, Fully Paid</label></div>
									<div class="radio"><label><input type="radio" value="own_amo" name="h_unit">Owned, Amortized</label></div>
									<div class="radio"><label><input type="radio" value="own_ren" name="h_unit">Rented</label></div>
									<div class="radio"><label><input type="radio" value="own_fre" name="h_unit" checked>Rent Free/with Relatives</label></div>
									<!-- <div class="radio"><label><input type="radio" value="other" name="h_unit">Others</label></div> -->
									<!-- <input type="text" name="h_unit_other" class="form-control other-h-text" placeholder="If others, specify"> -->
									<div class="form-inline">
										<label>If rented, how much is the monthly rental?</label>
										<input type="text" class="form-control" name="mon_rent" placeholder="e.g. 5,000" value="5000">
									</div>
									<div class="form-inline">
										<label>If amortized, how much is the monthly amortization?</label>
										<input type="text" class="form-control" name="mon_amor" placeholder="e.g. 5,000" value="0">
									</div>
								</div>
							</div>
							<div class="col-sm-12">
									<h4>Does your family own any of the following appliances, facilities, and vehicles?</h4>
									<div class="table-responsive">
										<table class="table things">
											<tr>
												<th>Appliances/Vehicle</th>
												<th>No. of working units</th>
												<th>Mode of Acquisition</th>
												<!-- <th>Estimated Date Acquired</th> -->
											</tr>
											<tr>
												<td>Aircondition</td>
												<td><input class="form-control" type="number" value="0" min="0" name="ac_no"></td>
												<td><input class="form-control" type="text" value="None" name="ac_mod_acq"></td>
												<!-- <td><input class="form-control" type="date" name="ac_date"></td> -->
											</tr>
											<tr>
												<td>Video Camera/Movie Camera</td>
												<td><input class="form-control" type="number" value="0" min="0" name="cam_no"></td>
												<td><input class="form-control" type="text" value="None" name="cam_mod_acq"></td>
												<!-- <td><input class="form-control" type="date" name="cam_date"></td> -->
											</tr>
											<tr>
												<td>Car/Van/Pajero/Other similar vehicle</td>
												<td><input class="form-control" type="number" value="0" min="0" name="veh_no"></td>
												<td><input class="form-control" type="text" value="None" name="veh_mod_acq"></td>
												<!-- <td><input class="form-control" type="date" name="veh_date"></td> -->
											</tr>
											<tr>
												<td>Jeepney (AUV/Owner Type)</td>
												<td><input class="form-control" type="number" value="0" min="0" name="jeep_no"></td>
												<td><input class="form-control" type="text" value="None" name="jeep_mod_acq"></td>
												<!-- <td><input class="form-control" type="date" name="jeep_date"></td> -->
											</tr>
											<tr>
												<td>Ipad/Ipod</td>
												<td><input class="form-control" type="number" value="0" min="0" name="ip_no"></td>
												<td><input class="form-control" type="text" value="None" name="ip_mod_acq"></td>
												<!-- <td><input class="form-control" type="date" name="ip_date"></td> -->
											</tr>
											<tr>
												<td>Laptop/Desktop</td>
												<td><input class="form-control" type="number" value="0" min="0" name="com_no"></td>
												<td><input class="form-control" type="text" value="None" name="com_mod_acq"></td>
												<!-- <td><input class="form-control" type="date" name="com_date"></td> -->
											</tr>
											<tr>
												<td>Industrial Freezer</td>
												<td><input class="form-control" type="number" value="0" min="0" name="frz_no"></td>
												<td><input class="form-control" type="text" value="None" name="frz_mod_acq"></td>
												<!-- <td><input class="form-control" type="date" name="frz_date"></td> -->
											</tr>
											<tr>
												<td>Industrial Dryer</td>
												<td><input class="form-control" type="number" value="0" min="0" name="dry_no"></td>
												<td><input class="form-control" type="text" value="None" name="dry_mod_acq"></td>
												<!-- <td><input class="form-control" type="date" name="dry_date"></td> -->
											</tr>
											<tr>
												<td>Electric Water Pump</td>
												<td><input class="form-control" type="number" value="0" min="0" name="pmp_no"></td>
												<td><input class="form-control" type="text" value="None" name="pmp_mod_acq"></td>
												<!-- <td><input class="form-control" type="date" name="pmp_year"></td> -->
											</tr>
										</table>
									</div>
								</div>

								<button type="submit" class="btn btn-success btn-block btn-lg btn-setup"><span class="glyphicon glyphicon-refresh"></span> Setup Account</button>
						</form>
						<!-- <form id="setup-form" action="/setup form/register">
							<h1 class="text-center">Account Setup</h1>
							<hr>
							<h3 class="text-center">Family Background</h3>
							<div class="row">
								<div class="col-sm-6">
									<div class="well">
										<h4 class="text-center">Father</h4>	
										<div class="text-center radio-btns">
											<label class="radio-inline"><input type="radio" name="father_status" value="liv">Living</label>
											<label class="radio-inline"><input type="radio" name="father_status" value="dec">Deceased</label>
											<label class="radio-inline"><input type="radio" name="father_status" value="step">Stepfather</label>
										</div>
										<input type="text" class="form-control" name="father_name" placeholder="Name"/>
										<input type="text" class="form-control" name="father_occ" placeholder="Occupation"/>
										<input type="text" class="form-control" name="father_edu" placeholder="Educational Attainment"/>
										<input type="text" class="form-control" name="father_trib" placeholder="Tribal Affiliation"/>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="well">
										<h4 class="text-center">Mother</h4>	
										<div class="text-center radio-btns">
											<label class="radio-inline"><input type="radio" name="mother_status" value="liv">Living</label>
											<label class="radio-inline"><input type="radio" name="mother_status" value="dec">Deceased</label>
											<label class="radio-inline"><input type="radio" name="mother_status" value="step">Stepmother</label>
										</div>
										<input type="text" class="form-control" name="mother_name" placeholder="Name"/>
										<input type="text" class="form-control" name="mother_occ" placeholder="Occupation"/>
										<input type="text" class="form-control" name="mother_edu" placeholder="Educational Attainment"/>
										<input type="text" class="form-control" name="mother_trib" placeholder="Tribal Affiliation"/>
									</div>
								</div>
							</div>
							<hr>
							<h4>Brothers/Sisters Enjoying Scholarship</h4>
							<div class="table-responsive">
								<table class="table siblings" id="siblings">
									<tr>
										<th>Name</th>
										<th>Scholarship</th>
										<th>Course &amp; College/University</th>
									</tr>
								</table>
							</div>
							<div class="form-group sibling-form">
								<div class="col-xs-4">
									<input class="form-control" name="sib_name" id="sib_name" type="text" placeholder="Name">
								</div>
								<div class="col-xs-4">
									<input class="form-control" name="sib_scholarship" id="sib_scholarship" type="text" placeholder="Scholarship">
								</div>
								<div class="col-xs-4">
									<input class="form-control" name="sib_school" id="sib_school" type="text" placeholder="Course & College/University">
								</div>
							</div>
							<button type="button" class="btn btn-success btn-block add-sib" id="add-sib-btn">Add Sibling <span class="glyphicon glyphicon-plus"></span></button>
							<hr>
							<h3>Financial and Socio-economic Information</h3>
							<div class="row">
								<div class="col-sm-12">
									<h3 class="text-center">Employer Details</h3>
								</div>
								<div class="col-sm-6">
									<div class="well">
										<h4 class="text-center">Father</h4>
										<input type="text" class="form-control" name="father_emp_name" placeholder="Employer name"/>
										<input type="text" class="form-control" name="father_emp_add" placeholder="Employer address"/>
										<label>Annual Gross Income. <span class="further-info">(in pesos)</span></label>
										<input type="text" class="form-control" name="father_income" placeholder="Annual gross income"/>
										<span>If self-employed, declare income here.</span>
										<input type="text" class="form-control" name="father_self_income" placeholder="Annual gross income"/>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="well">
										<h4 class="text-center">Mother</h4>
										<input type="text" class="form-control" name="mother_emp_name" placeholder="Employer name"/>
										<input type="text" class="form-control" name="mother_emp_add" placeholder="Employer address"/>
										<label>Annual Gross Income. <span class="further-info">(in pesos)</span></label>
										<input type="text" class="form-control" name="mother_income" placeholder="Annual gross income"/>
										<span>If self-employed, declare income here.</span>
										<input type="text" class="form-control" name="mother_self_income" placeholder="Annual gross income"/>
									</div>
								</div>
								<div class="col-sm-12">
									<h4>Relatives who contribute to your family expenses, <span class="further-details">If both parents are unemployed</span></h4>
									<div class="table-responsive">
										<table class="table relatives" id="relatives">
											<tr>
												<th>Relative's Name</th>
												<th>Nature of Financial Contribution</th>
												<th>Relationship with the Applicant</th>
												<th>Average Contribution</th>
											</tr>
										</table>
									</div>
									<div class="form-group sibling-form">
										<div class="col-xs-3">
											<input class="form-control" name="rel_name" id="rel_name" type="text" placeholder="Relative's Name">
										</div>
										<div class="col-xs-3">
											<input class="form-control" name="rel_nat" id="rel_nat" type="text" placeholder="Nature of Financial Contribution">
										</div>
										<div class="col-xs-3">
											<input class="form-control" name="rel_rel" id="rel_rel" type="text" placeholder="Relationship with the Applicant">
										</div>
										<div class="col-xs-3">
											<input class="form-control" name="rel_con" id="rel_con" type="text" placeholder="Average Contribution">
										</div>
									</div>
									<button type="button" class="btn btn-success btn-block add-rel" id="add-rel-btn">Add Relative <span class="glyphicon glyphicon-plus"></span></button>
								</div>
							</div>
							<hr>
							<div class="col-sm-12">
								<label>Is your family a beneficiary of the DSWD's <i>Pantawid Pamilyang Pilipino Program</i> (4ps)</label>
								<label class="radio-inline"><input type="radio" value="yes" name="Fourps">Yes</label>
								<label class="radio-inline"><input type="radio" value="no" name="Fourps">No</label>
								<br>
								<div class="house-unit-form">
									<label>Owner of the housing unit:</label>
									<div class="radio"><label><input type="radio" value="own_paid" name="h_unit">Owned, Fully Paid</label></div>
									<div class="radio"><label><input type="radio" value="own_amo" name="h_unit">Owned, Amortized</label></div>
									<div class="radio"><label><input type="radio" value="own_ren" name="h_unit">Rented</label></div>
									<div class="radio"><label><input type="radio" value="own_fre" name="h_unit">Rent Free/with Relatives</label></div>
									<div class="form-inline">
										<label>If rented, how much is the monthly rental?</label>
										<input type="text" class="form-control" name="mon_rent" placeholder="e.g. 5,000">
									</div>
									<div class="form-inline">
										<label>If amortized, how much is the monthly amortization?</label>
										<input type="text" class="form-control" name="mon_amor" placeholder="e.g. 5,000">
									</div>
								</div>
							</div>
							<div class="col-sm-12">
									<h4>Does your family own any of the following appliances, facilities, and vehicles?</h4>
									<div class="table-responsive">
										<table class="table things">
											<tr>
												<th>Appliances/Vehicle</th>
												<th>No. of working units</th>
												<th>Mode of Acquisition</th>
											</tr>
											<tr>
												<td>Aircondition</td>
												<td><input class="form-control" type="number" min="0" name="ac_no"></td>
												<td><input class="form-control" type="text" name="ac_mod_acq"></td>
											</tr>
											<tr>
												<td>Video Camera/Movie Camera</td>
												<td><input class="form-control" type="number" min="0" name="cam_no"></td>
												<td><input class="form-control" type="text" name="cam_mod_acq"></td>
											</tr>
											<tr>
												<td>Car/Van/Pajero/Other similar vehicle</td>
												<td><input class="form-control" type="number" min="0" name="veh_no"></td>
												<td><input class="form-control" type="text" name="veh_mod_acq"></td>
											</tr>
											<tr>
												<td>Jeepney (AUV/Owner Type)</td>
												<td><input class="form-control" type="number" min="0" name="jeep_no"></td>
												<td><input class="form-control" type="text" name="jeep_mod_acq"></td>
											</tr>
											<tr>
												<td>Ipad/Ipod</td>
												<td><input class="form-control" type="number" min="0" name="ip_no"></td>
												<td><input class="form-control" type="text" name="ip_mod_acq"></td>
											</tr>
											<tr>
												<td>Laptop/Desktop</td>
												<td><input class="form-control" type="number" min="0" name="com_no"></td>
												<td><input class="form-control" type="text" name="com_mod_acq"></td>
											</tr>
											<tr>
												<td>Industrial Freezer</td>
												<td><input class="form-control" type="number" min="0" name="frz_no"></td>
												<td><input class="form-control" type="text" name="frz_mod_acq"></td>
											</tr>
											<tr>
												<td>Industrial Dryer</td>
												<td><input class="form-control" type="number" min="0" name="dry_no"></td>
												<td><input class="form-control" type="text" name="dry_mod_acq"></td>
											</tr>
											<tr>
												<td>Electric Water Pump</td>
												<td><input class="form-control" type="number" min="0" name="pmp_no"></td>
												<td><input class="form-control" type="text" name="pmp_mod_acq"></td>
											</tr>
										</table>
									</div>
								</div>

								<button type="submit" class="btn btn-success btn-block btn-lg btn-setup"><span class="glyphicon glyphicon-refresh"></span> Setup Account</button>
						</form> -->
					</div>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/scholar_setup_form.css')); ?>"/>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
	<script type="text/javascript" src="<?php echo e(asset('js/scholar_setup.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.userTab', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>