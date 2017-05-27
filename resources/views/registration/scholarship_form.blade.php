@extends('layouts.userTab')

@section('content')
 
	<div class="container main-container">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<div class="panel panel-default">
					<div class="panel-body">
						<form>
							<h1 class="text-center">Create Scholarship</h1>
							<hr>
							<h2>Details</h2>
							<input type="text" name="scholarship_name" class="form-control" placeholder="Scholarship Name" />
							<textarea name="description" class="form-control" placeholder="Description"></textarea>
							<label class="file-label"><span class="glyphicon glyphicon-download-alt"></span> Upload File<input type="file" name="image" class="form-control"/></label>
							<img src="#" class="uploaded-img" />
							<!-- <button type="submit" class="btn btn-default next">Next <span class="glyphicon glyphicon-arrow-right"></span></button> -->
							<hr>
							<h2>Grants</h2>
							<ul class="grants">
								<li>A grant.
									<a href="#" class="edit"><span class="glyphicon glyphicon-edit"></span></a>
									<a href="#" class="delete"><span class="glyphicon glyphicon-remove"></span></a>
								</li>
								<li>Another grant.
									<a href="#" class="edit"><span class="glyphicon glyphicon-edit"></span></a>
									<a href="#" class="delete"><span class="glyphicon glyphicon-remove"></span></a>
								</li>
								<li>Last grant.
									<a href="#" class="edit"><span class="glyphicon glyphicon-edit"></span></a>
									<a href="#" class="delete"><span class="glyphicon glyphicon-remove"></span></a>
								</li>
							</ul>
							<div class="ajax-form">
								<textarea name="grant" placeholder="Add a Grant"></textarea>
								<button class="btn btn-default add"><span class="glyphicon glyphicon-plus"></span></button>
							</div>
							<!-- <a class="btn btn-default next">Next <span class="glyphicon glyphicon-arrow-right"></span></a> -->
							<hr>
							<h2>Specifications</h2>
							<ul class="specifications">
								<li>A specification.
									<a href="#" class="edit"><span class="glyphicon glyphicon-edit"></span></a>
									<a href="#" class="delete"><span class="glyphicon glyphicon-remove"></span></a>
								</li>
								<li>Another specification.
									<a href="#" class="edit"><span class="glyphicon glyphicon-edit"></span></a>
									<a href="#" class="delete"><span class="glyphicon glyphicon-remove"></span></a>
								</li>
								<li>Last specification.
									<a href="#" class="edit"><span class="glyphicon glyphicon-edit"></span></a>
									<a href="#" class="delete"><span class="glyphicon glyphicon-remove"></span></a>
								</li>
							</ul>
							<div class="ajax-form">
								<textarea name="spec" placeholder="Add a Specification"></textarea>
								<button class="btn btn-default add"><span class="glyphicon glyphicon-plus"></span></button>
							</div>
							<!-- <a class="btn btn-default next">Next <span class="glyphicon glyphicon-arrow-right"></span></a> -->
							<hr>
							<h2>Question</h2>
							<ul class="questions">
								<li>A question. A question. A question. A question. A question. A question. A question. A question. A question. A question. A question. A question. A question. A question. A question. A question. A question. A question. A question. A question. A question. A question. A question. A question. A question.
									<a href="#" class="edit"><span class="glyphicon glyphicon-edit"></span></a>
									<a href="#" class="delete"><span class="glyphicon glyphicon-remove"></span></a>
								</li>
								<li>Another question.
									<a href="#" class="edit"><span class="glyphicon glyphicon-edit"></span></a>
									<a href="#" class="delete"><span class="glyphicon glyphicon-remove"></span></a>
								</li>
								<li>Last question.
									<a href="#" class="edit"><span class="glyphicon glyphicon-edit"></span></a>
									<a href="#" class="delete"><span class="glyphicon glyphicon-remove"></span></a>
								</li>
							</ul>
							<div class="ajax-form">
								<textarea name="question" placeholder="Add a Question"></textarea>
								<button class="btn btn-default add"><span class="glyphicon glyphicon-plus"></span></button>
							</div>
							<button class="btn btn-success start" type="submit">Start Scholarship <span class="glyphicon glyphicon-play-circle"></span></button>
							<!-- <a href="#" class="btn btn-default next">Next <span class="glyphicon glyphicon-arrow-right"></span></a> -->
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection

@push('styles')
	<link rel="stylesheet" type="text/css" href="css/scholarship_form.css"/>
@endpush
