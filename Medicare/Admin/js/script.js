var menuContent=document.getElementsByClassName("menuContent")[0];
function openMenu()
{
    menuContent.style.display="block";
    document.body.style.overflow="hidden";
}
function closeMenu()
{
    menuContent.style.display="none";
    document.body.style.overflowY="auto";
}
var addUser=document.getElementsByClassName("formUi")[0];
var addbranch=document.getElementsByClassName("formUi")[1];
var dashBoard=document.getElementById("dashBoard");
function closeAll()
{
    addUser.style.display="none";
    addbranch.style.display="none";
    dashBoard.style.display="none";
    if(document.body.clientWidth <1024)
    {
        closeMenu();
    }
}
function openaddUser()
{
    closeAll();
    addUser.style.display="flex";
}
function openaddbranch()
{
    closeAll();
    addbranch.style.display="flex";
}
function opendashBoard()
{
    closeAll();
    dashBoard.style.display="block";
}
opendashBoard();
function logOut()
{
    location.href='../logout.php?type="AuserName"';
}