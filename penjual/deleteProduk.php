<?php
session_start();
require_once '../helper/connection.php';

$id = $_GET['id'];

$result = mysqli_query($connection, "DELETE FROM produk WHERE id='$id'");

if (mysqli_affected_rows($connection) > 0) {
  // Kode untuk menghapus gambar terkait
  $selectQuery = "SELECT * FROM produk WHERE id='$id'";
  $selectResult = mysqli_query($connection, $selectQuery);
  $row = mysqli_fetch_array($selectResult);
  $imagePath = "gambar" . $row['foto'];
  if (file_exists($imagePath)) {
    unlink($imagePath);
  }

  if (unlink($imagePath)) {
    $_SESSION['info'] = [
      'status' => 'success',
      'message' => 'Data berhasil dihapus beserta gambar'
    ];
  } else {
    $_SESSION['info'] = [
      'status' => 'success',
      'message' => 'Data berhasil dihapus, tetapi gagal menghapus gambar'
    ];
  }

  header('Location: ./index.php');
} else {
  $_SESSION['info'] = [
    'status' => 'failed',
    'message' => mysqli_error($connection)
  ];
  header('Location: ./index.php');
}
?>
