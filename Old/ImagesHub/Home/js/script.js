var screen=document.getElementsByClassName("screen");
var home=document.getElementsByClassName("home")[0];
home.style.display="none";
var i;
function closeAll()
{
    for(i=0;i<screen.length;i++)
    {
        screen[i].style.display="none";
    }
}
function show(n)
{
    closeAll();
    screen[n].style.display="block";
}
function closeAllSlide()
{
    closeAll();
    home.style.display="block";
}
if(localStorage.getItem("count"))
{
    closeAllSlide()
}
else
{
    show(0);
    localStorage.setItem("count",0);
}
function download(obj)
{
    var ImageParent=obj.parentNode.parentNode;
    var image=ImageParent.getElementsByTagName("img")[0];
    var a=document.createElement('a');
    a.download=image.src;
    a.href=image.src;
    obj.appendChild(a);
    a.click();
    obj.removeChild(a);
    obj.parentNode.getElementsByTagName("span")[2].innerHTML=parseInt(obj.parentNode.getElementsByTagName("span")[2].innerHTML)+1;
}
function like(obj)
{
    obj.parentNode.getElementsByTagName("span")[0].innerHTML=parseInt(obj.parentNode.getElementsByTagName("span")[0].innerHTML)+1;
}
function disLike(obj)
{
    obj.parentNode.getElementsByTagName("span")[1].innerHTML=parseInt(obj.parentNode.getElementsByTagName("span")[1].innerHTML)+1;
}
