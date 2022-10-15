$(document).ready(function(){
    $("#login_btn").click(function(){
        let wUserId = $("#userid").val();
        let wPass = $("#pass").val();
        console.log(wUserId,wPass);

        $.ajax({
            url : "check.php",
            type : "post",
            //datatype : "",
            data : {
                "userid" : wUserId,
                "pass" : wPass
            },
        })
        .done(function(data){
            console.log('[responce data:'+data+']');
            switch(data){
                case 'OK':
                    $("#result").text("ログイン成功");
                    break;
                case 'pass NG':
                    $("#result").text("パスワードが違います");
                    break;
                case 'userid NG':
                    $("#result").text("ユーザIDはありません");
                    break;

            }
        });
    });
});