function updateServiceList() {
	var serviceCount = $('.service').length;

	$.ajax({
		method: 'GET',
		url: '/ajax/services/'
	}).done(function(services) {
		if(serviceCount !== services.length) {
			var html = '';

			for(var i = 0; i < services.length; i++) {
				html += '<tr class="service">' +
														'<td><time>Now</time></td>' +
														'<td><a href="/services/' + services[i].id + '">' + services[i].title + '</a></td>' +
														'<td>' + services[i].name +'</td>' +
                       '</tr>'
			}
			$('#service-list').html(html);
		}
	});
}

$(document).ready(function() {
	setInterval(updateServiceList, 500);
});
