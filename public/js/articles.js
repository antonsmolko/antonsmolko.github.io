$(function () {

    var $container = $(".articles-list");
    $container.imagesLoaded(function () {
        $container.masonry({
            columnWidth: ".article",
            itemSelector: ".article"
        });
    });

    $('.article').addClass('wow fadeIn');

    $(".header").css('height', window.innerWidth / 3,987538940809969);

    $( window ).resize(function() {
        $(".header").css("height", window.innerWidth / 3,987538940809969);
    });

    new WOW().init();

});
//# sourceMappingURL=articles.js.map
