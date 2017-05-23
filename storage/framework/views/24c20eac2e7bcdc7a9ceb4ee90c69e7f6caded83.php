<?php $__env->startSection('content'); ?>

	<div class="container main-container">
		<?php echo e(csrf_field()); ?>

		<h1 class="text-center">You have searched for: <span class="keyword"><?php echo e($keyword); ?></span></h1>
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
			
				<?php if(!empty($scholarships)): ?>
					<?php $__currentLoopData = $scholarships; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $scho): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<ul class="search-results">
						<li>
							<!-- Image of the scholarship is placed here. -->
							<!-- The H2 here is just a place holder -->
							<h2 class="first-letter"><?php echo e($scho->scholarship_name[0]); ?></h2>
							<article>
								<h2 class="name"><?php echo e($scho->scholarship_name); ?></h2>
								<p class="desc">
									<?php echo e($scho->scholarship_desc); ?>

								</p>
								<a href="/profile scholarship/<?php echo e($scho->scholarship_id); ?>" class="view">View</a>
							</article>
						</li>
					</ul>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php endif; ?>

				<?php if(!empty($sponsors)): ?>
					<?php $__currentLoopData = $sponsors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $spon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<ul class="search-results">
						<li>
							<!-- Image of the scholarship is placed here. -->
							<!-- The H2 here is just a place holder -->
							<h2 class="first-letter"><?php echo e($spon->sponsor_fname[0]); ?></h2>
							<article>
								<h2 class="name"><?php echo e($spon->sponsor_fname); ?> <?php echo e($spon->sponsor_lname); ?></h2>
								<p class="desc"> <?php echo e($spon->sponsor_job); ?> </p>
								<p class="desc"> <?php echo e($spon->sponsor_agency); ?> </p>
								
								<a href="/profile sponsor/<?php echo e($spon->sponsor_id); ?>" class="view">View</a>
							</article>
						</li>
					</ul>
					<p></p>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php endif; ?>

				<?php if(!empty($scholars)): ?>
					<?php $__currentLoopData = $scholars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $schol): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<ul class="search-results">
						<li>
							<!-- Image of the scholarship is placed here. -->
							<!-- The H2 here is just a place holder -->
							<h2 class="first-letter"><?php echo e($schol->student_fname[0]); ?></h2>
							<article>
								<h2 class="name"><?php echo e($schol->student_fname); ?> <?php echo e($schol->student_lname); ?></h2>
								<p class="desc"> <?php echo e($schol->student_studyfield); ?> </p>
								<p class="desc"> <?php echo e($schol->student_university); ?> </p>
								<a href="/profile scholar/<?php echo e($schol->student_id); ?>" class="view">View</a>
							</article>
						</li>
					</ul>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php endif; ?>

				<?php if(!empty($opens)): ?>
					<?php $__currentLoopData = $opens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $open): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<ul class="search-results">
						<li>
							<!-- Image of the scholarship is placed here. -->
							<!-- The H2 here is just a place holder -->
							<h2 class="first-letter"><?php echo e($open->scholarship_name[0]); ?></h2>
							<article>
								<h2 class="name"> <?php echo e($open->scholarship_name); ?> </h2>
								<p class="desc"> <?php echo e($open->scholarship_desc); ?> </p>
								<p class="desc"> Application Deadline: <?php echo e($open->scholarship_deadlineenddate); ?> </p>
								
								<a href="/profile scholarship/<?php echo e($open->scholarship_id); ?>" class="view">View</a>
							</article>
						</li>
					</ul>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php endif; ?>


			</div>
		</div>
	</div>
	
<?php $__env->stopSection(); ?>

<?php echo $__env->make("layouts.userTab", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>