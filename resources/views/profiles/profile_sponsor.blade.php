@extends('layouts.userTab')

@section('content')
	<div class="container main-container">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<img src="/image/{{ $user->user_imagepath }}" class="img-responsive user-pp img-circle"/>

				<h1 class="user-name">{{ empty($sponsor1)? $sponsor->sponsor_fname : $sponsor1->sponsor_fname }}</h1>
				<h2 class="work"> {{  empty($sponsor1)? $sponsor->sponsor_agency : $sponsor1->sponsor_agency }}, {{  empty($sponsor1)? $sponsor->sponsor_job : $sponsor1->sponsor_job }}</h2>
				<h3 class="user-email">{{ empty($user1)? $user->email : $user1->email }}</h3>

				@if(Auth::user()->hasRole('sponsor'))
				<div class="btn-group flex">	
					<a href="/Sponsor/Account Settings" class="btn btn-default acc_settings">
						<span class="glyphicon glyphicon-cog"></span> Account Settings
					</a>
					<a href="#" class="btn btn-success acc_settings">
						<span class="glyphicon glyphicon-plus"></span> Create Scholarship
					</a>
				</div>
				@endif
				@if(Auth::user()->hasRole('student'))
				<div class="btn-group flex">
					<button class="btn btn-primary"> <span class="glyphicon glyphicon-envelope"></span> Message</button>
				</div>
				@endif
				@if(Auth::user()->hasRole('student'))
				
				@endif
				<div>
					@if($scholarships->count()>0)
					<h2 class="text-center">Scholarships</h2>
					<ul class="scholarships">
					@foreach($scholarships as $scho)
						<li>
							<!-- Image of the scholarship is placed here. -->
							<!-- The H2 here is just a place holder -->
							<h2 class="first-letter">{{$scho->scholarship_name[0]}}</h2>
							<article>
								<h2 class="name">{{$scho->scholarship_name}}</h2>
								<div class="btns">
									<a href="#" class="edit"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
									<a href="{{ url('profile sponsor/scholars') }}" class="view_scholars"><span class="glyphicon glyphicon-eye-open"></span> Scholars</a>
								</div>
							</article>
						</li>
					@endforeach
					</ul>
					@else
					@if( (empty($sponsor1) && $user->user_type == "sponsor") || (empty($sponsor) && $user->user_type == "student") )
					<h3 class="text-center">You haven't created any scholarships.</h3>
					@else
					<h3 class="text-center">No scholarship to show.</h3>
					@endif
					@endif
				</div>
			</div>
		</div>
	</div>

@endsection

@push('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/profile_page.css') }}"/>
@endpush