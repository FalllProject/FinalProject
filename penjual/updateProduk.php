<?php
session_start();
require_once '../helper/connection.php';

$id = $_POST['id'];
$namaBarang = $_POST['namaBarang'];
$harga = $_POST['harga'];
$deskripsi = $_POST['deskripsi'];
$foto= $_FILES['foto']['name'];
$foto_tmp=$_FILES['']['foto_tmp'];
$profile_location='gambar/'.$foto;


if($foto != ' '){

  $query = mysqli_query($connection, "UPDATE produk SET id = '$id', namaBarang = '$namaBarang', deskripsi = '$deskripsi', foto='$foto' WHERE id = '$id'");
  $update_query= mysqli_query($connection,$query);

  if ( $update_query){
    move_update_file($foto_tmp,$profile_location);
    header("location:./index.php")

  }
}else {
  echo " data gagal update ";
}



if ($query) {
  $_SESSION['info'] = [
    'status' => 'success',
    'message' => 'Berhasil mengubah data'
  ];
  header('Location: ./index.php');
} else {
  $_SESSION['info'] = [
    'status' => 'failed',
    'message' => mysqli_error($connection)
  ];
  header('Location: ./index.php');
}
