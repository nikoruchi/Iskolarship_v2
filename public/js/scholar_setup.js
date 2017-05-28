$(document).ready(function(){
	sibName = [];
	sibScho = [];
	sibUniv = [];

	relName = [];
	relRela = [];
	relNatu = [];
	relAver = [];

	details = [];

	$(document).on("submit", "#setup-form", setupScholarAccount);
	$(document).on("click", "#add-sib-btn", addSibling);
	$(document).on("click", "#add-rel-btn", addRelative);
});

function setupScholarAccount(e){
	e.preventDefault();

	console.log(sibName);
	console.log(sibScho);
	console.log(sibUniv);

	console.log(relName);
	console.log(relRela);
	console.log(relNatu);
	console.log(relAver);

	details.push($("input[name='father_status']:checked").val());
	details.push($("input[name='father_name']").val());
	details.push($("input[name='father_occ']").val());
	details.push($("input[name='father_edu']").val());
	details.push($("input[name='father_trib']").val());
	details.push($("input[name='mother_status']:checked").val());
	details.push($("input[name='mother_name']").val());
	details.push($("input[name='mother_occ']").val());
	details.push($("input[name='mother_edu']").val());
	details.push($("input[name='mother_trib']").val());

	details.push($("input[name='father_emp_name']").val());
	details.push($("input[name='father_emp_add']").val());
	details.push($("input[name='father_income']").val());
	details.push($("input[name='father_self_income']").val());
	details.push($("input[name='mother_emp_name']").val());
	details.push($("input[name='mother_emp_add']").val());
	details.push($("input[name='mother_income']").val());
	details.push($("input[name='mother_self_income']").val());
	details.push($("input[name='Fourps']:checked").val());
	details.push($("input[name='h_unit']:checked").val());
	details.push($("input[name='mon_rent']").val());
	details.push($("input[name='mon_amor']").val());

	details.push($("input[name='ac_no']").val());
	details.push($("input[name='ac_mod_acq']").val());
	details.push($("input[name='cam_no']").val());
	details.push($("input[name='cam_mod_acq']").val());
	details.push($("input[name='veh_no']").val());
	details.push($("input[name='veh_mod_acq']").val());
	details.push($("input[name='jeep_no']").val());
	details.push($("input[name='jeep_mod_acq']").val());
	details.push($("input[name='ip_no']").val());
	details.push($("input[name='ip_mod_acq']").val());
	details.push($("input[name='com_no']").val());
	details.push($("input[name='com_mod_acq']").val());
	details.push($("input[name='frz_no']").val());
	details.push($("input[name='frz_mod_acq']").val());
	details.push($("input[name='dry_no']").val());
	details.push($("input[name='dry_mod_acq']").val());
	details.push($("input[name='pmp_no']").val());
	details.push($("input[name='pmp_mod_acq']").val());

	console.log(details);

	$.ajax({
		url: "/setup form/register",
		type: "GET",
		data: {	details:details, sibling_name:sibName, sibling_scholarship:sibScho, sibling_school:sibUniv, relative_name:relName, relative_relation:relRela, relative_nature:relNatu, relative_average:relAver },
		success:function(data){
			console.log("Data from send: " + data);
		}
	})
}

function addSibling(e){
	e.preventDefault();

	var name = $("#sib_name").val();
	var school = $("#sib_school").val();
	var scholarship = $("#sib_scholarship").val();

	$("#sib_name").val('');
	$("#sib_school").val('');
	$("#sib_scholarship").val('');

	sibName.push(name);
	sibScho.push(school);
	sibUniv.push(scholarship);

	$('#siblings').append("<tr><td>" + name + "</td><td>" + scholarship + "</td><td>" + school + "</td></tr>");
}

function addRelative(e){
	e.preventDefault();

	var name = $("#rel_name").val();
	var nature = $("#rel_nat").val();
	var relation = $("#rel_rel").val();
	var contribution = $("#rel_con").val();

	$("#rel_name").val('');
	$("#rel_nat").val('');
	$("#rel_rel").val('');
	$("#rel_con").val('');

	relName.push(name);
	relRela.push(nature);
	relNatu.push(relation);
	relAver.push(contribution);

	$('#relatives').append("<tr><td>" + name + "</td><td>" + nature + "</td><td>" + relation + "</td><td>" + contribution + "</td></tr>");
}

