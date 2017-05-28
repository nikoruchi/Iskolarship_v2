<?php $__env->startSection('content'); ?>

	<div class="container main-container">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<div class="panel">
					<div class="panel-heading">
						<img src="/image/<?php echo e($scholarship->scholarship_logo); ?>" class="img-responsive scholarship-logo"/>
										
							<form action="<?php echo e(url('/edit', [$scholarship->scholarship_id])); ?>" method="GET" enctype="multipart/form-data">
								<?php echo e(method_field('PUT')); ?>

								<?php echo e(csrf_field()); ?>

								<div class="input-group text-center <?php echo e($errors->has('image') ? ' has-error' : ''); ?> center-block">
									<input type="file" class="btn btn-default btn-block <?php echo e($errors->has('image') ? ' has-error' : ''); ?>" name="image" style="border-radius: 0; border-top: 0;" value="Upload New" />
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
								
									<button type="submit" class="btn btn-success btn-block" style="border-radius: 4px; border-top: 0;"><span class="glyphicon glyphicon-upload" ></span>&nbsp;Upload Image</button> 
								</div>		
							</form>		
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/scholarship_page.css')); ?>"/>
<?php $__env->stopPush(); ?>
<?php echo $__env->make("layouts.userTab", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>