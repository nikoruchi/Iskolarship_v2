<?php $__env->startSection('content'); ?>

	<div class="container main-container">
		<h1 class="text-center">You have searched for: <span class="keyword">Something</span></h1>
	</div>
	
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.userTab", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>