$(document).ready(function(){
	i=1, j=1, k=1;
	grantSpec = [];
	specsSpec = [];
	questions = [];
	details = [];

	$(document).on("click", ".add_grant", addGrant);
	$(document).on("click", ".add_spec", addSpec);
	$(document).on("click", ".add_question", addQuestion);
	$(document).on("submit", "#create-form", createForm);
})

function createForm(e){
	e.preventDefault();
	
	details.push($('#scholarship_name').val());
	details.push($('#description').val());
	details.push($('#deadline').val());
	// console.log($('#deadline').val());
	// date = $('#deadline').val();

	// newdate = new Date(date);
	// console.log(newdate);
	console.log(details)
	console.log(grantSpec);
	console.log(specsSpec);
	console.log(questions);
	$.ajax({
		url: "/scholarship form/create",
		type: "GET",
		data: {grants:grantSpec, specifications:specsSpec, questions:questions, details:details },
		success:function(data){
			console.log("Data from send: " +data);
			// $("#compose-form").html(msgs);
		}
	})
}

function addGrant(e){
	e.preventDefault();
	var grantDesc = $("#grant-content").val();
	$('#grant-content').val(' ');
	grantSpec.push(grantDesc);
	i++;
	$('.grants').append('<li>'+ grantDesc +'<a href="#" class="delete"><span class="glyphicon glyphicon-remove"></span></a></li>');
}

function addSpec(e){
	e.preventDefault();
	var specDesc = $("#spec-content").val();
	$('#spec-content').val(' ');
	specsSpec.push(specDesc);
	j++;
	$('.specifications').append('<li>'+ specDesc +'<a href="#" class="delete"><span class="glyphicon glyphicon-remove"></span></a></li>');
}

function addQuestion(e){
	e.preventDefault();
	var qnDesc = $("#qn-content").val();
	$('#qn-content').val(' ');
	questions.push(qnDesc);
	k++;
	$('.questions').append('<li>'+ qnDesc +'<a href="#" class="delete"><span class="glyphicon glyphicon-remove"></span></a></li>');
}
