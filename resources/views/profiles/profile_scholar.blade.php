@extends('layouts.userTab')
@section('content')
	<div class="container main-container">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<img src="/image/{{ $user->user_imagepath }}.jpg" class="img-responsive user-pp img-circle"/>
				<h1 class="user-name">{{ $studentProfile->student_fname }}</h1>
				<h2 class="education"> {{ $studentProfile->student_studyfield }}, {{ $studentProfile->student_university }}</h2>
				<h3 class="user-email">{{ $studentProfile->student->email }}</h3>
				<h3 class="user-description">{{ $studentProfile->student->user_aboutme }}</h3>
				@if(Auth::user()->hasRole('student'))
				<div class="btn-group flex">	
					<a href="/Account Settings" class="acc_settings">		
						<button class="btn btn-default"><span class="glyphicon glyphicon-cog"></span> Account Settings</button>
					</a>
				</div>
				@endif
				@if(Auth::user()->user_id != $studentProfile->user_id)
				<div class="btn-group flex">
					<button class="btn btn-primary"> <span class="glyphicon glyphicon-envelope"></span> Message</button>
				</div>
				@endif
				<div>
					@if((Auth::user()->user_id)==($studentProfile->user_id))
					<h2 class="text-center">Scholarships</h2>
					<ul class="scholarships">
						@foreach($pendingAvail as $scholarshipAvail)
						<li>
							<!-- Image of the scholarship is placed here. -->
							<!-- The H2 here is just a place holder -->
							<h2 class="first-letter">S</h2>
							<article>
								<h2 class="name">{{$scholarshipAvail->appscholarship->scholarship_name}}</h2>
								<div class="btns">
									<form method="post" action="/application/avail" id="acceptForm">
									{{ csrf_field() }}
										<input type="hidden" value="{{$scholarshipAvail->application_id}}" name="app_id" />
										<button type="submit" data-id="{{$scholarshipAvail->application_id}}" class="accept"><span class="glyphicon glyphicon-ok"></span> Accept</button>

									</form>
									<a href="/profile scholarship/{{ $scholarshipAvail->scholarship_id }}" class="view"><span class="glyphicon glyphicon-eye-open"></span> View</a>
									<form method="post" action="/application/rejectAvail">
											{{ csrf_field() }}
										<input type="hidden" value="{{$scholarshipAvail->application_id}}" name="app_id" />
										<button type="submit" class="reject" "><span class="glyphicon glyphicon-remove"></span> Reject</button>
									</form>
								</div>
							</article>
						</li>
						@endforeach
					</ul>
					@endif
				</div>
			</div>
		</div>
	</div>
@endsection
@push('styles')
	<link rel="stylesheet" type="text/css" href="{{asset('css/scholar_page.css')}}"/>
@endpush
@push('scripts')
	<script src="js/default_img.js"></script>
@endpush