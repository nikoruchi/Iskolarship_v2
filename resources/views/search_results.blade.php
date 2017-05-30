@extends("layouts.userTab")

@section('content')

	<div class="container main-container">
		{{ csrf_field() }}
		<ul class="internal-links">
			<li><a href="/home"><span class="glyphicon glyphicon-arrow-left"></span> Back to Home</a></li>
			<li><a href="#scholarships">Scholarships</a></li>
			<li><a href="#sponsors">Sponsors</a></li>
			<li><a href="#scholars">Scholars</a></li>
			<li><a href="#open">Open Scholarships</a></li>
		</ul>
		<h1 class="text-center you-search">You have searched for: <span class="keyword">{{$keyword}}</span></h1>
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
			
				@if(count($scholarships) > 0 || count($sponsors) > 0 || count($scholars) > 0 || count($opens) > 0)
					@if(count($scholarships) > 0)
						<h1 class="category" id="scholarships"> Scholarships </h1>
						@foreach($scholarships as $scho)
						<ul class="search-results">
							<li>
								<!-- Image of the scholarship is placed here. -->
								<!-- The H2 here is just a place holder -->
								<h2 class="first-letter">{{ $scho->scholarship_name[0] }}</h2>
								<article>
									<h2 class="name">{{ $scho->scholarship_name}}</h2>
									<p class="desc">
										{{ $scho->scholarship_desc }}
									</p>
									<a href="/profile scholarship/{{$scho->scholarship_id}}" class="view">View</a>
								</article>
							</li>
						</ul>
						@endforeach
					@endif

					
					@if(count($sponsors) > 0)
						<h1 class="category" id="sponsors"> Sponsors </h1>
						@foreach($sponsors as $spon)
						<ul class="search-results">
							<li>
								<!-- Image of the scholarship is placed here. -->
								<!-- The H2 here is just a place holder -->
								<h2 class="first-letter">{{ $spon->sponsor_fname[0] }}</h2>
								<article>
									<h2 class="name">{{ $spon->sponsor_fname }} {{ $spon->sponsor_lname }}</h2>
									<p class="desc"> {{ $spon->sponsor_job }} </p>
									<p class="desc"> {{ $spon->sponsor_agency }} </p>
									
									<a href="/profile sponsor/{{$spon->sponsor_id}}" class="view">View</a>
								</article>
							</li>
						</ul>
						<p></p>
						@endforeach
					@endif

					
					@if(count($scholars) > 0)
						<h1 class="category" id="scholars"> Scholars </h1>
						@foreach($scholars as $schol)
						<ul class="search-results">
							<li>
								<!-- Image of the scholarship is placed here. -->
								<!-- The H2 here is just a place holder -->
								<h2 class="first-letter">{{ $schol->student_fname[0] }}</h2>
								<article>
									<h2 class="name">{{ $schol->student_fname }} {{ $schol->student_lname }}</h2>
									<p class="desc"> {{ $schol->student_studyfield }} </p>
									<p class="desc"> {{ $schol->student_university }} </p>
									<a href="/profile scholar/{{$schol->student_id}}" class="view">View</a>
								</article>
							</li>
						</ul>
						@endforeach
					@endif

					
					@if(count($opens) > 0)
						<h1 class="category" id="open"> Open Scholarships </h1>
						@foreach($opens as $open)
						<ul class="search-results">
							<li>
								<!-- Image of the scholarship is placed here. -->
								<!-- The H2 here is just a place holder -->

								<h2 class="first-letter">{{ $open->scholarship_name[0] }}</h2>
								<article>
									<h2 class="name"> {{ $open->scholarship_name}} </h2>
									<p class="desc"> {{ $open->scholarship_desc }} </p>
									<p class="desc"> Application Deadline: {{ $open->scholarship_deadlineenddate }} </p>
									
									<a href="/profile scholarship/{{$open->scholarship_id}}" class="view">View</a>
								</article>
							</li>
						</ul>
						@endforeach
					@endif
				@else
					<h1 class="no-results">No Results</h1>
				@endif


			</div>
		</div>
	</div>
	
@endsection

@push('styles')
	<link rel="stylesheet" type="text/css" href="{{asset('css/search.css')}}">
@endpush

@push('scripts')
	<script type="text/javascript">
		$(document).on('click', 'a', function(event){
		    // event.preventDefault();

		    $('html, body').animate({
		        scrollTop: $( $.attr(this, 'href') ).offset().top - 110
		    }, 500);
		});
	</script>
@endpush
