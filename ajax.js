$(document).ready(function(){
    $('#login_btn').click(function(){
        var wUserId = $('#userid').val();
        var wPass = $('#pass').val();

        $.ajax({
            url : 'check.php',
            type : 'post',
            datatype : 'json',
            data : {
                wUserId,
                wPass,
            }

        })

    });

});