(function($) {

    "use strict";

    $(window).on('load', function() {

        $('#countdown_dashboard').countDown({
            targetDate: {
                'day': 30,
                'month': 12,
                'year': 2017,
                'hour': 11,
                'min': 13,
                'sec': 0
            },
            omitWeeks: true
        });
    });


    //Elements animation
    $('.animated').appear(function() {
        var element = $(this);
        var animation = element.data('animation');
        var animationDelay = element.data('delay');
        if (animationDelay) {
            var timeSet = setTimeout(function() {
                element.addClass(animation + " visible");
                if (element.hasClass('counter')) {
                    element.find('.value').countTo();
                }
            }, animationDelay);
        } else {
            element.addClass(animation + " visible");
            if (element.hasClass('counter')) {
                element.find('.value').countTo();
            }
            clearTimeout(timeSet);
        }
    }, { accY: -150 });

})(jQuery);