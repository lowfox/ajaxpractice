function ToolRedirect(pg, btn, data){
    let url = "master.php?" + "pg=" + pg + "&btn=" + btn + "&data=" + encodeURIComponent(data);
    location.href = url;
}