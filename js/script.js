$(document).ready(function(){

    $('.check').blur(function(e){

        var mail = $('.check').val();

        $.ajax({
            type: "POST",
            url: "controllers/register.php",
            data: {
                'check_submit' : 1,
                'mail': mail
            },
            datatype: "text",
            success: function(response) {
                $('.error_msg').html(response);
            }
        });
        
    });
})