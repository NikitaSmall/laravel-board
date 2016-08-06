function makeSearchRequest() {
	$('#search-results').html('<img src="/images/ajax-loader.gif">');
	var query = $('#search-line').val();
	var deep = 0;

	if ($('#search-deep').is(':checked')) {
		deep = 1;
	}

	$.ajax({
		method: 'GET',
		url: '/search/service?title=' + query + '&deep=' + deep
	}).done(function(services) {
		var html = '';

		for (var i = 0; i < services.length; i++) {
			html += '<a href="/services/' + services[i].id + '">' + 
				services[i].title + 
				'</a><br />';
		}

		$('#search-results').html(html);
	});
}

$(document).ready(function() {
	$('#search-line').keyup(makeSearchRequest);
});