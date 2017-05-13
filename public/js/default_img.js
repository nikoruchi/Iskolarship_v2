window.onload = function(){
	var images = document.getElementsByTagName("img");

	for (var i = 0; i < images.length; i++) {
		addDefault(i);
	}
}

function addDefault(index){
	var images = document.getElementsByTagName("img");

	images[index].addEventListener("error", function(){
		images[index].src = "uploads/komsai.png";
		images[index].style.backgroundColor = "red";
	});

	console.log("Added default image for image number " + index);
}