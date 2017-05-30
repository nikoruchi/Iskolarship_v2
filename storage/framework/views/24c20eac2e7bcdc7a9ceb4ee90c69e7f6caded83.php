<<<<<<< HEAD
<?php $__env->startSection('content'); ?>
=======
<?php $__env->startSection('content'); ?> 
>>>>>>> 3fbee04672ff224d7e4aff47c0a99389ebd0d450

	<div class="container main-container">
		<?php echo e(csrf_field()); ?>

		<ul class="internal-links">
			<li><a href="/home"><span class="glyphicon glyphicon-arrow-left"></span> Back to Home</a></li>
<<<<<<< HEAD
			<?php if(count($scholarships) > 0): ?><li><a href="#scholarships">Scholarships</a></li><?php endif; ?>
			<?php if(count($sponsors) > 0): ?><li><a href="#sponsors">Sponsors</a></li><?php endif; ?>
			<?php if(count($scholars) > 0): ?><li><a href="#scholars">Scholars</a></li><?php endif; ?>
			<?php if(count($opens) > 0): ?><li><a href="#open">Open Scholarships</a></li><?php endif; ?>
=======
			<li><a href="#scholarships">Scholarships</a></li>
			<li><a href="#sponsors">Sponsors</a></li>
			<li><a href="#scholars">Scholars</a></li>
			<li><a href="#open">Open Scholarships</a></li>
>>>>>>> 3fbee04672ff224d7e4aff47c0a99389ebd0d450
		</ul>
		<h1 class="text-center you-search">You have searched for: <span class="keyword"><?php echo e($keyword); ?></span></h1>
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
			
				<?php if(count($scholarships) > 0 || count($sponsors) > 0 || count($scholars) > 0 || count($opens) > 0): ?>
					<?php if(count($scholarships) > 0): ?>
						<h1 class="category" id="scholarships"> Scholarships </h1>
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

					
					<?php if(count($sponsors) > 0): ?>
						<h1 class="category" id="sponsors"> Sponsors </h1>
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

					
					<?php if(count($scholars) > 0): ?>
						<h1 class="category" id="scholars"> Scholars </h1>
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

					
					<?php if(count($opens) > 0): ?>
						<h1 class="category" id="open"> Open Scholarships </h1>
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
				<?php else: ?>
					<h1 class="no-results">No Results</h1>
				<?php endif; ?>


			</div>
		</div>
	</div>
	
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/search.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
	<script type="text/javascript">
		$(document).on('click', 'a', function(event){
		    // event.preventDefault();

		    $('html, body').animate({
		        scrollTop: $( $.attr(this, 'href') ).offset().top - 110
		    }, 500);
		});
	</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make("layouts.userTab", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>