var screen1=document.getElementById("screen1");
var screen2=document.getElementById("screen2");
var screen3=document.getElementById("screen3");
function closeAll()
{
    screen1.style.display="none";
    screen2.style.display="none";
    screen3.style.display="none";
}
function showscreen1()
{
    closeAll();
    screen1.style.display="flex";
}
function showscreen2()
{
    closeAll();
    screen2.style.display="flex";
}
function showscreen3()
{
    closeAll();
    screen3.style.display="flex";
}
showscreen1()
//setTimeout(showscreen2,\1000);
setTimeout(showscreen3,100);

var more=document.getElementsByClassName("more");
var showlink=document.getElementsByClassName("showlink");
function showmore(n)
{
    more[n].style.display="inline";
    showlink[n].style.display="none";
}
function hidemore(n)
{
    more[n].style.display="none";
    showlink[n].style.display="inline";
}

var section=document.getElementsByTagName("section");
var ftEl=document.getElementsByClassName("li-el");
var i;
function closeAllContent()
{
    for(i=0;i<section.length;i++)
    {
        section[i].style.display="none";
    }
    for(i=0;i<ftEl.length;i++)
    {
        ftEl[i].style.color="#000";
        ftEl[i].style.opacity="0.5";
    }
}
function showContent(n)
{
    closeAllContent();
    section[n].style.display="flex";
    ftEl[n].style.color="#e91b1b";
    ftEl[n].style.opacity="1";
}
showContent(2);