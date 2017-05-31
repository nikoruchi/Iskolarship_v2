@extends('layouts.userTab')

@section('content') 
	<div class="container main-container">
		<div class="row">
			<ul class="list-unstyled notif-options">
				<li class="notif-header"><h1 class="text-center">Notifications</h1></li>

				<li><a href="{{ url('/home') }}"><span class="glyphicon glyphicon-arrow-left"></span> Back to Home</a></li>
				<li><a href="#"><span class="glyphicon glyphicon-ok"></span> Mark All as Read</a></li>
				<li><a href="#"><span class="glyphicon glyphicon-check"></span> Read</a></li>
				<li><a href="#"><span class="glyphicon glyphicon-unchecked"></span> Unread</a></li>
				<li class="delete"><a href="#"><span class="glyphicon glyphicon-trash"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Delete All Notifications</a></li>
			</ul>
 
			<div class="col-sm-6 col-sm-offset-3">
				<div class="panel panel-default">
					<div class="panel-body">
						<ul class="list-unstyled notifs-container">
						@if($notification->count() > 0) 
							@foreach($notification as $notif) 
								@if($user->user_type == 'sponsor' && str_contains($notif->notification_desc, "A student applied for"))
								<li class="notif">
									<a href="javascript:void(0)" data-pg="{{$notif->notification_id}}" class="remove"><span class="glyphicon glyphicon-remove"></span></a>
									<img src="{{asset('image/default.jpg')}}" class="img-responsive"/>
									<p>{{$notif->notification_desc}} <a href="/profile scholarship/{{$notif->scholarship_id}}" class="view">View Application</a> <br/>
									<i>{{$notif->notification_date}}</i></p>
								</li>

								@elseif($user->user_type == 'sponsor' && str_contains($notif->notification_desc, "his slot in"))
								<li class="notif">
									<a href="javascript:void(0)" data-pg="{{$notif->notification_id}}" class="remove"><span class="glyphicon glyphicon-remove"></span></a>
									<img src="{{asset('image/default.jpg')}}" class="img-responsive"/>
									<p>{{$notif->notification_desc}} <a href="/profile scholar/{{$notif->student_id}}" class="view">View Scholar</a> <br/>
									<i>{{$notif->notification_date}}</i>
									<!-- ID:{{$notif->notification_id}} -->
									</p>
								</li>

								@elseif($user->user_type == 'student')
								<li class="notif">
									<a href="javascript:void(0)" data-pg="{{$notif->notification_id}}" class="remove"><span class="glyphicon glyphicon-remove"></span></a>
									<img src="{{asset('image/spon_def.png')}}" class="img-responsive"/>
									<p>{{$notif->notification_desc}} <a href="/profile scholarship/{{$notif->scholarship_id}}" class="view">View Scholarship</a> <br/>
									<i>{{$notif->notification_date}}</i>
									<!-- ID:{{$notif->notification_id}} -->
									</p>									
								</li>

								
								
								@endif
							@endforeach
						@else
							<li class="notif no-notif"> You currently have no notifications. </li>
						@endif
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@push('styles')
	<link rel="stylesheet" type="text/css" href="/css/notifications.css"/>
@endpush