function isExternalLink(link) {
	return link.search('http') != -1;
}

function loadPage(link) {
	$('main').load('/ajax/page' + link);
	history.pushState({}, '', link);
}

$(document)

.on('click', 'a', function(e) {
	var link = $(this).attr('href');
	if (isExternalLink(link)) {
		return;
	}
	e.preventDefault();
	loadPage(link);
})

;

$(window).bind('popstate', function(e) {
	location.reload();
});