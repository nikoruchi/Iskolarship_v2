$(document).ready(function(){
	$(document).on("click", ".edit", edit);
})

function edit(e){
    var id=$(this).attr('data-pg');
    console.log(id);
    $.ajax({
    	url:"/profile_sponsor/"+id,
    	cache:false,
    	success:function(result){
       		$(".modal-content").html(result);	
		}
	});
}