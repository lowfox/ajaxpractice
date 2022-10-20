function ToolRedirect(jsondata){
//    let param = JSON.parse( jsondata );
    console.log(jsondata.pg);
    console.log(jsondata.btn);
    console.log(jsondata.data);

    let url = "master.php?" + "pg=" + jsondata.pg + "&btn=" + jsondata.btn + "&data=" + encodeURIComponent(jsondata.data);
    location.href = url;
}