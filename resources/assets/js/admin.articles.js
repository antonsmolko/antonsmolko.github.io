$(document).ready(function(){

    $('#articles').addClass('uk-active');

    $(".activate > button").on("click", function (event) {
       event.preventDefault();

       $(this).addClass("uk-active").siblings().removeClass("uk-active");
    });

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            'X-Requested-With': 'XMLHttpRequest'
        }
    });

    $(".activate > button").on("click",(function(){

        if ($(this).hasClass("button-on")) {
            var activate = 1;
        } else {
            var activate = 0;
        }

        var id = $(this).parent().attr('id');

        $.ajax({
            url: url_activate,
            type: "post",
            data: {activate: activate, id: id}
        });
    }));

    $(".delete > button").on("click", (function (event) {
        event.preventDefault();

        var id = $(this).parent().attr('id');

        if (confirm('Подтвердите удаление статьи!')) {

            $.ajax({
                url: url_delete,
                type: "post",
                data: {id: id}
            }).done(document.location.reload());
        }
    }));
});