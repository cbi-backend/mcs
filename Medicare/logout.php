<?php
    session_start();
    $type=$_GET['type'];
    unset($_SESSION[$type]);
    session_destroy();
    echo "<script>location.href='../Medicare'</script>";
?>