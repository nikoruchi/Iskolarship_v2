$(document).ready(function(){
	$(document).on("click", ".remove", deleteNotif);
})

//doesn't have to have a query since it won't be submitted int the first place - リン
function deleteNotif() {
	console.log($(this).parent().parent());
	var id=$(this).attr('data-pg');
    var $element = $(this).parent().remove();
    console.log(id);
    $.ajax({
    	url:"/notif_delete/"+id,
    	cache:false,
    	data:id,
   		success: function(data){
            if(data=="YES"){
                $element.fadeOut().remove();
                console.log("row deleted");
            }else{
                alert("can't delete the row")
            }
        }
	});
}
