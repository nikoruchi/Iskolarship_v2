<?php $__env->startSection('content'); ?>
	<div class="container main-container">
		<div class="row">
			<div class="col-sm-10 col-sm-offset-1">
				<div class="panel panel-default">
					<div class="panel-body">
						<form>
							<h1 class="text-center">Account Setup</h1>
							<h3>Family Background</h3>
							<div class="row">
								<div class="col-sm-6">
									<h4>Father</h4>	
									<div class="radio-btns">
										<label class="radio-inline"><input type="radio" name="father_status" value="liv">Living</label>
										<label class="radio-inline"><input type="radio" name="father_status" value="dec">Deceased</label>
										<label class="radio-inline"><input type="radio" name="father_status" value="step">Stepfather</label>
									</div>
									<input type="text" class="form-control" name="father_name" placeholder="Name"/>
									<input type="text" class="form-control" name="father_occ" placeholder="Occupation"/>
									<input type="text" class="form-control" name="father_edu" placeholder="Educational Attainment"/>
									<input type="text" class="form-control" name="father_trib" placeholder="Tribal Affiliation"/>
								</div>
								<div class="col-sm-6">
									<h4>Mother</h4>	
									<div class="radio-btns">
										<label class="radio-inline"><input type="radio" name="mother_status" value="liv">Living</label>
										<label class="radio-inline"><input type="radio" name="mother_status" value="dec">Deceased</label>
										<label class="radio-inline"><input type="radio" name="mother_status" value="step">Stepmother</label>
									</div>
									<input type="text" class="form-control" name="mother_name" placeholder="Name"/>
									<input type="text" class="form-control" name="mother_occ" placeholder="Occupation"/>
									<input type="text" class="form-control" name="mother_edu" placeholder="Educational Attainment"/>
									<input type="text" class="form-control" name="mother_trib" placeholder="Tribal Affiliation"/>
								</div>
							</div>
							<hr>
							<h4>Brothers/Sisters Enjoying Scholarship</h4>
							<div class="table-responsive">
								<table class="table siblings">
									<tr>
										<th>Name</th>
										<th>Scholarship</th>
										<th>Course &amp; College/University</th>
									</tr>
									<tr>
										<td></td>
										<td></td>
										<td></td>
									</tr>
								</table>
							</div>
							<div class="form-group sibling-form">
								<div class="col-xs-4">
									<input class="form-control" type="text" placeholder="Name">
								</div>
								<div class="col-xs-4">
									<input class="form-control" type="text" placeholder="Scholarship">
								</div>
								<div class="col-xs-4">
									<input class="form-control" type="text" placeholder="Course & College/University">
								</div>
							</div>
							<button class="btn btn-default btn-block add-sib">Add Sibling <span class="glyphicon glyphicon-plus"></span></button>

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('styles'); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/scholar_setup.css')); ?>"/>
	<style type="text/css">
		input{
			margin: 0.5em 0;
		}
		.siblings th{
			width: 33%;
			text-align: center;
			border-left: 1px solid #DDD;
		}

		.siblings th:last-child{
			border-right: 1px solid #DDD;
		}

		.sibling-form > div{
			border-left: 1px solid #DDD;
			border-bottom: 1px solid #DDD;
			border-top: 1px solid #DDD;
			padding: 0;
		}

		.sibling-form > div:last-child{
			border-right: 1px solid #DDD;
		}

		.sibling-form > div > input{
			border: 0;
			margin: 0;
			box-shadow: none;
			font-family: Roboto;
		}

		.sibling-form > div > input::placeholder{
			color: #c8e393!important;
		}

		.add-sib{
			background-color: #8cb739;
			border-radius: 0;
			font-family: Roboto;
			color: white;
		}
	</style>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.userTab', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>