@extends('layouts.userTab')
  
@section('content')
	<ul class="scholar-links">
	@if(Auth::user()->hasRole('sponsor'))
		<li><a href="{{ url('/profile sponsor') }}"><span class="glyphicon glyphicon-arrow-left"></span> Back to Profile</a></li>
	@elseif(Auth::user()->hasRole('student'))
		<li><a href="{{ url('/profile scholar')}}"><span class="glyphicon glyphicon-arrow-left"></span> Back to Profile</a></li>
	@endif
		<li><a href="#pend">Pending</a></li>
		<li><a href="#offic">Official</a></li>
	</ul>
	<div class="container main-container">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<div>
					<h2 class="text-center scholars">Scholars</h2>

					@if(($pendingApplications->count())>0)
					<h3 class="text-center" id="pend">Pending</h3>
					<ul class="scholarships">

						@foreach($pendingApplications as $application)
						<li>
							<!-- Image of the scholarship is placed here. -->
							<!-- The H2 here is just a place holder -->
							<h2 class="first-letter">{{ $application->scholar->student_fname[0] }}</h2>
							<article>
								<h2 class="name">{{$application->scholar->student_fname}} {{$application->scholar->student_lname}}
									<small>{{$application->scholarship->scholarship_name}}</small>
								</h2>
								<div class="btns">
									<form method="get" action="/application/accept">
											{{ csrf_field() }}
										<input type="hidden" value="{{$application->application_id}}" name="app_id" />
										<button type="submit" class="accept"><span class="glyphicon glyphicon-remove"></span> Accept</button>
									</form>

									<a href="/profile scholar/{{$application->student_id}}" class="view"><span class="glyphicon glyphicon-eye-open"></span> View</a>
									<form method="get" action="/application/reject">
											{{ csrf_field() }}
										<input type="hidden" value="{{$application->application_id}}" name="app_id" />
										<button type="submit" class="reject"><span class="glyphicon glyphicon-remove"></span> Reject</button>
									</form>

								</div>
							</article>
						</li>
						@endforeach
					</ul>
					@else 
						<h5 class="text-center">No pending applications.</h5>
					@endif

					@if(($officialScholars->count())>0)
					<h3 class="text-center" id="offic">Official</h3>
					<ul class="scholarships">
						@foreach($officialScholars as $scholar)
						<li>
							<h2 class="first-letter">{{ $scholar->scholar->student_fname[0] }}</h2>
							<article>
								<h2 class="name">{{$scholar->scholar->student_fname}} {{$scholar->scholar->student_lname}}
									<small>{{$scholar->scholarship->scholarship_name}}</small>
								</h2>
								<div class="btns">

									<a href="/profile scholar/{{ $scholar->scholar->student_id }}" class="view"><span class="glyphicon glyphicon-eye-open"></span> View</a>

									<form method="get" action="/scholars/remove">
											{{ csrf_field() }}
										<input type="hidden" value="{{$scholar->application_id}}" name="app_id" />
										<button type="submit" class="reject"><span class="glyphicon glyphicon-remove"></span> Remove</button>
									</form>

								</div>
							</article>
						</li>
						@endforeach
					</ul>
					@else
						<h5 class="text-center">No official scholars.</h5>
					@endif
				</div>
			</div>
		</div>
	</div>

@endsection

@push('styles')
	<link rel="stylesheet" type="text/css" href="/css/profile_page.css"/>
@endpush