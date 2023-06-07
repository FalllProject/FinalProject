<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Tambah Produk</h1>
    <a href="./index.php" class="btn btn-light">Kembali</a>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <!-- // Form -->
          <form action="./storeProduk.php" method="POST" enctype="multipart/form-data" >
            <table cellpadding="8" class="w-100">

              <tr>
                <td>Nama Produk</td>
                <td><input class="form-control" type="text" name="namaBarang" id="namaBarang" size="20" required></td>
              </tr>

              <tr>
                <td>Harga</td>
                <td><input class="form-control" type="text" name="harga" id="harga" size="20" required></td>
              </tr>

              <tr>
                <td>Deskripsi Produk</td>
                <td colspan="3"><textarea class="form-control" name="deskripsi" id="deskripsi" required></textarea></td>
              </tr>

              <tr>
                <td>Foto Produk</td>
                <td><input class="form-control" type="file" enctype = "multipart/form-data" name="foto" size="20" required></td>
              </tr>
              
              <tr>
                <td>
                  <input class="btn btn-primary" type="submit" name="proses" value="Simpan">
                  <input class="btn btn-danger" type="reset" name="batal" value="Bersihkan"></td>
              </tr>

            </table>
          </form>
        </div>
      </div>
    </div>
</section>

