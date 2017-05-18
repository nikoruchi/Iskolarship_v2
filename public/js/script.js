$(document).ready(function(){
	$(document).on("click", ".accept", accept);
});


$(document).ready(function(){
	$(document).on("click",".reject", reject);
})

function accept(e){
	var id = $(this).attr("data-id");
	console.log("ID: " + id);
	 $.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name="csrf_token"]').attr('content') }
    });
	$.ajax({
		url: "/application/avail",
		type: "POST",
		data: {id: id},
		success:function(data){
			console.log(data);
			console.log("yay");
			
		},
		error:function(data){
			console.log("error");
		}
	})
}

function reject(e){
	var id = $(this).attr("data-id");
	console.log("reject ID: " + id);
	$.ajaxSetup({
        headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
    });
	$.ajax({
		url: "/application/rejectAvail",
		type: "POST",
		data: {id: id},
		success:function(data){

			// console.log(data);
			console.log("yaaaaay");
			window.location = "/profile scholar";
			// $('.scholarships').html(data);
		},
		error:function(data){
			console.log("error");
		}
	})
}