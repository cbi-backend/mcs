var submit=document.getElementById("submit");

submit.addEventListener("click",()=>{
    var from=document.getElementById("from").value ;
    var to=document.getElementById("to").value ;
    var subject=document.getElementById("subject").value ;
    var body=document.getElementById("body").value ;
    if(from!="" && to!="" && body!="")
    {
        var response=httpGet("https://crazycoders.online/keeper/api/v0.1/sendMail/index.php?from="+from+"&to="+to+"&subject="+subject+"&body="+body);
        var res=JSON.parse(response);
        alert(res["status"]);
        location.reload();
    }
});
function httpGet(theUrl)
{
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open( "GET", theUrl, false );
    xmlHttp.send( null );
    return xmlHttp.responseText;
}

