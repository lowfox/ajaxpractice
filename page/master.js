
$(document).ready(function(){

    $("#pre_btn").click(function(){

        $.ajax({
            url : "master.php",
            type : "GET",
            datatype : JSON,
            data :{
                "btn" : "pre",
                "pg" : "A",
            }

        })

    });
});