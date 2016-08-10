function updateIncomingMessage() {
	var messagesCount = $('.message').length;

	$.ajax({
		method: 'GET',
		url: '/ajax/messages/'
	}).done(function(messages) {
		if(messagesCount !== messages.length) {
			var html = '';

			for(var i = 0; i < messages.length; i++) {
				html += '<tr class="message info">' +
														'<td><time>Now</time></td>' +
														'<td>' + messages[i].name +'</td>' +
														'<td><a href="/detalis/' + messages[i].id + '">' + messages[i].title + '</a></td>' +
                       '</tr>'
			}
			$('#messages-list').html(html);
		}
	});
}

$(document).ready(function() {
	setInterval(updateIncomingMessage, 500);
});
