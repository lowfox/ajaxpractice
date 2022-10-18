

<?php
    $flg = 0;
    if( isset($_GET["btn"], $_GET["pg"]) )
    {
        $btn = $_GET["btn"];
        $pg = $_GET["pg"];
        $flg=1;
    }
    else if(isset($_POST["btn"], $_POST["pg"]) )
    {
        $btn = $_POST["btn"];
        $pg = $_POST["pg"];
        $flg=1;
    }
    else{
        $btn = null;
        $pg = null;

        $flg=0;
    }

    switch($pg){
        case "mypg" : 
            switch($btn){
                case "A" : 
                    header('a.html');
                    exit;
                case "B" :
                    header('b.html');
                    exit;
                case "C" :
                    header('c.html');
                    exit;
            } 
        case "A" :
            switch($btn){
                case "pre" : 
                    header('mypage.html');
                    exit;
                case "B" :
                    break;
                case "C" :
                    break;
            } 
        case "B" :
            switch($btn){
                case "mypg" : 
                    break;
                case "A" :
                    break;
                case "C" :
                    break;
            } 
        case "C" :
            switch($btn){
                case "mypg" : 
                    break;
                case "A" :
                    break;
                case "B" :
                    break;
            } 
    }

}
?>