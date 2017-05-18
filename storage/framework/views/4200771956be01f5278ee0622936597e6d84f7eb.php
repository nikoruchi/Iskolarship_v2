 

<?php $__env->startSection('content'); ?>

	<div class="container main-container">
		<div class="row">
			<div class="center-el col eight-height col-sm-6 col-sm-offset-3">
				<form class="home-search">
					<div class="input-group">
						<input type="text" name="keyword" class="form-control" placeholder="Find the most suitable choice for you." />
						<div class="input-group-btn">
							<button class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
						</div>
					</div>
					<div class="center-el">
						<label class="checkbox-inline"><input type="checkbox" name="search_q"><i class="sub-check"><i class="check"></i></i>Scholarships</label>
						<label class="checkbox-inline"><input type="checkbox" name="search_q"><i class="sub-check"><i class="check"></i></i>Sponsors</label>
						<label class="checkbox-inline"><input type="checkbox" name="search_q"><i class="sub-check"><i class="check"></i></i>Scholars</label>
						<label class="checkbox-inline"><input type="checkbox" name="search_q"><i class="sub-check"><i class="check"></i></i>Open Applications</label>
					</div>
				</form>
			</div>
		</div>
	</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
	<link rel="stylesheet" type="text/css" href="css/home.css"/>
<?php $__env->stopPush(); ?>
<?php echo $__env->make("layouts.userTab", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>