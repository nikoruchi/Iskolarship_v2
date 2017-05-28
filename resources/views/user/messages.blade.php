@extends("layouts.userTab")

@section('content')
<style>
</style>
	<div class="container main-container">
		<div class="row">
			<div class="col-sm-3">
				<div class="panel panel-default">
					<div class="panel-body">
						<h3 class="text-center">Messages</h3>
						<button class="compose" href="javascript:void(0)"><span class="glyphicon glyphicon-pencil"></span> Compose</button>
						<button class="delete" href="javascript:void(0)"><span class="glyphicon glyphicon-trash"></span> Delete</button>
						<button class="sent" href="javascript:void(0)"><span class="glyphicon glyphicon-send"></span> Sent</button>
					</div>
				</div>
			</div>
			<div class="col-sm-9">
				<div id="message-form" class="panel panel-default">
					<div class="panel-body">
						<!-- <div class="form"> -->
							<div id="compose-form">
							<form name="formMsg" id="formMsg">
								{{ csrf_field() }}
								<div class="">
									<input class="form-control" type="text" name="subject" id="subject" placeholder="Subject" value=""/>

										<span class="help-block">
											<!-- <strong></strong> -->
										</span>


								</div>
								<div class="">

									<input class="form-control" type="text" name="to" id="to" placeholder="To" value="{{empty($email)? '': $email[0]}}"/>
									<span class="help-block">
										<!-- <strong></strong> -->
									</span>
								</div>
								<div class="">
									<textarea class="form-control" placeholder="Message" name="content" id="message_content" value=""></textarea>

							
										<span class="help-block">
											<!-- <strong></strong> -->
										</span>

								</div>
								<button class="btn btn-primary pull-right send" type="submit" name="send_message" id="send_message" href="javascript:void(0)">
									<span class="glyphicon glyphicon-send"></span> Send
								</button>
							</form>
								
							</div>
						<!-- </div> -->
					</div>
				</div>
			</div>
			<div class="col-sm-9 col-sm-offset-3">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="btn-group btn-group-justified message-filter">
							<a href="javascript:void(0)" data-pg="{{ $user->user_id }}" class="allbtn btn btn-default">All</a>
							<a href="javascript:void(0)" data-pg="{{ $user->user_id }}" class="readbtn btn btn-default">Read</a>
							<a href="javascript:void(0)" data-pg="{{ $user->user_id }}" class="unreadbtn btn btn-default">Unread</a>
						</div>
						<ul class="list-unstyled messages-container" id="messages-container">
							@foreach($inbox as $message)
							<li class="message clickable" data-pg="{{$message->msg_id}}">
								<div class="panel panel-default">
									<div class="panel-body">
										<form class="select-form" id="formDel">
											<input name="messages[]" data-id="{{$message->msg_id}}" type="checkbox" class="not-clickable select cbox" value="{{$message->msg_id}}"/>
										</form>

										@if(Auth::user()->hasRole('student'))
										<p class="from"><strong>{{$message->msg_sender}}</strong></p>
										@elseif(Auth::user()->hasRole('sponsor'))
										<p class="from"><strong>{{$message->msg_sender}}</strong></p>
										@endif
										<p class="message-content">{{$message->msg_content}}</p>
										<p class="time-stamp">{{$message->created_at->diffForHumans()}}</p>
									</div>
								</div>
							</li>
							@endforeach
							
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection

@push('scripts')
	<script type="text/javascript" src="{{asset('js/script-messages.js')}}"></script>
@endpush

@push('styles')
	<link rel="stylesheet" type="text/css" href="{{asset('css/message.css')}}"/>
@endpush
