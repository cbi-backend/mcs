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
    location.href='../logout.php?type="DuserName"';
}