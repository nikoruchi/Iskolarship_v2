<?php $__env->startSection('content'); ?>
	<div class="container main-container">
		<div class="col-sm-6 col-sm-offset-3">
			<div class="panel panel-default">
				<div class="panel-body">
					<!-- Scholarship Image; Else default Image will be provided -->
					<h1 class="text-center unmargined">Application</h1>
					<hr>
					<div class="heading">
						<div class="img-container">
							<img src="/image/<?php echo e($user->user_imagepath); ?>" alt="sponsor-img">
							<img src="/image/<?php echo e($scholarship->scholarship_logo); ?>" alt="scholarship-img">
						</div>
						<article>
							<h2><?php echo e($scholarship->scholarship_name); ?></h2>
							<!-- Sponsor Name -->
							<p class="sponsor">Sponsor: <?php echo e($scholarship->ownedBy->sponsor_fname); ?> <?php echo e($scholarship->ownedBy->sponsor_lname); ?></p>
							<p class="quest-no"><?php echo e(count($questions)); ?> questions</p>
						</article>
					</div>
					<hr>
					<form id="apply-form" action="/scholar questionaire/send" method="POST">
						<?php echo e(csrf_field()); ?>

						<input type="hidden" name="scholarshipID" value="<?php echo e($scholarship->scholarship_id); ?>" /> 
						<?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $qn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<label><?php echo e($qn->essay_question); ?></label>
							<input type="hidden" name="qnID[]" value="<?php echo e($qn->essay_questionsID); ?>" /> 
							<div class="input-group <?php echo e($errors->has('answer') ? ' has-error' : ''); ?> ">
								<textarea name="answer[]" class="form-control" placeholder="Answer"></textarea>
							</div>
							<?php if($errors->has('answer')): ?>
									<span class="help-block">
										<strong><?php echo e($errors->first('answer')); ?></strong>
									</span>
							<?php endif; ?>

						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<section>
							<label><input type="checkbox" name="agreement" value="agreed"> I agree to submit my account information, family background, and financial and socio-economic information with this application.</label>
						</section>
						<button class="btn btn-success pull-right send-app btn-lg" type="submit"><span class="glyphicon glyphicon-send"></span> Submit Application</button>
					</form>
				</div>
			</div>
		</div>
	</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/questionaire.css')); ?>">
<?php $__env->stopPush(); ?>

<?php echo $__env->make("layouts.userTab", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>