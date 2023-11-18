var open=document.getElementById("open");
var close=document.getElementById("close");
var content=document.getElementsByClassName("content")[0];
function show_content()
{
    close.style.display="inline";
    open.style.display="none";
    content.style.display="block";
}
function close_content()
{
    open.style.display="inline";
    close.style.display="none";
    content.style.display="none";
}
close_content()