@extends('layouts.userTab')
 
@section('content')
	<div class="container main-container">
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<div class="panel panel-default">
					<div class="panel-body">
						<div>
						<a href="/profile sponsor/scholars" class="back-link btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back to Scholars</a>
						</div>
						<img src="/image/default.jpg" class="profile-picture">
						<h1 class="text-center">{{$app->scholar->student_fname}} {{$app->scholar->student_lname}}</h1>
						<h2 class="heading text-center">{{$app->scholar->study_field}}</h2>
						<h2 class="heading text-center">{{$app->scholar->student_university}}</h2>
						<h4 class="text-center">{{$app->scholar->student->email}}</h3>
						<p class="text-center">{{$app->scholar->student->user_aboutme}}</p>
						<h2>Family Background</h2>
						<div class="row">
							<div class="col-sm-6">
								<h3>Father</h3>		
								<p>{{$app->scholar->parents->father_name}}</p>
								<p>{{$app->scholar->parents->father_occupation}}</p>
								<p>{{$app->scholar->parents->father_education}}</p>
								<p>{{$app->scholar->parents->father_tribe}}</p>
								<p>{{$app->scholar->financial->father_employername}}</p>
								<p>{{$app->scholar->financial->father_employeraddress}}</p>
								<p>{{$app->scholar->financial->father_AGincome}}</p>
								<p>{{$app->scholar->financial->father_selfAGincome}}</p>
							</div>
							<div class="col-sm-6">
								<h3>Mother</h3>		
								<p>{{$app->scholar->parents->mother_name}}</p>
								<p>{{$app->scholar->parents->mother_occupation}}</p>
								<p>{{$app->scholar->parents->mother_education}}</p>
								<p>{{$app->scholar->parents->mother_tribe}}</p>
								<p>{{$app->scholar->financial->mother_employername}}</p>
								<p>{{$app->scholar->financial->mother_employeraddress}}</p>
								<p>{{$app->scholar->financial->mother_AGincome}}</p>
								<p>{{$app->scholar->financial->mother_selfAGincome}}</p>
							</div>
						</div>
						<h2>Siblings enjoying Scholarships</h2>
						<table class="table">
							@if($siblings->count()>0)
							<tr>
								<th>{{$siblings->sibling_name}}</th>
								<th>{{$siblings->sibling_scholarship}}</th>
								<th>{{$siblings->sibling_courseschool}}</th>
							</tr>
							@endif
							<!-- Echo sibling here -->
						</table>
						<h2>Relatives Contributing</h2>
						<table class="table">
							@if($relatives->count()>0)
							<tr>
								<th>{{$relatives->relative_name}}</th>
								<th>{{$relatives->relative_natureofcontribution}}</th>
								<th>{{$relatives->relative_relationship}}</th>
								<th>{{$relatives->relative_averagecontribution}}</th>
							</tr>
							@endif
							
							<!-- Echo relaties Here -->
						</table>
						@if($four=='yes')
						<p>Is a beneficiary of Pantawid Pamilyang Pilipino Program (4ps)</p>
						@endif
						@if($type=='own_paid')
						<p>The house is owned and fully paid.</p>
						@elseif($type=='own_amo')
						<p>The house is owned and was amortized.</p>
						@elseif($type=='own_ren')
						<p>The housing unit us rented.</p>
						@elseif($type=='own_fre')
						<p>The housing unit rent is free or with relatives.</p>
						@endif

						<p>Monthly rental: {{$app->scholar->financial->housing_rental}}</p>
						<p>Monthly amortization: {{$app->scholar->financial->housing_amortization}}</p>
						<table class="table">
							<tr>
								<th>Appliances/Vehicle</th>
								<th>No. of working units</th>
								<th>Mode of Acquisition</th>
							</tr>
							<tr>
								<td>Aircondition</td>
								<td>{{$app->scholar->appliances->aircon_num}}</td>
								<td>{{$app->scholar->appliances->aircon_acquisition}}</td>
							</tr>
							<tr>
								<td>Video Camera/Movie Camera</td>
								<td>{{$app->scholar->appliances->camera_num}}</td>
								<td>{{$app->scholar->appliances->camera_aquisition}}</td>
							</tr>
							<tr>
								<td>Car/Van/Pajero/Other similar vehicle</td>
								<td>{{$app->scholar->appliances->vehicle_num}}</td>
								<td>{{$app->scholar->appliances->vehicle_acquisition}}</td>
							</tr>
							<tr>
								<td>Jeepney (AUV/Owner Type)</td>
								<td>{{$app->scholar->appliances->jeep_num}}</td>
								<td>{{$app->scholar->appliances->jeep_acquisition}}</td>
							</tr>
							<tr>
								<td>Ipad/Ipod</td>
								<td>{{$app->scholar->appliances->ipad_num}}</td>
								<td>{{$app->scholar->appliances->ipad_acquisition}}</td>
							</tr>
							<tr>
								<td>Industrial Freezer</td>
								<td>{{$app->scholar->appliances->freezer_num}}</td>
								<td>{{$app->scholar->appliances->freezer_acquisition}}</td>
							</tr>
							<tr>
								<td>Industrial Dryer</td>
								<td>{{$app->scholar->appliances->dryer_num}}</td>
								<td>{{$app->scholar->appliances->dryer_acquisition}}</td>
							</tr>
							<tr>
								<td>Electric water pump</td>
								<td>{{$app->scholar->appliances->pump_num}}</td>
								<td>{{$app->scholar->appliances->pump_acquisition}}</td>
							</tr>
						</table>
						<h2>Answers to questions</h2>
						<ul class="list-unstyled answers-container">
							@for($i=0; $i<($questions->count());$i++)
							<!-- $questions as $qn, $answers as $ans) -->
							<li>
								<p class="question">{{$questions[$i]->essay_question}}</p>
								<p class="answer">{{$answers[$i]->essay_answer}}</p>
							</li>
							@endfor
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>	

@endsection

@push('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('css/application.css') }}"/>
@endpush