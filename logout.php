<?php 
    session_start();
    session_unset();
    session_destroy();
    $msg="<p class='alert alert-primary' role='alert'> Anda Sudah Logout.. </p>";
    header("Location: index.php?msg=$msg");
?> 