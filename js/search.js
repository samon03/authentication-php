$(document).ready(function(){

    $('#search').keyup(function(e){

        var search = $("#search").val();

        $.ajax({
            type: "POST",
            url: "controllers/search.php",
            data: {
                search: search
            },
            success: function(data) {
                $('#output').html(data);
            }
        });
        
    });
})