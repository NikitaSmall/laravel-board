function updateIncomingMessage() {
	var messagesCount = $('.message').length;

	$.ajax({
		method: 'GET',
		url: '/ajax/messages/'
	}).done(function(messages) {
		if(messagesCount !== messages.length) {
			var html = '';

			for(var i = 0; i < messages.length; i++) {
				html += '<li class="list-group-item message">' +
                            '<a href="/detalis/' + messages[i].id + '">' + messages[i].title + '</a>' +
                       '</li>'
			}
			$('#messages-list').html(html);
		}
	});
}

$(document).ready(function() {
	setInterval(updateIncomingMessage, 500);
});
