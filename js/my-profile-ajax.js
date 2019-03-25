$(function () {
    $('form#update').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            type: 'post',
            url: '/my-profile-action.php',
            data: {
                firstname: $(this).find("#firstname").val(),
                lastname: $(this).find("#lastname").val(),
                personal: $(this).find("textarea#personal").val(),
                visibility: $("#visibility").is('input[name=visibility]:checked') ? 1 : 0,
                id: $(this).find("#id").val(),
                image: $(this).find("#image").val()
            },
            success: function () {
                $.toast({
                    heading: 'SUCCESS',
                    text: 'Your profile has been updated.',
                    position: 'bottom-right',
                    icon: 'success',
                    stack: false
                })
            }
        });
    });
});


$(document).ready(function (e) {
    $("#uploadForm").on('change', (function (e) {
        $('.loader').show();
        e.preventDefault();
        var formData = new FormData($("#uploadForm")[0]);
        $.ajax({
            url: "/image.php",
            type: "POST",
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                $('.loader').hide();
                $("#targetLayer").html('<img src="/' + response + '" class="img-responsive"/>');
                console.log(response);
                $("#update").find("#image").val(response);
            },
        });
    }));
});