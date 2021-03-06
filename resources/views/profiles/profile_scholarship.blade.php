@extends("layouts.userTab")

@section('content')

	<div class="container main-container">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<!-- <div class="panel"> -->
					<!-- <div class="panel-heading"> -->
						<img src="/image/{{$scholarship->scholarship_logo}}" class="img-responsive scholarship-logo"/>
						<h1 class="scholarship-name">{{$scholarship->scholarship_name}}</h1>
						<p class="scholarship-description">{{$scholarship->scholarship_desc}}</p>
						<div class="flex">

						@if($deadline < $currentTime)
							<p class ="text-center">Submission for application is over.</p>
						@elseif((Auth::user()->hasRole('student')) && ($exists>0))
							<p class="text-center">You have applied already. Please wait until the agency reviews your application.</p>
						@elseif((Auth::user()->hasRole('student')) && ($exists==0))
							<a href="/scholar questionaire/{{$scholarship->scholarship_id}}" class="btn btn-success btn-lg apply-btn"><span class="glyphicon glyphicon-education"><span class="glyphicon glyphicon-plus"></span></span>&nbsp;&nbsp;Apply</a>
						@elseif(Auth::guest())
							<p class="text-center">You must be <a href="/">logged in</a> to apply.</p>
						@elseif($user->user_id == ($scholarship->sponsor_id))
							<a href="/profile sponsor/scholars" class="btn btn-primary"><span class="glyphicon glyphicon-education"><span class="glyphicon glyphicon-plus"></span></span>&nbsp;&nbsp;Your Scholars</a>
						@endif

						</div>

						

						<h2 class="scholar-count"><span class="glyphicon glyphicon-education"></span> Scholars: {{$scholars->count()}}</h2>
						<ul class="list-unstyled further-details">
							<li class="dropdown">
								<button class="btn btn-default btn-md" data-toggle="dropdown" data-target="sponsor"><span class="glyphicon glyphicon-briefcase"></span></button>
								<ul class="dropdown-menu" id="sponsor"><li><a href="#">Sponsor: {{$sponsor->sponsor_fname}} {{$sponsor->sponsor_lname}}</a></li></ul>
							</li>
							<li class="dropdown">
								<button class="btn btn-default btn-md" data-toggle="dropdown" data-target="deadline"><span class="glyphicon glyphicon-calendar"></span></button>
								<ul class="dropdown-menu" id="deadline"><li><a href="#">Deadline: {{date('m-d-Y', strtotime($deadline)) }} </a></li></ul>
							</li>
							<li class="dropdown">
								<button class="btn btn-default btn-md" data-toggle="dropdown" data-target="details"><span class="glyphicon glyphicon-search"></span></button>
								<ul class="dropdown-menu" id="details">
									<li><a href="#grants">Grants: {{$grants->count()}}</a></li>
									<li><a href="#specs">Specifications: {{$specifications->count()}}</a></li>
								</ul>
							</li>
						</ul>
					<!-- </div> -->
					<div class="grants-specs">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="text-center" id="grants">Grants</h3>
								<ul class="list-unstyled">
									@foreach($grants as $grant)
										<li>{{$grant->scholarship_grantDesc}}</li>
									@endforeach
									<!-- <li><span class="glyphicon glyphicon-usd"></span> Tuition and other fees of Php10,000.00 per semester.</li>
									<li><span class="glyphicon glyphicon-book"></span> Book allowance of Php5,000.00 per semester.</li>
									<li><span class="glyphicon glyphicon-usd"></span> Monthly stipend of Php5,000.00.</li> -->
								</ul>
							</div>
							<div class="col-sm-12">
								<h3 class="text-center" id="specs">Specifications</h3>
								<ol class="list-unstyled">
									@foreach($specifications as $specification)
										<li>{{$specification->scholarship_specDesc}}</li>
									@endforeach
								</ol>
							</div>
						</div>
					</div>
				<!-- </div> -->
			</div>
		</div>
	</div>

@endsection

@push('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/scholarship_page.css') }}"/>
@endpush