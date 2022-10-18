<?php

    define("IDX_ALL_PASS",0);
    define("IDX_BLOCK",1);
    define("FILE_NAME","config/check.cfg");
    define("USER_INFO_FILE","userinfo.js");
    define("_ON",1);
    define("_OFF",1);
    $cfg = array();
    $resp = array();
    $userInfoArray = array();

    if(isset($_POST["userid"], $_POST["pass"]))
    {
        global $resp;
        //print($_POST["userid"]);
        //print($_POST["pass"]);

        //設定値読み込み
        input_config();

        $id = $_POST["userid"];
        $pass = $_POST["pass"];
    
        check($id, $pass);

        //echo $ret;
        echo json_encode($resp);

    }

    //id,pass渡して、認証処理してくれる。メッセージを返す
    function check($id, $pass)
    {
        global $cfg;
        global $resp;
        global $userInfoArray;
        //ALLPASSが有効なら、認証処理無
        if($cfg[IDX_ALL_PASS] == _ON){
            return 'OK';
        }

        //userinfo.jsと照合
        $url = USER_INFO_FILE;
        //jsonファイル文字列に変換
        $json = file_get_contents($url);
        
        //json文字列を連想配列に変換
        $userInfoArray = json_decode($json,true);
        $last = count($userInfoArray[userinfolist]);
        $cnt = 1;
        //print($last);
        foreach($userInfoArray[userinfolist] as $key => $val){
            //jsonの中身参照
            /*
            echo 'key:'.$key.' ';
            echo 'userid:'.$val[userid].' ';
            echo 'pass:'.$val[pass].'       ';
            */
            if($val[userid] == $id)
            {
                //echo '[matchkey:'.$key.']';
                if($cfg[IDX_BLOCK] == _ON)
                {
                    if($val[block] == _ON)
                    {
                        $resp['result'] = 'block user NG';
                        break;
                    }
                }

                if($val[pass] == $pass) 
                {
                    $resp['result'] = 'OK';
                    if($val['latest_login_date'] == "")
                    {
                        $resp['success_msg'] = 0;
                    }
                    else{
                        $resp['success_msg'] = 1;
                    }
                    //日付け書きみ
                    write_date($key);
                    break;
                }
                else{
                    $resp['result'] = 'pass NG';
                    break;
                }

            }
            //print($cnt);
            if($cnt >= $last)
            {
                $resp['result'] = 'userid NG';
                break;
            }
            $cnt++;

        }

    }

    //設定ファイル読み込んで、グローバル変数に入れる
    function input_config()
    {
        global $cfg;

        //設定ファイル読み込み
        $fp = fopen(FILE_NAME, "r");
        if(!$fp)
        {
            exit("ファイル読み込みで失敗");
        }else{
            //共有ロック
            flock($fp, LOCK_UN[2]);
            $i = 0;
            while(!feof($fp))
            {
                //eofまで読み込み
                $cfgStr = fgets($fp);
                //空白削除
                //echo $cfgStr;
                //$cfgStr = trim($cfgStr," "); 
                $cfgStr = str_replace(" ", "", $cfgStr);
                //echo $cfgStr;
                //=以降の文字を取得
                $cfgStr = explode("=",$cfgStr);
                //改行・リターン文字削除
                $cfgStr[1] = str_replace("\n", "", $cfgStr[1]);
                $cfgStr[1] = str_replace("\r", "", $cfgStr[1]);
                //echo $cfgStr[1];

                //設定値をグローバル変数に格納
                $cfg[$i] = $cfgStr[1]; 
                $i++;
            }
            //echo "[allpass".$cfg[IDX_ALL_PASS]."]";
            //echo "[block".$cfg[IDX_BLOCK]."]";
            //ロック解除
            flock($fp, LOCK_UN[3]);
            fclose($fp);
        }
    }

    function write_date($key)
    {
        global $userInfoArray;
        $date = date("Y/m/d-H:i:s");
        $userInfoArray[userinfolist][$key][latest_login_date] = $date;
        $json = json_encode($userInfoArray);

        
        // 読みこみだと成功
        $fp = fopen("./userinfo.js","w+");
        if(!$fp)
        {
            exit("ファイルopen失敗");
        }
        else{
            fputs($fp, $json);
        }
    }
?>