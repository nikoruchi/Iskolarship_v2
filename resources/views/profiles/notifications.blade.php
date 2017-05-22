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
							<li class="notif no-notif">You currently have no notifications.</li>
							<li class="notif">
								<a href="#" class="remove"><span class="glyphicon glyphicon-remove"></span></a>
								<img src="{{asset('image/spon_def.png')}}" class="img-responsive"/>
								<p>Your application in <span class="sship-name">DOST</span> has been <span class="accpt">accepted</span>. <a href="#" class="view">View Scholarship</a></p>
							</li>
							<li class="notif">
								<a href="#" class="remove"><span class="glyphicon glyphicon-remove"></span></a>
								<img src="{{asset('image/spon_def.png')}}" class="img-responsive"/>
								<p>Your application in <span class="sship-name">DOST</span> has been <span class="rejct">rejected</span>. <a href="#" class="view">View Scholarship</a></p>
							</li>
							<li class="notif">
								<a href="#" class="remove"><span class="glyphicon glyphicon-remove"></span></a>
								<img src="{{asset('image/default.jpg')}}" class="img-responsive"/>
								<p><span class="schol-name">Clyde Joshua Delgado</span> <span class="cnfrm">confirmed</span> his slot in <span class="sship-name">DOST</span>. <a href="#" class="view">View Scholar</a></p>
							</li>
							<li class="notif">
								<a href="#" class="remove"><span class="glyphicon glyphicon-remove"></span></a>
								<img src="{{asset('image/default.jpg')}}" class="img-responsive"/>
								<p><span class="schol-name">Clyde Joshua Delgado</span> <span class="rejct">rejected</span> his slot in <span class="sship-name">DOST</span>. <a href="#" class="view">View Scholar</a></p>
							</li>
							<li class="notif">
								<a href="#" class="remove"><span class="glyphicon glyphicon-remove"></span></a>
								<img src="{{asset('image/default.jpg')}}" class="img-responsive"/>
								<p>A student applied for <span class="sship-name">DOST</span>. <a href="#" class="view">View Application</a></p>
							</li>
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