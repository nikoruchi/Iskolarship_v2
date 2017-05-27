<?php $__env->startSection('content'); ?>
	<div class="container main-container">
		<div class="row">
			<div class="col-sm-6">
			</div>
			<div class="col-sm-6">
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('styles'); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/profile_page.css')); ?>"/>
<?php $__env->stopPush(); ?>
<?php $__env->startPush('scripts'); ?>
	<script src="js/default_img.js"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.userTab', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>