<?php
session_start();
require_once '../helper/connection.php';

$id = $_POST['id'];
$namaBarang $_POST['namaBarang'];
$harga = $_POST['harga'];
$deskripsi = $_POST['deskripsi'];

$query = mysqli_query($connection, "insert into produk(id, namaBarang,harga, dekripsi) value('$id', '$namaBarang', '$harga', '$deskripsi')");
if ($query) {
  $_SESSION['info'] = [
    'status' => 'success',
    'message' => 'Berhasil menambah data'
  ];
  header('Location: ./index.php');
                                            } else {
                                              $_SESSION['info'] = [
                                                'status' => 'failed',
                                                'message' => mysqli_error($connection)
                                              ];
                                              header('Location: ./index.php');
                                            }
