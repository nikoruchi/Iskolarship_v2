$(document).ready(function(){
	$(document).on("click", ".unreadbtn", unread);
});


$(document).ready(function(){
	$(document).on("click",".readbtn",read);
})

$(document).ready(function(){
	$(document).on("click",".allbtn",all);
})

$(document).ready(function(){
	$(document).on("click",".compose", writeMessage);
})

$(document).ready(function(){
	$(document).on("click",".delete", deleteMessage);
})

$(document).ready(function(){
	$(document).on("click",".clickable", seeFullMessage);
})

$(document).ready(function(){
	$(document).on("click",".not-clickable", notClickable);
})

$(document).ready(function(){
	$('#formMsg').submit(function(event){
		event.preventDefault();
		$.ajax({
			url: "/messages/send",
			type: "POST",
			data: $(this).serialize(),

			success:function(data){
				console.log("Data from send: " +data);
			},
			error: function(data){
				console.log('error');
			}
		})
	});
})

function seeFullMessage(e){
	e.preventDefault();
	var id = $(this).attr("data-pg");
	$.ajax({
		url: "/messages/thread",
		type: "GET",
		data: {'id': id},
		success:function(data){
			console.log(data);
			var msgs = "";
			$("#message-form").html(msgs);

		}
	})
}

function notClickable(e){
	e.stopPropagation();
}



function unread(e){
	e.preventDefault();
	$.ajax({
		url: "/messages/unread",
		type: "GET",
		success:function(data){
			var msgs = "";
			console.log(data);
			$.each(data, function(key,value){
				msgs+= '<li class="message clickable" data-pg="'+value['id']+'">';
				msgs+= '<div class="panel panel-default">';
				msgs+= '<div class="panel-body">';
				msgs+= '<form class="select-form">';
				msgs+= '<input type="checkbox" name="messages[]" value="'+value['id']+'" class="not-clickable select"/>';
				msgs+= '</form>';
				msgs+= '<p class="from"><strong>' + value['sender']+ '</strong></p>';
				msgs+= '<p class="message-content">' + value['content'] + '</p>';
				msgs+= '<p class="time-stamp">' + value['timestamp'] +'</p>';
				msgs+= '</div>';
				msgs+= '</div>';
				msgs+= '</li>';
			});
			$("#messages-container").html(msgs);
		}
	})
}
function read(e){
	e.preventDefault();
	$.ajax({
		url: "/messages/read",
		type: "get",
		 beforeSend: function (xhr) {
            var token = $('meta[name="csrf_token"]').attr('content');

            if (token) {
                  return xhr.setRequestHeader('X-CSRF-TOKEN', token);
            }
        },
		success:function(data){
			var msgs = "";
			console.log(data);
			$.each(data, function(key,value){
				msgs+= '<li class="message clickable" data-pg="'+value['id']+'">';
				msgs+= '<div class="panel panel-default">';
				msgs+= '<div class="panel-body">';
				msgs+= '<form class="select-form" id="formDel">';
				msgs+= '<input type="checkbox" name="messages[]" value="'+value['id']+'" class="not-clickable select"/>';
				msgs+= '</form>';
				msgs+= '<p class="from"><strong>' + value['sender']+ '</strong></p>';
				msgs+= '<p class="message-content">' + value['content'] + '</p>';
				msgs+= '<p class="time-stamp">' + value['timestamp'] +'</p>';
				msgs+= '</div>';
				msgs+= '</div>';
				msgs+= '</li>';
			});
			$("#messages-container").html(msgs);
		},
		error:function(data){
			console.log('error');
		}
	})
}

function all(){
	$.ajax({
		url: "/messages/inbox",
		type: "get",
		success:function(data){
			console.log(data);
			var msgs = "";
			$.each(data, function(key,value){
				msgs+= '<li class="message clickable" data-pg="'+value['id']+'">';
				msgs+= '<div class="panel panel-default">';
				msgs+= '<div class="panel-body">';
				msgs+= '<form class="select-form">';
				msgs+= '<input type="checkbox" name="messages[]" value="'+value['id']+'" class="not-clickable select"/>';
				msgs+= '</form>';
				msgs+= '<p class="from"><strong>' + value['sender']+ '</strong></p>';
				msgs+= '<p class="message-content">' + value['content'] + '</p>';
				msgs+= '<p class="time-stamp">' + value['timestamp'] +'</p>';
				msgs+= '</div>';
				msgs+= '</div>';
				msgs+= '</li>';
			});
			$("#messages-container").html(msgs);
		}
	})
}
function writeMessage(){

}

function deleteMessage(e){
	e.preventDefault();
	console.log("delete");
	var datas = $('.not-clickable:checked').serialize();
	console.log("data: " + datas);
	$.ajax({
		url: "/messages/delete",
		type: "DELETE",
		data: $('not-clickable:checked').serialize(),
		success:function(data){
			console.log(data);
			var msgs = "";
		}
	})
}