@extends("layouts.userTab")

@section('content')

	<div class="container main-container">
		{{ csrf_field() }}
		<h1 class="text-center">You have searched for: <span class="keyword">{{$keyword}}</span></h1>
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
			
				@if(!empty($scholarships))
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
								<ul class="sample-grants">
									<li>Insert grant.</li>
									<li>Insert another grant.</li>
									<li>Insert another new grant.</li>
								</ul>
								<a href="/profile scholarship/{{$scho->scholarship_id}}" class="view">View</a>
							</article>
						</li>
					</ul>
					@endforeach
				@endif

				@if(!empty($sponsors))
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

				@if(!empty($scholars))
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

				@if(!empty($opens))
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
								<ul class="sample-grants">
									<li>Insert grant.</li>
									<li>Insert another grant.</li>
									<li>Insert another new grant.</li>
								</ul>
								<a href="/profile scholarship/{{$open->scholarship_id}}" class="view">View</a>
							</article>
						</li>
					</ul>
					@endforeach
				@endif


			</div>
		</div>
	</div>
	
@endsection
