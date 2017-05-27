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
							<img src="<?php echo e(asset('image/spon_def.png')); ?>" alt="sponsor-img">
							<img src="<?php echo e(asset('image/spon_def.png')); ?>" alt="scholarship-img">
						</div>
						<article>
							<h2>DOST</h2>
							<!-- Sponsor Name -->
							<p class="sponsor">Sponsor: Clyde Joshua Delgado</p>
							<p class="quest-no">3 questions</p>
						</article>
					</div>
					<hr>
					<form>
						<label> When will this semester end<span class="question-mark">?</span></label>
						<textarea class="form-control" placeholder="Answer"></textarea>
						<label> What will you do after this semester<span class="question-mark">?</span></label>
						<textarea class="form-control" placeholder="Answer"></textarea>
						<label> Kapoy na kami<span class="question-mark">?</span></label>
						<textarea class="form-control" placeholder="Answer"></textarea>
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