<?php
    session_start();
    if (!isset($_SESSION['user'])) {
        $msg= "<p class='alert alert-danger' role='alert'> Anda Harus Login Terlebih Dahulu.. </p>";
        header("Location: ../index.php?msg=$msg");
    } else if ($_SESSION['level']!=1) {
        $msg= "<p class='alert alert-danger' role='alert'> user/password anda salah.. </p>";
        echo $msg;
        header ("location: ../index.php?msg=$msg");
    }
?>

