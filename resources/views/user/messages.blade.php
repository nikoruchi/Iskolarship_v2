@extends("layouts.userTab")

@section('content')
	<div class="container main-container">
		<div class="row">
			<div class="col-sm-3">
				<div class="panel panel-default">
					<div class="panel-body">
						<h3 class="text-center">Messages</h3>
						<button class="btn btn-success btn-block">COMPOSE</button>
						<button class="btn btn-danger btn-block">DELETE</button>
					</div>
				</div>
			</div>
			<div class="col-sm-9">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="form">
							<div class="form-group">
								<input class="form-control" type="text" name="subject" placeholder="Subject"/>
								<input class="form-control" type="text" name="to" placeholder="To"/>
								<textarea class="form-control" placeholder="Message"></textarea>
								<button class="btn btn-primary pull-right" type="submit" name="send_message">
									<span class="glyphicon glyphicon-send"></span>
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-9 col-sm-offset-3">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="btn-group btn-group-justified message-filter">
							<a href="#" class="btn btn-default">All</a>
							<a href="#" class="btn btn-default">Read</a>
							<a href="#" class="btn btn-default">Unread</a>
						</div>
						<ul class="list-unstyled messages-container">
							<li class="message">
								<div class="panel panel-default">
									<div class="panel-body">
										<form class="select-form">
											<input type="checkbox" class="select"/>
										</form>
										<p class="from"><strong>Clyde Joshua Delgado</strong></p>
										<p class="message-content">Boi kamusta na ang scholarship mo?</p>
										<p class="time-stamp">1:00 am</p>
									</div>
								</div>
							</li>
							<li class="message">
								<div class="panel panel-default">
									<div class="panel-body">
										<form class="select-form">
											<input type="checkbox" class="select"/>
										</form>
										<p class="from"><strong>Clyde Joshua Delgado</strong></p>
										<p class="message-content">Boi kamusta na ang scholarship mo?</p>
										<p class="time-stamp">1:00 am</p>
									</div>
								</div>
							</li>
							<li class="message">
								<div class="panel panel-default">
									<div class="panel-body">
										<form class="select-form">
											<input type="checkbox" class="select"/>
										</form>
										<p class="from"><strong>Clyde Joshua Delgado</strong></p>
										<p class="message-content">Boi kamusta na ang scholarship mo?</p>
										<p class="time-stamp">1:00 am</p>
									</div>
								</div>
							</li>
							<li class="message">
								<div class="panel panel-default">
									<div class="panel-body">
										<form class="select-form">
											<input type="checkbox" class="select"/>
										</form>
										<p class="from"><strong>Clyde Joshua Delgado</strong></p>
										<p class="message-content">Boi kamusta na ang scholarship mo?</p>
										<p class="time-stamp">1:00 am</p>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection

@push('styles')
	<link rel="stylesheet" type="text/css" href="css/message.css"/>
@endpush