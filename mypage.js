
$(document).ready(function(){
    let query = location.search;
    let val = query.split("=");

    $("#success_msg").text(decodeURIComponent(val[1]));

    console.log(decodeURIComponent(val[1]));

    $("#A_btn").click(function(){
        $.ajax({
            url : "master.php",
            type : "GET",
            datatype : JSON,
            data :{
                "btn" : "A",
                "pg" : "mypg",
            }

        })

    });
});