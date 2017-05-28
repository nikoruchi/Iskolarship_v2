window.onload = function(){
	preview = document.getElementById("img-preview");
	fileName = document.getElementById("file-name");
	selectBtn = document.getElementById("img-upload");
	uploadBtn = document.getElementById("change-pic");

	selectBtn.addEventListener("change", updateUI);
	console.log("script loaded");
}

function updateUI(){
	preview.src = "/image/" + selectBtn.files[0].name; 
	fileName.innerHTML = selectBtn.files[0].name; 
	console.log("changed name");
}
