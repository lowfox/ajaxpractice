<?php
if( isset($_GET["btn"], $_GET["pg"] ) ){
    $btn = $_GET["btn"];
    $pg = $_GET["pg"];

    switch($pg){
        case "mypg" : 
            switch($btn){
                case "A" : 
                    break;
                case "B" :
                    break;
                case "C" :
                    break;
            } 
        case "A" :
            switch($btn){
                case "mypg" : 
                    break;
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