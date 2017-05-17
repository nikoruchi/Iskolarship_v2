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
	$('#formMsg').submit(function(event){
		event.preventDefault();
		var data = $(this).serialize();
		console.log(data),
		$.ajax({
			url: "/messages/send",
			type: "POST",
			data: $(this).serialize(),

			success:function(data){

				console.log(data);
			},
			error: function(data){
				console.log('error');
			}
		})
	});
})


function unread(e){
	e.preventDefault();
	console.log("unread");
	$.ajax({
		url: "/messages/unread",
		type: "GET",
		success:function(data){
			var msgs = "";
			console.log(data);
			$.each(data, function(key,value){
				msgs = '<li class="message">';
				msgs+= '<div class="panel panel-default">';
				msgs+= '<div class="panel-body">';
				msgs+= '<form class="select-form">';
				msgs+= '<input type="checkbox" class="select"/>';
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
	console.log("read");
	$.ajax({
		url: "/messages/read",
		type: "get",
		success:function(data){
			var msgs = "";
			console.log(data);
			console.log(data.length);
			$.each(data, function(key,value){
				msgs+= '<li class="message">';
				msgs+= '<div class="panel panel-default">';
				msgs+= '<div class="panel-body">';
				msgs+= '<form class="select-form">';
				msgs+= '<input type="checkbox" class="select"/>';
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

function all(){
	var msg_receiver = $(this).attr("data-pg");
	console.log("all");
	$.ajax({
		url: "/messages/inbox",
		type: "get",
		success:function(data){
			console.log(data);
			var msgs = "";
			$.each(data, function(key,value){
				msgs+= '<li class="message">';
				msgs+= '<div class="panel panel-default">';
				msgs+= '<div class="panel-body">';
				msgs+= '<form class="select-form">';
				msgs+= '<input type="checkbox" class="select"/>';
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

function deleteMessage(){
		
}