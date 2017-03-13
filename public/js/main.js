function isExternalLink(link) {
    return link.search('http') != -1;
}

function loadPage(link) {
    $('main').load('/ajax/page' + link);
    history.pushState({}, '', link);
}

function useLink(a) {
    var link = $(a).attr('href');
    if (isExternalLink(link)) {
        return false;
    }
    loadPage(link);
    return true;
}

function updateTextInput(val) {
    var maxValue = $('.priceRange[type="range"]').prop('max');
    var minValue = $('.priceRange[type="range"]').prop('min');
    $('#priceRangeOutput').val('Price: $' + minValue + ' - $' + val);
}

$(document)

.ready(function() {
    $('.toTop').hide();
})

.on('click', 'a', function(e) {
    if (useLink(this)) {
        e.preventDefault();
    }
})

.on('click', 'nav a', function(e) {
    if (useLink(this)) {
        e.preventDefault();
    }
    $('nav li').removeClass('active');
    $(this).parent().addClass('active');
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