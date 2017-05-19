 

<?php $__env->startSection('content'); ?>

	<div class="container main-container">
		<div class="row">
			<div class="center-el col eight-height col-sm-6 col-sm-offset-3">
				<form class="home-search" method="get" action="/search">
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
			<div class="col-sm-8 col-sm-offset-2">
				<ul class="search-results">
					<li>
						<!-- Image of the scholarship is placed here. -->
						<!-- The H2 here is just a place holder -->
						<h2 class="first-letter">S</h2>
						<article>
							<h2 class="name">Scholarship Name</h2>
							<p class="desc">
								This is a description of the scholarship. Anything entered here is just to fill in as to nothing is to be fetched or presented here. I don't know what I am saying.
							</p>
							<ul class="sample-grants">
								<li>This is a sample grant.</li>
								<li>Have 1000000 as your allowance.</li>
								<li>Maximum of 3 grants to be previewed.</li>
							</ul>
							<a href="#" class="view">View</a>
						</article>
					</li>
					<li>
						<!-- Image of the scholarship is placed here. -->
						<!-- The H2 here is just a place holder -->
						<h2 class="first-letter">S</h2>
						<article>
							<h2 class="name">Scholarship Name</h2>
							<p class="desc">
								This is a description of the scholarship. Anything entered here is just to fill in as to nothing is to be fetched or presented here. I don't know what I am saying.
							</p>
							<ul class="sample-grants">
								<li>This is a sample grant.</li>
								<li>Have 1000000 as your allowance.</li>
								<li>Maximum of 3 grants to be previewed.</li>
							</ul>
							<a href="#" class="view">View</a>
						</article>
					</li>
					<li>
						<!-- Image of the scholarship is placed here. -->
						<!-- The H2 here is just a place holder -->
						<h2 class="first-letter">S</h2>
						<article>
							<h2 class="name">Scholarship Name</h2>
							<p class="desc">
								This is a description of the scholarship. Anything entered here is just to fill in as to nothing is to be fetched or presented here. I don't know what I am saying.
							</p>
							<ul class="sample-grants">
								<li>This is a sample grant.</li>
								<li>Have 1000000 as your allowance.</li>
								<li>Maximum of 3 grants to be previewed.</li>
							</ul>
							<a href="#" class="view">View</a>
						</article>
					</li>
					<li>
						<!-- Image of the scholarship is placed here. -->
						<!-- The H2 here is just a place holder -->
						<h2 class="first-letter">S</h2>
						<article>
							<h2 class="name">Scholarship Name</h2>
							<p class="desc">
								This is a description of the scholarship. Anything entered here is just to fill in as to nothing is to be fetched or presented here. I don't know what I am saying.
							</p>
							<ul class="sample-grants">
								<li>This is a sample grant.</li>
								<li>Have 1000000 as your allowance.</li>
								<li>Maximum of 3 grants to be previewed.</li>
							</ul>
							<a href="#" class="view">View</a>
						</article>
					</li>
				</ul>
			</div>
		</div>
	</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
	<link rel="stylesheet" type="text/css" href="css/home.css"/>
<?php $__env->stopPush(); ?>
<?php echo $__env->make("layouts.userTab", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>