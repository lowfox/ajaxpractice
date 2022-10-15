<?php
    if(isset($_POST["userid"], $_POST["pass"]))
    {
       // print($_POST["userid"]);
        //print($_POST["pass"]);

        $id = $_POST["userid"];
        $pass = $_POST["pass"];
        //userinfo.jsと照合
        $url = "userinfo.js";
        //jsonファイルからjsonデータ読み込み
        $json = file_get_contents($url);
        
        //jsonデータを連想配列に変換
        $arr = json_decode($json,true);

        $last = count($arr[userinfolist]);
        $cnt = 0;
        //print($last);
        foreach($arr[userinfolist] as $key => $val){
            $cnt++;
            if($val[userid] == $id)
            {
                //echo '[matchkey:'.$key.']';
                if($val[pass] == $pass) 
                {
                    echo 'OK';
                    break;
                }
                else{
                    echo 'pass NG';
                    break;
                }
            }
            //print($cnt);
            if($cnt >= $last)
            {
                echo 'userid NG';
            }

            /*
            //jsonの中身参照
            echo 'key:'.$key.' ';
            echo 'userid:'.$val[userid].' ';
            echo 'pass:'.$val[pass].'       ';
            */
        }
    }
?>