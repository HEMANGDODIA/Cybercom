$(document).ready(function() {
    $('#form').validate({
        rules: {
            title: {
                required: true,
                minlength: 3
            },
            url: {
                required: true,
                email: true,
            },
            context: {
                required: true,
                number: true,
            },
            information: {
                required: true,
            }
        },
        submitHandler: function(form) {

            form.submit();

        }
    });
});

$('.delete').on('click', function() {
    var id = $(this).data('id');
    console.log(id);
    $.ajax({
        url: "./delete.php",
        data: { row_id: id, action: "submit" },
        type: 'POST',
        success: function(response) {
            console.log(response);
            $('.del' + id).css('display', 'none');
            $('.del' + id).html('');
            $('.message').html("<label class='fadeoutmsg'>Record Deleted successfully...</label>");
            $(".fadeoutmsg").fadeOut(3000);

        },
        error: function(error) {
            console.log(error);
        }
    })
})