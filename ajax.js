$(document).ready(function(){

    $("#login_btn").click(function(){
        let wUserId = $("#userid").val();
        let wPass = $("#pass").val();
        console.log(wUserId,wPass,);

        $.ajax({
            url : "check.php",
            type : "post",
            datatype : "json",
            data : {
                "userid" : wUserId,
                "pass" : wPass
            },
        })
        .done(function(data){
            console.log(data);
            //json文字列をjavascriptオブジェクトに変換
            var data_json = JSON.parse(data);
            //オブジェクトの中身確認。中身へのアクセス方法は以下どちらでも可
            //オブジェクト.プロパティ名
            //オブジェクト[プロパティ名]
            console.log('[responce result: '+data_json.result + ']');
            console.log('[responce msg: '+data_json["success_msg"]+ ']');
            switch(data_json["result"]){
                case 'OK':
                    let msg;
                    //$("#result").text("ログイン成功");
                    switch(data_json["success_msg"]){
                        case 0:
                            msg= "はじめまして！";
                            break;
                        case 1:
                            msg = "今日も頑張りましょう";
                            break;
                        default : 
                    }
                    location.href = "master.php" + "?pg=" + "form" + "?btn=" + "login" + "?data=" + encodeURIComponent(msg);
                    break;
                case 'pass NG':
                    $("#result").text("パスワードが違います");
                    break;
                case 'userid NG':
                    $("#result").text("このユーザIDは登録されていません");
                    break;
                case 'block user NG':
                    $("#result").text("残念ながらこのユーザはご利用を制限させていただいております");
                    break;
                default:
                    $("#result").text("例外");
            }
        });
    });
});