$(document).ready(function(){

    $(".status > button").on("click", function (event) {
       event.preventDefault();

       $(this).addClass("uk-active").siblings().removeClass("uk-active");

       if ($(this).hasClass("button-on")) {
           $(this).css("color", "#82bb42").siblings().css("color", "inherit");
       } else if ($(this).hasClass('button-off')) {
           $(this).css("color", "#d32c46").siblings().css("color", "inherit");
       }
    });

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            'X-Requested-With': 'XMLHttpRequest'
        }
    });

    $(".status > button").on("click",(function(){

        if ($(this).hasClass("button-on")) {
            var activate = 1;
        } else {
            var activate = 0;
        }

        var id = $(this).parent().attr('id');

        $.ajax({
            url: "articles/",
            type: "get",
            data: {activate: activate, id: id},
            dataType: "JSON"
        });
    }));

});
//# sourceMappingURL=admin.articles.js.map
