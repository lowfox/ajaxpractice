
<!DOCTYPE html>
<html lang="ja">
    <head>

<?php
    $flg = 0;
    if( isset($_GET["btn"], $_GET["pg"]) )
    {
        $btn = $_GET["btn"];
        $pg = $_GET["pg"];
        $flg=1;
    }
    if(isset($_GET["data"]))
    {
        $data = $_GET["data"];
        $dflg=1;
    }

    if($flg)
    {
        switch($pg){
            case "form" :
                if($btn == "login")
                {
                    $title = "マイページ";
                }
                break;
            case "mypg" : 
            case "A" :
            case "B" :
            case "C" :
                $title = $btn + "ページ";
                break;
            default:
        }
    }    


?>
        <meta charset="UTF-8">
        <title><?php echo $title; ?></title>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    </head>
    <body>
        <p id="success_msg"></p>
        <input type="button" id="A_btn" value="Aボタン"><br>
        <input type="button" id="B_btn" value="Bボタン"><br>
        <input type="button" id="C_btn" value="Cボタン"><br>
    </body>
</html>