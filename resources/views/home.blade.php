@extends("layouts.userTab")

@section('content')

	<div class="container main-container">
		<div class="row">
			<div class="center-el col col-sm-6 col-sm-offset-3">
				<form class="home-search" method="get" action="/search">
				 {{ csrf_field() }} 
					<div class="input-group">
						<input type="text" name="keyword" class="form-control" placeholder="Search here!" />
						<div class="input-group-btn">
							<button class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
						</div>
					</div>
					<div class="center-el check-boxes">
						<label class="checkbox-inline"><input type="checkbox" name="search_q[]" value="scholarships"><i class="sub-check"><i class="check"></i></i>Scholarships</label>
						<label class="checkbox-inline"><input type="checkbox" name="search_q[]" value="sponsors"><i class="sub-check"><i class="check"></i></i>Sponsors</label>
						<label class="checkbox-inline"><input type="checkbox" name="search_q[]" value="scholars"><i class="sub-check"><i class="check"></i></i>Scholars</label>
						<label class="checkbox-inline"><input type="checkbox" name="search_q[]" value="open_applications"><i class="sub-check"><i class="check"></i></i>Open Applications</label>
					</div>
				</form>
			</div>
		</div>
		<div class="row">
			<h2 class="text-center suggestions-header">Scholarship Suggestions</h2>
			<div class="col-sm-8 col-sm-offset-2">
			@foreach($scholarships as $scho)
				<ul class="search-results">
					<li>
						<h2 class="first-letter">{{$scho->scholarship_name[0]}}</h2>
						<article>
							<h2 class="name">{{$scho->scholarship_name}}</h2>
							<p class="desc">
								{{$scho->scholarship_desc}}
							</p>
							<a href="/profile scholarship/{{$scho->scholarship_id}}"
						 	class="view">View</a>
						</article>
					</li>
				</ul>
			@endforeach
		</div>

@endsection

@push('styles')
	<link rel="stylesheet" type="text/css" href="css/home.css"/>
@endpush
