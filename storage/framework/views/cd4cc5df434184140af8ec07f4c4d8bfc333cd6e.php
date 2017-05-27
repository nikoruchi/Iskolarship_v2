<?php $__env->startSection('content'); ?>
 
	<div class="container main-container">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<div class="panel panel-default">
					<div class="panel-body">
<<<<<<< HEAD
						<form id="create-form">
							<h1 class="text-center">Create Scholarship</h1>
							<hr>
							<h2>Details</h2>
							<input type="text" name="scholarship_name" id="scholarship_name" class="form-control" placeholder="Scholarship Name" />
							<textarea name="description" id="description" class="form-control" placeholder="Description"></textarea>
							<label class="file-label"><span class="glyphicon glyphicon-download-alt"></span> Upload File<input type="file" name="image" class="form-control"/></label>
=======
						<form>
							<h1 class="text-center">Create Scholarship</h1>
							<hr>
							<h2>Details</h2>
							<input type="text" name="scholarship_name" class="form-control" placeholder="Scholarship Name" />
							<textarea name="description" class="form-control" placeholder="Description"></textarea>
							<div class="deadline">
								<label>Deadline:</label>
								<input type="date" name="deadline" placeholder="deadline" class="form-control">
							</div>
							<label class="file-label"><span class="glyphicon glyphicon-download-alt"></span> Upload scholarship image<input type="file" name="image" class="form-control"/></label>
>>>>>>> c7243d100aec8eec415214284ac42d8b8c2a8ea8
							<!-- <img src="/image/default.jpg" class="uploaded-img" /> -->
							<!-- <button type="submit" class="btn btn-default next">Next <span class="glyphicon glyphicon-arrow-right"></span></button> -->
							<hr>
							<h2>Grants</h2>
							<ul class="grants">
<<<<<<< HEAD
							
					
							</ul>
							<div class="ajax-form">
								<textarea name="grant[]" id="grant-content" placeholder="Add a Grant"></textarea>
								<button class="btn btn-default add add_grant"><span class="glyphicon glyphicon-plus"></span></button>
=======
								<li>A grant.
									<a href="#" class="edit"><span class="glyphicon glyphicon-edit"></span></a>
									<a href="#" class="delete"><span class="glyphicon glyphicon-remove"></span></a>
								</li>
								<li>Another grant.
									<a href="#" class="edit"><span class="glyphicon glyphicon-edit"></span></a>
									<a href="#" class="delete"><span class="glyphicon glyphicon-remove"></span></a>
								</li>
								<li>Last grant.
									<a href="#" class="edit"><span class="glyphicon glyphicon-edit"></span></a>
									<a href="#" class="delete"><span class="glyphicon glyphicon-remove"></span></a>
								</li>
							</ul>
							<div class="ajax-form">
								<textarea name="grant" placeholder="Add a Grant"></textarea>
								<button class="btn btn-default add"><span class="glyphicon glyphicon-plus"></span></button>
>>>>>>> c7243d100aec8eec415214284ac42d8b8c2a8ea8
							</div>
							<!-- <a class="btn btn-default next">Next <span class="glyphicon glyphicon-arrow-right"></span></a> -->
							<hr>
							<h2>Specifications</h2>
							<ul class="specifications">
<<<<<<< HEAD
								
							</ul>
							<div class="ajax-form">
								<textarea name="spec[]" id="spec-content" placeholder="Add a Specification"></textarea>
								<button class="btn btn-default add add_spec"><span class="glyphicon glyphicon-plus"></span></button>
=======
								<li>A specification.
									<a href="#" class="edit"><span class="glyphicon glyphicon-edit"></span></a>
									<a href="#" class="delete"><span class="glyphicon glyphicon-remove"></span></a>
								</li>
								<li>Another specification.
									<a href="#" class="edit"><span class="glyphicon glyphicon-edit"></span></a>
									<a href="#" class="delete"><span class="glyphicon glyphicon-remove"></span></a>
								</li>
								<li>Last specification.
									<a href="#" class="edit"><span class="glyphicon glyphicon-edit"></span></a>
									<a href="#" class="delete"><span class="glyphicon glyphicon-remove"></span></a>
								</li>
							</ul>
							<div class="ajax-form">
								<textarea name="spec" placeholder="Add a Specification"></textarea>
								<button class="btn btn-default add"><span class="glyphicon glyphicon-plus"></span></button>
>>>>>>> c7243d100aec8eec415214284ac42d8b8c2a8ea8
							</div>
							<!-- <a class="btn btn-default next">Next <span class="glyphicon glyphicon-arrow-right"></span></a> -->
							<hr>
							<h2>Question</h2>
							<ul class="questions">
<<<<<<< HEAD
							

							</ul>
							<div class="ajax-form">
								<textarea name="question[]" id="qn-content" placeholder="Add a Question"></textarea>
								<button class="btn btn-default add add_question"><span class="glyphicon glyphicon-plus"></span></button>
=======
								<li>A question. A question. A question. A question. A question. A question. A question. A question. A question. A question. A question. A question. A question. A question. A question. A question. A question. A question. A question. A question. A question. A question. A question. A question. A question.
									<a href="#" class="edit"><span class="glyphicon glyphicon-edit"></span></a>
									<a href="#" class="delete"><span class="glyphicon glyphicon-remove"></span></a>
								</li>
								<li>Another question.
									<a href="#" class="edit"><span class="glyphicon glyphicon-edit"></span></a>
									<a href="#" class="delete"><span class="glyphicon glyphicon-remove"></span></a>
								</li>
								<li>Last question.
									<a href="#" class="edit"><span class="glyphicon glyphicon-edit"></span></a>
									<a href="#" class="delete"><span class="glyphicon glyphicon-remove"></span></a>
								</li>
							</ul>
							<div class="ajax-form">
								<textarea name="question" placeholder="Add a Question"></textarea>
								<button class="btn btn-default add"><span class="glyphicon glyphicon-plus"></span></button>
>>>>>>> c7243d100aec8eec415214284ac42d8b8c2a8ea8
							</div>
							<button class="btn btn-success start" type="submit">Start Scholarship <span class="glyphicon glyphicon-play-circle"></span></button>
							<!-- <a href="#" class="btn btn-default next">Next <span class="glyphicon glyphicon-arrow-right"></span></a> -->
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
	<link rel="stylesheet" type="text/css" href="css/scholarship_form.css"/>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.userTab', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>