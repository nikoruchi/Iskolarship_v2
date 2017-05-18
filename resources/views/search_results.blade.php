@extends("layouts.userTab")

@section('content')

	<div class="container main-container">
		{{ csrf_field() }}
		<h1 class="text-center">You have searched for: <span class="keyword">{{$keyword}}</span></h1>
		<div>
			
				@foreach($scholarships as $scho)
				<p>	{{	$scho->scholarship_name }} <p>
				@endforeach

				@foreach($scholars as $schol)
				<p>	{{ $schol->student_fname }} {{ $schol->student_lname }} </p>
				@endforeach

				@foreach($sponsors as $spon)
				<p>	{{ $spon->sponsor_fname }} {{ $spon->sponsor_fname }} </p>
				@endforeach
		</div>
	</div>
	
@endsection