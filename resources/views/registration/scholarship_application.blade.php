@extends("layouts.userTab")

@section('content')
	<div class="container main-container">
		<div class="col-sm-6 col-sm-offset-3">
			<div class="panel panel-default">
				<div class="panel-body">
					<!-- Scholarship Image; Else default Image will be provided -->
					<h1 class="text-center unmargined">Application</h1>
					<hr>
					<div class="heading">
						<div class="img-container">
							<img src="/image/{{$user->user_imagepath}}" alt="sponsor-img">
							<img src="/image/{{$scholarship->scholarship_logo}}" alt="scholarship-img">
						</div>
						<article>
							<h2>{{$scholarship->scholarship_name}}</h2>
							<!-- Sponsor Name -->
							<p class="sponsor">Sponsor: {{$scholarship->ownedBy->sponsor_fname}} {{$scholarship->ownedBy->sponsor_lname}}</p>
							<p class="quest-no">{{count($questions)}} questions</p>
						</article>
					</div>
					<hr>
					<form id="apply-form" action="/scholar questionaire/send" method="POST">
						{{ csrf_field() }}
						<input type="hidden" name="scholarshipID" value="{{ $scholarship->scholarship_id}}" /> 
						@foreach($questions as $qn)
							<label>{{$qn->essay_question}}</label>
							<input type="hidden" name="qnID[]" value="{{ $qn->essay_questionsID  }}" /> 
							<!-- <div class="input-group {{ $errors->has('answer') ? ' has-error' : '' }} "> -->
								<textarea name="answer[]" class="form-control" placeholder="Answer" required></textarea>
							<!-- </div> -->
						<!-- 	@if ($errors->has('answer'))
									<span class="help-block">
										<strong>{{ $errors->first('answer') }}</strong>
									</span>
							@endif -->

						@endforeach
						<section>
							<label><input type="checkbox" name="agreement" value="agreed" required> I agree to submit my account information, family background, and financial and socio-economic information with this application.</label>
						</section>
						<button class="btn btn-success pull-right send-app btn-lg" type="submit"><span class="glyphicon glyphicon-send"></span> Submit Application</button>
					</form>
				</div>
			</div>
		</div>
	</div>

@endsection

@push('styles')
	<link rel="stylesheet" type="text/css" href="{{asset('css/questionaire.css')}}">
@endpush
