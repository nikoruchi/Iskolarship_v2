<?php $__env->startSection('content'); ?>

	<div class="container main-container">
		<?php echo e(csrf_field()); ?>

		<h1 class="text-center">You have searched for: <span class="keyword"><?php echo e($keyword); ?></span></h1>
		<div>
			
				<?php $__currentLoopData = $scholarships; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $scho): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<p>	<?php echo e($scho->scholarship_name); ?> <p>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

				<?php $__currentLoopData = $scholars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $schol): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<p>	<?php echo e($schol->student_fname); ?> <?php echo e($schol->student_lname); ?> </p>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

				<?php $__currentLoopData = $sponsors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $spon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<p>	<?php echo e($spon->sponsor_fname); ?> <?php echo e($spon->sponsor_fname); ?> </p>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
	</div>
	
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.userTab", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>