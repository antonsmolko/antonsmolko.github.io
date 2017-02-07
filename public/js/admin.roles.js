$(document).ready(function(){

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            'X-Requested-With': 'XMLHttpRequest'
        }
    });

    $(".delete > button").on("click", (function (event) {
        event.preventDefault();

        var id = $(this).parent().attr('id');

        if (confirm('Подтвердите удаление роли!')) {

            $.ajax({
                url: url_delete,
                type: "post",
                data: {id: id}
            }).done(location.reload());
        }
    }));
});
//# sourceMappingURL=admin.roles.js.map
