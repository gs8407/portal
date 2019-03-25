$(function () {
    $('input[name^="ban"]').change(function () {
        var isChecked = $("input:checkbox").is(":checked") ? 1 : 0;
        $.ajax({
            url: '/administrator-action.php',
            type: 'POST',
            data: {id: $(this).attr("data-id"), ban: $(this).is(':checked') ? 1 : 0},
            success: function (response) {
                console.log(response);
                $.toast({
                    heading: 'SUCCESS',
                    text: response,
                    position: 'bottom-right',
                    icon: 'success',
                    stack: false
                })
            }
        });
    });
});