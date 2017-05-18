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
						<label class="checkbox-inline"><input type="checkbox" name="search_q">Scholarships</label>
						<label class="checkbox-inline"><input type="checkbox" name="search_q">Sponsors</label>
						<label class="checkbox-inline"><input type="checkbox" name="search_q">Scholars</label>
						<label class="checkbox-inline"><input type="checkbox" name="search_q">Open Applications</label>
					</div>
				</form>
			</div>
			<!-- <div class="col-sm-3">
				<div class="panel panel-default"> 
					<div class="panel-heading">
						<img src="image/<?php echo e(Auth::user()->user_imagepath); ?>.jpg" class="img-responsive img-circle aside-pp"/>
						<h4 class="text-center"><?php echo e($student->student_fname); ?> <?php echo e($student->student_lname); ?></h4>
						<h4 class="text-center"><span class="small"></span></h4>
					</div>
					<div class="panel-body panel-group" id="accordion">
						<div class="panel panel-default">
							<div class="panel-heading">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapse1"><h5 class="text-center panel-title">Your Scholarships</h5></a>
							</div>
							<div id="collapse1" class="panel-collapse collapse in">
						      	<div class="panel-body">
						      		<ul class="list-unstyled">
										<li><a href="#" data-toggle="tooltip" data-placement="right" title="Scholarship 1">Scholarship 1</a></li>
										<li><a href="#" data-toggle="tooltip" data-placement="right" title="Scholarship 2">Scholarship 2</a></li>
										<li><a href="#" data-toggle="tooltip" data-placement="right" title="Scholarship 3">Scholarship 3</a></li>
										<li><a href="#" data-toggle="tooltip" data-placement="right" title="Scholarship 4">Scholarship 4</a></li>
										<li><a href="#" data-toggle="tooltip" data-placement="right" title="Scholarship 5">See all...</a></li>
									</ul>
						      	</div>
						    </div>
						</div>

						<div class="panel panel-default">
							<div class="panel-heading">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapse2"><h5 class="text-center panel-title">Your Sponsors</h5></a>
							</div>
							<div id="collapse2" class="panel-collapse collapse">
						      	<div class="panel-body">
						      		<ul class="list-unstyled">
										<li><a href="#" data-toggle="tooltip" data-placement="right" title="Sponsor 1">Sponsor 1</a></li>
										<li><a href="#" data-toggle="tooltip" data-placement="right" title="Sponsor 2">Sponsor 2</a></li>
										<li><a href="#" data-toggle="tooltip" data-placement="right" title="Sponsor 3">Sponsor 3</a></li>
										<li><a href="#" data-toggle="tooltip" data-placement="right" title="Sponsor 4">Sponsor 4</a></li>
										<li><a href="#" data-toggle="tooltip" data-placement="right" title="Sponsor 5">See all...</a></li>
									</ul>
						      	</div>
						    </div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-sm-9">

				<div class="panel panel-default">
					<div class="panel-body">
						<div class="carousel slide" id="formCarousel" data-ride="carousel" data-interval="false">
							<ol class="carousel-indicators">
								<li data-target="#formCarousel" data-slide-to="0" class="active">
									<span class="fa fa-money"></span>
								</li>
								<li data-target="#formCarousel" data-slide-to="1">
									<span class="glyphicon glyphicon-briefcase"></span>
								</li>
								<li data-target="#formCarousel" data-slide-to="2">
									<span class="glyphicon glyphicon-folder-open"></span>
								</li>
								<li data-target="#formCarousel" data-slide-to="3">
									<span class="glyphicon glyphicon-folder-close"></span>
								</li>
							</ol>
							<div class="carousel-inner" role="listbox">
								<div class="item active">
									<div class="paper">
										<h2>Search for Scholarships</h2>
										<form>
											<div class="input-group">
												<input type="text" class="form-control" name="scholarships" placeholder="Type here" />
												<div class="input-group-btn">
													<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search"></span></button>
												</div>
											</div>
										</form>
									</div>
								</div>
								<div class="item">
									<div class="paper">
										<h2>Search for Sponsors</h2>
										<form>
											<div class="input-group">
												<input type="text" class="form-control" name="sponsors" placeholder="Type here" />
												<div class="input-group-btn">
													<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search"></span></button>
												</div>
											</div>
										</form>
									</div>
								</div>
								<div class="item">
									<div class="paper">
										<h2>Search for Open Applications</h2>
										<form>
											<div class="input-group">
												<input type="text" class="form-control" name="OpenApp" placeholder="Type here" />
												<div class="input-group-btn">
													<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search"></span></button>
												</div>
											</div>
										</form>
									</div>
								</div>
								<div class="item">
									<div class="paper">
										<h2>Search for Closed Applications</h2>
										<form>
											<div class="input-group">
												<input type="text" class="form-control" name="ClosedApp" placeholder="Type here" />
												<div class="input-group-btn">
													<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search"></span></button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-body"></div>
				</div>
			</div> -->
		</div>
	</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
	<link rel="stylesheet" type="text/css" href="css/home.css"/>
<?php $__env->stopPush(); ?>
<?php echo $__env->make("layouts.userTab", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>