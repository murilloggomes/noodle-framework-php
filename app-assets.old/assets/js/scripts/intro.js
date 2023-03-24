$(window).on('load', function () {

    $('.modal').modal({
        'onOpenEnd': initCarouselModal,
    });

    setTimeout(function () { $('.modal').modal('open'); }, 1800)


    $('.btn-next').on('click', function (e) {
        $('.intro-carousel').carousel('next');
    })

    $('.btn-prev').on('click', function (e) {
        $('.intro-carousel').carousel('prev');
    })

    // Inti carousel when modal pops up

    function initCarouselModal() {
        $('.carousel.carousel-slider').carousel({
            fullWidth: true,
            indicators: true,
            onCycleTo: function () {

                // When carousel is at it's first step disable prev button

                if ($('.carousel-item.active').index() == 1) {
                    $('.btn-prev').addClass('disabled');

                }

                // When carousel is at 2nd or 3rd step 

                else if ($('.carousel-item.active').index() > 1) {

                    // activate button

                    $('.btn-prev').removeClass('disabled');
                    $('.btn-next').removeClass('disabled');

                    // on 3rd step add and remove elements

                    if ($('.carousel-item.active').index() == 3) {
                        $('.btn-next').addClass('disabled');
                    }
                }
            }
        })
    }

});
