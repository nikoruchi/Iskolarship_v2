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
	$(document).on("click",".mark", markAsRead);
})

$(document).ready(function(){
	$(document).on("click",".not-clickable", notClickable);
})

$(document).ready(function(){
	$(document).on("click", ".reply", sendReply);
})

$(document).ready(function(){
	$('#formMsg').submit(function(event){
		event.preventDefault();
		var msgs="";
		$.ajax({
			url: "/messages/send",
			type: "POST",
			data: $(this).serialize(),
			success:function(data){
				console.log("Data from send: " +data);
				msgs+='<h3>' + data.msg_subject + '<span class="email" style="font-size: 15px"> &lt;' + data.user_email +'&gt;</span></h3>';
				msgs+='<p>'+ data.msg_content + '</p>';
				$("#compose-form").html(msgs);
			}
		})
	});
})



function seeFullMessage(e){
	e.preventDefault();
	var id = $(this).attr("data-pg");
	var msgs = "";
	$.ajax({
		url: "/messages/thread",
		type: "GET",
		data: {id:id},
		success:function(data){
			$.each(data, function(key,value){
				msgs+= '<div class="panel panel-default">';
				msgs+= '<div class="panel-body">';
				msgs+= '<p class="message-sender">' + value['sender_name'] + '</p>';
				msgs+= '<p class="message-content">' + value['content'] + '</p>';
				msgs+= '<p class="time-stamp">' + value['timestamp'] +'</p>';
				msgs+= '</div>';
				msgs+= '</div>';
			});
			msgs += '<textarea id="reply_message" class="form-control" placeholder="Send a reply!"></textarea>';
			msgs += '<button data-pg="'+ id +'"class="pull-right btn btn-primary reply">Reply</button>';
			$("#compose-form").html(msgs);''
		}
	})
}

function sendReply(){
	var id = $(this).attr('data-pg');
	var text = $('#reply_message').val();
	var msgs = "";
	$.ajax({
		url: "/messages/reply",
		type: "GET",
		data: {'text':text, 'id':id},
		success:function(data){
			$.each(data, function(key,value){
				msgs+= '<div class="panel panel-default">';
				msgs+= '<div class="panel-body">';
				msgs+= '<p class="message-sender">' + value['sender_name'] + '</p>';
				msgs+= '<p class="message-content">' + value['content'] + '</p>';
				msgs+= '<p class="time-stamp">' + value['timestamp'] +'</p>';
				msgs+= '</div>';
				msgs+= '</div>';
			});
			msgs += '<textarea id="reply_message" class="form-control" placeholder="Send a reply!"></textarea>';
			msgs += '<button data-pg="'+ id +'"class="pull-right btn btn-primary reply">Reply</button>';
			$("#compose-form").html(msgs);''
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
				msgs+= '<li class="message clickable mark" data-pg="'+value['id']+'">';
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

function markAsRead(){
	var id = $(this).attr('data-pg');
	$.ajax({
		url: "/messages/mark",
		type: "GET",
		data: {'id':id},
		success:function(data){
			var msgs = "";
			console.log(data);
		}
	})
}
function read(e){
	e.preventDefault();
	$.ajax({
		url: "/messages/read",
		type: "get",
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
// fix this
function writeMessage(e){
	var msgs = "";
	$.ajax({
		url: "/messages/compose",
		type: "GET",
		data: $('not-clickable:checked').serialize(),
		success:function(data){
			console.log(data);
			msgs+= '<form name="formMsg" id="formMsg">';
			msgs+= '{{ csrf_field() }}';
			msgs+= '<input class="form-control" type="text" name="subject" id="subject" placeholder="Subject" />';
			msgs+= '<input class="form-control" type="text" name="to" id="to" placeholder="To" />';
			msgs+= '<textarea class="form-control" placeholder="Message" name="content" id="message_content"></textarea>';
			msgs+= '<button class="btn btn-primary pull-right send" type="submit" name="send_message" id="send_message" href="javascript:void(0)"><span class="glyphicon glyphicon-send"></span></button>';
			msgs+= '</form>';
			$("#compose-form").html(msgs);

		}
	})
}



function deleteMessage(e){
	e.preventDefault();
	console.log("delete");
	var arr = [];
       $('.ads_Checkbox:checked').each(function () {
           arr[i++] = $(this).val();
       });
    console.log(arr);
	console.log("data: " + datas);
	$.ajax({
		url: "/messages/delete",
		type: "DELETE",
		data: $('not-clickable:checked').serialize(),
		success:function(data){
			console.log(data);
		}
	})
}