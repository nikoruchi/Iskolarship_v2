@extends("layouts.userTab")

@section('content')

	<div class="container main-container">
		{{ csrf_field() }}
		<h1 class="text-center">You have searched for: <span class="keyword">Something</span></h1>
		@foreach($filter as $filt)
		{{ $filt }}
		@endforeach
	</div>
	
@endsection