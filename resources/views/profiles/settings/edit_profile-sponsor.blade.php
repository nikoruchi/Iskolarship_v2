@extends('layouts.userTab')

@section('content')
	<div class="container main-container">
		<div class="col-sm-4 col-sm-offset-1">
			<div class="affix panel panel-default" style="position: relative; margin-bottom: 0; border-radius: 4px 4px 0 0;">
				<div class="panel-body">
					<img src="/image/{{$user->user_imagepath}}" class="img-circle img-responsive" style="background-size: cover;" />
				</div>
			</div>

			<form action="/Sponsor/upload" method="POST" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="input-group  {{ $errors->has('image') ? ' has-error' : '' }} ">
					<input type="file" class="btn btn-success btn-block" name="image" style="border-radius: 0 0 4px 4px; border-top: 0;" value="Upload New" />
				@if ($errors->has('image'))
					<span class="help-block">
						<strong>{{ $errors->first('image') }}</strong>
					</span>
				@endif
				@if(Session::has('success'))
				    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {{ session('success') }}</em></div>
				@endif
				@if(Session::has('error'))
				    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {{ session('success') }}</em></div>
				@endif
				
				<input type="submit" />
			</div>
			</form>

		</div>
		<div class="col-sm-6">
			
				<div class="panel-heading">
					<h1 class="unmargined txt-success">Account Settings</h1>
				</div>
			<div class="panel panel-default">
			<div class="panel-body">
				<div class="form-group">
					<form action="/Sponsor/Change Password" method="POST"  id="changePass">
					    {{ csrf_field() }}

				    	@if(Session::has('success_pass'))
	    					<div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {{ session('success_pass') }}</em></div>
						@endif
					        <label><span class="glyphicon glyphicon-lock"></span> Password:</label>
							<div class="input-group {{ $errors->has('password') ? ' has-error' : '' }} ">
								<input type="password" name="password" placeholder="Create a secure password. Minimum of 6 characters" class="form-control" />

								@if ($errors->has('password'))
									<span class="help-block">
										<strong>{{ $errors->first('password') }}</strong>
									</span>
								@endif

							</div>
							<label><span class="glyphicon glyphicon-lock"></span> Re-type Password</label>
							<div class="input-group {{ $errors->has('repassword') ? ' has-error' : '' }} ">
								<input type="password" name="repassword" placeholder="Re-type your password" class="form-control" />

					 			@if ($errors->has('repassword'))
									<span class="help-block">
										<strong>{{ $errors->first('repassword') }}</strong>
									</span>
								@endif
							</div>
				    	<button type="submit" class="btn btn-success pull-right" style="margin-top: 10px;">
							<span class="glyphicon glyphicon-refresh"></span>&nbsp;&nbsp;Confirm Password
						</button> 
				    </form>
				</div>
			</div>


				<form action="/Sponsor/Update Profile" method="POST" id="editForm">
					{{ csrf_field() }}
					<!-- {{ method_field('PUT') }} -->
					<div class="panel-body">
						<div class="form-group">

						@if(Session::has('success_update'))
						    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {{ session('success_update') }}</em></div>
						@endif

							<label>Name:</label>
							<div class="input-group" >
								<input type="text" name="fname" placeholder="First Name" class="form-control" value="{{$sponsor->sponsor_fname}}" />

								<input type="text" name="lname" placeholder="Last Name" class="form-control" value="{{$sponsor->sponsor_lname}}" />
							</div>

							<label>About Me</label>
							<div class="input-group" >
								<textarea name="aboutme" placeholder="Provide a short description about yourself. (max of 250 characters)" class="form-control">{{$user->user_aboutme}}</textarea>
							</div>

							<label>Address:</label>
							<div class="input-group">
							
								<input type="text" name="address" placeholder="e.g. Quitoles Street, San Pedro, San Jose, Antique" class="form-control" value="{{ $sponsor->sponsor_address }}"/>
							</div>
							<label>Contact Number</label>
							<div class="input-group">
								<input type="text" name="contact" placeholder="09-XXXXXXXXX" value="{{ $user->user_contact }}" class="form-control" />
							</div>
						</div>
						<hr/>
							<label><span class="glyphicon glyphicon-envelope"></span> Email Address:</label>
							<div class="input-group">
								<input type="text" name="email" placeholder="What's your email Address?" class="form-control"  value="{{ $user->email }}"/>
							</div>
						<hr/>
						<div class="form-group">
							<label>Agency Name:</label>
							<div class="input-group {{ $errors->has('curr_agency') ? ' has-error' : '' }} ">
								<input type="text" name="curr_agency" placeholder="e.g. University of Sample, College of Sample" class="form-control" value="{{ $sponsor->sponsor_agency }}"/>

								@if ($errors->has('curr_agency'))
									<span class="help-block">
										<strong>{{ $errors->first('curr_agency') }}</strong>
									</span>
								@endif

							</div>
							<label>Agency Address:</label>
							<div class="input-group {{ $errors->has('addr_agency') ? ' has-error' : '' }} ">
								<input type="text" name="addr_agency" placeholder="e.g Jaro, Iloilo City" class="form-control" value="{{  $sponsor->sponsor_agencyaddress }}"/>

								@if ($errors->has('addr_agency'))
									<span class="help-block">
										<strong>{{ $errors->first('addr_agency') }}</strong>
									</span>
								@endif

							</div>
							<label>Job Title:</label>
							<div class="input-group {{ $errors->has('job_title') ? ' has-error' : '' }} ">
								<input type="text" name="job_title" placeholder="e.g. III, IV" class="form-control" value="{{  $sponsor->sponsor_job }}"/>

								@if ($errors->has('job_title'))
									<span class="help-block">
										<strong>{{ $errors->first('job_title') }}</strong>
									</span>
								@endif

							</div>
						</div>
					</div>
					<div class="panel-footer overflow-a">
						<button type="submit" class="btn btn-success pull-right">
							<span class="glyphicon glyphicon-refresh"></span>&nbsp;&nbsp;Update
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>


@endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="/css/main.css"/>
    <link rel="stylesheet" type="text/css" href="/css/index.css"/>
    <link rel="stylesheet" type="text/css" href="/css/register.css"/>
	<link rel="stylesheet" type="text/css" href="css/edit_profile.css"/>
@endpush

@push('scripts')
	<script src="js/default_img.js"></script>
@endpush