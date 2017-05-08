@extends("layouts.userTab")

@section('content')

	<div class="container main-container">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<div class="panel">
					<div class="panel-heading">
						<img src="uploads/dost.png" class="img-responsive scholarship-logo"/>
						<h1 class="scholarship-name">DOST - SEI</h1>
						<p class="scholarship-description">The Department of Science and Technology (DOST) is devoted to accelerating the development of science and technology for socio-economic development. The Science and Technology (S&T) Scholarship Program is available for both undergraduate and graduate level scholarships, to those who meet the minimum grade requirement and those qualified by the S&T Scholarship Examination.</p>
						<div class="flex">
							<a href="#" class="btn btn-success btn-lg apply-btn"><span class="glyphicon glyphicon-education"><span class="glyphicon glyphicon-plus"></span></span>&nbsp;&nbsp;Apply</a>
						</div>
						<h2 class="scholar-count"><span class="glyphicon glyphicon-education"></span> Scholars: 231</h2>
						<ul class="list-unstyled further-details">
							<li><button class="btn btn-default btn-md"><span class="glyphicon glyphicon-briefcase"></span></button></li>
							<li><button class="btn btn-default btn-md"><span class="glyphicon glyphicon-calendar"></span></button></li>
							<li><button class="btn btn-default btn-md"><span class="glyphicon glyphicon-search"></span></button></li>
						</ul>
					</div>
					<div class="panel-body grants-specs">
						<div class="row">
							<div class="col-sm-12">
								<h3 class="text-center">Grants</h3>
								<ul class="list-unstyled">
									<li><span class="glyphicon glyphicon-usd"></span> Tuition and other fees of Php10,000.00 per semester.</li>
									<li><span class="glyphicon glyphicon-book"></span> Book allowance of Php5,000.00 per semester.</li>
									<li><span class="glyphicon glyphicon-usd"></span> Monthly stipend of Php5,000.00.</li>
								</ul>
							</div>
							<div class="col-sm-12">
								<h3 class="text-center">Specifications</h3>
								<ol class="list-unstyled">
									<li>Once selected as a qualifier, you will be given a notice of award.</li>
									<li>You and your parent/legal guardian must report to DOST-SEI or at the nearest DOST regional office for the orientation on scholarship policies and signing of the scholarship agreement.</li>
									<li>You must bring the following: (1) Parent’s/legal guardian’s community tax certificate for the current year; and (2) Affidavit of guardianship (if awardee is under the care of a legal guardian).</li>
									<li>*In case there is a need for verification of citizenship, you are required to submit your birth certificate. If evaluated favorably, you will finally be awarded a scholarship slot.</li>
									<li>Merit Scholarship awardees are required to accomplish a household information questionnaire (HIQ). Result of the evaluation of this form will determine your scholarship category: full, partial or special.</li>
								</ol>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection