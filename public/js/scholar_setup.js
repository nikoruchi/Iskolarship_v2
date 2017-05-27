$(document).ready(function(){
    $("#setup-form").submit(function(){
        $(this).hide();
    });

    $("#add-sib-btn").submit();

    $("#add-rel-btn").submit();
});

window.onload = function(){
	var setupForm = document.getElementById("setup-form");

	setupForm.addEventListener("submit", setupScholarAccount);

	var sibBtn = document.getElementById("add-sib-btn");
	var relBtn = document.getElementById("add-rel-btn");

	sibBtn.addEventListener("click", addSibling);
	relBtn.addEventListener("click", addRelative);


}

function setupScholarAccount(){}

function addSibling(){}

function addRelative(){}

