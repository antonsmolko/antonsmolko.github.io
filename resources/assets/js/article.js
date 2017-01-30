$(function () {
    var $imageWidth = $('.article-image').innerWidth();
    $(".article-image").css('height', $imageWidth / 2);

    $( window ).resize(function() {
        var $imageWidth = $('.article-image').innerWidth();
        $(".article-image").css('height', $imageWidth / 2);
    });
});
