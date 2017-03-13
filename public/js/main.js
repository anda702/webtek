function isExternalLink(link) {
    return link.search('http') != -1;
}

function loadPage(link) {
    $('main').load('/ajax/page' + link);
    history.pushState({}, '', link);
}

function updateTextInput(val) {
    var maxValue = $('.priceRange[type="range"]').prop('max');
    var minValue = $('.priceRange[type="range"]').prop('min');
    document.getElementById('priceRangeOutput').value = "Price: $" + minValue + " - $" + val;
}

$(document)

.ready(function() {
    localStorage.clear();
    $('.toTop').hide();
})

.on('click', 'a', function(e) {
    var link = $(this).attr('href');
    if (isExternalLink(link)) {
        return;
    }
    e.preventDefault();
    loadPage(link);
})

.on('keyup', '.input-check', function() {
    $(this).attr('value', $(this).val());
})

.on('click', '.toTop', function() {
    $('html, body').animate({ scrollTop: 0 }, 800);
    return false;
})

.on('scroll', 'window', function() {
    if ($(this).scrollTop() > 100) {
        $('.toTop').fadeIn();
    } else {
        $('.toTop').fadeOut();
    }
})

;

$(window).bind('popstate', function(e) {
    location.reload();
});