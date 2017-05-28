$(document).ready(function(){
	$(document).on("click", ".remove", deleteNotif);
})

//doesn't have to have a query since it won't be submitted int the first place - リン
function deleteNotif() {
	var id=$(this).attr('data-pg');
    var element = $(this).parent().remove();
    console.log("id is "+id);
    $.ajax({
    	url:"/notif_delete",
    	type:"GET",
    	cache:false,
    	data: {id:id},
   		success: function(data){
            if(data=="YES"){
                element.fadeOut().remove();
                console.log("row deleted");
            }else{
                alert("can't delete the row");
            }
        } 
	});
}
