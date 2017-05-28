@extends("layouts.userTab")

@section('content')

	<div class="container main-container">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<div class="panel">
					<div class="panel-heading">
						<img src="/image/{{$scholarship->scholarship_logo}}" class="img-responsive scholarship-logo"/>
										
							<form action="{{url('/edit', [$scholarship->scholarship_id])}}" method="POST" enctype="multipart/form-data">
								{{ method_field('PUT') }}
								{{ csrf_field() }}
								<div class="input-group text-center {{ $errors->has('image') ? ' has-error' : '' }} center-block">
									<input type="file" class="btn btn-default btn-block {{ $errors->has('image') ? ' has-error' : '' }}" name="image" style="border-radius: 0; border-top: 0;" value="Upload New" />
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
								
									<button type="submit" class="btn btn-success btn-block" style="border-radius: 4px; border-top: 0;"><span class="glyphicon glyphicon-upload" ></span>&nbsp;Upload Image</button> 
								</div>		
							</form>		
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection

@push('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/scholarship_page.css') }}"/>
@endpush