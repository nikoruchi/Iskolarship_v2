 
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
						<h1 class="text-center"><?php echo e($app->scholar->student_fname); ?> <?php echo e($app->scholar->student_lname); ?></h1>
						<h2 class="heading text-center"><?php echo e($app->scholar->study_field); ?></h2>
						<h2 class="heading text-center"><?php echo e($app->scholar->student_university); ?></h2>
						<h4 class="text-center"><?php echo e($app->scholar->student->email); ?></h3>
						<p class="text-center"><?php echo e($app->scholar->student->user_aboutme); ?></p>
						<h2>Family Background</h2>
						<div class="row">
							<div class="col-sm-6">
								<h3>Father</h3>		
								<p><?php echo e($app->scholar->parents->father_name); ?></p>
								<p><?php echo e($app->scholar->parents->father_occupation); ?></p>
								<p><?php echo e($app->scholar->parents->father_education); ?></p>
								<p><?php echo e($app->scholar->parents->father_tribe); ?></p>
								<p><?php echo e($app->scholar->financial->father_employername); ?></p>
								<p><?php echo e($app->scholar->financial->father_employeraddress); ?></p>
								<p><?php echo e($app->scholar->financial->father_AGincome); ?></p>
								<p><?php echo e($app->scholar->financial->father_selfAGincome); ?></p>
							</div>
							<div class="col-sm-6">
								<h3>Mother</h3>		
								<p><?php echo e($app->scholar->parents->mother_name); ?></p>
								<p><?php echo e($app->scholar->parents->mother_occupation); ?></p>
								<p><?php echo e($app->scholar->parents->mother_education); ?></p>
								<p><?php echo e($app->scholar->parents->mother_tribe); ?></p>
								<p><?php echo e($app->scholar->financial->mother_employername); ?></p>
								<p><?php echo e($app->scholar->financial->mother_employeraddress); ?></p>
								<p><?php echo e($app->scholar->financial->mother_AGincome); ?></p>
								<p><?php echo e($app->scholar->financial->mother_selfAGincome); ?></p>
							</div>
						</div>
						<h2>Siblings enjoying Scholarships</h2>
						<table class="table">
							<?php if($siblings->count()>0): ?>
							<tr>
								<th><?php echo e($siblings->sibling_name); ?></th>
								<th><?php echo e($siblings->sibling_scholarship); ?></th>
								<th><?php echo e($siblings->sibling_courseschool); ?></th>
							</tr>
							<?php endif; ?>
							<!-- Echo sibling here -->
						</table>
						<h2>Relatives Contributing</h2>
						<table class="table">
							<?php if($relatives->count()>0): ?>
							<tr>
								<th><?php echo e($relatives->relative_name); ?></th>
								<th><?php echo e($relatives->relative_natureofcontribution); ?></th>
								<th><?php echo e($relatives->relative_relationship); ?></th>
								<th><?php echo e($relatives->relative_averagecontribution); ?></th>
							</tr>
							<?php endif; ?>
							
							<!-- Echo relaties Here -->
						</table>
						<?php if($four=='yes'): ?>
						<p>Is a beneficiary of Pantawid Pamilyang Pilipino Program (4ps)</p>
						<?php endif; ?>
						<?php if($type=='own_paid'): ?>
						<p>The house is owned and fully paid.</p>
						<?php elseif($type=='own_amo'): ?>
						<p>The house is owned and was amortized.</p>
						<?php elseif($type=='own_ren'): ?>
						<p>The housing unit us rented.</p>
						<?php elseif($type=='own_fre'): ?>
						<p>The housing unit rent is free or with relatives.</p>
						<?php endif; ?>

						<p>Monthly rental: <?php echo e($app->scholar->financial->housing_rental); ?></p>
						<p>Monthly amortization: <?php echo e($app->scholar->financial->housing_amortization); ?></p>
						<table class="table">
							<tr>
								<th>Appliances/Vehicle</th>
								<th>No. of working units</th>
								<th>Mode of Acquisition</th>
							</tr>
							<tr>
								<td>Aircondition</td>
								<td><?php echo e($app->scholar->appliances->aircon_num); ?></td>
								<td><?php echo e($app->scholar->appliances->aircon_acquisition); ?></td>
							</tr>
							<tr>
								<td>Video Camera/Movie Camera</td>
								<td><?php echo e($app->scholar->appliances->camera_num); ?></td>
								<td><?php echo e($app->scholar->appliances->camera_aquisition); ?></td>
							</tr>
							<tr>
								<td>Car/Van/Pajero/Other similar vehicle</td>
								<td><?php echo e($app->scholar->appliances->vehicle_num); ?></td>
								<td><?php echo e($app->scholar->appliances->vehicle_acquisition); ?></td>
							</tr>
							<tr>
								<td>Jeepney (AUV/Owner Type)</td>
								<td><?php echo e($app->scholar->appliances->jeep_num); ?></td>
								<td><?php echo e($app->scholar->appliances->jeep_acquisition); ?></td>
							</tr>
							<tr>
								<td>Ipad/Ipod</td>
								<td><?php echo e($app->scholar->appliances->ipad_num); ?></td>
								<td><?php echo e($app->scholar->appliances->ipad_acquisition); ?></td>
							</tr>
							<tr>
								<td>Industrial Freezer</td>
								<td><?php echo e($app->scholar->appliances->freezer_num); ?></td>
								<td><?php echo e($app->scholar->appliances->freezer_acquisition); ?></td>
							</tr>
							<tr>
								<td>Industrial Dryer</td>
								<td><?php echo e($app->scholar->appliances->dryer_num); ?></td>
								<td><?php echo e($app->scholar->appliances->dryer_acquisition); ?></td>
							</tr>
							<tr>
								<td>Electric water pump</td>
								<td><?php echo e($app->scholar->appliances->pump_num); ?></td>
								<td><?php echo e($app->scholar->appliances->pump_acquisition); ?></td>
							</tr>
						</table>
						<h2>Answers to questions</h2>
						<ul class="list-unstyled answers-container">
							<?php for($i=0; $i<($questions->count());$i++): ?>
							<!-- $questions as $qn, $answers as $ans) -->
							<li>
								<p class="question"><?php echo e($questions[$i]->essay_question); ?></p>
								<p class="answer"><?php echo e($answers[$i]->essay_answer); ?></p>
							</li>
							<?php endfor; ?>
						</ul>
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