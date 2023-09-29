jQuery.event.special.touchstart = {
    setup: function( _, ns, handle ){
        this.addEventListener("touchstart", handle, { passive: true });
    }
};

$(document).ready(function(){
    if ($(this).scrollTop() > 140) {
        $('header').addClass('scrolled');
    } else if ($(this).scrollTop() < 100) {
        $('header').removeClass('scrolled');
    }
    $(window).scroll(function () {
        if ($(this).scrollTop() > 140) {
            $('header').addClass('scrolled');
        } else if ($(this).scrollTop() < 100) {
            $('header').removeClass('scrolled');
        }
    });

    $('.box a, .nav  a, .carousel-caption a').on('click', function(){
        scrollToBlock($(this).attr('href'));
    });

    scrollToBlock(location.hash);
});

function scrollToBlock(temp){
    var count = (temp.match(/#/g) || []).length;
    // Handler for .ready() called.
    if(count > 0){
        var divClass = temp.split("#")[1];
        if($('.'+divClass).length > 0) {
            var element = document.querySelector('.' + divClass);
            element.scrollIntoView({ block: "center" });
        }
    }
}
