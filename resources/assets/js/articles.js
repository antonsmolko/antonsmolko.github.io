$(function () {

    var $container = $(".articles-list");
    $container.imagesLoaded(function () {
        $container.masonry({
            columnWidth: ".article",
            itemSelector: ".article"
        });
    });

    $('.article').addClass('wow fadeIn');

    $(".header").css('height', window.innerWidth / 3.496503496503497);

    $( window ).resize(function() {
        $(".header").css("height", window.innerWidth / 3.496503496503497);
    });

    // $.fn.extend({
    //     animateCss: function (animationName) {
    //         var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
    //         this.addClass('animated ' + animationName).one(animationEnd, function() {
    //             $(this).removeClass('animated ' + animationName);
    //         });
    //     }
    // });

    new WOW().init();

});