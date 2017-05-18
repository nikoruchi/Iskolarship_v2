@extends('layouts.userTab')

@section('content')

	<div class="container main-container">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<form>
					<h1>Create Scholarship</h1>
					<h2>Details</h2>
					<input type="text" name="scholarship_name" class="form-control" />
					<textarea name="description" class="form-control"></textarea>
					<input type="file" name="image" class="form-control"/>
					<h2>Grants</h2>
					<article>A grant.</article>
					<h2>Specifications</h2>
				</form>
			</div>
		</div>
	</div>

@endsection

@push('styles')
	<link rel="stylesheet" type="text/css" href="css/scholar_form.css"/>
@endpush
