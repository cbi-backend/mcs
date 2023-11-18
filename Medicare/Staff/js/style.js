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
function logOut()
{
    location.href='../logout.php?type="SuserName"';
}
var formUi=document.getElementsByClassName("formUi")[0];
var dashBoard=document.getElementsByClassName("dashBoard")[0];
function openAddPAtient()
{
    formUi.style.display="flex";
    dashBoard.style.display="none";
    closeMenu();
}
function openDashBoard()
{
    formUi.style.display="none";
    dashBoard.style.display="block";
    closeMenu();
}
openDashBoard();