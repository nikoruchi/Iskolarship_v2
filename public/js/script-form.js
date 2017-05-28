$(document).ready(function(){
	i=1, j=1, k=1;
	grantSpec = [];
	specsSpec = [];
	questions = [];
	details = [];
	spec_count = 0;
	grant_count = 0;
	qn_count = 0;
	$(document).on("click", ".add_grant", addGrant);
	$(document).on("click", ".add_spec", addSpec);
	$(document).on("click", ".add_question", addQuestion);
	$(document).on("click", ".delete_qn", deleteQuestion);
	$(document).on("click", ".delete_grant", deleteGrant);
	$(document).on("click", ".delete_spec", deleteSpec);
	$(document).on("submit", "#create-form", createForm);
	$(document).on("change", "#imagefile", preview);
	$(document).on("submit", ".uploadimage", upload);

})

function upload(e){

}

function getURL(input){
	if(input.files && input.files[0]){
		var reader = new FileReader();
		reader.onload = function (e){
			$('.uploaded-img').attr('src',e.target.result);
		}
		reader.readAsDataURL(input.files[0]);
	}
}

function preview(){
	getURL(this);
}


function createForm(e){
	e.preventDefault();
	
	details.push($('#scholarship_name').val());
	details.push($('#description').val());
	details.push($('#deadline').val());

	if(spec_count <= 0 || grant_count<=0  || qn_count <= 0){
		$('.all-help-block').html("Grants, Specifications and Questions must not be empty.")
	} else {
		// var formData = new FormData();
		// formData.append('image', $('input[type=file]')[0].files[0]);
		// console.log(formData); 
		$.ajax({
			url: "/scholarship form/create",
			type: "GET",
			data: {grants:grantSpec, 
				specifications:specsSpec, 
				questions:questions, 
				details:details, 
				// formData:formData },
			},
			success:function(data){
				console.log("Data from send: " +data);
			},
			error:function(data){
				console.log("Error: " +data);
			}
		})
	}
}

function addGrant(e){
	e.preventDefault();
	var grantDesc = $("#grant-content").val();
	if(grantDesc==''){
		 $('.grant-help-block').html("Field must not be empty.");
	} else {
		$('#grant-content').val('');
		$('.grant-help-block').html(" ")
		grantSpec.push(grantDesc);
		grant_count++;
		i++;
		$('.grants').append('<li id="i'+i+'">' + grantDesc +'<a href="#" data-id="i'+ i +'" data-input="'+ grantDesc +'" class="delete delete_grant"><span class="glyphicon glyphicon-remove"></span></a></li>');	
	}
	
}

function addSpec(e){
	e.preventDefault();
	var specDesc = $("#spec-content").val();
	if(specDesc==''){
		 $('.spec-help-block').html("Field must not be empty.");
	} else {
		$('#spec-content').val('');
		$('.spec-help-block').html(" ")
		specsSpec.push(specDesc);
		spec_count++;
		j++;
		$('.specifications').append('<li id="j'+j+'">'+ specDesc +'<a href="#" data-id="j'+ j +'" data-input="'+ specDesc +'" class="delete delete_spec"><span class="glyphicon glyphicon-remove"></span></a></li>');
	}
}

function addQuestion(e){
	e.preventDefault();
	var qnDesc = $("#qn-content").val();
	if(qnDesc==''){
		 $('.qn-help-block').html("Field must not be empty.");
	} else {
		$('.qn-help-block').html(" ");
		$('#qn-content').val('');
		questions.push(qnDesc);
		qn_count++;
		k++;
		$('.questions').append('<li id="k'+k+'">'+ qnDesc +'<a href="#" data-id="k'+ k +'" data-input="'+ qnDesc +'" class="delete delete_qn"><span class="glyphicon glyphicon-remove"></span></a></li>');
	}
}

function deleteQuestion(e){
	e.preventDefault();
	var id = $(this).attr("data-id");
	var input = $(this).attr("data-input");

	console.log(id);	
	$('.qn-help-block').html(" ");
	$('.questions #'+ id).remove();
	console.log("input to remove is: " + input);

	var itemtoRemove = input;
	questions.splice($.inArray(itemtoRemove,questions),1);
	console.log("input after removing: ");
	console.log(questions);
}

function deleteGrant(e){
	e.preventDefault();
	var id = $(this).attr("data-id");
	var input = $(this).attr("data-input");

	console.log(id);	
	$('.grant-help-block').html(" ");
	$('.grants #'+ id).remove();
	console.log("input to remove in grants is: " + input);

	var itemtoRemove = input;
	grantSpec.splice($.inArray(itemtoRemove,grantSpec),1);
	console.log("input after removing grant: ");
	console.log(grantSpec);
	
}

function deleteSpec(e){
	e.preventDefault();
	var id = $(this).attr("data-id");
	var input = $(this).attr("data-input");

	console.log(id);	
	$('.spec-help-block').html(" ");
	$('.specifications #'+ id +'').remove();
	console.log("input to remove in spec is: " + input);

	var itemtoRemove = input;
	specsSpec.splice($.inArray(itemtoRemove,specsSpec),1);
	console.log("input after removing: ");
	console.log(specsSpec);
}