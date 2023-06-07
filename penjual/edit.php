<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$id = $_GET['id'];
$query = mysqli_query($connection, "SELECT * FROM produk WHERE id='$id'");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Ubah Data Produk</h1>
    <a href="./index.php" class="btn btn-light">Kembali</a>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <!-- // Form -->
          <form action="./updateProduk.php" method="POST">
            <?php
            while ($row = mysqli_fetch_array($query)) {
            ?>
              <table cellpadding="8" class="w-100">
                <tr>
                  <td>Nama Produk</td>
                  <td><input class="form-control" type="text" name="namaBarang" size="20" required value="<?= $row['namaBarang'] ?>"></td>
                </tr>
                <tr>
                  <td>Harga</td>
                  <td><input class="form-control" type="text" name="harga" size="20" required value="<?= $row['harga'] ?>"></td>
                </tr>
                <tr>
                  <td>Deskripsi</td>
                  <td colspan="3"><textarea class="form-control" name="deskripsi" id="deskripsi" required><?= $row['deskripsi'] ?></textarea></td>
                </tr>
                  <td>
                    <input class="btn btn-primary d-inline" type="submit" name="proses" value="Ubah">
                    <a href="./index.php" class="btn btn-danger ml-1">Batal</a>
                  <td>
                </tr>
              </table>

            <?php } ?>
          </form>
        </div>
      </div>
    </div>
</section>

<?php
require_once '../layout/_bottom.php';
?>