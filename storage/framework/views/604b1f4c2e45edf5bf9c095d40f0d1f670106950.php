<?php $__env->startSection('content'); ?>

	<div class="container main-container">
		<div class="row">
			<div class="center-el col eight-height col-sm-6 col-sm-offset-3">
				<form class="home-search" method="get" action="/search">
				 <?php echo e(csrf_field()); ?> 
					<div class="input-group">
						<input type="text" name="keyword" class="form-control" placeholder="Find the most suitable choice for you." />
						<div class="input-group-btn">
							<button class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
						</div>
					</div>
					<div class="center-el check-boxes">
						<label class="checkbox-inline"><input type="checkbox" name="search_q[]" value="scholarships"><i class="sub-check"><i class="check"></i></i>Scholarships</label>
						<label class="checkbox-inline"><input type="checkbox" name="search_q[]" value="sponsors"><i class="sub-check"><i class="check"></i></i>Sponsors</label>
						<label class="checkbox-inline"><input type="checkbox" name="search_q[]" value="scholars"><i class="sub-check"><i class="check"></i></i>Scholars</label>
						<label class="checkbox-inline"><input type="checkbox" name="search_q[]" value="open_applications"><i class="sub-check"><i class="check"></i></i>Open Applications</label>
					</div>
				</form>
			</div>
		</div>
		<div class="row">
			<h2 class="text-center">Scholarship Suggestions</h2>
			<div class="col-sm-8 col-sm-offset-2">
			<?php $__currentLoopData = $scholarships; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $scho): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<ul class="search-results">
					<li>
						<h2 class="first-letter"><?php echo e($scho->scholarship_name[0]); ?></h2>
						<article>
							<h2 class="name"><?php echo e($scho->scholarship_name); ?></h2>
							<p class="desc">
								<?php echo e($scho->scholarship_desc); ?>

							</p>
							<a href="#" class="view">View</a>
						</article>
					</li>
				</ul>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
	<link rel="stylesheet" type="text/css" href="css/home.css"/>
<?php $__env->stopPush(); ?>

<?php echo $__env->make("layouts.userTab", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>