@extends('layouts.userTab')
@section('content')
	<div class="container main-container">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<div class="panel">
					<img src="/image/{{ $user->user_imagepath }}.jpg" class="img-responsive user-pp img-circle"/>
					<h1 class="user-name">{{ $student->student_fname }}</h1>
					<h2 class="education"> {{ $student->student_studyfield }}, {{ $student->student_university }}</h2>
					<h3 class="user-email">{{ $user->email }}</h3>
					@if(Auth::user()->hasRole('student'))
					<div class="btn-group flex">
						<button class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span> Edit Profile</button>
					
						<button class="btn btn-default"><span class="glyphicon glyphicon-cog"></span> Account Settings</button>
					</div>
					@endif
					@if(Auth::user()->hasRole('sponsor'))
					<div class="btn-group flex">
						<button class="btn btn-primary"> <span class="glyphicon glyphicon-envelope"></span> Message</button>
					</div>
					@endif
					@if(Auth::user()->hasRole('student'))
					<div class="row">
						<div class="col-sm-6">
							<div class="paper">
								<h4 class="text-center youHave">You have</h4>
								<h4 class="count">{{$scholarships}}</h4>
								<h4 class="text-center">Scholarships</h4>
								<div class="flex"><button class="btn btn-default"><span class="glyphicon glyphicon-modal-window"></span> See all</button></div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="paper">
								<h4 class="text-center youHave">You have</h4>
								<h4 class="count">{{$sponsors}}</h4>
								<h4 class="text-center">Sponsors</h4>
								<div class="flex">
									<button class="btn btn-default"><span class="glyphicon glyphicon-modal-window"></span> See all</button>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="paper margin-top">
								<h4 class="text-center youHave">You have</h4>
								<h4 class="count">{{$pending}}</h4>
								<h4 class="text-center">Pending Scholarships</h4>
								<div class="flex">
									<button class="btn btn-default"><span class="glyphicon glyphicon-modal-window"></span> See all</button>
								</div>
							</div>
						</div>
						<div class="col-sm-6">
							<div class="paper margin-top">
								<h4 class="text-center youHave">You have</h4>
								<h4 class="count">5</h4>
								<h4 class="text-center">Expired Scholarships</h4>
								<div class="flex">
									<button class="btn btn-default"><span class="glyphicon glyphicon-modal-window"></span> See all</button>
								</div>
							</div>
						</div>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection

@push('styles')
	<link rel="stylesheet" type="text/css" href="css/scholar_page.css"/>
@endpush

@push('scripts')
	<script src="js/default_img.js"></script>
@endpush