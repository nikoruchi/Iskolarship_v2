 
<?php $__env->startSection('content'); ?>
	<div class="container main-container">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<div class="panel panel-default">
					<div class="panel-body">
						<div>
						<a href="/profile sponsor/scholars" class="back-link btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back to Scholars</a>
						</div>
						<img src="/image/default.jpg" class="profile-picture">
						<h1 class="text-center">Clyde</h1>
						<h2 class="heading text-center">Bs in Computer Science</h2>
						<h2 class="heading text-center">University of the Philippines</h2>
						<h4 class="text-center">cjubs.delgado@gmail.com</h3>
						<p class="text-center">About me chu chu.</p>
						<h2>Family Background</h2>
						<div class="row">
							<div class="col-sm-6">
								<h3>Father</h3>		
								<p>Father Name</p>
								<p>Work</p>
								<p>Education</p>
								<p>Tribal Affi</p>
								<p>Employer Name</p>
								<p>Employer Address</p>
								<p>Annual Gross Income</p>
								<p>Self Annual Gross Income</p>
							</div>
							<div class="col-sm-6">
								<h3>Mother</h3>		
								<p>Father Name</p>
								<p>Work</p>
								<p>Education</p>
								<p>Tribal Affi</p>
								<p>Employer Name</p>
								<p>Employer Address</p>
								<p>Annual Gross Income</p>
								<p>Self Annual Gross Income</p>
							</div>
						</div>
						<h2>Siblings enjoying Scholarships</h2>
						<table class="table">
							<tr>
								<th>Name</th>
								<th>Scholarship</th>
								<th>Course &amp; College/University</th>
							</tr>
							<!-- Echo sibling here -->
						</table>
						<h2>Relatives Contributing</h2>
						<table class="table">
							<tr>
								<th>Relative's Name</th>
								<th>Nature of Financial Contribution</th>
								<th>Relationship with the Applicant</th>
								<th>Average Contribution</th>
							</tr>
							<!-- Echo relaties Here -->
						</table>
						<p>Is a beneficiary of Pantawid Pamilyang Pilipino Program (4ps)</p>
						<p>The housing unit is rent free or with relatives.</p>
						<p>Monthly rental</p>
						<p>Monthly amortization</p>
						<table class="table">
							<tr>
								<th>Appliances/Vehicle</th>
								<th>No. of working units</th>
								<th>Mode of Acquisition</th>
							</tr>
							<tr>
								<td>Aircondition</td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>Video Camera/Movie Camera</td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>Car/Van/Pajero/Other similar vehicle</td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>Jeepney (AUV/Owner Type)</td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>Ipad/Ipod</td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>Industrial Freezer</td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>Industrial Dryer</td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>Electric water pump</td>
								<td></td>
								<td></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>	

<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/application.css')); ?>"/>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.userTab', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>