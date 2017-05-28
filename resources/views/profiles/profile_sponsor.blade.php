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
					@if(Auth::user()->user_id==$user1->user_id)
					<div class="btn-group flex">	
						<a href="/Sponsor/Account Settings" class="btn btn-default acc_settings">
							<span class="glyphicon glyphicon-cog"></span> Account Settings
						</a>
						<a href="#" class="btn btn-success acc_settings">
							<span class="glyphicon glyphicon-plus"></span> Create Scholarship
						</a>
					</div>
					@endif
				@endif
				@if(Auth::user()->hasRole('student'))
				<div class="btn-group flex">
					<a href="{{ url('/messages',[$sponsor->sponsor_id])}}">
						<button class="btn btn-primary"> <span class="glyphicon glyphicon-envelope"></span> Message</button>
					</a>
				</div>
				@endif
				<div>
					@if(!empty($openscholarships) || !empty($endscholarships))
					<h2 class="text-center">Scholarships</h2>
					<ul class="scholarships">
					
					<h4> Open Scholarships </h4>
					@if(!empty($openscholarships))						
						@foreach($openscholarships as $scho)
							<li>
								
								<h2 class="first-letter">{{$scho->scholarship_name[0]}}</h2>
								<article>
									<h2 class="name">{{$scho->scholarship_name}}</h2>
									<h6><b> Application Deadline: </b><i> {{date('m/d/Y', strtotime($scho->scholarship_deadlineenddate))}} </i></h6>
									@if(Auth::user()->user_id==$user1->user_id)
										<div class="btns">
											<a href="#" class="edit"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
											<a href="{{ url('profile sponsor/scholars') }}" class="view_scholars"><span class="glyphicon glyphicon-eye-open"></span> Scholars</a>
										</div>
									@else
										<div class="btns">
											<a href="/profile scholarship/{{$scho->scholarship_id}}" class="view_scholars"><span class="glyphicon glyphicon-eye-open"></span> View</a>
										</div>
									@endif
								</article>
								
							</li>
						@endforeach
					@else
						@if( (empty($sponsor1) && $user->user_type == "sponsor") || (empty($sponsor) && $user->user_type == "student") )
							<h5 class="text-center">You haven't created any open scholarships.</h5>
						@else
							<h5 class="text-center">No open scholarship to show.</h5>
						@endif
					@endif

					<h4> Closed Scholarships </h4>
					@if(!empty($endscholarships))
						@foreach($endscholarships as $scho)
							<li>

								<h2 class="first-letter">{{$scho->scholarship_name[0]}}</h2>
								<article>
									<h2 class="name">{{$scho->scholarship_name}} </h2>
									<h6> <b> Application Period: </b> <i> {{date('m/d/Y', strtotime($scho->scholarship_deadlinestartdate))}} - {{date('m/d/Y', strtotime($scho->scholarship_deadlineenddate))}} </i> </h6>
									@if(Auth::user()->user_id==$user1->user_id)
										<div class="btns">
											<a href="javascript:void(0)" data-target="#reOpen{{$scho->scholarship_id}}" data-pg="{{$scho->scholarship_id}}" class="edit" data-toggle="modal"><span class="glyphicon glyphicon-pencil"></span> Re-open</a>
											<a href="{{ url('profile sponsor/scholars') }}" class="view_scholars"><span class="glyphicon glyphicon-eye-open"></span> Scholars</a>
										</div>
									@else
										<div class="btns">
											<a href="/profile scholarship/{{$scho->scholarship_id}}" class="view_scholars"><span class="glyphicon glyphicon-eye-open"></span> View</a>
										</div>
									@endif
								</article>
															
							</li>
							
							<!-- RE-OPEN MODAL -->
							<div id="reOpen{{$scho->scholarship_id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
							  	<div class="modal-dialog">
								    <div class="modal-content">
								      	<div class="modal-header">
								        	<button type="button" class="close" data-dismiss="modal">&times;</button>
								        	<h4 class="modal-title">Re-Open {{$scho->scholarship_name}} Application</h4>
								      	</div>
								      	<div class="modal-body">

								        	<form action="/scholarship/reopen/{{$scho->scholarship_id}}" method="get">
									        	<div class="input-group">
									        		<p> {{$scho->scholarship_id}} {{$scho->scholarship_name}} </p>
													<input type="date" name="new_deadline" class="form-control" />
													<input type="text" name="scholarship_id" value="{{$scho->scholarship_id}}" style="display:none"/>
										</div>
								      	<div class="modal-footer">
													<div class="input-group-btn">
														<button class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span> Re-Open</button>
														<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
													</div>
												</div>
								        		
								        	</form>								        	
								      	</div>
								    </div>
							  	</div>
							</div>
						@endforeach
					@else
						@if( (empty($sponsor1) && $user->user_type == "sponsor") || (empty($sponsor) && $user->user_type == "student") )
							<h5 class="text-center">You haven't created any open scholarships.</h5>
						@else
							<h5 class="text-center">No open scholarship to show.</h5>
						@endif
					@endif
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