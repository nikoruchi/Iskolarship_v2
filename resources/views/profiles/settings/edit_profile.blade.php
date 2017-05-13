@extends('layouts.userTab')
@section('content')
	<div class="container main-container">
		<div class="col-sm-4 col-sm-offset-1">
			<div class="affix panel panel-default" style="position: relative; margin-bottom: 0; border-radius: 4px 4px 0 0;">
				<div class="panel-body">
					<img src="uploads/komsai.png" class="img-circle img-responsive" />
				</div>
			</div>
			<button class="btn btn-success btn-block" style="border-radius: 0 0 4px 4px; border-top: 0;"><span class="glyphicon glyphicon-upload"></span> Upload New</button>
		</div>
		<div class="col-sm-6">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h1 class="unmargined txt-success">Profile Settings</h1>
				</div>
				<form action="/registration/Student" method="post">
					{{ csrf_field() }}

					<div class="panel-body">
						<div class="form-group">
							<label>Name:</label>
							<div class="input-group
							{{ 
								$errors->has('fname') ? ' has-error' : '',
								$errors->has('lname') ? ' has-error' : ''
							}}" >
								<input type="text" name="fname" placeholder="First Name" class="form-control" value="{{ old('fname') }}" />

								@if ($errors->has('fname'))
									<span class="help-block">
										<strong>{{ $errors->first('fname') }}</strong>
									</span>
								@endif

								<!-- FIX PLS. CSS. -->
								<!-- <span class="input-group-addon"></span> --> 

								<input type="text" name="lname" placeholder="Last Name" class="form-control" value="{{ old('lname') }}" />

								@if ($errors->has('lname'))
									<span class="help-block">
										<strong>{{ $errors->first('lname') }}</strong>
									</span>
								@endif

							</div>

							<label>Address:</label>
							<div class="input-group {{ $errors->has('address') ? ' has-error' : '' }} ">
							
								<input type="text" name="address" placeholder="e.g. Quitoles Street, San Pedro, San Jose, Antique" class="form-control" value="{{ old('address') }}"/>

								@if ($errors->has('address'))
									<span class="help-block">
										<strong>{{ $errors->first('address') }}</strong>
									</span>
								@endif

							</div>
							<label>Sex:</label>
							<div class="input-group {{ $errors->has('gender') ? ' has-error' : '' }} ">
								<div class="radio male">
									<label>
										<input type="radio" name="gender" value="male"  {{ old('gender')=="male" ? 'checked='.'"'.'checked'.'"' : '' }}>
										<span class="circle"><span class="dot"></span></span>&nbsp;
										<span class="label-text">Male</span>
									</label>
								</div>
								<div class="radio female">
									<label>
										<input type="radio" name="gender"  value="female" {{ old('gender')=="female" ? 'checked='.'"'.'checked'.'"' : '' }}>
										<span class="circle"><span class="dot">
										</span></span>&nbsp;<span class="label-text">Female</span>
									</label>
								</div>

								@if ($errors->has('gender'))
									<span class="help-block">
										<strong>{{ $errors->first('gender') }}</strong>
									</span>
								@endif

							</div>
							<label>Birthdate:</label>
							<div class="input-group {{ $errors->has('bdate') ? ' has-error' : '' }} ">
								<input type="date" name="bdate" placeholder="First Name" class="form-control" value="{{ old('bdate') }}"/>

								@if ($errors->has('bdate'))
									<span class="help-block">
										<strong>{{ $errors->first('bdate') }}</strong>
									</span>
								@endif

							</div>
							<label>Contact Number</label>
							<div class="input-group {{ $errors->has('contact') ? ' has-error' : '' }} ">
								<input type="text" name="contact" placeholder="09-XXXXXXXXX" value="{{ old('contact') }}" class="form-control" />

								@if ($errors->has('contact'))
									<span class="help-block">
										<strong>{{ $errors->first('contact') }}</strong>
									</span>
								@endif

							</div>
							<label>Nationality:</label>
							<div class="input-group {{ $errors->has('ntnlty') ? ' has-error' : '' }} ">
								<input type="text" name="ntnlty" placeholder="e.g. Filipino, American" class="form-control" value="{{ old('ntnlty') }}"/>

								@if ($errors->has('ntnlty'))
									<span class="help-block">
										<strong>{{ $errors->first('ntnlty') }}</strong>
									</span>
								@endif

							</div>
							<label>Region:</label>
							<div class="input-group {{ $errors->has('region') ? ' has-error' : '' }} ">
								<select name="region" class="form-control">
									<option disabled selected>Select Region</option>
									<optgroup label="Philippines">
										<optgroup label="LUZON">
											<option {{ old('region') == "NCR" ? 'selected' : ''}}>NCR</option>
											<option {{ old('region') == "Region I" ? 'selected' : ''}}>Region I</option>
											<option {{ old('region') == "CAR" ? 'selected' : ''}}>CAR</option>
											<option {{ old('region') == "Region II" ? 'selected' : ''}}>Region II</option>
											<option {{ old('region') == "Region III" ? 'selected' : ''}}>Region III</option>
											<option {{ old('region') == "Region IV-A" ? 'selected' : ''}}>Region IV-A</option>
											<option {{ old('region') == "MIMAROPA" ? 'selected' : ''}}>MIMAROPA</option>
											<option {{ old('region') == "Region IV-B" ? 'selected' : ''}}>Region IV-B</option>
											<option {{ old('region') == "Region V" ? 'selected' : ''}}>Region V</option>
										</optgroup>
										<optgroup label="VISAYAS">
											<option {{ old('region') == "Region VI" ? 'selected' : ''}}>Region VI</option>
											<option {{ old('region') == "Region VII" ? 'selected' : ''}}>Region VII</option>
											<option {{ old('region') == "Region VIII" ? 'selected' : ''}}>Region VIII</option>
											<option {{ old('region') == "Region XVIII" ? 'selected' : ''}}>Region XVIII</option>
										</optgroup>
										<optgroup label="MINDANAO">
											<option {{ old('region') == "Region IX" ? 'selected' : ''}}>Region IX</option>
											<option {{ old('region') == "Region X" ? 'selected' : ''}}>Region X</option>
											<option {{ old('region') == "Region XI" ? 'selected' : ''}}>Region XI</option>
											<option {{ old('region') == "Region XII" ? 'selected' : ''}}>Region XII</option>
											<option {{ old('region') == "Region XIII" ? 'selected' : ''}}>Region XIII</option>
											<option {{ old('region') == "ARMM" ? 'selected' : ''}}>ARMM</option>
										</optgroup>
									</optgroup>
									<optgroup label="Outside the Philippines">
										<option {{ old('region') == "Outside the Philippines" ? 'selected' : ''}}>Outside the Philippines</option>
									</optgroup>
								</select>

								@if ($errors->has('region'))
									<span class="help-block">
										<strong>{{ $errors->first('region') }}</strong>
									</span>
								@endif

							</div>
						</div>
						<hr/>
							<label><span class="glyphicon glyphicon-envelope"></span> Email Address:</label>
							<div class="input-group {{ $errors->has('email') ? ' has-error' : '' }} ">
								<input type="text" name="email" placeholder="What's your email Address?" class="form-control"  value="{{ old('email') }}"/>

								@if ($errors->has('email'))
									<span class="help-block">
										<strong>{{ $errors->first('email') }}</strong>
									</span>
								@endif

							</div>
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
								<input type="password" name="repassword" placeholder="Create a secure password. Minimum of 6 characters" class="form-control" />

								@if ($errors->has('repassword'))
									<span class="help-block">
										<strong>{{ $errors->first('repassword') }}</strong>
									</span>
								@endif

							</div>

						<hr/>
						<div class="form-group">
							<label>University Name:</label>
							<div class="input-group {{ $errors->has('univ') ? ' has-error' : '' }} ">
								<input type="text" name="univ" placeholder="e.g. University of the Philippines, College of XXXX" class="form-control" value="{{ old('univ') }}"/>

								@if ($errors->has('univ'))
									<span class="help-block">
										<strong>{{ $errors->first('univ') }}</strong>
									</span>
								@endif

							</div>
							<label>University Address:</label>
							<div class="input-group {{ $errors->has('univ_address') ? ' has-error' : '' }} ">
								<input type="text" name="univ_address" placeholder="e.g. Miagao, Iloilo" class="form-control" value="{{ old('univ_address') }}"/>

								@if ($errors->has('univ_address'))
									<span class="help-block">
										<strong>{{ $errors->first('univ_address') }}</strong>
									</span>
								@endif

							</div>
							<label>Begin Study:</label>
							<div class="input-group {{ $errors->has('begin_study') ? ' has-error' : '' }} ">
								<input type="date" name="begin_study" placeholder="First Name" class="form-control" value="{{ old('begin_study') }}"/>

								@if ($errors->has('begin_study'))
									<span class="help-block">
										<strong>{{ $errors->first('begin_study') }}</strong>
									</span>
								@endif

							</div>
							<label>Highest Degree Attained:</label>
							<div class="input-group {{ $errors->has('degree_att') ? ' has-error' : '' }} ">
								<select name="degree_att" class="form-control" value="{{ old('degree_att') }}">
									<option disabled selected>Select Degree</option>
									<option {{ old('degree_att') == "Highschool" ? 'selected' : ''}}>Highschool</option>
									<option {{ old('degree_att') == "Bachelor's Degree" ? 'selected' : ''}}>Bachelor's Degree</option>
									<option {{ old('degree_att') == "Master's Degree" ? 'selected' : ''}}>Master's Degree</option>
									<option {{ old('degree_att') == "Doctoral Degree" ? 'selected' : ''}}>Doctoral Degree</option>
								</select>

								@if ($errors->has('degree_att'))
									<span class="help-block">
										<strong>{{ $errors->first('degree_att') }}</strong>
									</span>
								@endif

							</div>
							<label>Study Field:</label>
							<div class="input-group {{ $errors->has('field') ? ' has-error' : '' }} ">
								<input type="text" name="field" placeholder="e.g. BS in Computer Science" class="form-control" value="{{ old('field') }}" />

								@if ($errors->has('field'))
									<span class="help-block">
										<strong>{{ $errors->first('field') }}</strong>
									</span>
								@endif

							</div>
							<label>Degree Sought:</label>
							<div class="input-group {{ $errors->has('degree_st') ? ' has-error' : '' }} ">
								<select name="degree_st" class="form-control">
									<option disabled selected>Select Degree</option>
									<option {{ old('degree_st') == "Highschool" ? 'selected' : ''}}>Highschool</option>
									<option {{ old('degree_st') == "Bachelor's Degree" ? 'selected' : ''}}>Bachelor's Degree</option>
									<option {{ old('degree_st') == "Master's Degree" ? 'selected' : ''}}>Master's Degree</option>
									<option {{ old('degree_st') == "Doctoral Degree" ? 'selected' : ''}}>Doctoral Degree</option>
								</select>

								@if ($errors->has('degree_st'))
									<span class="help-block">
										<strong>{{ $errors->first('degree_st') }}</strong>
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