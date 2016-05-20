$(document).ready(function () {
    $(document).on("beforeSubmit", '#shortenUrl-form', function (e) {
        var form = $(this);

        $.ajax({
            url: form.attr('action'),
            type: 'post',
            data: {
                originalURL: form.find("#originalURL").val(),
                _csrf: form.find("[name=_csrf]").val()
            },
            success: function (data) {
                var shortUrl = data.shortUrl;
                $('#shortUrl').append("<p><a target='_blank' href='"+shortUrl+"'>"+shortUrl+"</a></p>");
            }
        });

        return false;
    });
});