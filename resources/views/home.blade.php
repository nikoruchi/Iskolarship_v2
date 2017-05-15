@extends("layouts.userTab")

@section('content')

	<div class="container main-container">
		<div class="row">
			<div class="col-sm-3">
				<div class="panel panel-default"> 
					<div class="panel-heading">
						<img src="image/{{ Auth::user()->user_imagepath }}.jpg" class="img-responsive img-circle aside-pp"/>
						<h4 class="text-center">
						@if(Auth::user()->hasRole('student'))
							{{$student->student_fname}} {{$student->student_lname}}
						@elseif(Auth::user()->hasRole('sponsor'))
							{{$sponsor->sponsor_fname}} {{$sponsor->sponsor_lname}}
						@endif
						</h4>
						<h4 class="text-center"><span class="small"></span></h4>
					</div>
					<div class="panel-body panel-group" id="accordion">
						<div class="panel panel-default">
							<div class="panel-heading">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapse1"><h5 class="text-center panel-title">
								@if(Auth::user()->hasRole('student'))
									Your Sponsors
								@elseif(Auth::user()->hasRole('sponsor'))
									Your Scholarships
								@endif
								</h5></a>
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
								<a data-toggle="collapse" data-parent="#accordion" href="#collapse2"><h5 class="text-center panel-title">
								@if(Auth::user()->hasRole('student'))
									Your Sponsors
								@elseif(Auth::user()->hasRole('sponsor'))
									Your Scholarships
								@endif
								</h5></a>
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
			</div>
		</div>
	</div>

@endsection

@push('styles')
	<link rel="stylesheet" type="text/css" href="css/home.css"/>
@endpush