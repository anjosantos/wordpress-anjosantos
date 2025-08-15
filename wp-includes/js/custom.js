$j(window).load(function () {

    // preloader
    $j('#status').fadeOut(); // will first fade out the loading animation
    $j('#preloader').delay(550).fadeOut('slow'); // will fade out the white DIV that covers the website.
    $j('body').delay(550).css({
        'overflow': 'visible'
    });


    //  isotope
    var $jcontainer = $j('.portfolio_container');
    $jcontainer.isotope({
        filter: '*',
    });

    $j('.portfolio_filter a').click(function () {
        $j('.portfolio_filter .active').removeClass('active');
        $j(this).addClass('active');

        var selector = $j(this).attr('data-filter');
        $jcontainer.isotope({
            filter: selector,
            animationOptions: {
                duration: 500,
                animationEngine: "jquery"
            }
        });
        return false;
    });

    // back to top
    var offset = 300,
        offset_opacity = 1200,
        scroll_top_duration = 700,
        $jback_to_top = $j('.cd-top');

    //hide or show the "back to top" link
    $j(window).scroll(function () {
        ($j(this).scrollTop() > offset) ? $jback_to_top.addClass('cd-is-visible'): $jback_to_top.removeClass('cd-is-visible cd-fade-out');
        if ($j(this).scrollTop() > offset_opacity) {
            $jback_to_top.addClass('cd-fade-out');
        }
    });

    //smooth scroll to top
    $jback_to_top.on('click', function (event) {
        event.preventDefault();
        $j('body,html').animate({
            scrollTop: 0,
        }, scroll_top_duration);
    });

    // input
    $j(".input-contact input, .textarea-contact textarea").focus(function () {
        $j(this).next("span").addClass("active");
    });
    $j(".input-contact input, .textarea-contact textarea").blur(function () {
        if ($j(this).val() === "") {
            $j(this).next("span").removeClass("active");
        }
    });
});