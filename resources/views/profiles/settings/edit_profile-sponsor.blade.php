@extends('layouts.userTab')

@section('content')
	<div class="container main-container">
		<div class="col-sm-2">
			<span class="square-img">
				<img src="/image/{{$user->user_imagepath}}" class="img-circle img-responsive" id="img-preview" />
			</span>

			<form action="/Sponsor/upload" method="POST" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="input-group text-center {{ $errors->has('image') ? ' has-error' : '' }} ">
					<label class="file-label"><span class="glyphicon glyphicon-download-alt"></span> <span id="file-name">Select a file</span><input type="file" class="btn btn-default btn-block {{ $errors->has('image') ? ' has-error' : '' }}" name="image" value="Upload New" id="img-upload"/></label>
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
				
					<button type="submit" class="btn btn-success btn-block" id="change-pic"><span class="glyphicon glyphicon-upload"></span>&nbsp;Upload Image</button> 
				</div>
			</form>
			<form action="/Sponsor/Change Password" method="POST"  id="changePass">
			    {{ csrf_field() }}

		    	@if(Session::has('success_pass'))
					<div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {{ session('success_pass') }}</em></div>
				@endif
					<div class="input-group {{ $errors->has('password') ? ' has-error' : '' }} ">
				        <label><span class="glyphicon glyphicon-lock"></span> Password:</label>
						<input type="password" name="password" placeholder="Password" class="form-control" />

						@if ($errors->has('password'))
							<span class="help-block">
								<strong>{{ $errors->first('password') }}</strong>
							</span>
						@endif

					</div>
					<div class="input-group {{ $errors->has('repassword') ? ' has-error' : '' }} ">
						<label><span class="glyphicon glyphicon-lock"></span> Confirm Password</label>
						<input type="password" name="repassword" placeholder="Retype password" class="form-control" />

			 			@if ($errors->has('repassword'))
							<span class="help-block">
								<strong>{{ $errors->first('repassword') }}</strong>
							</span>
						@endif
					</div>
		    	<button type="submit" class="btn btn-success btn-block text-center" style="margin-top: 10px;">
					<span class="glyphicon glyphicon-refresh"></span>&nbsp;&nbsp;Confirm Password
				</button> 
		    </form>
		</div>
		<div class="col-sm-10">
			<div class="row">
				<form action="/Sponsor/Update Profile" method="POST" id="editForm">
					<div class="col-sm-6">
						{{ csrf_field() }}
						<!-- {{ method_field('PUT') }} -->
						<div class="form-group">

						@if(Session::has('success_update'))
						    <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {{ session('success_update') }}</em></div>
						@endif

							<div class="input-group name" >
								<label>Name:</label>
								<input type="text" name="fname" placeholder="First Name" class="form-control" value="{{$sponsor->sponsor_fname}}" />

								<input type="text" name="lname" placeholder="Last Name" class="form-control" value="{{$sponsor->sponsor_lname}}" />
							</div>

							<div class="input-group" >
								<label>About Me</label>
								<textarea name="aboutme" placeholder="Provide a short description about yourself. (max of 250 characters)" class="form-control">{{$user->user_aboutme}}</textarea>
							</div>

							<div class="input-group">
								<label>Address:</label>
							
								<input type="text" name="address" placeholder="e.g. Quitoles Street, San Pedro, San Jose, Antique" class="form-control" value="{{ $sponsor->sponsor_address }}"/>
							</div>
							<div class="input-group">
								<label>Contact Number</label>
								<input type="text" name="contact" placeholder="09-XXXXXXXXX" value="{{ $user->user_contact }}" class="form-control" />
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<div class="input-group">
								<label><span class="glyphicon glyphicon-envelope"></span> Email Address:</label>
								<input type="text" name="email" placeholder="What's your email Address?" class="form-control"  value="{{ $user->email }}"/>
							</div>
							<div class="input-group {{ $errors->has('curr_agency') ? ' has-error' : '' }} ">
								<label>Agency Name:</label>
								<input type="text" name="curr_agency" placeholder="e.g. University of Sample, College of Sample" class="form-control" value="{{ $sponsor->sponsor_agency }}"/>

								@if ($errors->has('curr_agency'))
									<span class="help-block">
										<strong>{{ $errors->first('curr_agency') }}</strong>
									</span>
								@endif

							</div>
							<div class="input-group {{ $errors->has('addr_agency') ? ' has-error' : '' }} ">
								<label>Agency Address:</label>
								<input type="text" name="addr_agency" placeholder="e.g Jaro, Iloilo City" class="form-control" value="{{  $sponsor->sponsor_agencyaddress }}"/>

								@if ($errors->has('addr_agency'))
									<span class="help-block">
										<strong>{{ $errors->first('addr_agency') }}</strong>
									</span>
								@endif

							</div>
							<div class="input-group {{ $errors->has('job_title') ? ' has-error' : '' }} ">
								<label>Job Title:</label>
								<input type="text" name="job_title" placeholder="e.g. III, IV" class="form-control" value="{{  $sponsor->sponsor_job }}"/>

								@if ($errors->has('job_title'))
									<span class="help-block">
										<strong>{{ $errors->first('job_title') }}</strong>
									</span>
								@endif

							</div>
							<button type="submit" class="btn btn-success pull-right">
								<span class="glyphicon glyphicon-refresh"></span>&nbsp;&nbsp;Update
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>


@endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}"/>
	<link rel="stylesheet" type="text/css" href="{{asset('css/edit_profile.css')}}"/>
@endpush

@push('scripts')
	<script src="{{asset('js/upload_img.js')}}"></script>
@endpush