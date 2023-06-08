<?php
    session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];

    require_once 'helper/connection.php';
    $query="SELECT * FROM user WHERE username='$username' && password='$password'";
    $login = mysqli_query($connection,$query);
    $islogin = mysqli_num_rows($login);

    if (isset($_POST['login'])) {
        if ($islogin > 0 ) {
            $data = mysqli_fetch_assoc($login);

            $_SESSION['user'] = $username;
            if ($data['level']==1) {
                $_SESSION['level'] = $data['level'];
                header ("Location: penjual/index.php");
            } else {
                $_SESSION['level'] = $data['level'];
                header ("Location: pembeli/index.php");
            }
        } else {
            $msg = "<p class='alert alert-danger' role='alert'> user/password anda salah.. </p>";
            header ("Location: index.php?msg=$msg");
            exit;

        }
    }

?>

