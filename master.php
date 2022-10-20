
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
    //var_dump($btn,$pg);
    }
    else{
        var_dump("1get query empty");
    }
    if(isset($_GET["data"]))
    {
        $data = $_GET["data"];
        $dflg=1;
    }
    else{
        var_dump("2get query empty");
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
        <script src="tool.js"></script>
    </head>
    <body>
        <p><?php if( isset($data) ){ echo $data; } ?></p>
        <p id="success_msg"></p>
        <input type="button" id="A_btn" value="Aボタン"><br>
        <input type="button" id="B_btn" value="Bボタン"><br>
        <input type="button" id="C_btn" value="Cボタン"><br>

        <script type="text/javascript">
            $(document).ready(function(){
                $("#A_btn").click(function(){
                    ToolRedirect(<?php echo $pg ?>, <?php echo $btn ?>, <?php if(isset($data)){echo $data;} ?>);
                })
                $("#B_btn").click(function(){
                    ToolRedirect(<?php echo $pg ?>, <?php echo $btn ?>, <?php if(isset($data)){echo $data;} ?>);
                })
                $("#C_btn").click(function(){
                    ToolRedirect(<?php echo $pg ?>, <?php echo $btn ?>, <?php if(isset($data)){echo $data;} ?>);
                })

            });
        </script>
    </body>
</html>