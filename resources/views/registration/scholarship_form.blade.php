@extends('layouts.userTab')

@section('content')
 
	<div class="container main-container">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<div class="panel panel-default">
					<div class="panel-body">
						<form id="create-form" method="post">
							<h1 class="text-center">Create Scholarship</h1>
							<hr>
							<h2>Details</h2>
							<input type="text" name="scholarship_name" id="scholarship_name" class="form-control" placeholder="Scholarship Name" />
							<textarea name="description" id="description" class="form-control" placeholder="Description"></textarea>

							<div class="deadline">
								<label>Deadline:</label>
								<input type="date" name="deadline" id="deadline" placeholder="deadline" class="form-control">
							</div>

							<img src="/image/default.jpg" class="uploaded-img" width="50%" />
							<label class="file-label"><span class="glyphicon glyphicon-download-alt"></span> Upload scholarship image<input type="file" id="imagefile" name="image" class="form-control"/></label>

							<!-- <button type="submit" class="btn btn-default next">Next <span class="glyphicon glyphicon-arrow-right"></span></button> -->
							<hr>
							<h2>Grants</h2>
							<ul class="grants">
							
					
							</ul>
							<div class="ajax-form">
								<textarea name="grant[]" id="grant-content" placeholder="Add a Grant"></textarea>
								<button class="btn btn-default add add_grant"><span class="glyphicon glyphicon-plus"></span></button>
							</div>
							<span class="grant-help-block"></span>

							<!-- <a class="btn btn-default next">Next <span class="glyphicon glyphicon-arrow-right"></span></a> -->
							<hr>
							<h2>Specifications</h2>
							<ul class="specifications">
								
							</ul>
							<div class="ajax-form">
								<textarea name="spec[]" id="spec-content" placeholder="Add a Specification"></textarea>
								<button class="btn btn-default add add_spec"><span class="glyphicon glyphicon-plus"></span></button>
							</div>
							<span class="spec-help-block"></span>


							<hr>
							<h2>Question</h2>
							<ul class="questions">
							

							</ul>
							<div class="ajax-form">
								<textarea name="question[]" id="qn-content" placeholder="Add a Question"></textarea>
								<button class="btn btn-default add add_question"><span class="glyphicon glyphicon-plus"></span></button>
							</div>
							<span class="qn-help-block"></span>

							<button class="btn btn-success start" type="submit">Start Scholarship <span class="glyphicon glyphicon-play-circle"></span></button>

							<span class="text-warning all-help-block"></span>

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

@push('scripts')
    <script type="text/javascript" src="/js/script-form.js"></script>
@endpush