function isExternalLink(link) {
	return link.search('http') != -1;
}

function loadPage(link) {
	$('.main-wrapper').load('/ajax/page' + link);
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




/**
 * aside price slider -- text update
 */
function updateTextInput(val) {
    var maxValue = $('.priceRange[type="range"]').prop('max');
    var minValue = $('.priceRange[type="range"]').prop('min');
    document.getElementById('priceRangeOutput').value = "Price: $" + minValue + " - $" + val;
}


/**
 * Scroll to top
 */
$(document).ready(function() {

    // Hide the windows when loading the document
    $('.toTop').hide();

    // Check to see if the window is top if not then display button
    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $('.toTop').fadeIn();
        } else {
            $('.toTop').fadeOut();
        }
    });

    // Click event to scroll to top
    $('.toTop').click(function() {
        $('html, body').animate({ scrollTop: 0 }, 800);
        return false;
    });

});
