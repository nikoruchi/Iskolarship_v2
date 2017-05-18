<?php $__env->startSection('content'); ?>

	<div class="container main-container">
		<?php echo e(csrf_field()); ?>

		<h1 class="text-center">You have searched for: <span class="keyword">Something</span></h1>
		<?php $__currentLoopData = $filter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $filt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<?php echo e($filt); ?>

		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>
	
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.userTab", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>