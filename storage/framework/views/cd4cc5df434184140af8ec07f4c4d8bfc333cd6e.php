<?php $__env->startSection('content'); ?>

	<div class="container main-container">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<div class="panel panel-default">
					<div class="panel-body">
						<form>
							<h1>Create Scholarship</h1>
							<h2>Details</h2>
							<input type="text" name="scholarship_name" class="form-control" />
							<textarea name="description" class="form-control"></textarea>
							<input type="file" name="image" class="form-control"/>
							<input type="submit" name="create_sholarship" value="proceed" />
						</form>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-body">
						<form>
							<h2>Grants</h2>
							<ul class="grants">
								<li>A grant.<a href="#">Edit</a><a href="#">Delete</a></li>
								<li>Another grant.<a href="#">Edit</a><a href="#">Delete</a></li>
								<li>Last grant.<a href="#">Edit</a><a href="#">Delete</a></li>
							</ul>
							<a href="#">Add a grant</a>
							<input type="submit" name="create_sholarship" value="proceed" />
						</form>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-body">
						<form>
							<h2>Specifications</h2>
							<ul class="specifications">
								<li>A specification.<a href="#">Edit</a><a href="#">Delete</a></li>
								<li>Another specification.<a href="#">Edit</a><a href="#">Delete</a></li>
								<li>Last specification.<a href="#">Edit</a><a href="#">Delete</a></li>
							</ul>
							<a href="#">Add a specification</a>
							<input type="submit" name="create_sholarship" value="proceed" />
						</form>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-body">
						<form>
							<h2>Question</h2>
							<ul class="questions">
								<li>A question.<a href="#">Edit</a><a href="#">Delete</a></li>
								<li>Another question.<a href="#">Edit</a><a href="#">Delete</a></li>
								<li>Last question.<a href="#">Edit</a><a href="#">Delete</a></li>
							</ul>
							<a href="#">Add a question</a>
							<input type="submit" name="create_sholarship" value="Create Scholarship" />
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
	<link rel="stylesheet" type="text/css" href="css/scholar_form.css"/>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.userTab', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>