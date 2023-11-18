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
showscreen1();
if(localStorage.getItem("Name")==null)
{
    setTimeout(showscreen2,3000);
}
else
{
    setTimeout(showscreen3,3000);
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
        document.getElementById("li-el-"+i).classList.remove("selected");
    }
}
function showContent(n)
{
    closeAllContent();
    section[n].style.display="flex";
    document.getElementById("li-el-"+n).classList.add("selected");
}
showContent(0);
var content=document.getElementsByClassName("content");
var i;
for(i=0;i<content.length;i++)
{
    var paragraph=content[i].getElementsByClassName("news-content");
    var j;
    for(j=1;j<paragraph.length;j++)
    {
        paragraph[j].style.display="none";
    }
}
function showmore(param)
{
    var paragraph=param.parentNode.parentNode.getElementsByClassName("news-content");
    var j;
    for(j=0;j<paragraph.length;j++)
    {
        paragraph[j].style.display="block";
    }
    param.style.display="none";
}
function hidemore(param)
{
    var paragraph=param.parentNode.parentNode.getElementsByClassName("news-content");
    var j;
    for(j=1;j<paragraph.length;j++)
    {
        paragraph[j].style.display="none";
    }
    var link=param.parentNode.parentNode.getElementsByClassName("showlink")[0].style.display="inline";
}
var hitCount=0;
function showHiddenList()
{
    hitCount++;
    if(hitCount%2==1)
    {
        document.getElementsByClassName("hidden-list")[0].style.display="inline";
    }
    else
    {
        document.getElementsByClassName("hidden-list")[0].style.display="none";
    }
}


if(localStorage.getItem("theme")==null)
{
    localStorage.setItem("theme", "Light");
}
document.getElementById("theme").onchange = function() {changeTheme()};
function changeTheme() {
  var x = document.getElementById("theme").value;
  if(x==="Dark")
  {
      localStorage.setItem("theme", "Dark");
      themeofBody();
  }
  else if(x==="Light")
  {
    localStorage.setItem("theme", "Light");
    themeofBody();
  }
}
function themeofBody()
{
    var x=localStorage.getItem("theme");
    if(x==="Dark")
    {
        document.body.classList.remove("light-theme");
        document.body.classList.add("dark-theme");
    }
    else if(x==="Light")
    {
        document.body.classList.remove("dark-theme");
        document.body.classList.add("light-theme");
    }
    document.getElementById("theme").value=x;
}
themeofBody();

if(localStorage.getItem("Font")==null)
{
    localStorage.setItem("Font", "Medium");
}
document.getElementById("Font").onchange = function() {changeFont()};
function changeFont() {
  var x = document.getElementById("Font").value;
  if(x==="Small")
  {
      localStorage.setItem("Font", "Small");
      FontofBody();
  }
  else if(x==="Medium")
  {
    localStorage.setItem("Font", "Medium");
    FontofBody();
  }
  else if(x==="Large")
  {
    localStorage.setItem("Font", "Large");
    FontofBody();
  }
  else if(x==="ExtraLarge")
  {
    localStorage.setItem("Font", "ExtraLarge");
    FontofBody();
  }
}
function FontofBody()
{
    var x=localStorage.getItem("Font");
    if(x==="Small")
    {
        document.body.style.fontSize="12px";
    }
    else if(x==="Medium")
    {
        document.body.style.fontSize="14px";
    }
    else if(x==="Large")
    {
        document.body.style.fontSize="16px";
    }
    else if(x==="ExtraLarge")
    {
        document.body.style.fontSize="18px";
    }
    document.getElementById("Font").value=x;
}
FontofBody();

function validate()
{
    var fullName=document.getElementById("fullName");
    if(fullName.value==="")
    {
        fullName.focus();
        return false;               
    }
    var email=document.getElementById("email");
    if(email.value==="")
    {
        email.focus();
        return false;
    }
    var location=document.getElementById("location");
    if(location.value==="")
    {
        location.focus();
        return false;
    }
    var mobileNumber=document.getElementById("mobileNumber");
    if(mobileNumber.value==="")
    {
        mobileNumber.focus();
        return false;
    }
    if(fullName.value!="" && email.value!="" && location.value!="" && mobileNumber.value!="")
    {
        var countryCode=document.getElementById("countryCode");
        localStorage.setItem("Name",fullName.value);
        localStorage.setItem("Email",email.value);
        localStorage.setItem("Location",location.value);
        localStorage.setItem("Number",countryCode.value+mobileNumber.value);
        showscreen3();
        window.reload();
    }
    return false;
}
